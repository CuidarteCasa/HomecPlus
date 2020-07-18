<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class General_Contrato extends Model
{
    //
    protected $table='general_contrato';

    public function manuales(){
    	return $this->hasMany('App\Model\General_Manual_Tarifario','id_contrato','id');
    }

    public function tercero_contratante(){
    	return $this->belongsTo('App\Model\General_Terceros_Contratantes','id_tercero','id');
    }
}
