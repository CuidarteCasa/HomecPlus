<?php

namespace App\Http\Controllers;

use Request;
use App\Model\Homecare_Actividades_Ordendeservicio;
use App\Model\Homecare_Ordendeservicio;
use App\Model\Notas_Medicas;
use App\Model\Homecare_Paciente_SignosVitales;
use App\Model\RegistroClinico_valoracion_especialista_geriatria;
use App\Model\Homecare_Paciente_Antecedentes;
use App\Model\RegistroClinico_actividades_registroclinico;
use \App\Model\Homecare_Paciente_Medicamento;
use \App\Model\Homecare_Paciente_Nutricion;
use \App\Model\Homecare_Paciente_Complementario;
use \App\Model\RegistroClinico_Formulacion;
use \App\Model\Homecare_Paciente_Cie10;
use \App\Model\Homecare_Paciente_Cie10_Records;
use \App\Model\Homecare_Paciente_MNA;
use \App\Model\Homecare_Ordendetrabajo;
use \App\Model\RegistroClinico_evolucion_medica;
use \App\Model\RegistroClinico_valoracion_medicina_general;
use \App\Http\Controllers\NotificationsController;
use \App\Model\RegistroClinico_laboratorioclinico;
use \App\Model\RegistroClinico_evo_terapia_fisica;
use \App\Model\Homecare_SPAD_Analista;
use \App\Http\Controllers\OrdenDeTrabajoController;
use \App\Model\Paciente;
use \App\Model\Cie10;
class RegistrosClinicosController extends Controller
{
    //

    //STORE NEW DX_PACIENTE
    public function EventDxPaciente(){

        try{
            \DB::transaction(function(){
                $pcte = Request::input('pcte');
                $evento = Request::input('eventoDx');
                $observacion = Request::input('eventoDxobs');
                $fecha = Request::input('dxDate');
                $dx = Request::input('dx');
                $newRecord = new Homecare_Paciente_Cie10_Records;
                $newRecord->id_actividad_servicio =Request::input('activity');
                            $newRecord->id_orden_servicio =Request::input('osa');
                            $newRecord->id_orden_trabajo =Request::input('order');
                            $newRecord->id_paciente_cie = $dx;
                            $newRecord->status = 1 ;
                            $newRecord->observacion = $observacion;
                            $newRecord->action_by = \Auth::user()->id;
                            $newRecord->fecha = $fecha;
                            
                switch($evento){
                    case 1:
                            $updateDx = Homecare_Paciente_Cie10::find($dx);
                            $updateDx->status = 1 ;
                            $updateDx->save();

                           
                            

                            
                    break;
                    case 2:
                            $updateDx = Homecare_Paciente_Cie10::find($dx);
                            $updateDx->status = 2 ;
                            $updateDx->save();

                            $newRecord->status = 2 ;
                           
                            

                    break;
                    case 3:
                         
                            $newRecord->status = 3 ;
                           
                    break;
                }
                $newRecord->save();
            });
            return response()->json([

                                'registerName'=>'Diagnosticos Clinicos',
                                'message'=>'Los diagnosticos del paciente se actulizaron de manera exitosa'
                            ],200); 
        }catch(\Illuminate\Database\QueryException $ex) {
                
                return response()->json([
                    'message'=>'Error en la base de datos',
                    'error' => $ex->getMessage()
                ],400);
            }
        
        
    }
    //

    //store formulacion

    //SAVED REGISTROS CLINICO 

        public function SaveAndClose(){
            try {
                $actividad_servicio=Homecare_Actividades_Ordendeservicio::find(Request::input('activity'));
                $actividad_servicio->realizada=1;
                $actividad_servicio->realizada_by=\Auth::user()->id;
                $actividad_servicio->realizada_at=Request::input('fecha');
                $actividad_servicio->_isvalid = 3;
                $actividad_servicio->_isvalid_fact = 3;
                $actividad_servicio->save();
                $orden_de_servicio=Homecare_Ordendeservicio::find(Request::input('osa'));
                $orden_de_servicio->actividades_realizadas=$orden_de_servicio->actividades_realizadas+1;
                $orden_de_servicio->save();
                

            } catch(\Illuminate\Database\QueryException $ex) {
                
                return response()->json([
                    'message'=>'Error en la base de datos',
                    'error' => $ex->getMessage()
                ],400);
            }
        }

        public static function SavedRegisters($activity){

            $reg_activity = RegistroClinico_actividades_registroclinico::where('id_actividad',$activity)->get();
            foreach ($reg_activity as $key => $value) {
                $info = $value->master;
                $table = $info->nombre_tabla_mysql;
                $activity = $activity;
                $format = $info->tag_blade;
                $name = $info->nombre_registro_clinico;
                echo  '<div class="d-flex align-items-center bg-light-success rounded p-5 mb-9">
            <span class="svg-icon svg-icon-success mr-5">
                <span class="svg-icon svg-icon-lg"><!--begin::Svg Icon | path:/metronic/themes/metronic/theme/html/demo1/dist/assets/media/svg/icons/Communication/Write.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"></rect>
        <path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953) "></path>
        <path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
    </g>
</svg><!--end::Svg Icon--></span>            </span>
            <!--begin::Title-->
            <div class="d-flex flex-column flex-grow-1 mr-2">
                <a style="cursor:pointer;" class="font-weight-bold text-dark-75 text-hover-primary font-size-lg mb-1 displayRegister" data-toggle="modal" data-target="#SavedRegistersModal" data-format="'.$format.'" data-activity="'.$activity.'" data-tablename="'.$table.'">'.$name.'</a>
                <a ><span class="text-muted font-weight-bold">Editar</span></a>
            </div>
            <!--end::Title-->
        </div>';    
            }
        }

    //
    
    

    public function newFormulacion(){
        $formulacion = Request::input('arry');
        
        try{
            \DB::transaction(function(){
                    $formulacion = Request::input('arry');
                    $formText = '';
                    foreach ($formulacion as $key => $value) {
                        if(isset($value['idline'])){
                            if($value['type']=='Med')$new_med= Homecare_Paciente_Medicamento::find($value['idline']);
                            if($value['type']=='Nut')$new_med= Homecare_Paciente_Nutricion::find($value['idline']);
                            if($value['type']=='Comple')$new_med= Homecare_Paciente_Complementario::find($value['idline']);    
                            
                        }else{
                            if($value['type']=='Med')$new_med= new Homecare_Paciente_Medicamento;
                            if($value['type']=='Nut')$new_med= new Homecare_Paciente_Nutricion;
                            if($value['type']=='Comple')$new_med= new Homecare_Paciente_Complementario;
                            
                            $new_med->id_paciente = Request::input('pcte');
                            if($value['type']=='Med')$new_med->id_medicamento= $value['id'];
                            if($value['type']=='Nut')$new_med->id_nutricion= $value['id'];
                            if($value['type']=='Comple')$new_med->id_complementario= $value['id'];
                            
                        }
                       
                       
                        $new_med->formulacion = $value['pos'];
                        $new_med->meses = $value['mes'];
                        $new_med->fechaultformulacion = date('Y-m-d');
                        $new_med->fecha_fin =  date('Y-m-d', strtotime("+".$value['mes']." months", strtotime(date('Y-m-d'))));
                        $new_med->status = 1;
                        
                         
                        $new_med->save(); 
                       
                    
                    
                    $formText .= '<tr><td>'.$value['Text'].'</td><td>'.$value['pos'].'</td></tr>';
                    }
                    $sqlformulation = new RegistroClinico_Formulacion;
                    $sqlformulation->id_actividad_servicio =Request::input('activity');
                    $sqlformulation->id_orden_servicio =Request::input('osa');
                    $sqlformulation->id_orden_trabajo =Request::input('order');
                    $sqlformulation->id_profesional =\Auth::user()->id;
                    $sqlformulation->id_paciente =Request::input('pcte');
                    $sqlformulation->formulacion = $formText;
                    $sqlformulation->fecha_actividad = Request::input('fecha');
                    $sqlformulation->save();

                    $actividad_registroclinico=new RegistroClinico_actividades_registroclinico;
                     $actividad_registroclinico->id_actividad=Request::input('activity');
                     $actividad_registroclinico->id_registroclinico_master=40;
                     $actividad_registroclinico->save();






            });
            $table = 'registroclinico_formula';
            $activity = Request::input('activity');
            $format = 'formulacionMedica';
            $data = ['table'=>$table,'activity'=>$activity,'format'=>$format];
            return response()->json([

                        'registerName'=>'Formulacion de Medicamentos',
                        'data'=>$data,
                        'message'=>'La Formualucion de Medicamentos se guardo de manera exitosa'
                    ],200); 
        }catch(\Illuminate\Database\QueryException $ex) {
                
                return response()->json([
                    'message'=>'Error en la base de datos',
                    'error' => $ex->getMessage()
                ],400);
            }
    }
    //fin store fomulacion

    //STORE REGISTERS

    public function RemisionInterconsulta(){

                $interconsulta=new \App\Model\RegistroClinico_Interconsulta;
                $interconsulta->id_actividad_servicio=Request::input('id_actividad_servicio');
                $interconsulta->id_orden_servicio=Request::input('id_orden_servicio');
                $interconsulta->id_orden_trabajo=Request::input('id_orden_trabajo');
                $interconsulta->id_profesional=Request::input('id_profesional');
                $interconsulta->id_paciente=Request::input('id_paciente');
                $interconsulta->formulacion=Request::input('justificacion');
                $interconsulta->especialidad = Request::input('especialidad');
                $interconsulta->fecha_actividad = Request::input('fecha_actividad');    
                $actividad_registroclinico=new RegistroClinico_actividades_registroclinico;
                $actividad_registroclinico->id_actividad=Request::input('id_actividad_servicio');
                $actividad_registroclinico->id_registroclinico_master=23;
                $actividad_registroclinico->save();
                $interconsulta->save();

                NotificationsController::IntercolsultationNotification(Request::input('id_paciente'),Request::input('id_orden_trabajo'));


    }

    public function CreatePreOrder($plan,$services,$cantidad,$order,$paciente){
        
        foreach ($plan as $key => $value) {
            if($key==0){
                    $ordentrabajo=new Homecare_Ordendetrabajo;
                    $ordentrabajo->id_paciente=$paciente;
                    $ordentrabajo->id_paquete=$value;
                    $ordentrabajo->id_estado = 2;
                     $fecha=new \DateTime();
                     $inicio_mes= $fecha->modify('+1 month');
                     $inicio_mes=$fecha->modify('first day of this month');
                     $inicio_mes=$inicio_mes->format('Y-m-d');
                     $ordentrabajo->valida_desde = $inicio_mes;
                     $ordentrabajo->save();

                     //dependencia de orden de tranbajo
                    $dependencia_madre=Homecare_Ordendetrabajo::find($order);    
                    $dependencia_madre->hijas()->attach($ordentrabajo->id);
                    //

                     //insert historia order
                    $historyDes = 'Creacion de la orden de trabajo por Evolucion medica';
                    OrdenDeTrabajoController::storeHistory($ordentrabajo->id,'success',$historyDes);      
                    //
            }else{
                $prev = $key - 1 ;
                if($plan[$prev]!==$value){
                    $ordentrabajo=new Homecare_Ordendetrabajo;
                    $ordentrabajo->id_paciente=$paciente;
                    $ordentrabajo->id_paquete=$value;
                    $ordentrabajo->id_estado = 2;
                    $fecha=new \DateTime();
                     $inicio_mes= $fecha->modify('+1 month');
                     $inicio_mes=$fecha->modify('first day of this month');
                     $inicio_mes=$inicio_mes->format('Y-m-d');
                     $ordentrabajo->valida_desde = $inicio_mes;
                     $ordentrabajo->save();

                      //dependencia de orden de tranbajo
                    $dependencia_madre=Homecare_Ordendetrabajo::find($order);    
                    $dependencia_madre->hijas()->attach($ordentrabajo->id);
                    //

                    //insert historia order
                    $historyDes = 'Creacion de la orden de trabajo por Evolucion medica';
                    OrdenDeTrabajoController::storeHistory($ordentrabajo->id,'success',$historyDes);      
                    //

                }
            }
            //Comenzamos a crear los servicios
                    $orden_de_servicio=new Homecare_Ordendeservicio;
                    $orden_de_servicio->id_orden_trabajo=$ordentrabajo->id;
                    $orden_de_servicio->id_servicio=$services[$key];
                    $orden_de_servicio->cantidad_actividades=$cantidad[$key];

                    $otpadre = Homecare_Ordendetrabajo::find($order);
                    
                    
                    $osapadre = $otpadre->ordenes_de_servicio->where('id_servicio',$services[$key])->first();
            //Reasignacion al profesional previo            
                    if($osapadre and $osapadre->count()>0){
                        $orden_de_servicio->id_profesional_asignado = $osapadre->id_profesional_asignado;
                    }
                    $orden_de_servicio->save();
            //fin de creacion de servicios

            //send Notifications
                     //Notificacion de Prioritarios Toma de muestra , cambio de sonda 
                     if($services[$key]==4020) NotificationsController::PriorityServiceFunction('Cambio de sonda',$paciente);  
                     //     
            //en notifications

            //Creacion de las actividades a la orden de servicio
                   for ($i=0; $i < $cantidad[$key]; $i++) { 
                      $activity = new Homecare_Actividades_Ordendeservicio;
                      $activity->id_orden_de_servicio = $orden_de_servicio->id;
                      $activity->save();
                   }
            
            //fin de la creacion de actividades     

            //asiganacion de numero de actividades a la preorden
                     $ordentrabajo->NumberOfActivities = $ordentrabajo->NumberOfActivities + $cantidad[$key];
                     $ordentrabajo->save();

            //fin asigancion       



        }
    }    

    public function ClinicRecordStore($name){

        if($name=='evolucion_terapia_fisica'){
               try {
                        
                                $validar=RegistroClinico_evo_terapia_fisica::where('id_actividad_servicio',Request::input('id_actividad_servicio'))->get();
                                if (!$validar->isEmpty()) {
                                   return response()->json([
                                        'message'=>'Precaucion este registro clinico ya esta guardado',
                                        'error' => [],
                                        ],400);      
                                }else{
                                       \DB::transaction(function(){ 
                                            $terapy = new RegistroClinico_evo_terapia_fisica;
                                            $terapy->id_actividad_servicio=Request::input('id_actividad_servicio');
                                            $terapy->id_orden_servicio=Request::input('id_orden_servicio');
                                            $terapy->id_orden_trabajo=Request::input('id_orden_trabajo');
                                            $terapy->id_profesional=Request::input('id_profesional');
                                            $terapy->id_paciente=Request::input('id_paciente');
                                            $terapy->fecha_actividad = Request::input('fecha_actividad');

                                            $terapy->tratamiento = Request::input('tratamiento');
                                            $terapy->respuesta = Request::input('respuesta');
                                            $terapy->observacion = Request::input('observacion');

                                            $terapy->save();

                                            $actividad_registroclinico=new RegistroClinico_actividades_registroclinico;
                                            $actividad_registroclinico->id_actividad=Request::input('id_actividad_servicio');
                                            $actividad_registroclinico->id_registroclinico_master=Request::input('id_registroclinico_master');
                                            $actividad_registroclinico->save();
                                               

                                            //SAVE HISTORY ON ORDER   
                                            $historyDes = 'Se Guardo un registro clinico Evolucion terapia fisica <br> <strong>Profesional: </strong>'.\Auth::user()->name.' <br><strong> Fecha: </strong>'.date("Y-m-d H:i");
                                            OrdenDeTrabajoController::storeHistory(Request::input('id_orden_trabajo'),'info',$historyDes); 
                                                //END SAVE

                                        });
                                        $table = 'registroclinico_evolucion_terapia_fisica';
                                         $activity = Request::input('id_actividad_servicio');
                                         $format = 'evolucion_terapia_fisica';
                                         $data = ['table'=>$table,'activity'=>$activity,'format'=>$format];
                                        return response()->json([

                                            'registerName'=>'Evolucion terapia fisica',
                                            'data'=>$data,
                                            'message'=>'Evolucion terapia fisica guardada de manera exitosa'
                                        ],200); 
                                }
                        
                    
                } catch(\Illuminate\Database\QueryException $ex) {
                
                return response()->json([
                    'message'=>'Error en la base de datos',
                    'error' => $ex->getMessage()
                ],400);
        }   
        }
            

        if($name=='laboratorio_clinico') {
            try{
                
                    $validar=RegistroClinico_laboratorioclinico::where('id_actividad_servicio',Request::input('id_actividad_servicio'))->get();
                    if (!$validar->isEmpty()) {
                       return response()->json([
                            'message'=>'Precaucion este registro clinico ya esta guardado',
                            'error' => [],
                            ],400);      
                    }else{
                            \DB::transaction(function(){
                            $laboratorio=new RegistroClinico_laboratorioclinico;
                            $laboratorio->id_actividad_servicio=Request::input('id_actividad_servicio');
                            $laboratorio->id_orden_servicio=Request::input('id_orden_servicio');
                            $laboratorio->id_orden_trabajo=Request::input('id_orden_trabajo');
                            $laboratorio->id_profesional=Request::input('id_profesional');
                            $laboratorio->id_paciente=Request::input('id_paciente');
                            $laboratorio->fecha_actividad = Request::input('fecha_actividad');
                            $lab = Request::input('labList');
                            $laboratorio->otherLab = Request::input('otherLab');  
                            
                            $lab_contenido = '';  

                            foreach ($lab as $key => $value) {
                                $lab_contenido = $lab_contenido.'<tr><td>'.$value.'</td></tr>';
                            }
                            
                            $lab_text = '<table class="table table-striped"><thead><tbody>' . $lab_contenido. '</tbody></thead></table>';        
                            $laboratorio->descripcion = $lab_text;
                            $laboratorio->fecha_formulacion = date('Y-m-d');
                            $actividad_registroclinico=new RegistroClinico_actividades_registroclinico;
                            $actividad_registroclinico->id_actividad=Request::input('id_actividad_servicio');
                            $actividad_registroclinico->id_registroclinico_master=Request::input('id_registroclinico_master');
                            $actividad_registroclinico->save();
                            $laboratorio->save();     
                             //SAVE HISTORY ON ORDER   
                            $historyDes = 'Se Guardo un registro clinico Examenes paraclinicos <br> <strong>Profesional: </strong>'.\Auth::user()->name.' <br><strong> Fecha: </strong>'.date("Y-m-d H:i");
                            OrdenDeTrabajoController::storeHistory(Request::input('id_orden_trabajo'),'info',$historyDes); 
                                //END SAVE
                        });
                             $table = 'registroclinico_laboratorio_clinico';
                             $activity = Request::input('id_actividad_servicio');
                             $format = 'laboratorio_clinico';
                             $data = ['table'=>$table,'activity'=>$activity,'format'=>$format];
                            return response()->json([

                                'registerName'=>'Examenes Paraclinicos',
                                'data'=>$data,
                                'message'=>'Examenes Paraclinicos guardados de manera exitosa'
                            ],200); 
                            
                            }  

                    
            }catch(\Illuminate\Database\QueryException $ex) {
                
                return response()->json([
                    'message'=>'Error en la base de datos',
                    'error' => $ex->getMessage()
                ],400);
        }   
}
        if($name=='valoracion_medicina_general'){

                try{

                    $validar=RegistroClinico_valoracion_medicina_general::where('id_actividad_servicio',Request::input('id_actividad_servicio'))->get();
                    if (!$validar->isEmpty()) {
                       return response()->json([
                            'message'=>'Precaucion este registro clinico ya esta guardado',
                            'error' => [],
                            ],400);      
                    }else{    

                    \DB::transaction(function(){

                            //registro en tabla de signos vitales
                    $paciente_signos = new Homecare_Paciente_SignosVitales;
                    $paciente_signos->id_paciente = Request::input('id_paciente');
                    $paciente_signos->date = date('Y-m-d');
                    $paciente_signos->sv_pa_sistolica = Request::input('systolic');
                    $paciente_signos->sv_pa_diastolica = Request::input('diastolic');
                    $paciente_signos->sv_frecuencia_cardiaca = Request::input('fc');
                    $paciente_signos->sv_frecuencia_respiratoria = Request::input('fr');
                    $paciente_signos->sv_temperatura = Request::input('temp');
                    $paciente_signos->sv_peso = Request::input('peso');
                    $paciente_signos->sv_talla = Request::input('talla');
                    $paciente_signos->sv_saturacion_oxigeno = Request::input('saturacion');
                    $paciente_signos->sv_circunferencia_abdominal = Request::input('circunferencia');
                    $paciente_signos->save();
                    //fin registro en tabla de signos vitales

                    //plan de manejo
                    $alta = Request::input('altaMedica');
                    if($alta)
                    {          
                       $planText =    '<tr><td colspan="2"><strong>Paciente con alta medica</strong></td></tr>'; 
                    }else{
                        $serviceName = Request::input('serviceName');

                    $cantidad = Request::input('cantidad');
                    $planText = '';
                    foreach ($serviceName as $key => $value) {
                       $planText .= '<tr><td>'.$value.'</td><td>'.$cantidad[$key].'</td></tr>';
                          
                       
                    }
                    }
                    //

                    //registro valoracion
                    $evolucionmedica = new RegistroClinico_valoracion_medicina_general;
                    $evolucionmedica->id_actividad_servicio =Request::input('id_actividad_servicio');
                    $evolucionmedica->id_orden_servicio =Request::input('id_orden_servicio');
                    $evolucionmedica->id_orden_trabajo =Request::input('id_orden_trabajo');
                    $evolucionmedica->id_profesional =Request::input('id_profesional');
                    $evolucionmedica->id_paciente =Request::input('id_paciente');
                    $evolucionmedica->fecha_actividad = Request::input('fecha_actividad');    

                    $evolucionmedica->motivo_consulta =Request::input('motivo');
                    $evolucionmedica->sv_pa_sistolica =Request::input('systolic');
                    $evolucionmedica->sv_pa_diastolica =Request::input('diastolic');
                    $evolucionmedica->sv_frecuencia_cardiaca =Request::input('fc');
                    $evolucionmedica->sv_frecuencia_respiratoria =Request::input('fr');
                    $evolucionmedica->sv_temperatura =Request::input('temp');
                    $evolucionmedica->sv_peso =Request::input('peso');
                    $evolucionmedica->sv_talla =Request::input('talla');
                    $evolucionmedica->sv_saturacion_oxigeno =Request::input('saturacion');
                    $evolucionmedica->sv_circunferencia_abdominal =Request::input('circunferencia');
                    $evolucionmedica->examenfisico = Request::input('fisicExam');
                    $evolucionmedica->escala_karnofsky = Request::input('karnosky');

                    $evolucionmedica->ant_patologicos =Request::input('patologicos');
                    $evolucionmedica->ant_quirurgicos =Request::input('quirurgicos');
                    $evolucionmedica->ant_alergicos =Request::input('alergicos');
                    $evolucionmedica->ant_medicamentos =Request::input('Medicamentos');
                    $evolucionmedica->ant_habitos =Request::input('habitos');
                    $evolucionmedica->ant_toxicos =Request::input('toxicos');
                    $evolucionmedica->ant_familiares =Request::input('familiares');
                    $evolucionmedica->ant_hospitalizacion =Request::input('hospitalizaciones');

                    //barthel
                    $barthel = Request::input('valoracion_medicina_generalbarthel');
                    $evolucionmedica->comer = $barthel[0];
                    $evolucionmedica->banarse = $barthel[1];
                    $evolucionmedica->vestirse = $barthel[2];
                    $evolucionmedica->arreglarse = $barthel[3];
                    $evolucionmedica->deposicion = $barthel[4];
                    $evolucionmedica->miccion = $barthel[5];
                    $evolucionmedica->usar_el_retrete = $barthel[6];
                    $evolucionmedica->traslado_al_sillon_cama = $barthel[7];    
                    $evolucionmedica->deambulacion = $barthel[8];
                    $evolucionmedica->subir_bajar_escaleras = $barthel[9];   
                    $totalbarthel = 0;
                    foreach ($barthel as $key => $value) {
                        $valor = explode('-', $value);
                        $totalbarthel += intval($valor[1]);
                    }
                    $evolucionmedica->total = $totalbarthel;  
                    //fin barthel
                    
                    $evolucionmedica->analisis_medico =Request::input('analisis');

                    $evolucionmedica->plan_de_manejo =$planText;

                    $evolucionmedica->plan =Request::input('planmedico');
                    
                    $evolucionmedica->signosdealarma =Request::input('alarma');

                    $evolucionmedica->exf_traqueostomia = (Request::input('traqueo')) ? 'SI' : 'NO';
                    $evolucionmedica->exf_sondanasogastrica = (Request::input('sondanaso')) ? 'SI' : 'NO';
                    $evolucionmedica->exf_gastrostomia = (Request::input('gastro')) ? 'SI' : 'NO';
                    $evolucionmedica->exf_colostomia = (Request::input('colostomia')) ? 'SI' : 'NO';
                    $evolucionmedica->exf_cistostomia = (Request::input('cistostomia')) ? 'SI' : 'NO';
                    $evolucionmedica->exf_sondavesical = (Request::input('sondavesical')) ? 'SI' : 'NO';

                    //mna INACTIVA POR EL MOMENTO 
                    /*
                    $mna1 = explode('-', Request::input('mna1'));
                    $mna2 = explode('-', Request::input('mna2'));
                    $mna3 = explode('-', Request::input('mna3'));
                    $mna4 = explode('-', Request::input('mna4'));
                    $mna5 = explode('-', Request::input('mna5'));
                    $mna6 = explode('-', Request::input('mna6'));
                    $totalmna = intval($mna1[0]) + intval($mna2[0]) + intval($mna3[0]) + intval($mna4[0]) +intval($mna5[0]) + intval($mna6[0]); 

                    
                    $evolucionmedica->mna1 =$mna1[1];
                    $evolucionmedica->mna2 =$mna2[1];
                    $evolucionmedica->mna3 =$mna3[1];
                    $evolucionmedica->mna4 =$mna4[1];
                    $evolucionmedica->mna5 =$mna5[1];
                    $evolucionmedica->mna6 =$mna6[1];
                    switch ($totalmna) {
                        case 0 < $totalmna && $totalmna <= 7:
                            $evolucionmedica->resultmna ='Malnutricion';
                            break;
                        case 8 <= $totalmna && $totalmna <= 11:
                             $evolucionmedica->resultmna ='Riesgo de malnutricion';
                            break;
                        case 12 <= $totalmna && $totalmna <= 14:
                            $evolucionmedica->resultmna ='Estado nutricion normal';
                            break;
                        
                    }
                    */
                    //fin mna
                    
                    //cfs

                    $cfs =explode('-', Request::input('cfs')) ;

                    $evolucionmedica->cfs=strval($cfs[1]);
                    //fin cfs

                    //REMITIR PACIENTE A INTERCONSULTA
                    if(Request::input('swIntercosulta')){
                        RegistrosClinicosController::RemisionInterconsulta();
                        $evolucionmedica->interconsulta ='<p>Paciente que se remite a interconsulta</p>'.'<p><strong>Especialidad:</strong>'.Request::input('especialidad').'</p><p>'.Request::input('justificacion').'</p>';
                    }
                    
                    //FIN REMISION

                    //AAGRGAR DIAGNOSTICO A LA EVOLUCION
                    $pcteDx = Paciente::find(Request::input('id_paciente'));
                    $pcteDx = $pcteDx->cie->where('status',1);
                    $dxline = '';
                    foreach ($pcteDx as $key => $value) {
                        $ciedata = Cie10::find($value->id_cie10);
                        $dxline .= $ciedata->nombre. ' - '.$ciedata->codigo_cie.'<br>';
                    }
                    $evolucionmedica->diagnosticos = $dxline;
                    //FIN DX
                    
                    $evolucionmedica->save();

                    // fin evolucion

                      //paciente_antecedentes
                    $antecedentes = new Homecare_Paciente_Antecedentes;
                    $antecedentes->id_paciente = Request::input('id_paciente');
                    $antecedentes->fecha = date('Y-m-d');
                    $antecedentes->id_user = \Auth::id();
                    $antecedentes->ant_patologicos =Request::input('patologicos');
                    $antecedentes->ant_quirurgicos =Request::input('quirurgicos');
                    $antecedentes->ant_alergicos =Request::input('alergicos');
                    $antecedentes->ant_medicamentos =Request::input('Medicamentos');
                    $antecedentes->ant_habitos =Request::input('habitos');
                    $antecedentes->ant_toxicos =Request::input('toxicos');
                    $antecedentes->ant_familiares =Request::input('familiares');
                    $antecedentes->ant_hospitalizacion =Request::input('hospitalizaciones');
                    $antecedentes->save();
                    //    
                   

                    //grabar informacion en table de MNA INACTIVO POR EL MOMENTO
                    /*
                    $mnaRecord = new Homecare_Paciente_MNA;
                    $mnaRecord->id_paciente = Request::input('id_paciente');
                    $mnaRecord->fecha = date('Y-m-d');
                    $mnaRecord->id_user = \Auth::user()->id;
                    $mnaRecord->mna = $totalmna ;
                    $mnaRecord->save();
                    */
                    //fin



                     //grabar recor de registro
                    
                     $actividad_registroclinico=new RegistroClinico_actividades_registroclinico;
                     $actividad_registroclinico->id_actividad=Request::input('id_actividad_servicio');
                     $actividad_registroclinico->id_registroclinico_master=Request::input('id_registroclinico_master');
                     $actividad_registroclinico->save();
                    //fin
                     
                     if (!$alta) {
                            $packageData=Request::input('plan');
                            $servicesData = Request::input('service');    
                            RegistrosClinicosController::CreatePreOrder($packageData,$servicesData,$cantidad,Request::input('id_orden_trabajo'),Request::input('id_paciente')); 
                     }
                      
                    //SAVE HISTORY ON ORDER   
                            $historyDes = 'Se Guardo un registro clinico Valoracion medicina general <br> <strong>Profesional: </strong>'.\Auth::user()->name.' <br><strong> Fecha: </strong>'.date("Y-m-d H:i");
                            OrdenDeTrabajoController::storeHistory(Request::input('id_orden_trabajo'),'info',$historyDes); 
                                //END SAVE
                    
                    


                    });
                    $table = 'registroclinico_valoracion_medicina_general';
                     $activity = Request::input('id_actividad_servicio');
                     $format = 'valoracion_medicina_general';
                     $data = ['table'=>$table,'activity'=>$activity,'format'=>$format];    
                        return response()->json([

                        'registerName'=>'Valoracion por medicina general',
                        'data'=>$data,
                        'message'=>'La valoracion por medicina general se guardo de manera exitosa'
                    ],200); 
                }
                }catch(\Illuminate\Database\QueryException $ex) {
                
                return response()->json([
                    'message'=>'Error en la base de datos',
                    'error' => $ex->getMessage()
                ],400);
            }
        }          


        if($name=='evolucion_medicinageneral'){
                try{

                     $validar=RegistroClinico_evolucion_medica::where('id_actividad_servicio',Request::input('id_actividad_servicio'))->get();
                    if (!$validar->isEmpty()) {
                       return response()->json([
                            'message'=>'Precaucion este registro clinico ya esta guardado',
                            'error' => [],
                            ],400);      
                    }else{        

                    \DB::transaction(function(){

                            //registro en tabla de signos vitales
                    $paciente_signos = new Homecare_Paciente_SignosVitales;
                    $paciente_signos->id_paciente = Request::input('id_paciente');
                    $paciente_signos->date = date('Y-m-d');
                    $paciente_signos->sv_pa_sistolica = Request::input('systolic');
                    $paciente_signos->sv_pa_diastolica = Request::input('diastolic');
                    $paciente_signos->sv_frecuencia_cardiaca = Request::input('fc');
                    $paciente_signos->sv_frecuencia_respiratoria = Request::input('fr');
                    $paciente_signos->sv_temperatura = Request::input('temp');
                    $paciente_signos->sv_peso = Request::input('peso');
                    $paciente_signos->sv_talla = Request::input('talla');
                    $paciente_signos->sv_saturacion_oxigeno = Request::input('saturacion');
                    $paciente_signos->sv_circunferencia_abdominal = Request::input('circunferencia');
                    $paciente_signos->save();
                    //fin registro en tabla de signos vitales

                    //plan de manejo
                    $alta = Request::input('altaMedica');
                    if($alta)
                    {          
                       $planText =    '<tr><td colspan="2"><strong>Paciente con alta medica</strong></td></tr>'; 
                    }else{
                        $serviceName = Request::input('serviceName');

                    $cantidad = Request::input('cantidad');
                    $planText = '';
                    foreach ($serviceName as $key => $value) {
                       $planText .= '<tr><td>'.$value.'</td><td>'.$cantidad[$key].'</td></tr>';
                          
                       
                    }
                    }
                    //

                    //registro valoracion
                    $evolucionmedica = new RegistroClinico_evolucion_medica;
                    $evolucionmedica->id_actividad_servicio =Request::input('id_actividad_servicio');
                    $evolucionmedica->id_orden_servicio =Request::input('id_orden_servicio');
                    $evolucionmedica->id_orden_trabajo =Request::input('id_orden_trabajo');
                    $evolucionmedica->id_profesional =Request::input('id_profesional');
                    $evolucionmedica->id_paciente =Request::input('id_paciente');
                    $evolucionmedica->fecha_actividad = Request::input('fecha_actividad');    

                    $evolucionmedica->motivo_consulta =Request::input('motivo');
                    $evolucionmedica->sv_pa_sistolica =Request::input('systolic');
                    $evolucionmedica->sv_pa_diastolica =Request::input('diastolic');
                    $evolucionmedica->sv_frecuencia_cardiaca =Request::input('fc');
                    $evolucionmedica->sv_frecuencia_respiratoria =Request::input('fr');
                    $evolucionmedica->sv_temperatura =Request::input('temp');
                    $evolucionmedica->sv_peso =Request::input('peso');
                    $evolucionmedica->sv_talla =Request::input('talla');
                    $evolucionmedica->sv_saturacion_oxigeno =Request::input('saturacion');
                    $evolucionmedica->sv_circunferencia_abdominal =Request::input('circunferencia');
                    $evolucionmedica->examenfisico = Request::input('fisicExam');
                    $evolucionmedica->escala_karnofsky = Request::input('karnosky');

                    //barthel
                    $barthel = Request::input('evolucion_medicinageneralbarthel');
                    $evolucionmedica->comer = $barthel[0];
                    $evolucionmedica->banarse = $barthel[1];
                    $evolucionmedica->vestirse = $barthel[2];
                    $evolucionmedica->arreglarse = $barthel[3];
                    $evolucionmedica->deposicion = $barthel[4];
                    $evolucionmedica->miccion = $barthel[5];
                    $evolucionmedica->usar_el_retrete = $barthel[6];
                    $evolucionmedica->traslado_al_sillon_cama = $barthel[7];    
                    $evolucionmedica->deambulacion = $barthel[8];
                    $evolucionmedica->subir_bajar_escaleras = $barthel[9];   
                    $totalbarthel = 0;
                    foreach ($barthel as $key => $value) {
                        $valor = explode('-', $value);
                        $totalbarthel += intval($valor[1]);
                    }
                    $evolucionmedica->total = $totalbarthel;  
                    //fin barthel
                    
                    $evolucionmedica->analisis_medico =Request::input('analisis');

                    $evolucionmedica->plan_de_manejo =$planText;

                    $evolucionmedica->plan =Request::input('planmedico');
                    
                    $evolucionmedica->signosdealarma =Request::input('alarma');

                    $evolucionmedica->exf_traqueostomia = (Request::input('traqueo')) ? 'SI' : 'NO';
                    $evolucionmedica->exf_sondanasogastrica = (Request::input('sondanaso')) ? 'SI' : 'NO';
                    $evolucionmedica->exf_gastrostomia = (Request::input('gastro')) ? 'SI' : 'NO';
                    $evolucionmedica->exf_colostomia = (Request::input('colostomia')) ? 'SI' : 'NO';
                    $evolucionmedica->exf_cistostomia = (Request::input('cistostomia')) ? 'SI' : 'NO';
                    $evolucionmedica->exf_sondavesical = (Request::input('sondavesical')) ? 'SI' : 'NO';

                    //mna
                    /*
                    $mna1 = explode('-', Request::input('mna1'));
                    $mna2 = explode('-', Request::input('mna2'));
                    $mna3 = explode('-', Request::input('mna3'));
                    $mna4 = explode('-', Request::input('mna4'));
                    $mna5 = explode('-', Request::input('mna5'));
                    $mna6 = explode('-', Request::input('mna6'));
                    $totalmna = intval($mna1[0]) + intval($mna2[0]) + intval($mna3[0]) + intval($mna4[0]) +intval($mna5[0]) + intval($mna6[0]); 
                    
                    $evolucionmedica->mna1 =$mna1[1];
                    $evolucionmedica->mna2 =$mna2[1];
                    $evolucionmedica->mna3 =$mna3[1];
                    $evolucionmedica->mna4 =$mna4[1];
                    $evolucionmedica->mna5 =$mna5[1];
                    $evolucionmedica->mna6 =$mna6[1];
                    switch ($totalmna) {
                        case 0 < $totalmna && $totalmna <= 7:
                            $evolucionmedica->resultmna ='Malnutricion';
                            break;
                        case 8 <= $totalmna && $totalmna <= 11:
                             $evolucionmedica->resultmna ='Riesgo de malnutricion';
                            break;
                        case 12 <= $totalmna && $totalmna <= 14:
                            $evolucionmedica->resultmna ='Estado nutricion normal';
                            break;
                        
                    }
                    */
                    //fin mna
                    
                    //cfs

                    $cfs =explode('-', Request::input('cfs')) ;

                    $evolucionmedica->cfs=strval($cfs[1]);
                    //fin cfs

                    //REMITIR PACIENTE A INTERCONSULTA
                    if(Request::input('swIntercosulta')){
                        RegistrosClinicosController::RemisionInterconsulta();
                        $evolucionmedica->interconsulta ='<p>Paciente que se remite a interconsulta</p>'.'<p><strong>Especialidad:</strong>'.Request::input('especialidad').'</p><p>'.Request::input('justificacion').'</p>';
                    }
                    
                    //FIN REMISION

                     //AAGRGAR DIAGNOSTICO A LA EVOLUCION
                    $pcteDx = Paciente::find(Request::input('id_paciente'));
                    $pcteDx = $pcteDx->cie->where('status',1);
                    $dxline = '';
                    foreach ($pcteDx as $key => $value) {
                        $ciedata = Cie10::find($value->id_cie10);
                        $dxline .= $ciedata->nombre. ' - '.$ciedata->codigo_cie.'<br>';
                    }
                    $evolucionmedica->diagnosticos = $dxline;
                    //FIN DX
                    
                    $evolucionmedica->save();

                    // fin evolucion

                   

                    //grabar informacion en table de MNA
                    /*
                    $mnaRecord = new Homecare_Paciente_MNA;
                    $mnaRecord->id_paciente = Request::input('id_paciente');
                    $mnaRecord->fecha = date('Y-m-d');
                    $mnaRecord->id_user = \Auth::user()->id;
                    $mnaRecord->mna = $totalmna ;
                    $mnaRecord->save();
                    */
                    //fin

                     //grabar recor de registro
                    
                     $actividad_registroclinico=new RegistroClinico_actividades_registroclinico;
                     $actividad_registroclinico->id_actividad=Request::input('id_actividad_servicio');
                     $actividad_registroclinico->id_registroclinico_master=Request::input('id_registroclinico_master');
                     $actividad_registroclinico->save();
                    //fin
                     
                     if (!$alta) {
                            $packageData=Request::input('plan');
                            $servicesData = Request::input('service');    
                            RegistrosClinicosController::CreatePreOrder($packageData,$servicesData,$cantidad,Request::input('id_orden_trabajo'),Request::input('id_paciente')); 
                     }
                      
                    
                    //SAVE HISTORY ON ORDER   
                            $historyDes = 'Se Guardo un registro clinico Evolucion Medica <br> <strong>Profesional: </strong>'.\Auth::user()->name.' <br><strong> Fecha: </strong>'.date("Y-m-d H:i");
                            OrdenDeTrabajoController::storeHistory(Request::input('id_orden_trabajo'),'info',$historyDes); 
                                //END SAVE



                    });
                             $table = 'registroclinico_evolucion_medica';
                             $activity = Request::input('id_actividad_servicio');
                             $format = 'evolucion_medicinageneral';
                             $data = ['table'=>$table,'activity'=>$activity,'format'=>$format];
                        return response()->json([

                        'registerName'=>'Evolucion Medica',
                        'data'=>$data,
                        'message'=>'La evolucion medica se guardo de manera exitosa'
                    ],200); 
                   }     
                }catch(\Illuminate\Database\QueryException $ex) {
                
                return response()->json([
                    'message'=>'Error en la base de datos',
                    'error' => $ex->getMessage()
                ],400);
            }
        }    

        if ($name=='valoracion_especialista_geriatria') {
            
            
            try{
                $validar=RegistroClinico_valoracion_especialista_geriatria::where('id_actividad_servicio',Request::input('id_actividad_servicio'))->get();
                if (!$validar->isEmpty()) {
                       return response()->json([
                            'message'=>'Precaucion este registro clinico ya esta guardado',
                            'error' => [],
                            ],400);      
                    }else{
                        \DB::transaction(function(){

                    

                    
                     //registro en tabla de signos vitales
                    $paciente_signos = new Homecare_Paciente_SignosVitales;
                    $paciente_signos->id_paciente = Request::input('id_paciente');
                    $paciente_signos->date = date('Y-m-d');
                    $paciente_signos->sv_pa_sistolica = Request::input('systolic');
                    $paciente_signos->sv_pa_diastolica = Request::input('diastolic');
                    $paciente_signos->sv_frecuencia_cardiaca = Request::input('fc');
                    $paciente_signos->sv_frecuencia_respiratoria = Request::input('fr');
                    $paciente_signos->sv_temperatura = Request::input('temp');
                    $paciente_signos->sv_peso = Request::input('peso');
                    $paciente_signos->sv_talla = Request::input('talla');
                    $paciente_signos->sv_saturacion_oxigeno = Request::input('saturacion');
                    $paciente_signos->sv_circunferencia_abdominal = Request::input('circunferencia');
                    $paciente_signos->save();
                    //fin registro en tabla de signos vitales

                    //plan de manejo
                    $alta = Request::input('altaMedica');
                    if($alta)
                    {          
                       $planText =    '<tr><td colspan="2"><strong>Paciente con alta medica</strong></td></tr>'; 
                    }else{
                        $serviceName = Request::input('serviceName');
                    $cantidad = Request::input('cantidad');
                    $planText = '';
                    foreach ($serviceName as $key => $value) {
                       $planText .= '<tr><td>'.$value.'</td><td>'.$cantidad[$key].'</td></tr>';
                          
                       
                    }
                    }
                    //


                    //registro valoracion
                    $valoracion = new RegistroClinico_valoracion_especialista_geriatria;
                    $valoracion->id_actividad_servicio =Request::input('id_actividad_servicio');
                    $valoracion->id_orden_servicio =Request::input('id_orden_servicio');
                    $valoracion->id_orden_trabajo =Request::input('id_orden_trabajo');
                    $valoracion->id_profesional =Request::input('id_profesional');
                    $valoracion->id_paciente =Request::input('id_paciente');
                    $valoracion->fecha_actividad = Request::input('fecha_actividad');     

                    $valoracion->motivo_consulta =Request::input('motivo');
                    $valoracion->sv_pa_sistolica =Request::input('systolic');
                    $valoracion->sv_pa_diastolica =Request::input('diastolic');
                    $valoracion->sv_frecuencia_cardiaca =Request::input('fc');
                    $valoracion->sv_frecuencia_respiratoria =Request::input('fr');
                    $valoracion->sv_temperatura =Request::input('temp');
                    $valoracion->sv_peso =Request::input('peso');
                    $valoracion->sv_talla =Request::input('talla');
                    $valoracion->sv_saturacion_oxigeno =Request::input('saturacion');
                    $valoracion->sv_circunferencia_abdominal =Request::input('circunferencia');
                    $valoracion->examenfisico = Request::input('fisicExam');
                    $valoracion->escala_karnofsky = Request::input('karnosky');

                    //barthel
                    $barthel = Request::input('valoracion_especialista_geriatriabarthel');
                    $valoracion->comer = $barthel[0];
                    $valoracion->banarse = $barthel[1];
                    $valoracion->vestirse = $barthel[2];
                    $valoracion->arreglarse = $barthel[3];
                    $valoracion->deposicion = $barthel[4];
                    $valoracion->miccion = $barthel[5];
                    $valoracion->usar_el_retrete = $barthel[6];
                    $valoracion->traslado_al_sillon_cama = $barthel[7];    
                    $valoracion->deambulacion = $barthel[8];
                    $valoracion->subir_bajar_escaleras = $barthel[9];   
                    $totalbarthel = 0;
                    foreach ($barthel as $key => $value) {
                        $valor = explode('-', $value);
                        $totalbarthel += intval($valor[1]);
                    }
                    $valoracion->total = $totalbarthel;  
                    //fin barthel
                    
                    $valoracion->ant_patologicos =Request::input('patologicos');
                    $valoracion->ant_quirurgicos =Request::input('quirurgicos');
                    $valoracion->ant_alergicos =Request::input('alergicos');
                    $valoracion->ant_medicamentos =Request::input('Medicamentos');
                    $valoracion->ant_habitos =Request::input('habitos');
                    $valoracion->ant_toxicos =Request::input('toxicos');
                    $valoracion->ant_familiares =Request::input('familiares');
                    $valoracion->ant_hospitalizacion =Request::input('hospitalizaciones');
                    $valoracion->analisis_medico =Request::input('analisis');

                    $valoracion->plan_de_manejo =$planText;

                    $valoracion->plan =Request::input('planmedico');
                    
                    $valoracion->signosdealarma =Request::input('alarma');

                    $valoracion->traqueostomia = (Request::input('traqueo')) ? 'SI' : 'NO';
                    $valoracion->sondanasogastrica = (Request::input('sondanaso')) ? 'SI' : 'NO';
                    $valoracion->gastrostomia = (Request::input('gastro')) ? 'SI' : 'NO';
                    $valoracion->colostomia = (Request::input('colostomia')) ? 'SI' : 'NO';
                    $valoracion->cistostomia = (Request::input('cistostomia')) ? 'SI' : 'NO';
                    $valoracion->sondavesical = (Request::input('sondavesical')) ? 'SI' : 'NO';

                    //mna
                    /*
                    $mna1 = explode('-', Request::input('mna1'));
                    $mna2 = explode('-', Request::input('mna2'));
                    $mna3 = explode('-', Request::input('mna3'));
                    $mna4 = explode('-', Request::input('mna4'));
                    $mna5 = explode('-', Request::input('mna5'));
                    $mna6 = explode('-', Request::input('mna6'));
                    $totalmna = intval($mna1[0]) + intval($mna2[0]) + intval($mna3[0]) + intval($mna4[0]) +intval($mna5[0]) + intval($mna6[0]); 
                    
                    $valoracion->mna1 =$mna1[1];
                    $valoracion->mna2 =$mna2[1];
                    $valoracion->mna3 =$mna3[1];
                    $valoracion->mna4 =$mna4[1];
                    $valoracion->mna5 =$mna5[1];
                    $valoracion->mna6 =$mna6[1];
                    switch ($totalmna) {
                        case 0 < $totalmna && $totalmna <= 7:
                            $valoracion->resultmna ='Malnutricion';
                            break;
                        case 8 <= $totalmna && $totalmna <= 11:
                             $valoracion->resultmna ='Riesgo de malnutricion';
                            break;
                        case 12 <= $totalmna && $totalmna <= 14:
                            $valoracion->resultmna ='Estado nutricion normal';
                            break;
                        
                    }
                    //fin mna
                    */
                    //cfs

                    $cfs =explode('-', Request::input('cfs')) ;

                    $valoracion->cfs=strval($cfs[1]);
                    //fin cfs

                     //AAGRGAR DIAGNOSTICO A LA EVOLUCION
                    $pcteDx = Paciente::find(Request::input('id_paciente'));
                    $pcteDx = $pcteDx->cie->where('status',1);
                    $dxline = '';
                    foreach ($pcteDx as $key => $value) {
                        $ciedata = Cie10::find($value->id_cie10);
                        $dxline .= $ciedata->nombre. ' - '.$ciedata->codigo_cie.'<br>';
                    }
                    $valoracion->diagnosticos = $dxline;
                    //FIN DX
                    
                    $valoracion->save();

                    // fin valoracion

                    //paciente_antecedentes
                    $antecedentes = new Homecare_Paciente_Antecedentes;
                    $antecedentes->id_paciente = Request::input('id_paciente');
                    $antecedentes->fecha = date('Y-m-d');
                    $antecedentes->id_user = \Auth::id();
                    $antecedentes->ant_patologicos =Request::input('patologicos');
                    $antecedentes->ant_quirurgicos =Request::input('quirurgicos');
                    $antecedentes->ant_alergicos =Request::input('alergicos');
                    $antecedentes->ant_medicamentos =Request::input('Medicamentos');
                    $antecedentes->ant_habitos =Request::input('habitos');
                    $antecedentes->ant_toxicos =Request::input('toxicos');
                    $antecedentes->ant_familiares =Request::input('familiares');
                    $antecedentes->ant_hospitalizacion =Request::input('hospitalizaciones');
                    $antecedentes->save();
                    //

                    //grabar informacion en table de MNA
                    /*
                    $mnaRecord = new Homecare_Paciente_MNA;
                    $mnaRecord->id_paciente = Request::input('id_paciente');
                    $mnaRecord->fecha = date('Y-m-d');
                    $mnaRecord->id_user = \Auth::user()->id;
                    $mnaRecord->mna = $totalmna ;
                    $mnaRecord->save();
                    */
                    //fin

                    //grabar recor de registro
                    
                     $actividad_registroclinico=new RegistroClinico_actividades_registroclinico;
                     $actividad_registroclinico->id_actividad=Request::input('id_actividad_servicio');
                     $actividad_registroclinico->id_registroclinico_master=Request::input('id_registroclinico_master');
                     $actividad_registroclinico->save();
                    //fin

                    
                    //
                     //SAVE HISTORY ON ORDER   
                            $historyDes = 'Se Guardo un registro clinico Examenes paraclinicos <br> <strong>Profesional: </strong>'.\Auth::user()->name.' <br><strong> Fecha: </strong>'.date("Y-m-d H:i");
                            OrdenDeTrabajoController::storeHistory(Request::input('id_orden_trabajo'),'info',$historyDes); 
                                //END SAVE

                    
                });
                
                $table = 'registroclinico_laboratorio_clinico';
                             $activity = Request::input('id_actividad_servicio');
                             $format = 'laboratorio_clinico';
                             $data = ['table'=>$table,'activity'=>$activity,'format'=>$format];
                   
                return response()->json([

                        'registerName'=>'Valoracion por especialista en geriatria',
                        'data'=>$data,
                        'message'=>'La valoracion por especialista en Geriatria se guardo de manera exitosa'
                    ],200); 

            } 

                
                
                 

            }catch(\Illuminate\Database\QueryException $ex) {
                
                return response()->json([
                    'message'=>'Error en la base de datos',
                    'error' => $ex->getMessage()
                ],400);
            }
           
            
        }
    }
    //FIN STORE REGISTER

    //Saved REgister ... buscar registro guardado por una actividad
    
    //

    public function registerDisplay(){
        $activity = Homecare_Actividades_Ordendeservicio::find(Request::input('activity'));

        $osa = $activity->orden_de_servicio;
        $table = Request::input('tableName');
        $clinicAudit = 'Sin auditar';
        if($activity->_isvalid==1) $clinicAudit ='Aprobado';
        if($activity->_isvalid==2) $clinicAudit = 'Devuelto';
        if($activity->_isvalid==3) $clinicAudit = 'Sin auditar';

        $registro_clinico_data=\DB::table($table)->where('id_actividad_servicio',Request::input('activity'))->where('id_orden_servicio',$osa->id)->where('id_orden_trabajo',$osa->id_orden_trabajo)->first();
        $nombreactividad=Request::input('registerName');
        $format = Request::input('format');

        $check =  Homecare_SPAD_Analista::where('id_actividad',$activity->id)->where('id_orden',$osa->id_orden_trabajo)->get();
        $seguimiento = ($check->isEmpty()) ? 'NO' : 'SI';

        return response()->view('registrosclinicos/show/'.$format,compact('registro_clinico_data','nombreactividad','osa','activity','format','table','clinicAudit','seguimiento'));
    }


    public function registerPdfMaker($tableName,$format,$activity,$activityName){
  
            $activity = Homecare_Actividades_Ordendeservicio::find($activity);
            
            $servicio = $activity->orden_de_servicio;

            $order = $servicio->orden_de_trabajo;
            $paciente = $order->paciente;    
            $registro_clinico_data=\DB::table($tableName)->where('id_actividad_servicio',$activity->id)->first();
            


            $view = \View::make('registrosclinicos/print/'.$format,compact('registro_clinico_data','activityName','paciente','servicio'));
            $pdf = \App::make('dompdf.wrapper');
            $pdf->getDomPDF()->set_option("enable_php", true);
            $pdf->loadHTML($view);
            return $pdf->stream('history.pdf'); 


    }

    public static function quickNotes($order,$service,$activity){
        $notes = Notas_Medicas::where('order',$order->id)->where('service',$service->id)->where('activity',$activity->id)->get();
        foreach ($notes as $key => $value) {
           echo '<div class="d-flex align-items-center bg-light-success rounded p-5 mb-9">
           

            <!--begin::Title-->
            <div class="d-flex flex-column flex-grow-1 mr-2">
                <audio controls><source src="'.route('quickNote',['id'=>$value->id]).'" type="audio/mpeg"></audio>
                <span class="text-muted font-weight-bold">'.$value->created_at.'</span>
            </div>
            <!--end::Title-->

                    
        </div>';
        }
    }


    
}
