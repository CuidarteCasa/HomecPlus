<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class General_Perfil extends Model
{
    //
    protected $table="general_perfil";

    public function profile_training(){
        return $this->belongsToMany('App\Model\Homecare_Capacitacion','homecare_perfil_capacitacion','id_perfil','id_capacitacion');
    }
    public function profile_user()
    {
        return $this->belongsToMany('App\User','general_user_perfil','id_perfil','id_user');
    }
     
   
    
}
