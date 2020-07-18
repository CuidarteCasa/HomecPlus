<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Almacen_SolicitudEquipo extends Model
{
    //
    protected $table = 'almacen_solicitudequipo';

    

    public function creador(){
    	return $this->hasOne('App\User','id','created_by');
    }

    public function tipodeequipo(){
    	return $this->hasOne('App\Model\General_TipoEquipo','id','id_tipoequipo');
    }

    public function ordendetrabajo(){
    	return $this->hasOne('App\Model\Homecare_OrdendeTrabajo','id','id_ordendetrabajo');
    }
}
