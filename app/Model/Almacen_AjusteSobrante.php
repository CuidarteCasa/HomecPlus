<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Almacen_AjusteSobrante extends Model
{
    //
    protected $table = 'almacen_ajusteporsobrante';

    public function insumos(){
    	return $this->hasMany('\App\Model\Almacen_AjusteSobrante_Insumo','id_ajuste','id');
    }

    public function medicamentos(){
    	return $this->hasMany('\App\Model\Almacen_AjusteSobrante_Medicamento','id_ajuste','id');
    }
}
