<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Homecare_unsigned_osa extends Model
{
    //

    protected $table = 'homecare_unsigned_osa';

    public function motivo(){
    	return $this->hasOne('App\Model\General_unsignedservice_type','id','type');
    }
}
