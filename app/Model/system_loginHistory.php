<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class system_loginHistory extends Model
{
    //
    protected $table = 'system_loginHistory';

    public function user(){
        return $this->hasOne('\App\User','id','id_user');
    }
}
