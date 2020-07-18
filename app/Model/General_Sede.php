<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class General_Sede extends Model
{
    //
    protected $table="general_sedes";

    public function zonas(){
    	return $this->hasMany('App\Model\Zonas','id_sede','id');
    }

    public function users(){
   	return $this->belongsToMany('App\User','general_user_sede','id_sede','id_user');
   }
}
