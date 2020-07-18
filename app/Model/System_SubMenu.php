<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class System_SubMenu extends Model
{
    //
    protected $table='system_submenuv2';

    public function menu(){
    	
    	return $this->belongsTo('App\Model\System_Menu');
    }
}
