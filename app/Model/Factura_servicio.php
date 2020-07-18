<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Factura_servicio extends Model
{
    //
    protected $table='factura_servicio';

    public function servicio(){
    	return $this->hasOne('App\Model\Homecare_Servicio','id','id_servicio');
    }
}
