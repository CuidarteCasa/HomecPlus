<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Homecare_Actividades_Ordendeservicio extends Model
{
    //
    protected $table="homecare_actividades_orden_de_servicio";

    

    public function orden_de_servicio(){
    	return $this->hasOne('App\Model\Homecare_Ordendeservicio','id','id_orden_de_servicio');
    }

    public function profesional(){
    	return $this->hasOne('App\User','id','realizada_by');
    }

   public function registros_clinicos(){
   	return $this->belongsToMany('App\Model\RegistroClinico_master_registros','registroclinico_actividades_registroclinico','id_actividad','id_registroclinico_master');
   }

   public function consumo($id_actividad){
     return  \App\Model\Almacen_Consumodedespacho::where('id_actividad',$id_actividad)->get();
   }

   public function honorario(){
    return $this->hasOne('\App\Model\Contabilidad_User_Honorario','id','id_actividad');
   }

    public function auditada_clinica(){
             return $this->hasOne('App\User','id','auditedby');
    }

    public function auditada_facturacion(){
             return $this->hasOne('App\User','id','auditedbyfact');
    }


}
