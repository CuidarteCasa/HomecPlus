<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RegistroClinico_evo_terapia_fisica extends Model
{
    //
    protected $table="registroclinico_evolucion_terapia_fisica";

    public function paciente(){
    	return $this->hasOne('App\Model\Paciente','id','id_paciente');
    }

    public function profesional(){
    	return $this->hasOne('App\User','id','id_profesional');
    }

    public function patientCall(){
    	return $this->hasOne('\App\Model\Homecare_SPAD_Analista','id','id_actividad_servicio');
    }
}
