<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Homecare_StatusChange_History extends Model
{
    //
    protected $table = 'homecare_paciente_statuschange_history';

    public function status(){
    	return $this->hasOne('App\Model\General_estadopaciente','id','id_estado');
    }

     public function user(){
    	return $this->hasOne('App\User','id','created_by');
    }
}
