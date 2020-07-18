<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Contabilidad_Cuentasporpagar_Profesional extends Model
{
    //
    protected $table = 'contabilidad_cuentaporpagar_profesional';

    public function user_honorario(){
    	return $this->belongsToMany('App\Model\Contabilidad_User_Honorario','contabilidad_cuentaporpagar_profesional_conceptos','id_cuentaporpagar_profesional','id_user_honorario');
    }

    public function profesional(){
    	return $this->hasOne('App\User','id','id_profesional');
    }
}
