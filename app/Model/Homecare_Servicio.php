<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Homecare_Servicio_Insumo;

class Homecare_Servicio extends Model
{
    //
	protected $table="homecare_servicio";

    public function paquetes(){
    	return $this->belongsToMany('App\Model\Homecare_Paquete','homecare_paquete_servicio','paquete_id','servicio_id');
    }

    public function formatos(){
    	return $this->hasOne('App\Model\RegistroClinico_formato_pedido_servicio','id','id_formato_pedido_servicio');
    }

    public function perfil_realiza(){
    	return $this->hasOne('App\Model\General_Perfil','id','id_perfil_realiza');
    }

    public function master_register(){
        return $this->hasMany('App\Model\RegistroClinico_registrosclinicos_servicios','id_servicio','id');
    }

    
}
