<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class system_contract_renew extends Model
{
    //
    protected $table = 'system_contract_renew';

    public function user(){
        return $this->hasOne('\App\User','id','id_user');
    }
}
