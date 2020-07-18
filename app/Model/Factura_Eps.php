<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Factura_Eps extends Model
{
    //
    protected $table = 'facturas_eps';

    public function ordendetrabajo(){
    	return $this->hasOne('App\Model\Homecare_Ordendetrabajo','id','id_ot');
    }

    public function orden_de_trabajo(){
        return $this->hasOne('App\Model\Homecare_Ordendetrabajo','id','id_ot');
    }

    public function creada_por(){
        return $this->hasOne('App\User','id','created_by');
    }

     public function nota_credito(){
        return $this->hasOne('App\Model\Contabilidad_Notacredito_FS','id_factura','id');
    }

    public function conceptos_cobro(){
        return $this->hasMany('App\Model\Factura_Eps_Conceptosdecobro','id_factura','id');
    }

    
}
