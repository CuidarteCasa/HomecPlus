<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Kardex_Insumo extends Model
{
    //
    protected $table='kardex_insumo';

    public function insumo_comercial(){
    	return $this->belongsTo('App\Model\General_InsumoComercial','id_insumo_comercial','id');
    }

   
}
