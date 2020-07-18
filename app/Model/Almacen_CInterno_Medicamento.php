<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Almacen_CInterno_Medicamento extends Model
{
    //
    protected $table = "almacen_consumo_interno_med";

    public function medicamento_en_kardex(){
    	return $this->hasOne('App\Model\Kardex_Medicamento','id','id_medicamento_kardex');
    }
}
