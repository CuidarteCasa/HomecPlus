<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RegistroClinico_orden_medica extends Model
{
    //
    protected $table='registroclinico_orden_medica';

    public function paquetes(){
    	return $this->belongsToMany('App\Model\Homecare_Paquete','registroclinico_orden_medica_paquete','id_orden_medica','id_paquete');
    }

    public function servicios(){
    	return $this->belongsToMany('App\Model\Homecare_Servicio','registroclinico_orden_medica_paquete_servicios','id_orden_medica','id_servicio');
    }	
    
}
