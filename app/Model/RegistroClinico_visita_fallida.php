<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RegistroClinico_visita_fallida extends Model
{
    //
    protected $table = 'registroclinico_visita_fallida';

    public function user(){
    	return $this->hasOne('App\User','id','id_profesional');
    }

    public function type(){
    	return $this->hasOne('App\Model\General_Motivo_Vfail','id','id_type');
    }
}
