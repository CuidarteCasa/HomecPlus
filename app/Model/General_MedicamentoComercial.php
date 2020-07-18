<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class General_MedicamentoComercial extends Model
{
    //
    protected $table='general_medicamentocomercial';

    public function medicamento_generico(){
    	return $this->belongsTo('App\Model\General_MedicamentoGenerico','id_generico','id');
    }

    public function kardex(){
    	return $this->hasMany('App\Model\kardex_Medicamento','id_medicamento_comercial','id');
    }
    
}