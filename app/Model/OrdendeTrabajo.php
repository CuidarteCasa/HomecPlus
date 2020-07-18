<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OrdendeTrabajo extends Model
{
    //
    protected $table='ordendetrabajos';

   

    public function paciente(){
    	return $this->hasOne('App\Model\Paciente','id','id_paciente');
    }

    public function paquete(){
    	return $this->belongsTo('App\Model\Homecare_Paquete','id_servicio','id');
    }

    
}
