<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Homecare_Prf_Ntf extends Model
{
    //
    protected $table = 'homecare_prf_ntf';

     public function user(){
    	return $this->hasOne('App\User','id','id_profesional');
    }
}
