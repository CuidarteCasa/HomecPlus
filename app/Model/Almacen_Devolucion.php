<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Almacen_Devolucion extends Model
{
    //
    protected $table = 'almacen_devoluciones';

    public function insumos(){
    	return $this->hasMany('App\Model\Almacen_Devolucion_Insumo','id_devolucion','id');
    }

    public function medicamentos(){
    	return $this->hasMany('App\Model\Almacen_Devolucion_Medicamento','id_devolucion','id');
    }

    public function ordendetrabajo(){
    	return $this->belongsTo('App\Model\Homecare_Ordendetrabajo','id_orden','id');
    }
}
