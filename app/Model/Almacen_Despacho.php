<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Almacen_Despacho extends Model
{
    //
    protected $table='almacen_despachos';

    public function insumos(){
    	return $this->hasMany('App\Model\Almacen_DespachoInsumo','id_despacho','id');
    }

    public function salida(){
    	return $this->belongsTo('App\Model\Almacen_SalidaAlmacen','id_salida','id');
    }

    public function medicamentos(){
    	return $this->hasMany('App\Model\Almacen_DespachoMedicamento','id_despacho','id');
    }

    public function user(){
        return $this->hasOne('App\User','id','created_by');
    }
    
}
