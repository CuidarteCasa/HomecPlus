<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Homecare_alert_orden_de_trabajo extends Model
{
    //
    protected $table="homecare_alert_orden_de_trabajo";

    public function alert_tipo(){
    	return $this->hasOne('App\Model\General_alert','id','id_alerta');
    }

    public function profesional(){
        return $this->hasOne('App\User','id','created_by');
    }

    public function orden_de_trabajo(){
    	
    	return $this->belongsTo('App\Model\Homecare_Ordendetrabajo','id_ot','id');
    }
}
