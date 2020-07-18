<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Caffeinated\Shinobi\Concerns\HasRolesAndPermissions;

class User extends Authenticatable
{
    use Notifiable;
    use HasRolesAndPermissions;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

     public function isOnline(){
        return \Cache::has('user-is-online'.$this->id);
    }

    public function magazin(){
        return $this->belongsToMany('App\Model\Homecare_Revista','system_revista_user','id_user','id_revista');
    }

    public function actualizaciones(){
        return $this->belongsToMany('App\Model\System_Actualizacion','system_actualizacion_user','id_user','id_actualizacion');
    }
   
    public function zonas(){
        return $this->belongsToMany('App\Model\General_Zonas','general_user_zona','id_user','id_zona');
    }

    public function perfiles(){
        return $this->belongsToMany('App\Model\General_Perfil','general_user_perfil','id_user','id_perfil');
    }
    public function profileCarer($id){
        return $this->belongsToMany('App\Model\General_Perfil','general_user_perfil')->withPivot('id_user','id_perfil')->where('id_perfil',$id);
    }
    public function ordenes_de_servicio(){
        return $this->hasMany('App\Model\Homecare_Ordendeservicio','id_profesional_asignado','id');
    }

    public function inbox(){
        return $this->hasMany('App\Model\System_Message_Recipient','recipient_id','id');
    }

    public function tipo_doc(){
        return $this->hasOne('App\Model\General_Tipodocumento','id','tipo_documento');
    }

    public function sedes(){
        return $this->belongsToMany('App\Model\General_Sede','general_user_sede','id_user','id_sede');
    }

    public function honorarios(){
        return $this->hasMany('App\Model\Contabilidad_User_Honorario','id_user','id');
    }

    public function notificaciones(){
        return $this->hasMany('App\Model\System_Notification_User','id_user','id')->where('read',0);
    }    
    
    public function honorarios_list(){
        return $this->hasMany('App\Model\Contabilidad_Honorario','id_user','id');
    }
    public function roles(){
        return $this->belongsToMany('Caffeinated\Shinobi\Models\Role');
    }

    public function menu_notification(){
        return $this->hasMany('\App\Model\System_Notification_menu_user','id_user','id');
    }

    public function programerPresentation(){
        return $this->hasOne('\App\Model\General_ProgramerPresentation','id','programer_view_type');
    }
   
    public function myDoctors(){
        return $this->belongsToMany('\App\User','general_user_medico','id_user','id_medico');
    }
   
    public function zonas_s_(){
        return $this->belongsToMany('App\Model\General_Zona_s','general_zona_s_user','id_user','id_zona_s');
    }   
    
    public function departamento(){
        return $this->hasOne('App\Model\General_Departamento','id','id_departamento');
    }

    public function municipio(){
        return $this->hasOne('App\Model\General_Municipio','id','id_municipio');
    }
    
    public function contract(){
        return $this->hasOne('App\Model\system_contract_renew','id_user','id');
    }

    public function contractDocs(){
        return $this->hasMany('App\Model\Talento_Humano_Documentos_User','id_user','id');
    }  

    public function seguimientosTelefonicos(){
        return $this->hasMany('App\Model\Homecare_SPAD_Analista','created_by','id');
    }

    

   
}
