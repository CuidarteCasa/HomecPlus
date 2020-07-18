<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RegistroClinico_valoracion_especialista_geriatria extends Model
{
    //
    protected $table = 'registroclinico_valoracion_geriatria';

    
    public function medico(){
    	return $this->hasOne('App\User','id','id_profesional');
    }
}
