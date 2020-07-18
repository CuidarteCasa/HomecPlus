<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Cie10 extends Model
{
    //
    protected $table="cie10";

    public function paciente(){
		return $this->belongsToMany('App\Model\Paciente','homecare_pacientecie10','id_cie10','id_paciente');
	}
}
