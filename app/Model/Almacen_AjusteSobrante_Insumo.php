<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Almacen_AjusteSobrante_Insumo extends Model
{
    //
    protected $table = 'almacen_ajusteporsobrante_insumo';

    public function insumo_en_kardex(){
    	return $this->hasOne('App\Model\Kardex_Insumo','id','id_kardex');
    }
}
