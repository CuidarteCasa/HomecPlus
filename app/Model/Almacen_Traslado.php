<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Almacen_Traslado extends Model
{
    //
    protected $table ='almacen_traslado';

    public function insumo(){
    	return $this->hasMany('App\Model\Almacen_Traslado_Insumo','id_traslado','id');	
    }
    public function medicamento(){
         return $this->hasMany('App\Model\Almacen_Traslado_Medicamento','id_traslado','id');   
    }

    public function almacen_origen(){
    	return	$this->hasOne('\App\Model\Almacen_Ubicaciones','id','id_almacen_origen');
    }

    public function almacen_destino(){
    	return	$this->hasOne('\App\Model\Almacen_Ubicaciones','id','id_almacen_destino');	
    }


}
