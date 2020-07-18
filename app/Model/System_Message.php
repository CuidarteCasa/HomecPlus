<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class System_Message extends Model
{
    //
    protected $table = 'system_message';

    public function user(){
    	return $this->hasOne('App\User','id','creator_id');
    }
}
