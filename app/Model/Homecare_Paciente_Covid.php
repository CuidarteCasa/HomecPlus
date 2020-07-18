<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Homecare_Paciente_Covid extends Model
{
    //
    protected $table = 'homecare_paciente_covid';

    public function paciente(){
        return $this->hasOne('\App\Model\Paciente','id','id_paciente');
    }

    public function referidoby(){
        return $this->hasOne('\App\User','id','id_user_refiere');
    }

    public function order(){
    	return $this->hasOne('App\Model\Homecare_Ordendetrabajo','id','id_order');
    }
}
