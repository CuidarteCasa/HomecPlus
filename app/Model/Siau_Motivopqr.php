<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Siau_Motivopqr extends Model
{
    //
    protected $table="siau_motivopqrs";
    
    public function mot_user(){
        return $this->belongsToMany('App\User','siau_motivo_user','id_motivo','id_user');
    }
    
}
