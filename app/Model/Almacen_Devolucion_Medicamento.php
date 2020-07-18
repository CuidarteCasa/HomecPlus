<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Almacen_Devolucion_Medicamento extends Model
{
    //
    protected $table = 'almacen_devoluciones_medicamentos';

    public function medicamento(){
    	return $this->hasOne('App\Model\Kardex_Medicamento','id','id_kardex');
    }
}
