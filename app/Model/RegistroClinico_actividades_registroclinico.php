<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RegistroClinico_actividades_registroclinico extends Model
{
    //
    protected $table="registroclinico_actividades_registroclinico";

    public function master(){
    	return $this->hasOne('App\Model\RegistroClinico_master_registros','id','id_registroclinico_master');
    }
}
