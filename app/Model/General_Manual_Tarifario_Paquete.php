<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class General_Manual_Tarifario_Paquete extends Model
{
    //
    protected $table='general_manual_tarifario_paquete';

    public function paquete(){
    	return $this->hasOne('App\Model\Homecare_Paquete','id','id_paquete');
    }
}
