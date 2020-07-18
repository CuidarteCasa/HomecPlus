<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class System_Menu extends Model
{
    //
    protected $table='system_menu';

    public function submenu(){
    	return $this->hasMany('App\Model\System_SubMenu','id_menu','id');
    }
}
