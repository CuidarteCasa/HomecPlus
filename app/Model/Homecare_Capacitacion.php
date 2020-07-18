<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Homecare_Capacitacion extends Model
{
    //
    protected $table='homecare_capacitacion';

    
    public function profile(){
    	return $this->belongsToMany('App\Model\General_Perfil','homecare_perfil_capacitacion','id_capacitacion','id_perfil');
    }

    
}
