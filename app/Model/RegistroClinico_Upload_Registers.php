<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RegistroClinico_Upload_Registers extends Model
{
    //
    protected $table = 'registroclinico_upload_registers';

    public function servicio(){
    	return $this->hasOne('\App\Model\Homecare_Servicio','id','id_servicio');
    }

    public function registro_clinico(){
    	return $this->hasOne('\App\Model\RegistroClinico_master_registros','id','id_master_registro');
    }

}
