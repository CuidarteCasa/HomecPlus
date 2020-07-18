<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Talento_Humano_Documentos_User extends Model
{
    //
    protected $table = 'talentohumano_documentos_user';

    public function doc(){
    	return $this->hasOne('\App\Model\Talento_Humano_Documentos','id','id_documento');
    }
}
