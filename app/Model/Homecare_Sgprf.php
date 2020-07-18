<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Homecare_Sgprf extends Model
{
    //
	protected $table = 'homecare_sgprf';

	public function status(){
		return $this->hasOne('App\Model\General_Sgprf_Motivos','id','id_motivo');
	}

	public function user(){
		return $this->hasOne('App\User','id','created_by');
	}
}
