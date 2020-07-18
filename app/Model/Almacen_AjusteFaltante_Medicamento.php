<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Almacen_AjusteFaltante_Medicamento extends Model
{
    //
    protected $table = 'almacen_ajusteporfaltante_medicamento';

    public function medicamento_en_kardex(){
    	return $this->hasOne('App\Model\Kardex_Medicamento','id','id_kardex');
    }
}
