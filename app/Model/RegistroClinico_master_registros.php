<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RegistroClinico_master_registros extends Model
{
    //
    protected $table="registroclinico_master_registros";

    public function actividades(){
    	return $this->belongsToMany('App\Model\homecare_actividades_orden_de_servicio','registroclinico_actividades_registroclinico','id_registroclinico_master','id_actividad');
    }
}
