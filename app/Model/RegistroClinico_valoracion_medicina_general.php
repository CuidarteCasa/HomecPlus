<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RegistroClinico_valoracion_medicina_general extends Model
{
    //
    protected $table='RegistroClinico_valoracion_medicina_general';

    
    public function medico(){
    	return $this->hasOne('App\User','id','id_profesional');
    }
}
