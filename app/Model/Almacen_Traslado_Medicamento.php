<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Almacen_Traslado_Medicamento extends Model
{
    //
    protected $table = 'almacen_traslado_medicamento';

    public function medicamento(){
    	return $this->hasOne('App\Model\Kardex_Medicamento','id','id_kardex_medicamento');
    }
}
