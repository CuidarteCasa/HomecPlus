<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class General_AreaInforme extends Model
{
    //
    protected $table='general_areainforme';

    public function informes(){
    	return $this->hasMany('App\Model\General_Informe','id_areainforme','id');
    }
    
}
