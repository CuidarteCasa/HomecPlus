<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Almacen_CInterno extends Model
{
    //
    protected $table = "almacen_consumo_interno";


    public function user(){
        return $this->hasOne('\App\User','id','id_user');
    }

    public function almacen_origen(){
    	return	$this->hasOne('\App\Model\Almacen_Ubicaciones','id','id_almacen_origen');
    }

    public function insumo(){
    	return $this->hasMany('App\Model\Almacen_CInterno_Insumo','id_consinterno','id');	
    }
    public function medicamento(){
         return $this->hasMany('App\Model\Almacen_CInterno_Medicamento','id_consinterno','id');   
    }
}
