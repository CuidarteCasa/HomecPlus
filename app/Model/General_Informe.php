<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class General_Informe extends Model
{
    //
    protected $table='general_informes';

    public function Area(){
    	return $this->belongsTo('App\Model\General_AreaInforme','id_areainforme','id');
    }
}
