<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class General_Municipio extends Model
{
    //
    protected $table="general_municipios";

    public function barrios(){
    	return $this->hasMany('App\Model\General_Barrio','id_municipio','id')->orderBy('nombre','asc');
    }

    public function departamento(){
    	return $this->belongsTo('App\Model\General_Departamento','id_departamento','id');
    }
}
