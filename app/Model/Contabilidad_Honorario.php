<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Contabilidad_Honorario extends Model
{
    protected $table='contabilidad_honorario';

    public function servicio(){
    	return $this->hasOne('App\Model\Homecare_Servicio','id','id_servicio');
    }

    public function payment_type(){
    	return $this->hasOne('App\Model\Contabilidad_TipoHonorario','id','id_tipohonorario');
    }

     public function honorario(){
    	return $this->belongsTo('\App\Model\Contabilidad_Honorario','id_honorario','id');
    }

    public function orden_de_trabajo(){
    	return $this->belongsTo('App\Model\Homecare_Ordendetrabajo','id_ot','id');
    }

    public function orden_de_servicio(){
    	return $this->belongsTo('App\Model\Homecare_Ordendeservicio','id_osa','id');
    }	
    
}
