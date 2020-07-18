<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Almacen_CInterno_Insumo extends Model
{
    //
    protected $table = "almacen_consumo_interno_ins";

    public function insumo_en_kardex(){
    	return $this->hasOne('App\Model\Kardex_Insumo','id','id_insumo_kardex');
    }
}
