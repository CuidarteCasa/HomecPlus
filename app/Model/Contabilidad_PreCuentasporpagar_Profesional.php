<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Contabilidad_PreCuentasporpagar_Profesional extends Model
{
    //
    protected $table='contabilidad_precuentaporpagar_profesional';

    public function user_honorario(){
    	return $this->belongsToMany('App\Model\Contabilidad_User_Honorario','contabilidad_precuentaporpagar_profesional_conceptos','id_precuentaporpagar_profesional','id_user_honorario');
    }
}
