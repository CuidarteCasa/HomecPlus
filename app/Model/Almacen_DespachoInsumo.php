<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Almacen_DespachoInsumo extends Model
{
    //
    protected $table='almacen_despachos_insumo';

    public function insumo_en_kardex(){
    	return $this->hasOne('App\Model\Kardex_Insumo','id','id_kardexinsumo');
    }
}
