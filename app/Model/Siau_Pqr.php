<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Siau_Pqr extends Model
{
    //
    protected $table='siau_pqrs';

    public function paciente(){
    	return $this->hasOne('App\Model\Paciente','id','id_paciente');
    }

    public function motivo(){
    	return $this->hasOne('App\Model\Siau_Motivopqr','id','id_motivopqr');
    }


    public function creador(){
    	return $this->hasOne('App\User','id','created_by');
    }

    public function codigotipopqr(){
        return $this->hasOne('App\Model\Siau_Tipopqr','id','tipopqr');
    }

}
