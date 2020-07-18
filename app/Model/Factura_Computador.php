<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Factura_Computador extends Model
{
    //
    protected $table = 'facturas_computador';

    public function orden_de_trabajo(){
    	return $this->BelongsTo('App\Model\OrdendeTrabajo','id_ot','id');
    }

    public function conceptos_cobro(){
    	return $this->hasMany('App\Model\Factura_Conceptoscobro','id_factura','id');
    }

    public function servicios_prestados(){
    	return $this->hasMany('App\Model\Factura_servicio','id_factura','id');
    }

    public function nota_credito(){
        return $this->hasOne('App\Model\Contabilidad_Notacredito','id_factura','id');
    }

    public function creada_por(){
        return $this->hasOne('App\User','id','created_by');
    }
}
