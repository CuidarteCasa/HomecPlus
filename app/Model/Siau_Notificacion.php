<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Siau_Notificacion extends Model
{
    //
    protected $table="siau_notificacion";

    public function paciente(){
    	return $this->hasOne('App\Model\Paciente','id','id_paciente');
    }

    public function tipo(){
    	return $this->hasOne('App\Model\Siau_Tipo_Notificacion_Adm','id','id_tipo_notificacion');
    }

    public function tipo_des(){
        return $this->hasOne('App\Model\Siau_Tipo_Notificacion_Adm_des','id','id_tipo_notificacion_des');
    }

    public function creador(){
    	return $this->hasOne('App\User','id','created_by');
    }
    
}
