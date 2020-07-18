<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class System_Turnos extends Model
{
    //
    protected $table = 'system_turnos';

    public function creado_por(){
    	return $this->hasOne('App\User','id','created_by');
    }
}
