<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Agenda_Ruta_Prf extends Model
{
    //
    protected $table = "agenda_ruta_prf";

    public function medico(){

        return $this->hasOne('App\User','id','asigned_to');
    }
    public function estado(){

        return $this->belongsTo('App\Model\Agenda_Ruta_Prf_status','status','id');
    }
    public function ruta(){

        return $this->belongsTo('App\Model\Agenda_Ruta','id_ruta','id');
    }
    public function ruta_Prf(){

        return $this->hasMany('App\Model\Agenda_Ruta_Prf_Pct','id_ruta_prf','id');
    }
    
}
