<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class General_InsumoComercial extends Model
{
    //
    protected $table='general_insumocomercial';

    public function kardex(){
    	return $this->hasMany('App\Model\Kardex_Insumo','id_insumo_comercial','id');
    }

    public function insumo_general(){
    	return $this->belongsTo('App\Model\General_InsumoGeneral','id_generico','id');
    }
}
