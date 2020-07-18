<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Homecare_SPAD_Analista extends Model
{
    //
    protected $table = 'homecare_spad_analista';

    public function status(){
    	return $this->hasOne('App\Model\General_Spad_status','id','id_status');
    }

    public function user(){
    	return $this->hasOne('App\User','id','created_by');
    }
}
