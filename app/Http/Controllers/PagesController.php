<?php

namespace App\Http\Controllers;

use Request;
use \App\Model\Homecare_Ordendeservicio;
use \App\Model\Homecare_Servicio;
use \App\Model\Homecare_Paquete;
use \App\Model\Homecare_Actividades_Ordendeservicio;
use \App\Model\Notas_Medicas;
use \App\Model\General_Medicamentos_vm;
use \App\Model\General_Nutricion_vm;
use \App\Model\General_Laboratorioclinico;
use \App\Model\General_unsignedservice_type;
use \App\Model\General_Spad_status;
use \App\Model\Paciente;
use \App\Model\General_Manual_Tarifario;
use \App\Model\System_Menu;
use \App\Model\General_AreaInforme;
use \App\User;
use \App\Model\General_DocAnexo;
use \App\Model\Cie10;
use \App\Model\General_Complementario_vm;
class PagesController extends Controller
{
    public function index()
    {
        $page_title = 'Dashboard';
        $page_description = 'Some description for the page';

        return view('pages.dashboard', compact('page_title', 'page_description'));
    }

     public static function nullserviceType(){
        $type = General_unsignedservice_type::all();
        
        foreach ($type as $key => $value) {
            echo '<option value='.$value->id.'>'.$value->nombre.'</option>';
        }
    }

    /**
     * Demo methods below
     */

    // Datatables
    //ESTA FUNCION ES UTILIZADA EN LA CREACION  DE LA OT PARA CARGAR LOS SERVICIOS DISPONIBLES DEL PAQUETE
    public function packageServices(){
        $package = Homecare_Paquete::find(Request::input('pkte'));

        $servicios = $package->servicios;
        
        return $servicios;
        
    }

    public function signatureCertified(){
        $file=Request::file('fileanx');
        
        $docType = General_DocAnexo::find(Request::input('DocType'));
        
      
        $destinationPath = storage_path().'/AnexosFacturas/'.Request::input('OtforAnexo');
        
        $xpath = date("is");
        $file->move($destinationPath, $docType->nombre.'-'.$xpath.'.pdf');

        $anexo = new \App\Model\RegistroClinico_Anexo;
        $anexo->id_orden_trabajo = Request::input('OtforAnexo');
        $anexo->id_doctype = $docType->id;
        $anexo->path = $destinationPath.'/'.$docType->nombre.'-'.$xpath.'.pdf';
        $anexo->id_osa = Request::input('osa');
        $anexo->upload_by = \Auth::id();
        $anexo->save();
    }

    public function activePackage($pcte){
        $pcte = Paciente::find($pcte);
        $today = date("Y-m-d");
        $package = array();
        $manual_tarifario = General_Manual_Tarifario::whereDate('valido_hasta', '>', $today)->whereDate('valido_desde', '<=', $today)->where('id_tercero', $pcte->id_eps)->first();
       
        $paquetes = $manual_tarifario->paquetes;

        $arrayPr=[];
        
        $i=0;
       foreach ($paquetes as $key => $value) {
            $arrayPr[$i]['id']=$value->id_paquete;
            $arrayPr[$i]['text']=$value->paquete->nombre;
            $i++;
       }

       return $arrayPr;
        
    }


    public static function barProgressColor($percent){
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
            return $color;
    }

     public static function sltStatusSpad(){
        $data = General_Spad_status::all();
        foreach ($data as $key => $value) {
            echo '<option value="'.$value->id.'">'.$value->nombre.'</option>';
        }
    }


    public function datatables()
    {
        $page_title = 'Datatables';
        $page_description = 'This is datatables test page';

        return view('pages.datatables', compact('page_title', 'page_description'));
    }

    // KTDatatables
    public function ktDatatables()
    {
        $page_title = 'KTDatatables';
        $page_description = 'This is KTdatatables test page';

        return view('pages.ktdatatables', compact('page_title', 'page_description'));
    }

    // Select2
    public function select2()
    {
        $page_title = 'Select 2';
        $page_description = 'This is Select2 test page';

        return view('pages.select2', compact('page_title', 'page_description'));
    }

    // custom-icons
    public function customIcons()
    {
        $page_title = 'customIcons';
        $page_description = 'This is customIcons test page';

        return view('pages.icons.custom-icons', compact('page_title', 'page_description'));
    }

    // flaticon
    public function flaticon()
    {
        $page_title = 'flaticon';
        $page_description = 'This is flaticon test page';

        return view('pages.icons.flaticon', compact('page_title', 'page_description'));
    }

    // fontawesome
    public function fontawesome()
    {
        $page_title = 'fontawesome';
        $page_description = 'This is fontawesome test page';

        return view('pages.icons.fontawesome', compact('page_title', 'page_description'));
    }

    // lineawesome
    public function lineawesome()
    {
        $page_title = 'lineawesome';
        $page_description = 'This is lineawesome test page';

        return view('pages.icons.lineawesome', compact('page_title', 'page_description'));
    }

    // socicons
    public function socicons()
    {
        $page_title = 'socicons';
        $page_description = 'This is socicons test page';

        return view('pages.icons.socicons', compact('page_title', 'page_description'));
    }

    // svg
    public function svg()
    {
        $page_title = 'svg';
        $page_description = 'This is svg test page';

        return view('pages.icons.svg', compact('page_title', 'page_description'));
    }

    // Quicksearch Result
    public function quickSearch()
    {
        return view('layout.partials.extras._quick_search_result');
    }

     public static function pacienteTab(){
         $dbData = \DB::select('call system_paciente_tab('.\Auth::id().')');
         foreach ($dbData as $key => $value) {
             echo '<li class="nav-item">
                                <a class="nav-link" id="'.$value->slug_tab.'-tab" data-toggle="tab" href="#'.$value->slug_tab.'">
                                    <span class="nav-icon"><i class="flaticon2-chat-1"></i></span>
                                    <span class="nav-text">'.$value->nombre.'</span>
                                </a>
                            </li>';
         }
    } 

    public static function UsertabMenu(){
        $dbData = \DB::select('call system_usertab('.\Auth::id().')');
        foreach ($dbData as $key => $value) {
                 echo '<div class="navi-item mb-2" >
                <a href="#'.$value->blade.'" class="navi-link py-4" data-toggle="tab">
                    <span class="navi-icon mr-2">
                        <span class="svg-icon"><img src="/media/svg/'.$value->icon.'.svg"></span>                    </span>
                    <span class="navi-text font-size-lg">
                        '.$value->nombre.'
                    </span>
                </a>
            </div>';
                }        

    }


    

    public static function sltUserPlanta(){
         $user = User::where('_planta',1)->get();
       $arrayPr=[];
       
       foreach ($user as $key => $value) {
        
       $arrayPr[$key]['id']=$value->id;
       $arrayPr[$key]['text']=$value->name;
       }
       return $arrayPr;
    }
   

    public function ClinicalRecords($order,$service,$activity){
        
        $osa = Homecare_Ordendeservicio::find($service);
        if($osa->id_profesional_asignado<>\Auth::id()){
            return abort(401);
        }
        $order = $osa->orden_de_trabajo;
        $serviceType = $osa->servicio;
        $paciente = $order->paciente;
        $activity = Homecare_Actividades_Ordendeservicio::find($activity);    
        

        $page_title = $serviceType->tag;
        $page_description = 'Registro de actividad';

        return view('registrosclinicos.store.master', compact('page_title', 'page_description','serviceType','paciente','order','osa','activity'));
    }

    public function validatePlan(){

        try{

        $arry = Request::input('arry');
        $package = \DB::select('select * from system_planvalidate where id_paquete='.$arry[0]['package'].'');
        if(count($package)==0){
            $ms['data']=1;
            $ms['ms'] = 'Paquete se renovara con exito al guardar la evolucion medica';
            return $ms;
        }
        $minterapy = $package[0]->min;
        $maxterapy = $package[0]->max;
        $countterapy = 0 ;
        
        foreach ($arry as $key => $value) {
            if($value['service']==1012 || $value['service']==6001 || $value['service']==6002 ||$value['service']==6003){
                $countterapy += $value['cantidad'];
            }
                
        }

        if($countterapy<$minterapy || $countterapy>$maxterapy)
        {
            $ms['data']=0;
            $ms['ms'] = 'Recuerde que el numero de terapias minimo son '.$minterapy ;
        }else{
            $ms['data']=1;
            $ms['ms'] = 'Paquete se renovara con exito al guardar la evolucion medica';
            
        }
        return $ms;
        }catch(\Illuminate\Database\QueryException $ex) {
                
                return response()->json([
                    'message'=>'Error en la base de datos',
                    'error' => $ex->getMessage()
                ],400);
            }

       
    }

    public static function ClinicalRecordsMenuForms($service){
        $service = Homecare_Servicio::find($service);
        $registers = $service->master_register;
        foreach ($registers as $key => $value) {
            
            echo '<li class="nav-item mb-2">
                                        <a class="nav-link" id="home-tab-5" data-toggle="tab" href="#tab'.$value->registroclinico->tag_blade.'">
                                            <span class="nav-icon"><i class="flaticon2-chat-1"></i></span>
                                            <span class="nav-text">'.$value->registroclinico->nombre_actividad.'</span>
                                        </a>
                                    </li>';
        }
        
    }

     public static function ClinicalRecordsForms($service,$paciente,$order,$osa,$activity){
        $order = $order;
        $osa = $osa;
        $activity = $activity;
        $service = Homecare_Servicio::find($service);
        $registers = $service->master_register;
        foreach ($registers as $key => $value) {
           $tag_blade = $value->registroclinico->tag_blade;
           $registerName = $value->registroclinico->nombre_actividad;
           $masterId = $value->registroclinico->id;
            echo '<div class="tab-pane fade" id="tab'.$tag_blade.'" role="tabpanel" aria-labelledby="home-tab-5">
                                     '.view("registrosclinicos.store.$tag_blade",compact('paciente','tag_blade','order','osa','activity','masterId','registerName'))->render().'
                                    </div>';
        }
        
    }

    public static function chargePackage(){
        $package = Homecare_Paquete::find(Request::input('package'));
        $servicios = $package->servicios;
        $formulacionMedico = true ;
        
        if(is_null($package->_formulamedico)){
            
            $serviceName = Homecare_Servicio::find($package->baseService)->tag;
            $servicios =['id'=>$package->baseService,'tag'=>$serviceName];
            $formulacionMedico=false;
            
            
        }
        return view('registrosclinicos.store.partials.fomularioplandemanejo',compact('servicios','package','formulacionMedico'));
    }

    public static function VmList(){
        $medicamentos = General_Medicamentos_vm::all();
       $arrayPr=[];
       
       foreach ($medicamentos as $key => $value) {
        
       $arrayPr[$key]['id']=$value->id;
       $arrayPr[$key]['text']=$value->nombre;
       }
       return $arrayPr;
    }

    public static function LabList(){
        $lab = General_Laboratorioclinico::all();

       
       foreach ($lab as $key => $value) {
        
      echo '<option value="'.$value->id.'">'.$value->nombre.'</option>';
       
       }
       
    }

    public static function NutrList(){
        $nutricion = General_Nutricion_vm::all();
       $arrayPr=[];
       
       foreach ($nutricion as $key => $value) {
        
       $arrayPr[$key]['id']=$value->id;
       $arrayPr[$key]['text']=$value->nombre;
       }
       return $arrayPr;
    }

    public static function ComplList(){
        $complementarios = General_Complementario_vm::all();
       $arrayPr=[];
       
       foreach ($complementarios as $key => $value) {
        
       $arrayPr[$key]['id']=$value->id;
       $arrayPr[$key]['text']=$value->nombre;
       }
       return $arrayPr;
    }

    public function activePackageForFormulation($eps){

    $today = date("Y-m-d");
    $package = array();
    

    $manual_tarifario = \App\Model\General_Manual_Tarifario::whereDate('valido_hasta', '>', $today)->whereDate('valido_desde', '<=', $today)->where('id_tercero', $eps)->get();
    $paquetes = $manual_tarifario[0]->paquetes;
    //dd($manual_tarifario[0]);
    $arrayPr = [];
    $i=0;
    foreach ($paquetes as $paquete) {
         $arrayPr[$i]['id']=$paquete->paquete->id;
       $arrayPr[$i]['text']=$paquete->paquete->nombre;
        $i++;
    }


    
    return $arrayPr;
    }

    public function Selectcie10(){
         $cie = Cie10::all();
       $arrayPr=[];
       
       foreach ($cie as $key => $value) {
        
       $arrayPr[$key]['id']=$value->id;
       $arrayPr[$key]['text']=$value->nombre;
       }
       return $arrayPr;
    }

    public function quickNoteGet(){
        
        $note = Notas_Medicas::find(Request::input('id'));
     $path = storage_path($note->path);
    if(!\File::exists($path)) abort(404);
    $file = \File::get($path);
    $type = \File::mimeType($path);

    $response = \Response::make($file,200);
    $response->header("Content-Type", $type);
    return $response;  
    }    

    public function quickNoteStore(){
        $file=Request::file('file');
    $order = Request::input('order');
    $activity = Request::input('activity');
    $service = Request::input('service');

    
     if (!file_exists(storage_path().'/audioSound/'.\Auth::id())) {
            mkdir(storage_path().'/audioSound/'.\Auth::id(), 0777, true);
        }

        
       
        
      
        $destinationPath = storage_path().'/audioSound/'.\Auth::id();
        
        
        $file->move($destinationPath, $order.'_'.date('Y-m-d i_s').'.wav');
        $line = new \App\Model\Notas_Medicas;
        $line->path ='audioSound/'.\Auth::id().'/'.$order.'_'.date('Y-m-d i_s').'.wav';
        $line->order = $order;
        $line->activity = $activity;
        $line->service = $service;
        $line->save();


        return 1;
    }

    public static function reportlist(){
        $dbData = \DB::select('call rolesReports('.\Auth::id().') ');

                                              

        foreach ($dbData as $key => $value) {

             echo '<div class="col-lg-6">
                                        <div class="card mb-8">
                                            <div class="card-body">
                                                <div class="p-6">
                                                    <h2 class="text-dark mb-8">'.$value->nombre.'</h2>';
            
            $reports = General_AreaInforme::find($value->id)->informes;
         
            foreach ($reports as $k => $v) {
                
                echo '<!--begin::Accordion-->
                                                    <div class="accordion accordion-light accordion-light-borderless accordion-svg-toggle" id="accordionExample'.$key.'">
                                                        <!--begin::Item-->
                                                        <div class="card">
                                                            <!--begin::Header-->
                                                            <div class="card-header" >
                                                                <div class="card-title" data-toggle="collapse" data-target="#collapseOne'.$v->id.'" aria-expanded="true"  role="button">
                                                                    <span class="svg-icon svg-icon-primary">
                                                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Angle-double-right.svg-->
                                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                <polygon points="0 0 24 0 24 24 0 24" />
                                                                                <path d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z" fill="#000000" fill-rule="nonzero" />
                                                                                <path d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999)" />
                                                                            </g>
                                                                        </svg>
                                                                        <!--end::Svg Icon-->
                                                                    </span>
                                                                    <div class="card-label text-dark pl-4">'.$v->nombre.'</div>
                                                                </div>
                                                            </div>
                                                            <!--end::Header-->
                                                            <!--begin::Body-->
                                                            <div id="collapseOne'.$v->id.'" class="collapse" aria-labelledby="headingOne1" data-parent="#accordionExample1">
                                                                <div class="card-body text-dark-50 font-size-lg pl-12">'.$v->descripcion.'</div>
                                                                <div class="card-footer"><a href="/Reports/'.$v->id.'"><button type="button" class="btn btn-success btn-lg btn-block">Consultar</button></a>
</div>
                                                            </div>
                                                            <!--end::Body-->
                                                        </div>
                                                        <!--end::Item-->
                                                        
                                                    </div>
                                                    <!--end::Accordion-->';
            }
            echo '</div></div></div></div>';
        }

        
        
    }



    public static function menuList()
    {      
        
        $dbData = \DB::select('call system_menuv2('.\Auth::id().')');

        foreach ($dbData as $key => $value) {


            echo '<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                                    <a href="javascript:;" class="menu-link menu-toggle">
                                        <i class="menu-icon flaticon-graphic"></i>
                                        <span class="menu-text">'.$value->nombre.'</span>
                                        <i class="menu-arrow"></i>
                                    </a>
                                    <div class="menu-submenu">
                                        <i class="menu-arrow"></i>
                                        <ul class="menu-subnav">
                                            <li class="menu-item menu-item-parent" aria-haspopup="true">
                                                <span class="menu-link">
                                                    <span class="menu-text">'.$value->nombre.'</span>
                                                </span>
                                            </li>';
            $sbmenu = System_Menu::find($value->id)->submenu;
            foreach ($sbmenu as $k => $v) {
                if(\Auth::user()->can($v->permiso_requerido))
                echo '<li class="menu-item" aria-haspopup="true">
                                                <a href="'.$v->url.'" class="menu-link">
                                                    <i class="menu-bullet menu-bullet-dot">
                                                        <span></span>
                                                    </i>
                                                    <span class="menu-text">'.$v->nombre.'</span>
                                                </a>
                                            </li>';
                 }
            
            echo '</div></li>';
        }
          
    
      

}

       
}
