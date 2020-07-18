<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Agenda_Ruta extends Model
{
    //
    protected $table = "agenda_ruta";

    
        public function estado()
        {
            return $this->belongsTo('App\Model\Agenda_Ruta_status','status','id');
        }
        public function ruta_paciente(){
        
        return $this->belongsToMany('App\Model\Paciente','agenda_ruta_pct','id_ruta','id_paciente');
            
        }

}
