<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class General_Tercero_Proveedor extends Model
{
    //

	protected $table='general_tercero_proveedor';

    public function insumos(){
    	return $this->hasMany('App\Model\General_Tercero_Proveedor_Insumo','id_proveedor','id');
    }

    public function medicamento(){
    	return $this->hasMany('App\Model\General_Tercero_Proveedor_Medicamento','id_proveedor','id');
    }

    public function tipoequipo(){
    	return $this->hasMany('App\Model\General_Tercero_Proveedor_TipoEquipo','id_proveedor','id');
    }
}
