<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Homecare_Paciente_Cie10_Records extends Model
{
    //
    protected $table = 'homecare_paciente_cie10_records';

    public function medico(){
    	return $this->hasOne('\App\User','id','action_by');
    }
}
