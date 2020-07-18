<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class General_Zonas extends Model
{
    //
    protected $table="general_zona";

   public function barrios(){
   	return $this->hasMany('App\Model\General_Barrio','id_zona_clinica','id');
   }

   public function users(){
   	return $this->belongsToMany('App\User','general_user_zona','id_zona','id_user');
   }

   public function sede(){
   	return $this->belongsTo('App\Model\General_sede','id_sede','id');
   }
}
