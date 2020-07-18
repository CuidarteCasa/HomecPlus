<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Almacen_Remision_Medicamento extends Model
{
    //
    protected $table = 'almacen_remision_medicamento';

     public function medComercial(){
    		return $this->hasOne('\App\Model\General_MedicamentoComercial','id','id_medicamento_comercial');
    }
}
