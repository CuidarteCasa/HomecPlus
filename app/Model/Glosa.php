<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Glosa extends Model
{
    //
    protected $table='glosas';

    public function ordendetrabajo(){
    	return $this->hasOne('App\Model\OrdendeTrabajo','id','id_ot');
    }
}
