<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class General_Tercero_Proveedor_Insumo extends Model
{
    //

	protected $table='general_tercero_proveedor_insumo';

    public function insumo(){
    	return $this->hasOne('App\Model\General_InsumoComercial','id','id_insumo');
    }
}
