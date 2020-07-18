<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Homecare_Revista_Tema;
class Homecare_Revista extends Model
{
    //
    protected $table = 'homecare_revista_informate';

    public function tema(){
        return $this->belongsTo('App\Model\Homecare_Revista_Tema','id_tema','id');
    }

    public function userTakeIt(){
    	return $this->belongsToMany('App\User','system_revista_user','id_revista','id_user');
    }
}
