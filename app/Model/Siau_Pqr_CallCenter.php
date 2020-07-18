<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Siau_Pqr_CallCenter extends Model
{
    //
    protected $table = 'siau_pqr_callcenter';

    public function motivemdl(){
        return $this->belongsTo('App\Model\Siau_Motivopqr','id_motivo','id');
    }
    public function estado(){
        return $this->belongsTo('\App\Model\Siau_Pqr_Status','status','id');
    }
    public function user(){
        return $this->belongsTo('App\User','id_responsable','id');
    }
    public function createdby(){
        return $this->belongsTo('App\User','created_by','id');
    }
    public function patient(){
        return $this->belongsTo('App\Model\Paciente','id_paciente','id');
    }
}
