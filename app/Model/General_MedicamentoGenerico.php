<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class General_MedicamentoGenerico extends Model
{
    //
    protected $table='general_medicamentogenerico';

     public function comerciales(){
    	return $this->hasMany('App\Model\General_MedicamentoComercial','id_generico','id');
    }

    public function presentacion(){
    	return $this->hasOne('App\Model\General_Presentacion_Medicamento','id','id_presentacion');
    }

    
}
