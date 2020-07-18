<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Homecare_Paciente_Complementario extends Model
{
    //
    protected $table = 'homecare_paciente_complementario';

    public function complementario(){
    	return $this->hasOne('\App\Model\General_Complementario_vm','id','id_complementario');
    }
}
