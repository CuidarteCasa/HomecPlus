<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Almacen_DespachoMedicamento extends Model
{
    //
    protected $table = 'almacen_despachos_medicamento';

    public function medicamento_en_kardex(){
    	return $this->hasOne('App\Model\Kardex_Medicamento','id','id_kardexmedicamento');
    }
}
