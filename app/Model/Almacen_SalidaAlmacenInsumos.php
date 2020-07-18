<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Almacen_SalidaAlmacenInsumos extends Model
{
    //
    protected $table='almacen_salida_insumo';

    public function insumo(){
    	return $this->hasOne('App\Model\General_InsumoGeneral','id','id_insumo_generico');
    }

    public function service(){
    	return $this->hasOne('App\Model\Homecare_Servicio','id','id_servicio');
    }
}
