<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RegistroClinico_evolucion_medica extends Model
{
    protected $table = 'registroclinico_evolucion_medica';

    public function medico(){
    	return $this->hasOne('App\User','id','id_profesional');
    }
}
