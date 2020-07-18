<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Siau_Encuesta extends Model
{
    //
	protected $table='siau_encuestas';
    public function gestorTakeit(){
    	return $this->HasOne('App\User','id','created_by');
    }

    public function paciente(){
    	return $this->hasOne('App\Model\Paciente','id','id_paciente');
    }
}
