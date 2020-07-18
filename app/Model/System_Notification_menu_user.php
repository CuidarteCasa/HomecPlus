<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class System_Notification_menu_user extends Model
{
    //
    protected $table = 'system_notification_menu_user';

    public function notification(){
    	return $this->hasOne('App\Model\System_Notification_Menu','id','id_notificacion_menu');
    }
}
