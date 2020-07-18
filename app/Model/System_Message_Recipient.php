<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class System_Message_Recipient extends Model
{
    //
    protected $table = 'system_message_recipient';

    public function message(){
    	return $this->hasOne('App\Model\System_Message','id','message_id');
    }
}
