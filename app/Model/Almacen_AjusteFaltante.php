<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Almacen_AjusteFaltante extends Model
{
    //
    protected $table = 'almacen_ajusteporfaltante';

    public function insumos(){
    	return $this->hasMany('\App\Model\Almacen_AjusteFaltante_Insumo','id_ajuste','id');
    }

    public function medicamentos(){
    	return $this->hasMany('\App\Model\Almacen_AjusteFaltante_Medicamento','id_ajuste','id');
    }
}
