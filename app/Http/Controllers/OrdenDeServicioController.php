<?php

namespace App\Http\Controllers;

use Request;
use \App\Model\Homecare_Ordendeservicio;
use \App\Model\Homecare_Servicio;
use \App\User;

class OrdenDeServicioController extends Controller
{
    //

    public function observationlist(){
        $osa = Homecare_Ordendeservicio::find(Request::input('osa'));
        $observations = $osa->observations;
        return $observations;
    }


    public function reasignService(){
        try{
            \DB::transaction(function(){
                    $service = Homecare_ordendeservicio::find(Request::input('service'));
              $servicio = $service->servicio;

        $userunsigned = $service->id_profesional_asignado;
        $userunsignedName = ($service->profesional) ? $service->profesional->name : 'Sin Asignacion';
        $service->id_profesional_asignado =(Request::input('newPrf')=="NULL") ? null : Request::input('newPrf');
        $newUser =(Request::input('newPrf')=="NULL") ? 'PENDIENTE ASIGNACION' : User::find(Request::input('newPrf'))->name;
        $service->save();
        
        
        $unsigned = new \App\Model\Homecare_unsigned_osa;
        $unsigned->created_by=\Auth::id();
        $unsigned->fecha = date('Y-m-d');
        $unsigned->id_service = Request::input('service');
        $unsigned->id_userunsigned = $userunsigned;
        $unsigned->obs=Request::input('obs');
        $unsigned->type = Request::input('type');
        $unsigned->save();   
        //add to order History
        

        $historyDes = \Auth::user()->name.' reasigno el servicio de '.$servicio->tag.'<br>'.$userunsignedName.' <i class="text-success flaticon2-refresh-arrow"></i> '.$newUser.' <br><strong> Motivo: </strong>'.$unsigned->motivo->nombre.' <br><strong>Descripcion:  </strong>'.Request::input('obs');
        OrdenDeTrabajoController::storeHistory($service->id_orden_trabajo,'warning',$historyDes);  
            });

            return response()->json([
                                'message'=>'Servicio reaginado correctamente'
                            ],200); 
          
        }catch(\Illuminate\Database\QueryException $ex) {
                
                return response()->json([
                    'message'=>'Error en la base de datos',
                    'error' => $ex->getMessage()
                ],400);
        }   
    }

    public function ModalInfo(){
    	$osa = Homecare_Ordendeservicio::find(Request::input('id'));

    	$actividades = $osa->actividades;
        $data = array();
    	foreach ($actividades as $key => $value) {
    		$registers = $value->registros_clinicos;
             $status = $value->seguimiento_status;  
    		foreach ($registers as $k => $v) {
    			
        		
        		$tablamysql=$v->nombre_tabla_mysql;
        
        		$registro_clinico_data=\DB::table($tablamysql)->where('id_actividad_servicio',$value->id)->where('id_orden_servicio',$osa->id)->where('id_orden_trabajo',$osa->id_orden_trabajo)->first();
        
        		array_push($data,array('format'=>$v->tag_blade,'activity'=>$value->id,'tableName'=>$tablamysql,'registerName'=>$v->nombre_registro_clinico,'date'=>$registro_clinico_data->fecha_actividad,'status'=>$status));


    			
    		}
    	}
        return $data;
    	
    }

    public function serviceUserList(){
        $service = Request::input('service');

        $service = Homecare_Servicio::find($service);
        $perfilDo = $service->id_perfil_realiza;
        $zona = Request::input('zona');
        $users = User::where('active',1)->where('rh_validate',1)->get();
        $i=0;
        foreach ($users as $key => $value) {

            if($value->perfiles->contains('id',$perfilDo) and $value->zonas->contains('id',$zona)){

                $us = User::find($value->id);
                $osas = $us->ordenes_de_servicio ;
                $activities = 0;
                $doit = 0;
                $cantDoit = $us->activities_permission;
                foreach ($osas as $k => $v) {
                    if($v->orden_de_trabajo->id_estado==1 ){
                        $activities += $v->cantidad_actividades;
                        $doit += $v->actividades_realizadas ;
                    }
                     
                 } 
                $result = $activities - $doit;
                $cantDoit = $cantDoit - $result ;
                $percent = ($activities==0) ? 0 : intval((100 * $doit)/$activities);
                if($cantDoit>0){
                
                $data[$i]['name'] = $value->name;
                $data[$i]['activities'] = $cantDoit;
                $data[$i]['asignadas'] = $activities; 
                $data[$i]['realizadas'] = $doit;
                $data[$i]['percent'] = $percent;
                $data[$i]['action'] = '<a href="#" class="btn btn-icon btn-sm btn-primary mr-1 setPrftoAssign" data-toggle="modal" data-target="#reassignServiceObservation" data-idprf="'.$value->id.'" >
                                                        <i class="fas fa-check"></i>
                                                    </a>';
                switch ($percent) {
                case $percent>75:
                    $color = 'bg-success';
                    break;
                case $percent>40 and $percent<75:
                    $color = 'bg-primary';
                    break;
                default:
                    $color = 'bg-danger';
                    break;
                    }
                $data[$i]['color'] = $color;    
                $i++;
                }
            }
        }
        return $data;

    }
}
