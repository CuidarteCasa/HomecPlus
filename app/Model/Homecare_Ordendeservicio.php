<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Homecare_Ordendeservicio extends Model
{
    //
    protected $table="homecare_orden_de_servicio";

    public function anxfirma(){
        return $this->hasOne('App\Model\RegistroClinico_Anexo','id_osa','id');
    }
    
    public function actividades(){
    	return $this->hasMany('App\Model\Homecare_Actividades_Ordendeservicio','id_orden_de_servicio','id');
    }

    public function orden_de_trabajo(){
    	return $this->belongsTo('App\Model\Homecare_Ordendetrabajo','id_orden_trabajo','id');
    }

    public function servicio(){
    	return $this->hasOne('App\Model\Homecare_servicio','id','id_servicio');
    }

    public function profesional(){
        return $this->hasOne('App\User','id','id_profesional_asignado');
    }

    public function auditada_clinica(){
             return $this->hasOne('App\User','id','auditedby');
    }

    public function auditada_facturacion(){
             return $this->hasOne('App\User','id','auditedbyfact');
    }

    public function createdBy(){
        return $this->hasOne('App\User','id','created_by');
    }

    public function ischeck(){
        return $this->hasOne('\App\Model\Contabilidad_Service_Support','id_osa','id');
    }

    public function observations(){
        return $this->hasMany('\App\Model\Homecare_Ordendeservicio_Observations','id_ordendeservicio','id');
    }
    
}
