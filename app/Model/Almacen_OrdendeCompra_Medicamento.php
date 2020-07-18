<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Almacen_OrdendeCompra_Medicamento extends Model
{
    //
    protected $table = 'almacen_ordendecompra_medicamento';

    public function medicamento(){
    	return $this->hasOne('App\Model\General_MedicamentoComercial','id','id_medicamento');
    }
}
