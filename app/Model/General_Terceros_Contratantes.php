<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class General_Terceros_Contratantes extends Model
{
    //
    protected $table="general_terceros_contratantes";

    public function paquetes(){
    	return $this->hasMany('App\Model\Homecare_Paquete','id_tercero_contratante','id')->orderBy('nombre','asc');
    }
    

    public function contrato(){
    	return $this->hasOne('App\Model\General_Contrato','id_tercero','id');
    }

    public function municipio(){
    	return $this->hasOne('App\Model\General_Municipio','id','id_municipio');
    }
}
