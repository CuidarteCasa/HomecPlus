<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Homecare_Paciente_Covid_Ruta extends Model
{
    //
    protected $table = 'homecare_paciente_covid_ruta';

    public function paciente(){
    	return $this->hasOne('App\Model\Paciente','id','id_paciente');
    }
}
