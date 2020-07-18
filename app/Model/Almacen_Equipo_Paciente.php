<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Almacen_Equipo_Paciente extends Model
{
    //
    protected $table = 'almacen_equipo_paciente';

    public function equipo(){
    	return $this->hasOne('App\Model\General_Equipo','id','id_equipo');
    }

    public function solicitud(){
    	return $this->hasOne('App\Model\Almacen_SolicitudEquipo','id','id_solicitud');
    }

}
