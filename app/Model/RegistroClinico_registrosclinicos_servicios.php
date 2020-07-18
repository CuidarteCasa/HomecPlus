<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RegistroClinico_registrosclinicos_servicios extends Model
{
    //
    protected $table="registroclinico_registrosclinicos_servicio";

    public function registroclinico(){
    	return $this->hasOne('App\Model\RegistroClinico_master_registros','id','id_master_registros');
    }

}
