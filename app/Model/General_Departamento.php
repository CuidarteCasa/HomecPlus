<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class General_Departamento extends Model
{
    //
    protected $table="general_departamentos";

    public function municipios(){
    	return $this->hasMany('App\Model\General_Municipio','id_departamento','id')->orderBy('nombre','asc');
    }
}
