<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Contabilidad_User_Honorario extends Model
{
    protected $table='contabilidad_user_honorario';

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
