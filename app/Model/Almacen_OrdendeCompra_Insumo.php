<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Almacen_OrdendeCompra_Insumo extends Model
{
    //
    protected $table = 'almacen_ordendecompra_insumo';

    public function insumo(){
    	return $this->hasOne('App\Model\General_InsumoComercial','id','id_insumo');
    }
}
