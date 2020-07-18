<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Homecare_Paciente_Nutricion extends Model
{
    //
    protected $table = 'homecare_paciente_nutricion';

    public function nutricion(){
    	return $this->hasOne('\App\Model\General_Nutricion_vm','id','id_nutricion');
    }
}
