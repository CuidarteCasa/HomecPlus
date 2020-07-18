<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RegistroClinico_escala_de_barthel extends Model
{
    //
    protected $table='registroclinico_escala_de_barthel';

    public function paciente(){
    	return $this->hasOne('App\Model\Paciente','id','id_paciente');
    }

    public function profesional(){
    	return $this->hasOne('App\User','id','id_profesional');
    }
}
