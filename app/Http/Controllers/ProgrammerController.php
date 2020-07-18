<?php

namespace App\Http\Controllers;

use Request;
use \App\Model\Homecare_Ordendetrabajo;
use \App\Model\RegistroClinico_evo_terapia_fisica;
use \App\Model\Homecare_SPAD_Analista;
use \App\Model\Homecare_Ordendeservicio;
use Illuminate\Support\Facades\DB;
use \App\User;
class ProgrammerController extends Controller
{
    //
    public function index(){
    	 $page_title = 'Programador';
        $page_description = 'Resumen operacion en progreso';

        return view('programador.index', compact('page_title', 'page_description'));
    }

    public function AuditPanel(){
        $page_title = 'Programador';
        $page_description = 'Panel de auditoria';

        return view('programador.auditPanel', compact('page_title', 'page_description'));
    }

    //PROGRESO DE PROFESIONALES EN ORDENES ACTIVAS
    public function UserTracing(){

         $DBdata = DB::select('CALL userServices');
         $data =[]; 
         foreach ($DBdata as $key => $value) {

             $percent = 0;
             $realizado=$value->valid + $value->invalid + $value->pending;
             $perfilText = DB::select('CALL userPerfil('.$value->id.')');
             if ($realizado>0) {
             $percent=($realizado/$value->numActivities)*100;
            }
            $percent = round($percent);
            $color = PagesController::barProgressColor($percent);
            $data[$key]['prfId'] = $value->id;
            $data[$key]['prf'] = $value->name;
            $data[$key]['profiles'] =  $perfilText[0]->nombre;
            $data[$key]['location'] = $value->dpt.' / '.$value->mnc; 
            $data[$key]['progress'] = '<div class="d-flex align-items-center justify-content-between mb-2">
                                                                            <span class="text-muted mr-2 font-size-sm font-weight-bold">
                                                                                '.$percent.'%
                                                                            </span>
                                                                            
                                                                        </div>
                                                                        <div class="progress progress-xs w-100">
                                                                            <div class="progress-bar '.$color.'" role="progressbar" style="width: '.$percent.'%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                                        </div>';
         }
            
         return $data;           
    }
    //FIN PROGRESO

    //PANEL DE CONTROL
    public function ControlPanel($id){
        //SERVICIOS REALIZADOS SOBRE LA CANTIDAD DE SERVICIOS TOTALES
        if($id==1){
            $DBdata = DB::table('homecare_orden_de_trabajo')
                        ->join('homecare_orden_de_servicio','homecare_orden_de_trabajo.id','homecare_orden_de_servicio.id_orden_trabajo')       
                        ->where('homecare_orden_de_trabajo.id_estado',1)
                        ->select(DB::raw('SUM(homecare_orden_de_servicio.cantidad_actividades) as actividades,SUM(homecare_orden_de_servicio.actividades_realizadas) as realizadas'))
                        ->get();
            
            $data[0] = intval($DBdata[0]->actividades);
            $data[1] = intval($DBdata[0]->realizadas); 
            return $data;      
        }

        if($id==2){
             $DBdata = DB::table('homecare_orden_de_trabajo')
                        ->join('homecare_orden_de_servicio','homecare_orden_de_trabajo.id','homecare_orden_de_servicio.id_orden_trabajo')
                        ->join('homecare_servicio','homecare_servicio.id','homecare_orden_de_servicio.id_servicio')       
                        ->where('homecare_orden_de_trabajo.id_estado',1)
                        ->select('homecare_servicio.tag',DB::raw('SUM(homecare_orden_de_servicio.cantidad_actividades) as actividades,SUM(homecare_orden_de_servicio.actividades_realizadas) as realizadas'))
                        ->groupBy('homecare_servicio.tag')
                        ->get();
            
            return $DBdata; 
               
        }
        if($id==3){
            $fecha=new \DateTime();
            $inicio_mes=$fecha->modify('first day of this month');
            $inicio_mes=$inicio_mes->format('Y-m-d');
            $fin_mes = $fecha->modify('last day of this month');
            $fin_mes=$fecha->format('Y-m-d');
            $user = Request::input('user');
            $DBdata = DB::table('homecare_spad_analista')
                        ->where('created_by',$user)
                        ->where('fecha','>=',$inicio_mes)
                        ->where('fecha','<=',$fin_mes)
                        ->select('fecha',DB::raw('count(id) as sgto '))
                        ->groupBy('fecha')
                        ->get();
            
             
            
            
            return $DBdata;
        }

        if($id==4){
            $fecha = Request::input('fecha');
            $fecha = ($fecha=="") ? date('Y-m-d') : $fecha;
            $fecha_actividad = $fecha;
            $fecha_inicio = new \DateTime($fecha);
            $fecha_inicio = $fecha_inicio->format('Y-m-d 00:00:01');
            $fecha_fin = new \DateTime($fecha);
            $fecha_fin = $fecha_fin->format('Y-m-d 23:59:59');
            $user = Request::input('user');
            $DBdata = DB::table('homecare_spad_analista')
                        ->where('created_by',$user)
                        ->whereDate('fecha',$fecha)
                        ->select(DB::raw('count(id) as sgto '))
                        ->get();
                        
            $zonas = \Auth::user()->zonas_s_;
            $dataZone = [];
            foreach ($zonas as $key => $value) {
                $dataZone[$key] = $value->id;
            }
            $totalRegisters = 0;
            $registers = DB::table('registroclinico_evolucion_terapia_fisica')
                    ->join('pacientes','registroclinico_evolucion_terapia_fisica.id_paciente','pacientes.id')
                    ->where('pacientes.id_zona_s',$dataZone)
                    ->where('registroclinico_evolucion_terapia_fisica.created_at','>=',$fecha_inicio)
                    ->where('registroclinico_evolucion_terapia_fisica.created_at','<=',$fecha_fin)
                    ->select(DB::raw('count(registroclinico_evolucion_terapia_fisica.id) as terapies'))
                    ->get();
            $totalRegisters += $registers[0]->terapies;
            
            $registers = DB::table('registroclinico_evolucion_terapia_respiratoria')
                    ->join('pacientes','registroclinico_evolucion_terapia_respiratoria.id_paciente','pacientes.id')
                    ->where('pacientes.id_zona_s',$dataZone)
                    ->where('registroclinico_evolucion_terapia_respiratoria.created_at','>=',$fecha_inicio)
                    ->where('registroclinico_evolucion_terapia_respiratoria.created_at','<=',$fecha_fin)
                    ->select(DB::raw('count(registroclinico_evolucion_terapia_respiratoria.id) as terapies'))
                    ->get();
            $totalRegisters += $registers[0]->terapies;   
            $registers = DB::table('registroclinico_evolucion_terapia_ocupacional')
                    ->join('pacientes','registroclinico_evolucion_terapia_ocupacional.id_paciente','pacientes.id')
                    ->where('pacientes.id_zona_s',$dataZone)
                    ->where('registroclinico_evolucion_terapia_ocupacional.created_at','>=',$fecha_inicio)
                    ->where('registroclinico_evolucion_terapia_ocupacional.created_at','<=',$fecha_fin)
                    ->select(DB::raw('count(registroclinico_evolucion_terapia_ocupacional.id) as terapies'))
                    ->get();
            $totalRegisters += $registers[0]->terapies;   
            
            $registers = DB::table('registroclinico_evolucion_fonoaudiologia')
                    ->join('pacientes','registroclinico_evolucion_fonoaudiologia.id_paciente','pacientes.id')
                    ->where('pacientes.id_zona_s',$dataZone)
                    ->where('registroclinico_evolucion_fonoaudiologia.created_at','>=',$fecha_inicio)
                    ->where('registroclinico_evolucion_fonoaudiologia.created_at','<=',$fecha_fin)
                    ->select(DB::raw('count(registroclinico_evolucion_fonoaudiologia.id) as terapies'))
                    ->get();
            $totalRegisters += $registers[0]->terapies;             
            $data = ['total'=>$totalRegisters,'realizados'=>$DBdata[0]->sgto];
            return $data;        
        }
    }
    //FIN PANEL DE CONTROL

    public function serviceWTOaudit(){
        $type = Request::input('type');
        if($type=='medicine'){
            $registers = DB::table('homecare_actividades_orden_de_servicio')
                            ->join('homecare_orden_de_servicio','homecare_actividades_orden_de_servicio.id_orden_de_servicio','homecare_orden_de_servicio.id')
                            ->join('Homecare_orden_de_trabajo','Homecare_orden_de_trabajo.id','homecare_orden_de_servicio.id_orden_trabajo')
                            ->join('users','homecare_actividades_orden_de_servicio.realizada_by','users.id')
                            ->join('pacientes','Homecare_orden_de_trabajo.id_paciente','pacientes.id')
                            ->where('homecare_orden_de_servicio.id_servicio',1001)
                            ->where('Homecare_orden_de_trabajo.id_estado',1)
                            ->where('homecare_actividades_orden_de_servicio.realizada',1)
                            ->where('homecare_actividades_orden_de_servicio._isvalid',3)
                            ->get(['homecare_actividades_orden_de_servicio.id as id','users.name as prf','pacientes.name as pcte']);
        $data = [];                    
        foreach ($registers as $key => $value) {
            $data['data'][$key]['activity'] = $value->id ;
            $data['data'][$key]['prf'] = $value->prf;
            $data['data'][$key]['pcte'] =$value->pcte;
            $data['data'][$key]['action'] = '<a  class="btn btn-icon btn-light btn-sm showActivity"  data-id="'.$value->id.'">
                                                     <i class="flaticon2-open-box"></i></a>';            
        }
        return json_encode($data);    
        }
        
    }



    public function serviceWTOseguimiento(){
        $type = Request::input('type');
        $date = date('Y-m-d');
        $pastDay = strtotime('-1 day',strtotime($date));
        $ceroHoras = date('Y-m-d 00:00:00',$pastDay);
        $endHoras = date('Y-m-d 23:59:59',$pastDay);
        $data = [];
        $i = 0;

        if($type=='terapy'){
            $zonas = \Auth::user()->zonas_s_;
        $dataZone = [];
        foreach ($zonas as $key => $value) {
                $dataZone[$key] = $value->id;
            }    

        
        //TERIAPIA FISICA
       $registers = DB::table('registroclinico_evolucion_terapia_fisica')->join('pacientes','registroclinico_evolucion_terapia_fisica.id_paciente','pacientes.id')->where('pacientes.id_zona_s',$dataZone)->where('registroclinico_evolucion_terapia_fisica.created_at','>=',$ceroHoras)->where('registroclinico_evolucion_terapia_fisica.created_at','<=',$endHoras)->get(['id_actividad_servicio','id_orden_trabajo','id_orden_servicio','pacientes.name','pacientes.telefono','pacientes.celular','fecha_actividad']);

       
       foreach ($registers as $key => $value) {
        
         $check =  Homecare_SPAD_Analista::where('id_actividad',$value->id_actividad_servicio)->where('id_orden',$value->id_orden_trabajo)->get();

           if($check->isEmpty()){
                $data['data'][$i]['id'] = $value->id_actividad_servicio;
                $data['data'][$i]['paciente'] = $value->name;
                $data['data'][$i]['servicio'] = 'Terapia Fisica';
                $data['data'][$i]['fecha'] = $value->fecha_actividad;
                $data['data'][$i]['telefono'] = $value->telefono.' - '.$value->celular;
                //$data['data'][$i]['action'] = '<a  class="btn btn-icon btn-light btn-sm showService"  data-id="'.$value->id_orden_servicio.'" ><i class="icon-2x text-success flaticon2-copy"></i></a>';
                $data['data'][$i]['action'] = '<a  class="btn btn-icon btn-light btn-sm displayRegister" data-toggle="modal" data-target="#SavedRegistersModal" data-format="evolucion_terapia_fisica" data-activity="'.$value->id_actividad_servicio.'" data-tablename="registroclinico_evolucion_terapia_fisica"  ><i class="icon-2x text-success flaticon2-copy"></i></a>';
                $i++;
           }
       }
       //TERAPIA RESPIRATORIA
       $registers = DB::table('registroclinico_evolucion_terapia_respiratoria')->join('pacientes','registroclinico_evolucion_terapia_respiratoria.id_paciente','pacientes.id')->where('pacientes.id_zona_s',$dataZone)->where('registroclinico_evolucion_terapia_respiratoria.created_at','>=',$ceroHoras)->where('registroclinico_evolucion_terapia_respiratoria.created_at','<=',$endHoras)->get(['id_actividad_servicio','id_orden_trabajo','id_orden_servicio','pacientes.name','pacientes.telefono','pacientes.celular','fecha_actividad']);

       
       foreach ($registers as $key => $value) {
        
         $check =  Homecare_SPAD_Analista::where('id_actividad',$value->id_actividad_servicio)->where('id_orden',$value->id_orden_trabajo)->get();

           if($check->isEmpty()){
                $data['data'][$i]['id'] = $value->id_actividad_servicio;
                $data['data'][$i]['paciente'] = $value->name;
                $data['data'][$i]['servicio'] = 'Terapia Respiratoria';
                $data['data'][$i]['fecha'] = $value->fecha_actividad;
                $data['data'][$i]['telefono'] = $value->telefono.' - '.$value->celular;
                $data['data'][$i]['action'] = '<a  class="btn btn-icon btn-light btn-sm displayRegister" data-toggle="modal" data-target="#SavedRegistersModal" data-format="evolucion_terapia_respiratoria" data-activity="'.$value->id_actividad_servicio.'" data-tablename="registroclinico_evolucion_terapia_respiratoria"  ><i class="icon-2x text-success flaticon2-copy"></i></a>';
                $i++;
           }
       }

       //TERAPIA FONOAUDIOLOGIA
       $registers = DB::table('registroclinico_evolucion_fonoaudiologia')->join('pacientes','registroclinico_evolucion_fonoaudiologia.id_paciente','pacientes.id')->where('pacientes.id_zona_s',$dataZone)->where('registroclinico_evolucion_fonoaudiologia.created_at','>=',$ceroHoras)->where('registroclinico_evolucion_fonoaudiologia.created_at','<=',$endHoras)->get(['id_actividad_servicio','id_orden_trabajo','id_orden_servicio','pacientes.name','pacientes.telefono','pacientes.celular','fecha_actividad']);

       
       foreach ($registers as $key => $value) {
        
         $check =  Homecare_SPAD_Analista::where('id_actividad',$value->id_actividad_servicio)->where('id_orden',$value->id_orden_trabajo)->get();

           if($check->isEmpty()){
                $data['data'][$i]['id'] = $value->id_actividad_servicio;
                $data['data'][$i]['paciente'] = $value->name;
                $data['data'][$i]['servicio'] = 'Terapia Fonoaudiologia';
                $data['data'][$i]['fecha'] = $value->fecha_actividad;
                $data['data'][$i]['telefono'] = $value->telefono.' - '.$value->celular;
                 $data['data'][$i]['action'] = '<a  class="btn btn-icon btn-light btn-sm displayRegister" data-toggle="modal" data-target="#SavedRegistersModal" data-format="evolucion_terapia_fonoaudiologia" data-activity="'.$value->id_actividad_servicio.'" data-tablename="registroclinico_evolucion_fonoaudiologia"  ><i class="icon-2x text-success flaticon2-copy"></i></a>';
                $i++;
           }
       }

       //TERAPIA OCUPACIONAL

       $registers = DB::table('registroclinico_evolucion_terapia_ocupacional')->join('pacientes','registroclinico_evolucion_terapia_ocupacional.id_paciente','pacientes.id')->where('pacientes.id_zona_s',$dataZone)->where('registroclinico_evolucion_terapia_ocupacional.created_at','>=',$ceroHoras)->where('registroclinico_evolucion_terapia_ocupacional.created_at','<=',$endHoras)->get(['id_actividad_servicio','id_orden_trabajo','id_orden_servicio','pacientes.name','pacientes.telefono','pacientes.celular','fecha_actividad']);

       
       foreach ($registers as $key => $value) {
        
         $check =  Homecare_SPAD_Analista::where('id_actividad',$value->id_actividad_servicio)->where('id_orden',$value->id_orden_trabajo)->get();

           if($check->isEmpty()){
                $data['data'][$i]['id'] = $value->id_actividad_servicio;
                $data['data'][$i]['paciente'] = $value->name;
                $data['data'][$i]['servicio'] = 'Terapia Ocupacional';
                $data['data'][$i]['fecha'] = $value->fecha_actividad;
                $data['data'][$i]['telefono'] = $value->telefono.' - '.$value->celular;
                $data['data'][$i]['action'] = '<a  class="btn btn-icon btn-light btn-sm displayRegister" data-toggle="modal" data-target="#SavedRegistersModal" data-format="evolucion_terapia_ocupacional" data-activity="'.$value->id_actividad_servicio.'" data-tablename="registroclinico_evolucion_terapia_ocupacional"  ><i class="icon-2x text-success flaticon2-copy"></i></a>';
                $i++;
           }
       }

       return json_encode($data);
        }

        if($type=='medicine'){
               //MEDICINA
               $registers = DB::table('registroclinico_evolucion_medica')->join('pacientes','registroclinico_evolucion_medica.id_paciente','pacientes.id')->where('registroclinico_evolucion_medica.created_at','>=',$ceroHoras)->where('registroclinico_evolucion_medica.created_at','<=',$endHoras)->get(['id_actividad_servicio','id_orden_trabajo','id_orden_servicio','pacientes.name','pacientes.telefono','pacientes.celular','fecha_actividad']);

               
               foreach ($registers as $key => $value) {
                
                 $check =  Homecare_SPAD_Analista::where('id_actividad',$value->id_actividad_servicio)->where('id_orden',$value->id_orden_trabajo)->get();

                   if($check->isEmpty()){
                        $data['data'][$i]['id'] = $value->id_actividad_servicio;
                        $data['data'][$i]['paciente'] = $value->name;
                        $data['data'][$i]['servicio'] = 'Evolucion Medica';
                        $data['data'][$i]['fecha'] = $value->fecha_actividad;
                        $data['data'][$i]['telefono'] = $value->telefono.' - '.$value->celular;
                       $data['data'][$i]['action'] = '<a  class="btn btn-icon btn-light btn-sm displayRegister" data-toggle="modal" data-target="#SavedRegistersModal" data-format="evolucion_medicinageneral" data-activity="'.$value->id_actividad_servicio.'" data-tablename="registroclinico_evolucion_medica"  ><i class="icon-2x text-success flaticon2-copy"></i></a>';
                        $i++;
                   }
               }

               $registers = DB::table('registroclinico_valoracion_medicina_general')->join('pacientes','registroclinico_valoracion_medicina_general.id_paciente','pacientes.id')->where('registroclinico_valoracion_medicina_general.created_at','>=',$ceroHoras)->where('registroclinico_valoracion_medicina_general.created_at','<=',$endHoras)->get(['id_actividad_servicio','id_orden_trabajo','id_orden_servicio','pacientes.name','pacientes.telefono','pacientes.celular','fecha_actividad']);

               
               foreach ($registers as $key => $value) {
                
                 $check =  Homecare_SPAD_Analista::where('id_actividad',$value->id_actividad_servicio)->where('id_orden',$value->id_orden_trabajo)->get();

                   if($check->isEmpty()){
                        $data['data'][$i]['id'] = $value->id_actividad_servicio;
                        $data['data'][$i]['paciente'] = $value->name;
                        $data['data'][$i]['servicio'] = 'Evolucion Medica';
                        $data['data'][$i]['fecha'] = $value->fecha_actividad;
                        $data['data'][$i]['telefono'] = $value->telefono.' - '.$value->celular;
                       $data['data'][$i]['action'] = '<a  class="btn btn-icon btn-light btn-sm displayRegister" data-toggle="modal" data-target="#SavedRegistersModal" data-format="valoracion_medicina_general" data-activity="'.$value->id_actividad_servicio.'" data-tablename="registroclinico_valoracion_medicina_general"  ><i class="icon-2x text-success flaticon2-copy"></i></a>';
                        $i++;
                   }
               }
            return json_encode($data);
        }

        
    }

    public function activeOrders(){
    	$orders = Homecare_Ordendetrabajo::where('id_estado',1)->get();
    	$data = [];
    	$i=0;
    	foreach ($orders as $key => $value) {
    		$pcte = $value->paciente;
    		$package = $value->paquete;
    		$barcumplimiento = ($value->NumberOfActivities) ? ($value->NumberOfActivitiesDoIt * 100) / $value->NumberOfActivities : 0;
    		$data[$i]['orderID'] = $value->id;
    		$data[$i]['order'] = $value->id;
    		$data[$i]['orderDesde'] =$value->valida_desde;
    		$data[$i]['orderHasta'] = $value->valida_hasta;
    		$data[$i]['resume'] = '<div class="progress"><div data-placement="top" data-title="Porcentaje cumplimiento" data-toggle="tooltip" class="progress-bar" role="progress-bar" aria-valuenow="'.$barcumplimiento.'" style="width:'.$barcumplimiento.'%">'.$barcumplimiento.'%</div></div>';
    		$data[$i]['pacienteName'] = '<a href="'.url("Paciente/".$pcte->id).'" target="_blank">'.$pcte->name.'</a>';
    		$data[$i]['pacienteEps'] = $pcte->eps->tag;
    		$data[$i]['pacienteSede'] = $pcte->municipio->nombre;
    		$data[$i]['packageName'] = $package->nombre;
            $data[$i]['alert'] = ($value->alerts->count()>0) ? '<i style="cursor:pointer" data-toggle="modal" data-target="#alerts" class="text-danger flaticon2-warning"></i>' : '';    
    		$data[$i]['action'] = '<div class="dropdown dropdown-inline" data-toggle="tooltip" title="" data-placement="left" data-original-title="Quick actions">
                <a href="#" class="btn btn-clean btn-hover-light-success btn-sm btn-icon-success" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="ki ki-bold-more-ver"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-md dropdown-menu-right" style="">
                    <!--begin::Navigation-->
<ul class="navi navi-hover py-5">
    <li class="navi-item">
        <a href="'.url("/OrdendeTrabajo/".$value->id).'" class="navi-link" target="blank">
            <span class="navi-icon"><i class="flaticon2-drop"></i></span>
            <span class="navi-text">Ver Orden</span>
        </a>
    </li>
    
    <li class="navi-item">
        <a href="#" id="" class="navi-link" data-toggle="modal" data-target="#" data-order="'.$value->id.'" >
            <span class="navi-icon"><i class="flaticon2-bell-2"></i></span>
            <span class="navi-text">Editar Orden</span>
        </a>
    </li>
   

    
</ul>
<!--end::Navigation-->
                </div>
            </div>';

    		$i++;
    	}
    	return json_encode($data);
    }

    public function OrderInfo($id){
    	$order = Homecare_Ordendetrabajo::find($id);
    	$osas = $order->ordenes_de_servicio;
    	$data = [];
    	foreach ($osas as $key => $value) {
            $percent = ($value->actividades_realizadas>0) ? intval(($value->actividades_realizadas/$value->cantidad_actividades)*100) : '0';
            $color = PagesController::barProgressColor($percent);
            
    		$data[$key]['id']=$value->id;
    		$data[$key]['service']= $value->servicio->tag;
    		$data[$key]['prf'] = ($value->profesional) ? $value->profesional->name : 'SIN ASIGNACION';
    		$data[$key]['numAct']= $value->cantidad_actividades;
    		$data[$key]['numActDoIt'] = $value->actividades_realizadas;
            $pendientes = ($value->actividades_realizadas) ? $value->cantidad_actividades-$value->actividades_realizadas : $value->cantidad_actividades;
            $data[$key]['pending'] = $pendientes;
            $data[$key]['progress']='
                                                                        <div class="d-flex align-items-center justify-content-between mb-2">
                                                                            <span class="text-muted mr-2 font-size-sm font-weight-bold">
                                                                                '.$percent.'%
                                                                            </span>
                                                                            
                                                                        </div>
                                                                        <div class="progress progress-xs w-100">
                                                                            <div class="progress-bar '.$color.'" role="progressbar" style="width: '.$percent.'%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                                        </div>
                                                                    ';
            $data[$key]['action']='<a href="#" class="btn btn-success btn-sm mr-3 showService" data-id="'.$value->id.'">
                                                            <i class="flaticon2-pie-chart"></i></a>
                                                            ';
    	}
    	return json_encode($data);
    }

    
}
