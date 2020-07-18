<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Almacen_SalidaAlmacen extends Model
{
    //
    protected $table='almacen_salida';

    public function orden_de_trabajo(){
    	return $this->belongsTo('App\Model\Homecare_Ordendetrabajo','id_ot','id');
    }

    public function user(){
    	return $this->hasOne('App\User','id','created_by');
    }

    public function items_insumo(){
    	return $this->hasMany('App\Model\Almacen_SalidaAlmacenInsumos','id_salida','id');
    }

    public function items_medicamentos(){
        return $this->hasMany('App\Model\Almacen_SalidaAlmacenMedicamento','id_salida','id');
    }

    public function despachos(){
        return $this->hasMany('App\Model\Almacen_Despacho','id_salida','id');
    }

    public function estado_salida(){
        return $this->hasOne('App\Model\Almacen_Estadosalida','id','estado');
    }
}
