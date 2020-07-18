<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Homecare_Ordendetrabajo extends Model
{
    //
    protected $table="homecare_orden_de_trabajo";

    public function activatefeeby(){
      return $this->hasOne('App\User','id','activateforfee_by');
    }

    public function ordenes_de_servicio(){
    	return $this->hasMany('App\Model\Homecare_Ordendeservicio','id_orden_trabajo','id');
    }

    public function paquete(){
    	return $this->belongsTo('App\Model\Homecare_Paquete','id_paquete','id');
    }
    
    public function paciente(){
    	return $this->belongsTo('App\Model\Paciente','id_paciente','id');
    }

    public function alertas(){
        return $this->hasMany('App\Model\Homecare_alert_orden_de_trabajo','id_ot','id');
    }

    public function orden_medica_original(){
        return $this->hasOne('App\Model\RegistroClinico_orden_medica','id_orden_trabajo','id');
    }

    public function hijas(){
        return $this->belongsToMany('App\Model\Homecare_Ordendetrabajo','homecare_dependencia_ordenes_de_trabajo','id_ot_madre','id_ot_hijo');
    }

    public function madre(){
        return $this->belongsToMany('App\Model\Homecare_Ordendetrabajo','homecare_dependencia_ordenes_de_trabajo','id_ot_hijo','id_ot_madre');
    }

    public function salida_almacen(){
        //return $this->hasOne('App\Model\Almacen_SalidaAlmacen','id','id_ot');
        return $this->hasMany('App\Model\Almacen_SalidaAlmacen','id_ot','id');
    }

   public function consumo_despacho(){
    return $this->hasMany('App\Model\Almacen_Consumodedespacho','id_ordendetrabajo','id');
   }

   public function clinicregisters_uploaded(){
    return $this->hasMany('\App\Model\RegistroClinico_Upload_Registers','id_ordendetrabajo','id');
   }

   public function despachos(){
    return $this->hasMany('App\Model\Almacen_Despacho','id_order','id');
   }

   public function attachedDoc(){
    return $this->hasMany('App\Model\RegistroClinico_Anexo','id_orden_trabajo','id');
   }

   public Function factura(){
    return $this->belongsTo('App\Model\Factura_Eps','id','id_ot');
   }

   public function allFact(){
    return $this->hasMany('App\Model\Factura_Eps','id_ot','id');
   }

   public function evolucion_fisica(){
    return $this->hasMany('\App\Model\RegistroClinico_evo_terapia_fisica','id_orden_trabajo','id');
   }

   public function alerts(){
    return $this->hasMany('\App\Model\Homecare_Ordendetrabajo_alerts','id_order','id');
   }
    

}
