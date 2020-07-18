<?php

namespace App\Http\Controllers;

use Request;
use \App\Model\Paciente;
use \App\Model\General_estadopaciente;
use \App\Model\Homecare_Paciente_Medicamento;
use \App\Model\Homecare_Paciente_Cie10_Records;
use \App\Model\Homecare_Paciente_Antecedentes;
use \App\Model\Homecare_Paciente_Nutricion;
use \App\Model\RegistroClinico_master_registros;
use \App\Model\RegistroClinico_visita_fallida;
use \App\Model\Homecare_Prf_Ntf;
use \App\Model\Homecare_StatusChange_History;
use \App\Model\Homecare_Actividades_Ordendeservicio;
use \App\User;
use Illuminate\Support\Facades\DB;
use \App\Model\Homecare_Paciente_Cie10;
use \App\Model\Cie10;
use \App\Model\Homecare_Paciente_Complementario;
class PacienteController extends Controller
{
    //

    /*
    basic head for page

        $page_title = 'Dashboard';
        $page_description = 'Some description for the page';


    */

        //BASIC FUNCTION PACIENTE
 public function statusPt($id){
 switch ($id) {
    
    case 1: return  '<span class="label label-lg font-weight-bold label-success label-inline">Activo</span>';
    break;
    case 4:  return '<span class="label label-lg font-weight-bold label-secondary label-inline">Pre-Admitido</span>';
    case 3:  return '<span class="label label-lg font-weight-bold label-warning label-inline">Hospitalizado</span>';
    case 8: return  '<span class="label label-lg font-weight-bold label-light label-inline">Suspendido</span>';
    break;
    case 2: return  '<span class="label label-lg font-weight-bold label-danger label-inline">Fallecido</span>';
    break;
    case 7: return  '<span class="label label-lg font-weight-bold label-primary label-inline">Alta medica</span>';
    break;
    case 6:  return '<span class="label label-lg font-weight-bold label-light label-inline">Activo</span>';
    case 9:  return  '<span class="label label-lg font-weight-bold label-secondary label-inline">Inactivado</span>';

    break;  
    case 5:  return  '<span class="label label-lg font-weight-bold label-light-dark label-inline">No admitido</span>';

    break;  
    default: return  '<span class="label label-lg font-weight-bold label-light-info label-inline">?</span>';    
    break;
 }
}

        //

         function array_sort_by(&$arrIni, $col, $order = SORT_ASC)
{
    $arrAux = array();
    foreach ($arrIni as $key=> $row)
    {
        $arrAux[$key] = is_object($row) ? $arrAux[$key] = $row->$col : $row[$col];
        $arrAux[$key] = strtolower($arrAux[$key]);
    }
    array_multisort($arrAux, $order, $arrIni);
}

        
        public function VFailHistory(){
            $pcte = Request::input('pcte');
            $vfail = RegistroClinico_visita_fallida::where('id_paciente',$pcte)->get();
            $data=[];
            foreach ($vfail as $key => $value) {
               $data['data'][$key]['id'] = $value->id;
               $data['data'][$key]['prf'] = $value->user->name;
               $data['data'][$key]['fecha'] = $value->fecha;
               $data['data'][$key]['obs'] = $value->observacion; 
            }
            return json_encode($data);
            
        }

        public function NtfPrfHistory(){
             $pcte = Request::input('pcte');
            $ntf = Homecare_Prf_Ntf::where('id_paciente',$pcte)->get();
            $data=[];
            foreach ($ntf as $key => $value) {
               $data['data'][$key]['id'] = $value->id;
               $data['data'][$key]['prf'] = $value->user->name;
               $data['data'][$key]['fecha'] = $value->fecha;
               $data['data'][$key]['obs'] = $value->observacion; 
            }
            return json_encode($data);
        }

        public function StatusHistory(){
            $pcte = Request::input('pcte');
            $history=Homecare_StatusChange_History::where('id_paciente',$pcte)->get();
            $data = [];
            foreach ($history as $key => $value) {
                $userfill = ($value->user) ? $value->user->name : 'Admisiones';
                $data['data'][$key]['id'] =$value->id;
                $data['data'][$key]['status'] = PacienteController::statusPt($value->id_estado); 
                $data['data'][$key]['user'] = $userfill; 
                $data['data'][$key]['observacion'] =  $value->observacion;
                $data['data'][$key]['fecha'] = $value->fecha;
            }
                            return json_encode($data);
        }

        public function SPADAnalist(){
            $pcte = Request::input('pcte');
            $registerObs=\App\Model\Homecare_SPAD_Analista::where('id_patient',$pcte)->get();
            $data = [];
            foreach ($registerObs as $key => $value) {
                $prfName = Homecare_Actividades_Ordendeservicio::find($value->id_actividad);
                $data['data'][$key]['id'] = $value->id;
                $data['data'][$key]['activity'] = $value->id_actividad;
                $data['data'][$key]['prf'] = $prfName->profesional->name;       
                $data['data'][$key]['user'] = $value->user->name; 
                $data['data'][$key]['observacion'] =  $value->nota;
                $data['data'][$key]['fecha'] ='<b>'. date('Y-m-d H:i',strtotime($value->created_at)).'</b>';
            }
            return json_encode($data);
        }

        public function SPADPrf(){
            $pcte = Request::input('pcte');
            $follow=\App\Model\Homecare_Sgprf::where('id_paciente',$pcte)->get();
            $data = [];
            foreach ($follow as $key => $value) {
                $prfName = User::find($value->id_prf);
                $data['data'][$key]['id'] = $value->id;
                $data['data'][$key]['prf'] = $prfName->name;       
                $data['data'][$key]['user'] = $value->user->name; 
                $data['data'][$key]['observacion'] =  $value->observacion;
                $data['data'][$key]['fecha'] ='<b>'. date('Y-m-d H:i',strtotime($value->created_at)).'</b>';
            }
            return json_encode($data);
        }

        public function News(){
            $pcte = Request::input('pcte');
            $novedades=\App\Model\Homecare_Novedades::where('id_paciente',$pcte)->get();
            $data = [];
              foreach ($novedades as $key => $value) {
                $data['data'][$key]['id'] =$value->id;
                $data['data'][$key]['type'] = $value->tipo_novedad->nombre; 
                $data['data'][$key]['user'] = $value->user->name; 
                $data['data'][$key]['observacion'] = $value->observacion;
               ($value->id_status==1) ? $data['data'][$key]['action'] ='<small class="label label-success"><i class="fa fa-check"></i>OK</small>' : $data['data'][$key]['action'] ='<button class="btn btn-success" type="button" id="responseSG" data-id="'.$value->id.'"  >Atender </button>' ;
                $data['data'][$key]['respuesta'] = $value->respuesta;
                $data['data'][$key]['fecha'] = '<b>'.date('Y-m-d H:i',strtotime($value->fecha)).'</b>';
                 

                }
                return json_encode($data);
        }

        public function MedicalHistory(){
            try{
                $pcte = Request::input('pcte');
                
                $takelast = Request::input('take');
                $data = [];
                $i=0;
                $registro_clinico_master=RegistroClinico_master_registros::whereIn('id',[15,3,38])->get();
                foreach ($registro_clinico_master as $key => $value) {
                    $table = $value->nombre_tabla_mysql;
                    $registers_lines = \DB::table($table)->where('id_paciente',$pcte)->orderByDesc('fecha_actividad')->take($takelast)->get();
                    foreach ($registers_lines as $k => $v) {
                                
                        $data[$i]['type'] = $value->nombre_registro_clinico;
                        $data[$i]['fecha'] = $v->fecha_actividad;
                        $data[$i]['activity'] = $v->id_actividad_servicio;
                        $data[$i]['format'] = $value->tag_blade;
                        $data[$i]['table'] = $table;
                        
                        $i++;
                    }
                    
                }

                PacienteController::array_sort_by($data,'fecha',$order = SORT_ASC) ;   
                    
                return $data;

            }catch(\Illuminate\Database\QueryException $ex) {
                
                return response()->json([
                    'message'=>'Error en la base de datos',
                    'error' => $ex->getMessage()
                ],400);
            }
        }

        public function antecedentesNew(){
            try{
                \DB::transaction(function(){
                     $type = Request::input('type');
                    $info = Request::input('info');
                    
                    $newAnt = new Homecare_Paciente_Antecedentes;
                    $newAnt[$type] = $info;
                    $newAnt->fecha = date('Y-m-d');
                    $newAnt->id_user = \Auth::user()->id;
                    $newAnt->id_paciente = Request::input('pcte');
                    $newAnt->save();
                });
                return response()->json([

                                'registerName'=>'Antecedentes',
                                'message'=>'Los Antecedentes del paciente se actulizaron de manera exitosa'
                            ],200); 
            }catch(\Illuminate\Database\QueryException $ex) {
                
                return response()->json([
                    'message'=>'Error en la base de datos',
                    'error' => $ex->getMessage()
                ],400);
            }
           

        }

        public function antecedentesInfo(){
            $pcte = Paciente::find(Request::input('pcte'));
            $antecedentes = $pcte->antecedentes;

            $data=[];

            $i1=0;
            $i2=0;
            $i3=0;
            $i4=0;
            $i5=0;
            $i6=0;
            $i7=0;
            $i8=0;
             

            foreach ($antecedentes as $key => $value) {
                $medico = $value->medico->name;

                if($value->ant_patologicos!=null){
                        $data['patologicos'][$i1]['fecha']=$value->fecha;
                        $data['patologicos'][$i1]['data'] = $value->ant_patologicos;
                        $data['patologicos'][$i1]['user'] = $medico;
                        $i1++;
                }    

                if($value->ant_quirurgicos!=null){
                        $data['quirurgicos'][$i2]['fecha']=$value->fecha;
                        $data['quirurgicos'][$i2]['data'] = $value->ant_quirurgicos;
                        $data['quirurgicos'][$i2]['user'] = $medico;
                        $i2++;
                }

                if($value->ant_alergicos!=null){
                        $data['alergicos'][$i3]['fecha']=$value->fecha;
                        $data['alergicos'][$i3]['data'] = $value->ant_alergicos;
                        $data['alergicos'][$i3]['user'] = $medico;
                        $i3++;
                }

                if($value->ant_medicamentos!=null){
                        $data['medicamentos'][$i4]['fecha']=$value->fecha;
                        $data['medicamentos'][$i4]['data'] = $value->ant_medicamentos;
                        $data['medicamentos'][$i4]['user'] = $medico;
                        $i4++;
                }

                if($value->ant_habitos!=null){
                    $data['habitos'][$i5]['fecha']=$value->fecha;
                        $data['habitos'][$i5]['data'] = $value->ant_habitos;
                        $data['habitos'][$i5]['user'] = $medico;
                        $i5++;
                }

                if($value->ant_familiares!=null){
                    $data['familiares'][$i6]['fecha']=$value->fecha;
                $data['familiares'][$i6]['data'] = $value->ant_familiares;
                $data['familiares'][$i6]['user'] = $medico;
                $i6++;
                }

                if($value->ant_hospitalizacion!=null){
                    $data['hospitalizacion'][$i7]['fecha']=$value->fecha;
                $data['hospitalizacion'][$i7]['data'] = $value->ant_hospitalizacion;
                $data['hospitalizacion'][$i7]['user'] = $medico;
                $i7++;
                }

                if($value->ant_toxicos!=null){
                    $data['toxicos'][$i8]['fecha']=$value->fecha;
                $data['toxicos'][$i8]['data'] = $value->ant_toxicos;
                $data['toxicos'][$i8]['user'] = $medico;
                $i8++;
                }


            }
            return $data;
        }    




        public function mnaInfo(){
            $pcte = Paciente::find(Request::input('pcte'));
            $mna = $pcte->mna;
            $data = [];
            foreach ($mna as $key => $value) {

                $data[$key]['mna'] = $value->mna;
                $data[$key]['fecha'] = $value->fecha;
            }
            return $data;
        }

        public function vitalsInfo(){
            
            $pcte = Paciente::find(Request::input('pcte'));
            $vitals = $pcte->vitals;
            $data = [];
            foreach ($vitals as $key => $value) {
                $data['TA'][$key]['systolic'] = $value->sv_pa_sistolica;
                $data['TA'][$key]['diastolic'] = $value->sv_pa_diastolica;
                $data['TA'][$key]['fecha'] = $value->date;
                $TaMedia = intval($value->sv_pa_diastolica) + ((intval($value->sv_pa_sistolica)-intval($value->sv_pa_diastolica))/3);
                $data['TA'][$key]['TAmedia'] = intval($TaMedia);
                $data['FR'][$key]['fr'] = $value->sv_frecuencia_respiratoria;
                $data['FR'][$key]['fecha'] = $value->date;
            }
            return $data;
        }

       

    public function validMed(){
        try{
            $pcte = Request::input('pcte');
            $med = Request::input('med');
            $line = Homecare_Paciente_Medicamento::where('id_paciente',$pcte)->where('id_medicamento',$med)->get();
            if(count($line)>0)
            return response()->json([

                                'status'=>1,
                                'message'=>'Este medicamento ya esta en el historial del paciente'
                            ],200); 
            else
            return response()->json([

                                'status'=>0,
                                'message'=>'Agregado de manera exitosa'
                            ],200); 
        }catch(\Illuminate\Database\QueryException $ex) {
                
                return response()->json([
                    'message'=>'Error en la base de datos',
                    'error' => $ex->getMessage()
                ],400);
            }
        
    }

    public function saveNewCie(){

          
          try{
            $sw = 0;  
            $codigo_cie = '';
            $cieName = '';
            $idline = '';
            DB::transaction(function() use(&$sw,&$codigo_cie,&$cieName,&$idline){
                $pcte = Request::input('pcte');
            $cie = Request::input('cie');
            $line = Homecare_Paciente_Cie10::where('id_paciente',$pcte)->where('id_cie10',$cie)->get();
            if(count($line)>0) $sw=1;
            
            else{

                $observacion = Request::input('observacion');
                $fecha = Request::input('fecha');
                $line = new Homecare_Paciente_Cie10;
                $line->id_paciente = $pcte;
                $line->id_cie10 = $cie;
                $line->fecha_diagnostico = $fecha;
                $line->status = 1;
                $line->save();
                $idline = $line->id;
                $cieCod = Cie10::find($cie);
                $codigo_cie =$cieCod->id;
                $cieName =$cieCod->nombre;

                $record = new Homecare_Paciente_Cie10_Records;
                $record->id_paciente_cie = $line->id;
                $record->status = 1;
                $record->observacion = $observacion;
                $record->action_by = \Auth::user()->id;
                $record->fecha = date('y-m-d');
                $record->id_actividad_servicio = Request::input('activity');
                $record->id_orden_servicio = Request::input('osa');
                $record->id_orden_trabajo =Request::input('order');
                $record->save();
                
            }
            
               
            });

            if($sw==1){
                return response()->json([

                                'status'=>1,
                                'message'=>'Este Cie ya esta en el historial del paciente'
                            ],200); 
            }
            if($sw==0){
                return response()->json([

                                'status'=>0,
                                'message'=>'Agregado de manera exitosa',
                                'codigo_cie'=>$codigo_cie,
                                'id_ciepcte'=>$idline,
                                'fecha'=>date('Y-m-d'),
                                'cieName'=>$cieName,

                            ],200);  
            }
            
        }catch(\Illuminate\Database\QueryException $ex) {
                
                return response()->json([
                    'message'=>'Error en la base de datos',
                    'error' => $ex->getMessage()
                ],400);
            }
    }
    public function validNut(){
        try{
            $pcte = Request::input('pcte');
            $nut = Request::input('nut');
            $line = Homecare_Paciente_Nutricion::where('id_paciente',$pcte)->where('id_nutricion',$nut)->get();
            if(count($line)>0)
            return response()->json([

                                'status'=>1,
                                'message'=>'Esta nutricion ya esta en el historial del paciente'
                            ],200); 
            else
            return response()->json([

                                'status'=>0,
                                'message'=>'Agregado de manera exitosa'
                            ],200); 
        }catch(\Illuminate\Database\QueryException $ex) {
                
                return response()->json([
                    'message'=>'Error en la base de datos',
                    'error' => $ex->getMessage()
                ],400);
            }
    }

    public function validCompl(){
         try{
            $pcte = Request::input('pcte');
            $comple = Request::input('comple');
            $line = Homecare_Paciente_Complementario::where('id_paciente',$pcte)->where('id_complementario',$comple)->get();
            if(count($line)>0)
            return response()->json([

                                'status'=>1,
                                'message'=>'Esta nutricion ya esta en el historial del paciente'
                            ],200); 
            else
            return response()->json([

                                'status'=>0,
                                'message'=>'Agregado de manera exitosa'
                            ],200); 
        }catch(\Illuminate\Database\QueryException $ex) {
                
                return response()->json([
                    'message'=>'Error en la base de datos',
                    'error' => $ex->getMessage()
                ],400);
            }
    }

   public function medNutCompl($id){
    $pcte = Paciente::find($id);
    $data=[];
    $i=0;
    foreach ($pcte->medicamentos_paciente as $key => $value) {
        $data['medicamentos'][$key]['id'] = $value->id;
        $data['medicamentos'][$key]['idMed'] = $value->medicamento->id;
        $data['medicamentos'][$key]['name'] = $value->medicamento->nombre;
        $data['medicamentos'][$key]['formulacion'] = $value->formulacion;
        $fin = new \DateTime($value->fecha_fin);
        $now = new \DateTime(date('Y-m-d'));
        $left = $now->diff($fin); 
        $data['medicamentos'][$key]['validto'] = $left->format('%R%a días');
        $data['medicamentos'][$key]['status'] = ($value->fecha_fin<=date('Y-m-d')) ? 0 : 1 ;
    }
    foreach ($pcte->nutricion_paciente as $key => $value) {
        $data['nutricion'][$key]['id'] = $value->id;
        $data['nutricion'][$key]['idNut'] = $value->nutricion->id;
        $data['nutricion'][$key]['name'] = $value->nutricion->nombre;
        $data['nutricion'][$key]['formulacion'] = $value->formulacion;
        $fin = new \DateTime($value->fecha_fin);
        $now = new \DateTime(date('Y-m-d'));
        $left = $now->diff($fin); 
        $data['nutricion'][$key]['validto'] = $left->format('%R%a días');
        $data['nutricion'][$key]['status'] = ($value->fecha_fin<=date('Y-m-d')) ? 0 : 1 ;
    }

     foreach ($pcte->complemetario_paciente as $key => $value) {
        $data['complementario'][$key]['id'] = $value->id;
        $data['complementario'][$key]['idComple'] = $value->complementario->id;
        $data['complementario'][$key]['name'] = $value->complementario->nombre;
        $data['complementario'][$key]['formulacion'] = $value->formulacion;
        $fin = new \DateTime($value->fecha_fin);
        $now = new \DateTime(date('Y-m-d'));
        $left = $now->diff($fin); 
        $data['complementario'][$key]['validto'] = $left->format('%R%a días');
        $data['complementario'][$key]['status'] = ($value->fecha_fin<=date('Y-m-d')) ? 0 : 1 ;
    }
    return $data;
   }     

   public function dxList($id){
    $pcte = Paciente::find($id);
    $data =[];
    foreach ($pcte->cie as $key => $value) {
                $data[$key]['id'] = $value->id;
                $data[$key]['act'] ='actulizado';
                $data[$key]['name'] = $value->cie->nombre;
                $data[$key]['cie10'] = $value->cie->codigo_cie;
                $data[$key]['status'] = $value->status;
           
    }
    return $data;
   }    

     public function DxResume(){
            $pcte = Paciente::find(Request::input('pcte'));
            $dx = $pcte->cie;
            $data = [];
            foreach ($dx as $key => $value) {
                $data[$key]['dx']=$value->cie->nombre;
                $data[$key]['idcie']=$value->cie->codigo_cie;
                $data[$key]['id']=$value->id;
                $data[$key]['status']=$value->status;
                $history = $value->history;
                foreach ($history as $k => $v) {
                    $data[$key]['history'][$k]['status']=$v->status;
                    $data[$key]['history'][$k]['observacion']=$v->observacion;
                    $data[$key]['history'][$k]['medico']=$v->medico->name;
                    $data[$key]['history'][$k]['fecha']=$v->fecha;
                }
            }
            return $data;
            
        } 

         public function dxHistory(){
            $pcte_cie = Request::input('pcte_cie');
            
            $data = Homecare_Paciente_Cie10_Records::where('id_paciente_cie',$pcte_cie)->get();

            return $data;
        }


    public static function DrugHistory($id){
        $pcte = Paciente::find($id);
        $medicamentos = $pcte->medicamentos_paciente->sortBy('fecha_fin');
        foreach ($medicamentos as $key => $value) {
            $color='success';
            if($value->fecha_fin<=date('Y-m-d'))
                $color = 'danger';

            echo '<div class="d-flex align-items-center mb-9 bg-light-'.$color.' rounded p-5">
          <a href="#"> <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/home/keenthemes/www/metronic/themes/metronic/theme/html/demo1/dist/../src/media/svg/icons/Media/Repeat.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path d="M12,8 L8,8 C5.790861,8 4,9.790861 4,12 L4,13 C4,14.6568542 5.34314575,16 7,16 L7,18 C4.23857625,18 2,15.7614237 2,13 L2,12 C2,8.6862915 4.6862915,6 8,6 L12,6 L12,4.72799742 C12,4.62015048 12.0348702,4.51519416 12.0994077,4.42878885 C12.264656,4.2075478 12.5779675,4.16215674 12.7992086,4.32740507 L15.656242,6.46136716 C15.6951359,6.49041758 15.7295917,6.52497737 15.7585249,6.56395854 C15.9231063,6.78569617 15.876772,7.09886961 15.6550344,7.263451 L12.798001,9.3840407 C12.7118152,9.44801079 12.607332,9.48254921 12.5,9.48254921 C12.2238576,9.48254921 12,9.25869158 12,8.98254921 L12,8 Z" fill="#000000"/>
        <path d="M12.0583175,16 L16,16 C18.209139,16 20,14.209139 20,12 L20,11 C20,9.34314575 18.6568542,8 17,8 L17,6 C19.7614237,6 22,8.23857625 22,11 L22,12 C22,15.3137085 19.3137085,18 16,18 L12.0583175,18 L12.0583175,18.9825492 C12.0583175,19.2586916 11.8344599,19.4825492 11.5583175,19.4825492 C11.4509855,19.4825492 11.3465023,19.4480108 11.2603165,19.3840407 L8.40328311,17.263451 C8.18154548,17.0988696 8.13521119,16.7856962 8.29979258,16.5639585 C8.32872576,16.5249774 8.36318164,16.4904176 8.40207551,16.4613672 L11.2591089,14.3274051 C11.48035,14.1621567 11.7936615,14.2075478 11.9589099,14.4287888 C12.0234473,14.5151942 12.0583175,14.6201505 12.0583175,14.7279974 L12.0583175,16 Z" fill="#000000" opacity="0.3"/>
    </g>
</svg><!--end::Svg Icon--></span></a>

            <!--begin::Title-->
            <div class="d-flex flex-column flex-grow-1 mr-2">
                <a  class="font-weight-bold text-dark-75 text-hover-primary font-size-lg mb-1">'.$value->medicamento->nombre.'</a>
                <span class="text-muted font-weight-bold">'.$value->formulacion.'</span>
            </div>
            <!--end::Title-->

            <!--begin::Lable-->
            <span class="font-weight-bolder text-primary py-1 font-size-lg">Valida hasta <br> '.$value->fecha_fin.'</span>
            
            <!--end::Lable-->
        </div>';
        }
    }    


    public function index(){
      $page_title = 'Pacientes';
        $page_description = 'Listado General';
        

        return view('paciente.index',compact('page_title','page_description'));
    }

    public function show($id){

    	$pcte = Paciente::find($id);

    	$page_title = $pcte->name;
        $page_description = 'Informacion general';

        return view('paciente.show',compact('page_title','page_description'),['paciente'=>$pcte]);
    }






    //FUNCION RETURN HTML

    public static function activeOrders($id){
       $pcte = Paciente::find($id);
       $orders = $pcte->ordenes_de_trabajo->where('id_estado',1);
       

       foreach ($orders as $key => $value) {
          echo '<div class="mb-6">
            <!--begin::Content-->
            <div class="d-flex align-items-center flex-grow-1">
                <!--begin::Checkbox-->
                <label class="checkbox checkbox-lg checkbox-lg checkbox-single flex-shrink-0 mr-4">
                    <input type="checkbox" class="chargePackage" data-package="'.$value->paquete->id.'" >
                    <span></span>
                </label>
                <!--end::Checkbox-->

                <!--begin::Section-->
                <div class="d-flex flex-wrap align-items-center justify-content-between w-100">
                    <!--begin::Info-->
                    <div class="d-flex flex-column align-items-cente py-2 w-75">
                        <!--begin::Title-->
                        <a href="#" class="text-dark-75 font-weight-bold text-hover-primary font-size-lg mb-1">
                            '.$value->paquete->nombre_corto.'
                        </a>
                        <!--end::Title-->

                        
                    </div>
                    <!--end::Info-->

                    
                </div>
                <!--end::Section-->
            </div>
            <!--end::Content-->
        </div>';

        
        } 

        echo '<div class="mb-6">
            <!--begin::Content-->
            <div class="d-flex align-items-center bg-light-info rounded p-5 mb-9">
                

                <!--begin::Section-->
                <div class="d-flex flex-wrap align-items-center justify-content-between w-100">
                    <!--begin::Info-->
                    <div class="d-flex flex-column align-items-cente py-2 w-75">
                        <!--begin::Title-->
                        <a href="#" class="text-dark-75 font-weight-bold text-hover-primary font-size-lg mb-1">
                            Deseo agregar un paquete diferente
                        </a>
                        <!--end::Title-->

                        
                    </div>
                    <!--end::Info-->
                     <a style="cursor:pointer;" class="addOtherPlan" data-toggle="modal" data-target="#OtherPlanModal" data-eps="'.$pcte->id_eps.'"> <span class="label label-lg label-light-success label-inline font-weight-bold py-4">Agregar</span></a>
                    
                </div>
                <!--end::Section-->
            </div>
            <!--end::Content-->
        </div>';

        echo '<div class="mb-6">
            <!--begin::Content-->
            <div class="d-flex align-items-center bg-light-success rounded p-5 mb-9">
                <!--begin::Checkbox-->
                <label class="checkbox checkbox-lg checkbox-lg checkbox-single flex-shrink-0 mr-4">
                    <input type="checkbox" class="altaMedica" name="altaMedica">
                    <span></span>
                </label>
                <!--end::Checkbox-->

                <!--begin::Section-->
                <div class="d-flex flex-wrap align-items-center justify-content-between w-100">
                    <!--begin::Info-->
                    <div class="d-flex flex-column align-items-cente py-2 w-75">
                        <!--begin::Title-->
                        <a href="#" class="text-dark-75 font-weight-bold text-hover-primary font-size-lg mb-1">
                            Deseo dar de alta al paciente
                        </a>
                        <!--end::Title-->

                        
                    </div>
                    <!--end::Info-->

                    
                </div>
                <!--end::Section-->
            </div>
            <!--end::Content-->
        </div>';

        echo '<div class="mb-6">
            <!--begin::Content-->
            <div class="d-flex align-items-center bg-light-primary rounded p-5 mb-9">
                <!--begin::Checkbox-->
                <label class="checkbox checkbox-lg checkbox-lg checkbox-single flex-shrink-0 mr-4">
                    <input type="checkbox" class="auditBarthel" name="auditBarthel">
                    <span></span>
                </label>
                <!--end::Checkbox-->

                <!--begin::Section-->
                <div class="d-flex flex-wrap align-items-center justify-content-between w-100">
                    <!--begin::Info-->
                    <div class="d-flex flex-column align-items-cente py-2 w-75">
                        <!--begin::Title-->
                        <a href="#" class="text-dark-75 font-weight-bold text-hover-primary font-size-lg mb-1">
                            Enviar paciente a auditoria por barthel
                        </a>
                        <!--end::Title-->

                        
                    </div>
                    <!--end::Info-->

                    
                </div>
                <!--end::Section-->
            </div>
            <!--end::Content-->
        </div>';

       
    }



    public static function activeDxedit($id){
        $pcte = Paciente::find($id);
        echo '<table class="table table-striped"><tbody>';
         foreach ($pcte->cie as $key => $value) {
            if($value->status==1){
                 
                 echo '<div class="d-flex align-items-center mb-9 bg-light-success rounded p-5">
          <a class="updateDx" style="cursor:pointer;" data-toggle="modal" data-target="#dxAction" data-dx = "'.$value->id.'"> <span class="svg-icon svg-icon-info svg-icon-2x"><!--begin::Svg Icon | path:/home/keenthemes/www/metronic/themes/metronic/theme/html/demo1/dist/../src/media/svg/icons/General/Other1.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <circle fill="#000000" cx="12" cy="5" r="2"/>
        <circle fill="#000000" cx="12" cy="12" r="2"/>
        <circle fill="#000000" cx="12" cy="19" r="2"/>
    </g>
</svg><!--end::Svg Icon--></span></a>

            <!--begin::Title-->
            <div class="d-flex flex-column flex-grow-1 mr-2">
                <a style="cursor:pointer;" data-toggle="modal" data-target="#dxRecord" class="font-weight-bold text-dark-75 text-hover-primary font-size-lg mb-1">'.$value->cie->nombre.'</a>
                <span class="text-muted font-weight-bold">Actulizado :'.$value->fecha_diagnostico.'</span>
            </div>
            <!--end::Title-->

            <!--begin::Lable-->
            <span class="font-weight-bolder text-primary py-1 font-size-lg">'.$value->cie->codigo_cie.'</span>
            
            <!--end::Lable-->
        </div>';

            }
           
         
      }
      echo '</tbody></table>';
    } 
    public static function inactiveDxedit($id){
        $pcte = Paciente::find($id);
        echo '<table class="table table-striped"><tbody>';
         foreach ($pcte->cie as $key => $value) {
            if($value->status==2){
                 echo '<div class="d-flex align-items-center mb-9 bg-light-success rounded p-5">
          <a class="updateDx" style="cursor:pointer;" data-toggle="modal" data-target="#dxAction" data-dx = "'.$value->id.'"> <span class="svg-icon svg-icon-info svg-icon-2x"><!--begin::Svg Icon | path:/home/keenthemes/www/metronic/themes/metronic/theme/html/demo1/dist/../src/media/svg/icons/General/Other1.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <circle fill="#000000" cx="12" cy="5" r="2"/>
        <circle fill="#000000" cx="12" cy="12" r="2"/>
        <circle fill="#000000" cx="12" cy="19" r="2"/>
    </g>
</svg><!--end::Svg Icon--></span></a>

            <!--begin::Title-->
            <div class="d-flex flex-column flex-grow-1 mr-2">
                <a style="cursor:pointer;" data-toggle="modal" data-target="#dxRecord" class="font-weight-bold text-dark-75 text-hover-primary font-size-lg mb-1">'.$value->cie->nombre.'</a>
                <span class="text-muted font-weight-bold">Actulizado :'.$value->fecha_diagnostico.'</span>
            </div>
            <!--end::Title-->

            <!--begin::Lable-->
            <span class="font-weight-bolder text-primary py-1 font-size-lg">'.$value->cie->codigo_cie.'</span>
            
            <!--end::Lable-->
        </div>';
            }
           
         
      }
      echo '</tbody></table>';
    } 

    public static function addressPacienteBasic($id){
        $pcte = Paciente::find($id);
        echo '<address>';
        echo '<strong>Identificacion : </strong>'.$pcte->tipodocumento->tag.' '.$pcte->identificacion.'<br>';
        echo '<strong>Direccion : </strong>'.$pcte->direccion($pcte->id).'<br>'; 
        echo '<strong>Telefonos : </strong>'.$pcte->telefono.'-'.$pcte->celular.'-'.$pcte->celular2.'<br>';   
        echo '<strong>Fecha Nacimiento : </strong>'.$pcte->fecha_de_nacimiento.'<br>';
        echo '<strong>Edad : </strong>'.$pcte->edad($pcte->id).' Años<br>';
        echo '</address>';
        }

    public static function addressPacienteDg($id){
        $pcte = Paciente::find($id);
        echo '<address>';
        foreach ($pcte->cie->where('status',1) as $key => $value) {
          echo $value->cie->codigo_cie.' - '. $value->cie->nombre.'<br>';
      }
      echo '</address>';
        }   
        
        public static function addressPacienteAdmin($id){
        $pcte = Paciente::find($id);
        echo '<address>';
        foreach ($pcte->cie as $key => $value) {
          echo $value->cie->codigo_cie.' - '. $value->cie->nombre.'<br>';
      }
      echo '</address>';
        }    

    public static function NstatusPatient(){

      $status = General_estadopaciente::all();

      foreach ($status as $key => $value) {
        echo '<li class="kt-nav__item">
        <a href="#" class="kt-nav__link" data-toggle="status-change" data-status="'.$value->id.'">
        <span class="kt-nav__link-text"><span class="kt-badge kt-badge--unified-'.$value->csscolor.' kt-badge--inline kt-badge--lg kt-badge--bold">'.$value->nombre.'</span></span>
        </a>
        </li>';
            }

        }

    //

        //DATATABLES PACIENTES
        public function Dt_pacientes(){

           $db = DB::select('call patientInfo()');
              $array=[];
              $i=0;
              
              $img = '';
              foreach ($db as $key => $objPatient) {
                ($objPatient->covid==1) ? $img = '<a data-toggle="tooltip" data-placement="top" data-title="Covid" class="btn btn-danger btn-sm" data-original-title="" title="">COVID</a>' : $img = '';
              $array['data'][$i]['id']=$objPatient->id ;
              $array['data'][$i]['identificacion']=$objPatient->identificacion;
              $array['data'][$i]['name']='<a href="/Paciente/'.$objPatient->id.'">'.$objPatient->name.'</a>' . $img;
              $array['data'][$i]['direccion']=$objPatient->direccion ;
              $array['data'][$i]['tag']=$objPatient->tag;
              $array['data'][$i]['departamento']=$objPatient->departamento;
              $array['data'][$i]['municipio']=$objPatient->municipio;
              $array['data'][$i]['barrio']=$objPatient->barrio;
              $array['data'][$i]['phone']=$objPatient->phone;
              $array['data'][$i]['status'] = PacienteController::statusPt($objPatient->id_estado);
              $btn='<div class="btn-group"><button data-id="'.$objPatient->id.'" id="editRedirect" style="border-radius:50px; background-color=#CCF0FF "   type="button" data-toggle="tooltip" data-placement="top" title="Informacion" class="btn btn-info btn-flat"><i class="fa fa-pencil-square-o"></i></button></div>';
              $array['data'][$i]['btn']=$btn;
              $i++;
            }  

          
          return json_encode($array);
        }

        //FIN DATATABLES
}
