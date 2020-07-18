<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Almacen_OrdendeCompra extends Model
{
    //
    protected $table = 'almacen_ordendecompra';

    public function proveedor(){
    		return $this->hasOne('App\Model\General_Tercero_Proveedor','id','id_proveedor');
    }

    public function items_insumo(){
    	return $this->hasMany('App\Model\Almacen_OrdendeCompra_Insumo','id_ordendecompra','id');
    }

    public function items_medicamentos(){
        return $this->hasMany('App\Model\Almacen_OrdendeCompra_Medicamento','id_ordendecompra','id');
    }

    public function creada_por(){
        return $this->hasOne('App\User','id','created_by');
    }

    public function remisiones(){
        return $this->hasMany('App\Model\Almacen_Remision','id_ordendecompra','id');
    }
}
