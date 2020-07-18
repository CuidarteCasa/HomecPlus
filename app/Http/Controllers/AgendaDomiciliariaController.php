<?php

namespace App\Http\Controllers;

use Request;
use \App\Model\RegistroClinico_visita_fallida;
use \App\Http\Controllers\NotificationsController;
use \App\Model\Homecare_Prf_Ntf;
class AgendaDomiciliariaController extends Controller
{
    //

	public function index(){
		$page_title = 'Mi Agenda';
        $page_description = 'Pacientes';

        
		return view('agenda.index', compact('page_title', 'page_description'));
	}

    public function NrfPrfStore(){
        try{
            $NtfPrf = new Homecare_Prf_Ntf;
            $NtfPrf->id_order = Request::input('order');
            $NtfPrf->id_paciente = Request::input('patient');
            $NtfPrf->id_profesional = \Auth::user()->id;
            $NtfPrf->observacion = Request::input('obs');
            
            $NtfPrf->fecha = date("Y-m-d H:i:s");
            
            $NtfPrf->save();   

                    

        }catch(\Illuminate\Database\QueryException $ex){
            return response()->json([
                    'message'=>'Error en la base de datos',
                    'error' => $ex->getMessage()
                ],400);
        }
    }

    public function VfailStore(){

        try{
            $visita = new RegistroClinico_visita_fallida;
            $visita->id_orden_trabajo = Request::input('order');
            $visita->id_paciente = Request::input('patient');
            $visita->id_profesional = \Auth::user()->id;
            $visita->observacion = Request::input('obs');
            $visita->id_type = Request::input('type');
            $visita->fecha = date("Y-m-d H:i:s");
            $visita->id_status = 2;
            $visita->save();   

            $perfil =  \Auth::user()->perfiles()->first();

            switch ($perfil->slug) {
                    case 'medico':
                        NotificationsController::ExternalMedNotification(Request::input('patient'));
                        break;
                    case 'terapeuta':
                        
                        break;
                    default:
                        
                        break;
                }    



        }catch(\Illuminate\Database\QueryException $ex) {
                
                return response()->json([
                    'message'=>'Error en la base de datos',
                    'error' => $ex->getMessage()
                ],400);
            }

    }

    public function orderlist(){
        $osas = \Auth::user()->ordenes_de_servicio;
        $data =[];
        $i=0;
        foreach ($osas as $key => $value) {
            if ($value->orden_de_trabajo->id_estado==1) {
            	$order = $value->orden_de_trabajo;
            	$paciente = $order->paciente;
            	$service = $value->servicio;
                $data['data'][$i]['img']='<div class="symbol symbol-50 symbol-light mt-1">
                                <span class="symbol-label">
                                    <img src="/media/svg/avatars/001-boy.svg" class="h-75 align-self-end" alt="">
                                </span>
                            </div>';
                $data['data'][$i]['ot'] = $order->id ;
                $data['data'][$i]['osa'] = $value->id ;
                $data['data'][$i]['patient'] = '<a href="/Paciente/'.$paciente->id.'">'.$paciente->name.' ('.$paciente->identificacion.')</a>';
                $data['data'][$i]['activity'] = $service->tag;
                $data['data'][$i]['valid_to'] = $order->valida_hasta;
                $data['data'][$i]['direccion'] =$paciente->direccion($paciente->id);
                $data['data'][$i]['barrio'] =$paciente->barrio->nombre;
                $data['data'][$i]['telefono'] =$paciente->telefono.' - '.$paciente->celular;
                $data['data'][$i]['assign'] = $value->cantidad_actividades; 
                $data['data'][$i]['doit'] = $value->actividades_realizadas;

                
                $data['data'][$i]['action2'] =(count($value->observations)>0) ?  '<div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1 pulse pulse-danger" data-toggle="modal" data-target="#agendaServiceObservation" id="chargeObservations" data-osa="'.$value->id.'" mr-1 pulse pulse-danger">
                       <i class="flaticon-chat"></i>
                        <span class="pulse-ring"></span>

                    </div>' : '';   
                /*    
                $data['data'][$i]['action2'] = '<a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon-primary" data-toggle="modal" data-target="#agendaServiceObservation" id="chargeObservations" data-osa="'.$value->id.'">
                    <i class="flaticon-chat"></i>
                </a>'¨*/
                $data['data'][$i]['action']='<div class="dropdown dropdown-inline" data-toggle="tooltip" title="" data-placement="left" data-original-title="Quick actions">
                <a href="#" class="btn btn-clean btn-hover-light-info btn-sm btn-icon-info" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="ki ki-bold-more-ver"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-md dropdown-menu-right" style="">
                    <!--begin::Navigation-->
<ul class="navi navi-hover py-5">
    <li class="navi-item">
        <a href="#" id="VFail" class="navi-link" data-toggle="modal" data-target="#VfailModal" data-order="'.$order->id.'" data-patient="'.$paciente->id.'">
            <span class="navi-icon"><i class="flaticon2-drop"></i></span>
            <span class="navi-text">Visita Fallida</span>
        </a>
    </li>
    
    <li class="navi-item">
        <a href="#" id="PrfNtf" class="navi-link" data-toggle="modal" data-target="#PrfNtfModal" data-order="'.$order->id.'" data-patient="'.$paciente->id.'">
            <span class="navi-icon"><i class="flaticon2-bell-2"></i></span>
            <span class="navi-text">Notificacion</span>
        </a>
    </li>
    <li class="navi-item">
        <a href="#"  class="navi-link uploadCertificado" data-toggle="modal" data-target="#ChargeSignature" data-order="'.$order->id.'" data-osa="'.$value->id.'">
            <span class="navi-icon"><i class="flaticon2-gear"></i></span>
            <span class="navi-text">Cargar Firmas</span>
        </a>
    </li>

    
</ul>
<!--end::Navigation-->
                </div>
            </div>';
                $i++;
            }
        }

        return json_encode($data);
    }

}
