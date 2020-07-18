<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class General_Barrio extends Model
{
    //
    protected $table="general_barrios_veredas";

    public function zona(){
    	return $this->hasOne('App\Model\General_Zonas','id','id_zona_clinica');
    }

    public function municipio(){
    	return $this->belongsTo('App\Model\General_Municipio','id_municipio','id');
    }
}
