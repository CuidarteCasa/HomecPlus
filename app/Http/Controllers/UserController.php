<?php

namespace App\Http\Controllers;

use Request;
use \App\User;
use \App\Model\System_User_SCP;
use Illuminate\Support\Facades\DB;
use \App\Model\Contabilidad_Service_Support;
use \App\Model\Homecare_Ordendetrabajo;
use \App\Model\Homecare_Actividades_Ordendeservicio;

class UserController extends Controller
{
    //

    //LISTA DE ORDENES ACTIVAS POR PROFESIONAL
        public function UserActiveOrders($prf){
            $dbData = DB::select('CALL userOrdersForP('.$prf.')');
            $data = [];
            $i=0;

            foreach ($dbData as $key => $value) {
                
                    $data[$i]['order'] = $value->id;
                    $data[$i]['name'] = $value->name;
                    $data[$i]['service'] = $value->tag;
                    $data[$i]['numservicesAsigned'] = $value->numservicesAsigned;
                    $data[$i]['realized'] = $value->valid + $value->invalid + $value->pending;  
                    $data[$i]['pending'] = $data[$i]['numservicesAsigned'] - $data[$i]['realized'];    
                    $percent =round(($data[$i]['realized']/$data[$i]['numservicesAsigned'] ) * 100) ;
                    $color = PagesController::barProgressColor($percent); 

                    $data[$i]['progress'] ='<div class="d-flex align-items-center justify-content-between mb-2">
                                                                            <span class="text-muted mr-2 font-size-sm font-weight-bold">
                                                                                '.$percent.'%
                                                                            </span>
                                                                            
                                                                        </div>
                                                                        <div class="progress progress-xs w-100">
                                                                            <div class="progress-bar '.$color.'" role="progressbar" style="width: '.$percent.'%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                                        </div>';           
                    $i++;
                }   
                return json_encode($data);
        }
    //

    //CALIFICACION  A PROFESIONALES
    public static function SCP($id,$pospoints,$negpoints,$description){
        try{

                
                $prf = User::find($id);
                $prf->positivePoints += $pospoints;
                $prf->negativePoints += $negpoints;
                $prf->save();

                $positive = $prf->positivePoints;
                $negative = $prf->negativePoints;
                $total = $negative + $positive ;

                $percent = 0;
                if($total>0){
                    $percent = ($total * 100)/$positive;
                }
                
                if($percent<=20)$data = 'OneStar.png';
                if($percent >= 21 and $percent<=40)$data = 'TwoStar.png';
                if($percent >= 41 and $percent<=60)$data = 'ThreeStar.png';
                if($percent >= 61 and $percent<=80)$data = 'FourStar.png';
                if($percent>= 81)$data = 'FiveStar.png';
               
                
                 $prf->scp = $data;
                 $prf->save();

                $scp = new System_User_SCP;
                $scp->id_prf = $id;
                $scp->descripcion = $description;
                $scp->fecha = date('Y-m-d');
                $scp->save();
            
        }catch(\Illuminate\Database\QueryException $ex) {
                
                return response()->json([
                    'message'=>'Error en la base de datos',
                    'error' => $ex->getMessage()
                ],400);
        }
        
    }

    public static function SCP_Calculate($id){
        $user = User::find($id);
        $positive = $user->positivePoints;
        $negative = $user->negativePoints;
        $total = $positive - $negative ;
        $percent = 0;
        if($total>0){
            $percent = ($total * 100)/$positive;
        }
        $percent = intval($percent);
        switch ($percent) {
             case $percent >= 0 and $percent<=20  :
                 $data = 'OneStar';
                 break;
             case $percent >= 21 and $percent<=40  :
                 $data = 'TwoStar';
                 break;
             case $percent >= 41 and $percent<=60  :
                 $data = 'ThreeStar';
                 break;  
             case $percent >= 61 and $percent<=80  :
                 $data = 'FourStar';
                 break;  
             case $percent >= 81 and $percent<=100  :
                 $data = 'FiveStar';
                 break;         
             
         } 
        return $data;
    }

    //FIN CALIFICACION

    //REVISION DE AUDTORIAS

    public static function usResolvedActivities(){
       $alertaregistros = Homecare_Actividades_Ordendeservicio::where('realizada_by', \Auth::user()->id)->where('_isvalid', 2)->get();
       
        foreach ($alertaregistros as $key => $value) {
            if($value->orden_de_servicio->orden_de_trabajo->id_estado==1){
                return 1;
            }
        }
        return 0;
    } 
 
    //


    public static function UserFee(){
        $user = \App\User::find(Request::input('user'));

        $total = 0 ;
        $totalfee = 0;
        $data = [];
        $i=0;
        foreach ($user->honorarios->where('_reportado',0)->where('_enprecc',0) as $key => $value) {
            
            

            if(count(Contabilidad_Service_Support::where('id_actividad',$value->id_actividad)->get())>0)
            {

              $data['data'][$i]['option'] = '
                                        <input type="checkbox" value="'.$value->id.'" class="checkable" checked name="fee[]">
                                        ';
               $totalfee = $totalfee + $value->honorario->honorario ; 
            }else{
                $data['data'][$i]['option'] ='<i class="icon-2x text-dark-50 flaticon2-delete"></i>';
            }
            $total =  $total + $value->honorario->honorario;

            $data['data'][$i]['id'] =$value->id;
            $data['data'][$i]['paciente'] = $value->orden_de_trabajo->paciente->name;
            $data['data'][$i]['service'] =$value->orden_de_servicio->servicio->tag;
            $data['data'][$i]['activity'] = $value->id_actividad;
            $data['data'][$i]['fecha'] = $value->created_at->format('Y-m-d');    
            $data['data'][$i]['honorario'] = $value->honorario->honorario;
            $data['data'][$i]['tipo']  = $value->honorario->payment_type->nombre;
            $data['data'][$i]['order'] = $value->id_ot;
            $data['data'][$i]['osa'] = $value->id_osa;
            
            $data['data'][$i]['actions'] = '<div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
    <div class="btn-group" role="group" aria-label="First group">
        <button type="button"  data-id="'.$value->id.'" data-service = "'.$value->orden_de_servicio->id_servicio.'" data-toggle="tooltip" data-placement="top" title="Cambiar honorario" class="btn btn-warning  btn-icon changeHn" ><i class="fa fa-edit icon-md"></i></button>&nbsp;
        <button type="button" data-toggle="tooltip" data-placement="top" title="Eliminar honorario" class="btn btn-danger  btn-icon deleteHn" data-id="'.$value->id.'"><i class="fa fa-trash icon-md"></i></button>
        
    </div>
    
</div>';
                $i++;
          }
          $data['totalcc']= $total;
          $data['totalfee'] = $totalfee ;
            return json_encode($data);
        
    }

    public function activities(){
        $pcte = Request::input('pcte');
        $i=0;
        $order = Homecare_Ordendetrabajo::where('id_paciente',$pcte)->where('id_estado',1)->get();
        $data = [];
        $activitiesStatus = '';
        if(UserController::usResolvedActivities()==1) $activitiesStatus = 'disabled'; 
        foreach ($order as $ot) {
            $services = $ot->ordenes_de_servicio->where('id_profesional_asignado',\Auth::id());
            foreach ($services as $key => $value) {
                foreach ($value->actividades as $k => $v) {
                    
                    $data['data'][$i]['osa'] = $value->id;
                    $data['data'][$i]['activity'] = $v->id;
                    $data['data'][$i]['service'] = $value->servicio->tag;
                    $status = '';
                   
                    if($v->realizada==NULL){
                        $btnAdd = '';
                        if($value->servicio->id==1001 or $value->servicio->id==7003){
                            $btnAdd = '<a href="#" class="btn btn-primary btn-shadow-hover font-weight-bold mr-2 quickNote" data-service="'.$value->id.'" data-order="'.$ot->id.'" data-activity="'.$v->id.'" data-toggle="tooltip" data-theme="dark" title="Grabar nota rapida de la atencion">Nota rapida</a>
                            ';
                             
                        }
                          
                        $action = '<button class="btn btn-success btn-shadow font-weight-bold mr-2 medicalCare" '.$activitiesStatus.'  data-service="'.$value->id.'" data-order="'.$ot->id.'" data-activity="'.$v->id.'">Atender</button>&nbsp;' . $btnAdd; 
                                                
                    }else{
                        if($v->_isvalid==2) $status = '<div  class="btn btn-icon btn-clean btn-lg mr-1 pulse pulse-primary " data-toggle="modal" data-target="#registerreturnMdl" id="registerreturnBtn" data-observation="'.$v->observacion_adm.'">
                       <i class="icon-2x text-danger flaticon-bell" ></i>
                        <span class="pulse-ring"></span>

                    </div>';
                        $action ='<a  class="btn btn-icon btn-light btn-sm showActivity"  data-id="'.$v->id.'">
                                                                        <span class="svg-icon svg-icon-md svg-icon-success"><!--begin::Svg Icon | path:/metronic/themes/metronic/theme/html/demo1/dist/assets/media/svg/icons/Navigation/Arrow-right.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                                                <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000) " x="11" y="5" width="2" height="14" rx="1"></rect>
                                                                                <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997) "></path>
                                                                            </g>
                                                                        </svg><!--end::Svg Icon--></span>                            </a>'.$status;
                    }

                    $data['data'][$i]['action'] = $action;
                    $i++;
                }
            }
        }
        
        return json_encode($data);
    }

    public function index()
    {

        if (Request::ajax()) {
            $users = \App\User::all();
            $data = [];
            foreach ($users as $key => $value) {
                $dp = ($value->departamento) ?ucfirst(strtolower($value->departamento->nombre)) : "-";
                $mn =  ($value->municipio) ?ucfirst(strtolower($value->municipio->nombre)) : "-";
                $data['data'][$key]['id'] = $value->id;
                $data['data'][$key]['identificacion'] = $value->identificacion;
                $data['data'][$key]['name'] = '<td class="pl-0 py-8">
            <div class="d-flex align-items-center">
                <div class="symbol symbol-50 symbol-light mr-4">
                    <span class="symbol-label">
                        <img src="/metronic/themes/metronic/theme/html/demo1/dist/assets/media/svg/avatars/001-boy.svg" class="h-75 align-self-end" alt="">
                    </span>
                </div>
                <div>
                    <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">'.$value->name.'</a>
                    <span class="text-muted font-weight-bold d-block">'.$dp.'</span>
                    <span class="text-muted font-weight-bold d-block">'.$mn.'</span>
                </div>
            </div>
        </td>';
                
                
        }

            return json_encode($data);
        }

        $page_title = 'Usuarios';
        $page_description = 'Todos los Usuarios';
        return view('user.index', compact('page_title', 'page_description'));
    }

    public function myprofile()
    {
        $page_title = 'Mi perfil';
        $page_description = 'Informacion';
        return view('user.myprofile', compact('page_title', 'page_description'));
    }

    public function show($id)
    {

        $page_title = 'Mi perfil';
        $page_description = 'Informacion';

        $user = \App\User::find($id);

        return view('user.show', compact('page_title', 'page_description'), ['user' => $user]);
    }
}
