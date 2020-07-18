<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class General_Manual_Tarifario extends Model
{
    //
    protected $table='general_manual_tarifario';

   public function paquetes(){
   	return $this->hasMany('App\Model\General_Manual_Tarifario_Paquete','id_manual','id');
   }

   public function medicamentos(){
   	return $this->hasMany('App\Model\General_Manual_Tarifario_Medicamento','id_manual','id');
   }

   

   public function contrato(){
   	return $this->belongsTo('App\Model\General_Contrato','id_contrato','id');
   }
}
