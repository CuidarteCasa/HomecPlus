<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Almacen_Traslado_Insumo extends Model
{
    //
    protected $table = 'almacen_traslado_insumo';

    public function insumo(){
    	return $this->hasOne('App\Model\Kardex_Insumo','id','id_kardex_insumo');
    }
}
