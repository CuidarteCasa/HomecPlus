<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class General_Tercero_Proveedor_TipoEquipo extends Model
{
    //
    protected $table = 'general_tercero_proveedor_tipoequipo';

    public function tipoequipo(){
    	return $this->hasOne('App\Model\General_TipoEquipo','id','id_tipoequipo');
    }

    public function proveedor(){
    	return $this->hasOne('App\Model\General_Tercero_Proveedor','id','id_proveedor');
    }
}
