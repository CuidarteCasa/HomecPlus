<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class General_InsumoGeneral extends Model
{
    //
    protected $table='general_insumogeneral';

    public function servicios(){
    	return $this->belongsToMany('App\Model\Homecare_Servicio','homecare_servicio_insumo','id_servicio','id_insumo');
    }

    public function comerciales(){
    	return $this->hasMany('App\Model\General_InsumoComercial','id_generico','id');
    }
}
