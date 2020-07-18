<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Almacen_Remision_Insumo extends Model
{
    //
    protected $table = 'almacen_remision_insumo';

    public function insComercial(){
    		return $this->hasOne('\App\Model\General_InsumoComercial','id','id_insumo_comercial');
    }
    
}
