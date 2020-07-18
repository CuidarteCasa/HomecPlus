<?php

namespace App\Http\Controllers;

use Request;
use \App\Model\RegistroClinico_actividades_registroclinico;
use \App\Model\RegistroClinico_master_registros;
use \App\Model\Homecare_Actividades_Ordendeservicio;
use Illuminate\Support\Facades\DB;
use \App\Http\Controllers\NotificationsController;
class ActividadController extends Controller
{
    //

    public function ModalInfo(){
    	$activity = Homecare_Actividades_Ordendeservicio::find(Request::input('activity')) ;
    	
    	$registers = RegistroClinico_actividades_registroclinico::where('id_actividad',$activity->id)->get();
    	$data = [];
    	foreach ($registers as $key => $value) {
    		$master = RegistroClinico_master_registros::find($value->id_registroclinico_master);
    		$data['register'][$key]['name'] = $master->nombre_registro_clinico;
            $data['register'][$key]['format'] = $master->tag_blade;
            $data['register'][$key]['tableName'] = $master->nombre_tabla_mysql;
            
    	}
    	$data['activity']=$activity;
    	return $data;
    }

    //LISTA DE ACTIVIDADES SIN RESOLVER

    public function unresolved(){

        $registers = DB::table('homecare_actividades_orden_de_servicio')
                        ->join('homecare_orden_de_servicio','homecare_orden_de_servicio.id','homecare_actividades_orden_de_servicio.id_orden_de_servicio')
                        ->join('homecare_orden_de_trabajo','homecare_orden_de_trabajo.id','homecare_orden_de_servicio.id_orden_trabajo')
                        ->join('pacientes','pacientes.id','homecare_orden_de_trabajo.id_paciente')
                        ->where('homecare_orden_de_trabajo.id_estado',1)
                        ->where('homecare_actividades_orden_de_servicio.realizada_by',\Auth::user()->id)
                        ->where('homecare_actividades_orden_de_servicio._isvalid',2)
                        ->get(['pacientes.id as idpaciente','pacientes.name as name','homecare_actividades_orden_de_servicio.id as activity','homecare_actividades_orden_de_servicio.observacion_adm']);

         
        foreach ($registers as $key => $value) {
           
            
                   $data[$key]['idpcte'] = $value->idpaciente;
                    $data[$key]['pcte'] = $value->name;
                    $data[$key]['actividad'] = $value->activity;
                    $data[$key]['observacion'] = $value->observacion_adm;
                    
            
        }

        
        return $data;    

    }
    //FIN DE ACTIVIDADES SIN REVOLSER


    public function auditStore(){
        try{
            DB::transaction(function(){
                $activity = Request::input('activity');
                $order = Request::input('order');
                $audit = Request::input('valid');
                
                $observacion = Request::input('auditObservation');
                $audit = ($audit=="true") ? 1:2;
                $activity = Homecare_Actividades_Ordendeservicio::find($activity);
                $activity->_isvalid = $audit;
                $activity->auditedbydate = date('Y-m-d');
                $activity->auditedby = \Auth::user()->id;
                $activity->observacion_adm = $observacion;
                $activity->save();

                //VALORACION DEL PROFESIONAL
                ($audit==1) ? UserController::SCP($activity->realizada_by,1,0,'Actividad correcta') :  UserController::SCP($activity->realizada_by,0,-1,'Actividad con Inconsistencia');
                
                //NOTIFICACION DE AUDITORIA
                 if($audit==2) NotificationsController::RejectActivityFunction($activity->realizada_by,$activity->id,$activity->orden_de_servicio->orden_de_trabajo->id_paciente); 

                //HISTORIAL DE LA ORDEN
                $audit = ($audit==1) ? 'Aprobada':'Rechaza';
                $historyDes = 'Auditoria clinica realizada, <strong>Actividad :</strong>'.$activity->id.' <br> <strong>Gestor: </strong>'.\Auth::user()->name.' <br><strong>Info: </strong>'.$audit.'<br><strong> Fecha: </strong>'.date("Y-m-d H:i");
                  OrdenDeTrabajoController::storeHistory(Request::input('order'),'info',$historyDes);

                 
            });

        }catch (\Illuminate\Database\QueryException $ex) {
             $error=[
                    $ex->getMessage()
                ];
                return response()->json([
                'success'=>'false',
                'errors'=>$error,
            ],400);
        }
    }

    public function unsigned(){
        $DBdata =DB::table('homecare_orden_de_trabajo')
                    ->join('pacientes','homecare_orden_de_trabajo.id_paciente','pacientes.id')
                    ->join('homecare_orden_de_servicio','homecare_orden_de_trabajo.id','homecare_orden_de_servicio.id_orden_trabajo')
                    ->join('homecare_servicio','homecare_servicio.id','homecare_orden_de_servicio.id_servicio')
                    ->where('homecare_orden_de_trabajo.id_estado',1)
                    ->where('homecare_orden_de_servicio.id_profesional_asignado',null)
                    ->get(['homecare_orden_de_trabajo.id as order','homecare_orden_de_servicio.id as osa','pacientes.name as paciente','homecare_servicio.tag as service','pacientes.id_zonaclinica as zona','homecare_orden_de_servicio.id_servicio as serviceid']);
        $data=[];
        foreach ($DBdata as $key => $value) {
                 $data['data'][$key]['order'] = $value->order;
                 $data['data'][$key]['osa'] = $value->osa;
                 $data['data'][$key]['pcte'] = $value->paciente;
                 $data['data'][$key]['service'] = $value->service;
                 $data['data'][$key]['action'] = '<a class="btn btn-icon btn-light btn-sm btnReasignService" data-toggle="modal" data-target="#reassignService" data-serviceid="'.$value->serviceid.'" data-zoneid="'.$value->zona.'" data-id="'.$value->osa.'" data-actionRefresh="programmer"><i class="icon-2x text-success flaticon2-copy"></i></a>';
                     }     
        return json_encode($data);                     
    }

    public function DisclaimerStore(){

        try{
            DB::transaction(function(){

                $activity = Homecare_Actividades_Ordendeservicio::find(Request::input('activity'));
                $nota = Request::input('nota');
                 $fecha = date("Y-m-d H:i:s"); 
                if($activity->_isvalid==2 or $activity->_isvalid_fact==2){
                    $activity->_isvalid = 3;
                    $activity->_isvalid_fact = 3;
                }
                $activity->save();

                //UPDATE REGISTRO CLINICO
                $tablamysql = Request::input('table');
                DB::table($tablamysql)->where('id_actividad_servicio', $activity->id)->update(['nota_aclaratoria' => $nota,'fecha_nota_aclaratoria'=>$fecha,'user_nota_aclaratoria'=>\Auth::id()]);

                //FIN UPDATE

                //HISTORIAL DE LA ORDEN
                        
                        $historyDes = 'Nota aclaratoria, <strong>Actividad :</strong>'.$activity->id.' <br> <strong>Profesional: </strong>'.\Auth::user()->name.' <br><strong> Fecha: </strong>'.date("Y-m-d H:i");
                          OrdenDeTrabajoController::storeHistory(Request::input('order'),'info',$historyDes);
            });

        }catch (\Illuminate\Database\QueryException $ex) {
             $error=[
                    $ex->getMessage()
                ];
                return response()->json([
                'success'=>'false',
                'errors'=>$error,
            ],400);
        }


    }

    public function seguimientoTel(){
        try {
           DB::transaction(function(){

                $activity = Homecare_Actividades_Ordendeservicio::find(Request::input('activity'));
                $spad = new \App\Model\Homecare_SPAD_Analista;
                $spad->id_orden = Request::input('order');
                $spad->id_actividad = Request::input('activity');
                $spad->created_by = \Auth::user()->id;
                $spad->nota = Request::input('nota');
                $spad->id_status = Request::input('type');
                $spad->id_patient = Request::input('pcte');
                $spad->fecha = date('Y-m-d');
                $spad->save();
                //cargamos la observacion a la actividad
                $activity->seguimiento_status = Request::input('type');
                $activity->seguimiento_by = \Auth::user()->id;    
                $activity->save();

                $status = 'danger';
                $info = 'Inconsistencia en la atencion <a tabindex="0" class="btn btn-hover-bg-danger btn-text-danger btn-hover-text-white border-0 font-weight-bold mr-2" role="button" data-toggle="tooltip" data-theme="dark"  title="'.Request::input('nota').'">
    '.Request::input('activity').'
</a>';
                if(Request::input('type')==1){
                    $status='success'; 
                    $info='Actividad '.Request::input('activity').' realizada correctamente'; 
                    UserController::SCP($activity->realizada_by,1,0,$info);
                }else{
                    UserController::SCP($activity->realizada_by,0,-3,$info);
                }

                //SAVE HISTORY ON ORDER   
                 $historyDes = 'Seguimiento telefonico realizado <br> <strong>Gestor: </strong>'.\Auth::user()->name.' <br><strong>Info: </strong>'.$info.'<br><strong> Fecha: </strong>'.date("Y-m-d H:i");
                  OrdenDeTrabajoController::storeHistory(Request::input('order'),$status,$historyDes); 
                                                //END SAVE

                  //SAVE CALIFICACION A PROFESIONAL

                  
                  //
           });


        
         return response()->json([
                        'message'=>'Seguimiento guardado con exito'
                    ],200);
        
        } catch (\Illuminate\Database\QueryException $ex) {
             $error=[
                    $ex->getMessage()
                ];
                return response()->json([
                'success'=>'false',
                'errors'=>$error,
            ],400);
        }
    }
}
