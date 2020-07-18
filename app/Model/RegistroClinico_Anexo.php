<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RegistroClinico_Anexo extends Model
{
    //
    protected $table = 'registroclinico_anexo';

    public function DocType(){
    	return $this->hasOne('App\Model\General_DocAnexo','id','id_doctype');
    }

    public function osa(){
        return $this->hasOne('\App\Model\Homecare_Ordendeservicio','id','id_osa');
    }
}
