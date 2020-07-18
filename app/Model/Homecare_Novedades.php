<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Homecare_Novedades extends Model
{
    //
    protected $table = 'homecare_novedades';

    public function tipo_novedad(){
    	return $this->hasOne('\App\Model\Siau_Tipo_Notificacion_Adm','id','id_tipo_novedad');
    }

    public function user(){
    	return $this->hasOne('App\User','id','id_user_notify');
    }
}
