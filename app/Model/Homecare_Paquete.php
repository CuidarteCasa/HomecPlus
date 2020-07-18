<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Homecare_Paquete extends Model
{
    //
    protected $table="homecare_paquete";

   public function servicios(){
   	return $this->belongsToMany('App\Model\Homecare_Servicio','homecare_paquete_servicio','paquete_id','servicio_id');
   }

  public function manuales_tarifarios(){
   	return $this->belongsToMany('App\Model\General_manual_tarifario','general_manual_tarifario_paquete','id_paquete','id_manual');
   }

   public function tercero_contratante(){
    	return $this->belongsTo('App\Model\General_Terceros_contratantes','id_tercero_contratante','id');
    }

   public function canasta_insumos(){
      return $this->hasMany('App\Model\Homecare_Paquete_Servicio_Insumo','id_paquete','id');
   } 

   public function programa(){
    return $this->belongsTo('App\Model\Admision_Programas','id_programa','id');
   }

   public function valor($paquete,$fecha_atencion){
      /*$manuales_tarifarios = \App\Model\General_Manual_Tarifario::where('valido_desde','<=',$fecha_atencion)->where('valido_hasta','>=',$fecha_atencion)->get();
      dd($manuales_tarifarios);*/
        $valor = \App\Model\General_Manual_Tarifario_Paquete::where('id_paquete',$paquete)->get(['pvt']);
        return $valor[0]->pvt;
        
   }

   public function valorActual($fecha_atencion,$eps,$paquete){
    $manuales_tarifario = \App\Model\General_Manual_Tarifario::where('id_tercero',$eps)->where('valido_desde','<=',$fecha_atencion)->where('valido_hasta','>=',$fecha_atencion)->get();
      
    $valor = $manuales_tarifario[0]->paquetes->where('id_paquete',$paquete)->first();

    return $valor->pvt;
   }


  
   
}
