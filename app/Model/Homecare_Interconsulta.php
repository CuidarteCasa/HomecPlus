<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Homecare_Interconsulta extends Model
{
    //
    protected $table = 'homecare_interconsulta';

    public function paciente(){
    	return $this->hasOne('App\Model\Paciente','id','id_paciente');
    }
}
