<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Homecare_Paciente_Medicamento extends Model
{
    //
    protected $table = 'homecare_paciente_medicamentos';

    public function medicamento(){
    	return $this->hasOne('\App\Model\General_Medicamentos_vm','id','id_medicamento');
    }

}
