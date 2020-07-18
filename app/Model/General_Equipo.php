<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class General_Equipo extends Model
{
    //
    protected $table='general_equipos';

    public function tipo_equipo(){
    	return $this->hasOne('\App\Model\General_TipoEquipo','id','id_tipoequipo');
    }

    public function proveedor(){
    	return $this->hasOne('App\Model\General_Tercero_Proveedor','id','id_proveedor');
    }
}
