<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Homecare_Seguimiento_Covid extends Model
{
    //
    protected $table = "homecare_seguimiento_covid";

    public function userby(){
    	return $this->hasOne('App\User','id','by');
    }
}
