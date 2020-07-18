<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Homecare_Paciente_Antecedentes extends Model
{
    //
    protected $table = 'homecare_paciente_antecendetes';

    public function medico(){
    	return $this->hasOne('App\User','id','id_user');
    }
}
