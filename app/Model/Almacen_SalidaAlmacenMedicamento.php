<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Almacen_SalidaAlmacenMedicamento extends Model
{
    //
    protected $table='almacen_salida_medicamento';

    public function medicamento(){
    	return $this->hasOne('App\Model\General_MedicamentoGenerico','id','id_medicamento_generico');
    }
}
