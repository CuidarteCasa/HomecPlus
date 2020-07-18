<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Almacen_Consumodedespacho extends Model
{
    //
    protected $table = 'almacen_consumodedespacho';

    public function medicamento_consumido(){
    	return $this->hasOne('App\Model\Kardex_Medicamento','id','id_medicamentokardex');
    }
}
