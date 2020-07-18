<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Homecare_Paciente_Agudo extends Model
{
    //
    protected $table = 'homecare_paciente_agudo';

    public function status(){
    	return $this->hasOne('App\Model\General_Estado_Agudo','id','id_estado');
    }

    public function medico(){
    	return $this->hasOne('App\User','id','id_medico');
    }

    public function paciente(){
    	return $this->hasOne('App\Model\Paciente','id','id_paciente');
    }

    public function order(){
    	return $this->HasOne('App\Model\Homecare_Ordendetrabajo','id','id_ot');
    }
}
