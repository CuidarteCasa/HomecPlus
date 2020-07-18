<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Almacen_Remision extends Model
{
    //
    protected $table = 'almacen_remision';

    public function insumos(){
    	return $this->hasMany('\App\Model\Almacen_Remision_Insumo','id_remision','id');
    }
     public function medicamentos(){
    	return $this->hasMany('\App\Model\Almacen_Remision_Medicamento','id_remision','id');
    }
}
