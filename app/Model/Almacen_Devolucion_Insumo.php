<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Almacen_Devolucion_Insumo extends Model
{
    //
    protected $table = 'almacen_devoluciones_insumos';

    public function insumo(){
    	return $this->hasOne('App\Model\Kardex_Insumo','id','id_kardex');
    }
}
