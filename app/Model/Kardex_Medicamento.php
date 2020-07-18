<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Kardex_Medicamento extends Model
{
    //
    protected $table='kardex_medicamentos';

    public function medicamento_comercial(){
    	return $this->belongsTo('App\Model\General_MedicamentoComercial','id_medicamento_comercial','id');
    }
}
