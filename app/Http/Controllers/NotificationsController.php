<?php

namespace App\Http\Controllers;

use Request;
use \App\Model\System_Notification_menu_user;
use \App\Model\Paciente;
use \App\User;
use \App\Notifications\PriorityService;
use \App\Notifications\ExternalProfesional;
use \App\Notifications\Medical;
use \App\Notifications\Audit;
use Carbon\Carbon;
class NotificationsController extends Controller
{
    //

    public static function PatientUserNotifications(){
    	foreach (\Auth::user()->unreadNotifications->where('type','App\Notifications\PriorityService') as $ntf) {
    		
    		$days =Carbon::parse($ntf->created_at)->diffInDays(Carbon::now());
    		echo '<a data-url="'.$ntf->data['url'].'" data-id = "'.$ntf->id.'" style="cursor:pointer;" class="navi-item gotoNtf">
                <div class="navi-link">
                     <div class="navi-icon mr-2">
                        <i class="flaticon2-paper-plane text-danger"></i>
                    </div>
                    <div class="navi-text">
                        <div class="font-weight-bold">
                            '.$ntf->data['notificacion'].'
                        </div>
                        <div class="text-muted">
                           Hace '.$days.' dias
                        </div>
                    </div>
                </div>
            </a>';
    		 
    	}
    }

    public static function PriorityServiceFunction($serviceName,$paciente){
    		

    			$users = System_Notification_menu_user::where('id_notificacion_menu',13)->get();
    			
    			$pcte = Paciente::find($paciente);
    			$datanotificacion=[
    				'notificacion'=>'El medico '.\Auth::user()->name.' he enviado al paciente '.$pcte->name.' un '.$serviceName,
    				'url'=>'/Paciente/'.$paciente
    			];	
    			foreach ($users as $key => $value) 
    			{
              		$usr = User::find($value->id_user);
              		$usr->notify(new PriorityService($datanotificacion));
    			}				 
    			
    			
    			
    		
    }

    public function asReadNtf(){
    	try{
    		$id = Request::input('id');
	    	$notification = \Auth::user()->notifications()->find($id);
	    	if($notification) {
	    		$notification->markAsRead();
	    	}
    	}catch(\Illuminate\Database\QueryException $ex) {
                
                return response()->json([
                    'message'=>'Error en la base de datos',
                    'error' => $ex->getMessage()
                ],400);
    	
    				}
		}



     public static function ExternalMedNotification($paciente){
           $users = System_Notification_menu_user::where('id_notificacion_menu',13)->get();
                
                $pcte = Paciente::find($paciente);
                $datanotificacion=[
          'notificacion'=>'El profesional  '.\Auth::user()->name.' Reporta una novedad en la atencion  el dia '. date("Y-m-d"),
          'url'=>'/Paciente/'.$paciente
        ]; 
                foreach ($users as $key => $value) 
                {
                    $usr = User::find($value->id_user);
                    $usr->notify(new ExternalProfesional($datanotificacion));
                }   

     }   

     //AUDITORIA DE SERVICIOS

     public static function RejectActivityFunction($user,$activity,$paciente){

         $datanotificacion=[
          'notificacion'=>'Se le ha devuelto la actividad '.$activity.' el dia '. date("Y-m-d"),
          'url'=>'/Paciente/'.$paciente
        ];    
         $usr = User::find($user);
         $usr->notify(new Audit($datanotificacion));
     }

      public static function RegistersUserNotifications(){
      foreach (\Auth::user()->unreadNotifications->where('type','App\Notifications\Audit') as $ntf) {
        
        $days =Carbon::parse($ntf->created_at)->diffInDays(Carbon::now());
        echo '<a data-url="'.$ntf->data['url'].'" data-id = "'.$ntf->id.'" style="cursor:pointer;" class="navi-item gotoNtf">
                <div class="navi-link">
                     <div class="navi-icon mr-2">
                        <i class="flaticon2-paper-plane text-danger"></i>
                    </div>
                    <div class="navi-text">
                        <div class="font-weight-bold">
                            '.$ntf->data['notificacion'].'
                        </div>
                        <div class="text-muted">
                           Hace '.$days.' dias
                        </div>
                    </div>
                </div>
            </a>';
         
      }
    }

     //FIN DE SERVICIOS

    //NOTIFICACIONES DE INTERCONSULTAS
    public static function  IntercolsultationNotification($paciente,$order){

                $user_notify = \App\Model\System_Notification_menu_user::all()->where('id_notificacion_menu',2);

                $pcte = Paciente::find($paciente);
                    
                $datanotificacion=[
                  'notificacion'=>'El medico '.\Auth::user()->name.' he enviado al paciente '.$pcte->name.' a interconsulta el dia '.date("Y-m-d"),
                  'url'=>'/OrdendeTrabajo/'.$order
              ];
              foreach ($user_notify as $usertonotify) {

                $user = \App\User::find($usertonotify->id_user);
                $user->notify(new Medical($datanotificacion));
                
            }
    }
    //FIN INTERCOSULTAS
}
