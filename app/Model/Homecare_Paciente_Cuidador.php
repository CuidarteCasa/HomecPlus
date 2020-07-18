<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;


class Homecare_Paciente_Cuidador extends Model
{
    protected $table = 'homecare_paciente_cuidador';

    public function patient(){
        return $this->belongsTo('App\Model\Paciente','id_paciente','id');
    }
    public function user(){
        return $this->belongsTo('App\User','id_profesional','id');
    }
    public function seguimiento(){
        return $this->belongsTo('App\Model\General_Cuidador_Obsanulation','id_obsanulation','id');
    }
    public function changestatus(){
        return $this->hasMany('App\Model\Homecare_Cuidador_Seguimiento','id_paciente_cuidador','id');
    }

    public function seguimiento_administrativo(){
        return $this->hasOne('App\Model\Homecare_Cuidador_Seguimiento','id_paciente_cuidador','id');
    }

}
