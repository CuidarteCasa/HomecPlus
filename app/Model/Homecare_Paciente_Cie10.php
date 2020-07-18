<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Homecare_Paciente_Cie10 extends Model
{
    //
    protected $table = 'homecare_paciente_cie10';

    function cie(){
    	return $this->hasOne('App\Model\Cie10','id','id_cie10');
    }

    public function history(){
    	return $this->hasMany('\App\Model\Homecare_Paciente_Cie10_Records','id_paciente_cie','id');
    }
}
