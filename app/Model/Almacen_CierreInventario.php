<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Almacen_CierreInventario extends Model
{
    //
    protected $table = 'almacen_cierreinventario';

    public function user(){
    	return $this->hasOne('App\User','id','user_closed');
    }

    
}
