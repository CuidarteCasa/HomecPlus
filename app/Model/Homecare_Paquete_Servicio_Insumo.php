<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Homecare_Paquete_Servicio_Insumo extends Model
{
    //
    protected $table='homecare_paquete_servicio_insumo';

    public function servicio(){
    	return $this->hasOne('App\Model\Homecare_Servicio','id','id_servicio');
    }

    public function insumo(){
    	return $this->hasOne('App\Model\General_InsumoGeneral','id','id_insumo');
    }	

}
