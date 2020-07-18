<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class General_Tercero_Proveedor_Medicamento extends Model
{
    //
    protected $table='general_tercero_proveedor_medicamento';


    public function medicamento(){
    	return $this->hasOne('App\Model\General_MedicamentoComercial','id','id_medicamento');
    }
}
