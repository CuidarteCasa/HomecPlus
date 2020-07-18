<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class General_TipoEquipo extends Model
{
    //
    protected $table = 'general_tipoequipo';

    public function proveedorList(){
    	return $this->hasMany('\App\Model\General_Tercero_Proveedor_TipoEquipo','id_tipoequipo','id');
    }
}
