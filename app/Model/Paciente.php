<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    //
	
	protected $table="pacientes";

	public function equipos(){
		return $this->hasMany('App\Model\Almacen_Equipo_Paciente','id_paciente','id');
	}

	public function mipres(){
		return $this->hasMany('App\Model\Homecare_Rol_Dispensador','id_paciente','id');
	}

	public function departamento(){
		return $this->hasOne('App\Model\General_Departamento','id','id_departamento');
	}

	public function municipio(){
		return $this->hasOne('App\Model\General_Municipio','id','id_municipio');
	}

	public function tipodocumento(){
		return $this->hasOne('App\Model\General_Tipodocumento','id','tipoid');
	}

	public function ordenes_de_trabajo(){
		return $this->hasMany('App\Model\Homecare_Ordendetrabajo','id_paciente','id');
	}

	public function tipo_documento(){
		return $this->hasOne('App\Model\General_Tipodocumento','id','tipoid');
	}

	public function tipo_usuario(){
		return $this->hasOne('\App\Model\Admision_Tipo_Usuario','id','id_tipo_usuario');
	}

	public function tipo_usuario_rango(){
		return $this->hasOne('\App\Model\Admision_Tipo_Usuario_Rango','id','id_tipo_usuario_rango');
	}

	public function eps(){
		return $this->hasOne('App\Model\General_Terceros_Contratantes','id','id_eps');
	}

	public function direccion($paciente){
		$paciente = \App\Model\Paciente::find($paciente);
		if($paciente->street_first_field and $paciente->street_second_field)
			return $paciente->street_first_field->nombre.' '.$paciente->dir_first_field_text.' '.$paciente->street_second_field->nombre.' '.$paciente->dir_second_field_text.' '.$paciente->dir_adicional;
		else
			return 'Sin ubicacion';
	}

	public function edad($paciente){
		$paciente = \App\Model\Paciente::find($paciente);
		$fecha1 = new \DateTime(date('Y-m-d'));
		$fecha2 = new \DateTime($paciente->fecha_de_nacimiento);
		$diff = $fecha1->diff($fecha2);
		return $diff->y;
	}

	public function cie10_principal(){
		return $this->hasOne('App\Model\Cie10','id','id_cie10_principal');
	}

	public function estado(){
		return $this->hasOne('App\Model\General_estadopaciente','id','id_estado');
	}

	public function pqrs(){
		return $this->hasMany('App\Model\Siau_Pqr','id_paciente','id')->orderBy('created_at','desc');
	}

	public function notificaciones(){
		return $this->hasMany('App\Model\Siau_Notificacion','id_paciente','id')->orderBy('created_at','desc');
	}

	public function encuesta(){
		return $this->hasMany('App\Model\Siau_Encuesta','id_paciente','id')->orderBy('created_at','desc');
	}

	public function cie(){
		return $this->hasMany('App\Model\Homecare_Paciente_Cie10','id_paciente','id');
	}

	public function street_first_field(){
		return $this->hasOne('App\Model\General_streettype','id','dir_first_field');
	}

	public function street_second_field(){
		return $this->hasOne('App\Model\General_streettype','id','dir_second_field');
	}

	public function barrio(){
		return $this->hasOne('App\Model\General_Barrio','id','id_barrio');
	}

	public function programas(){
		return $this->belongsToMany('App\Model\Admision_Programas','homecare_paciente_programa','id_paciente','id_programa');
	}

	public function zona(){
		return $this->hasOne('App\Model\General_Zonas','id','id_zonaclinica');
	}

	public function medicamentos_paciente(){
		return $this->hasMany('App\Model\Homecare_Paciente_Medicamento','id_paciente','id');
	}

	public function nutricion_paciente(){
		return $this->hasMany('App\Model\Homecare_Paciente_Nutricion','id_paciente','id');
	}

	public function complemetario_paciente(){
		return $this->hasMany('App\Model\Homecare_Paciente_Complementario','id_paciente','id');
	}

	public function laboratorios(){
		return $this->hasMany('App\Model\RegistroClinico_Laboratorioclinico_resultado','id_paciente','id');
	}
	public function carevigers(){
		return $this->hasMany('App\Model\Homecare_paciente_cuidador','id_paciente','id');
	}
	public function carerType(){
		return $this->belongsTo('App\Model\Homecare_tipo_cuidador', 'id_tipo_cuidador','id');
	}

	public function drug(){
		return $this->hasMany('App\Model\Homecare_Paciente_Medicamento','id_paciente','id');
	}

	public function atRoute(){
		return $this->hasOne('App\Model\Agenda_Ruta_Paciente','id_paciente','id');
	}

	public function atRouteprf(){
		return $this->hasOne('App\Model\Agenda_Ruta_Prf_Pct','id_pct','id');
	}

	public function vitals(){
		return $this->hasMany('App\Model\Homecare_Paciente_SignosVitales','id_paciente','id');
	}

	public function mna(){
		return $this->hasMany('App\Model\Homecare_Paciente_MNA','id_paciente','id');
	}

	public function antecedentes(){
		return $this->hasMany('App\Model\Homecare_Paciente_Antecedentes','id_paciente','id');
	}

	//ACCEDER A LA INFORMACION DE REGISTROS CLINICOS DEL PACIENTE

	public function evolucionesMedica(){
		return $this->hasMany('\App\Model\RegistroClinico_evolucion_medica','id_paciente','id');
	}

	public function ValoracionesMedica(){
		return $this->hasMany('\App\Model\RegistroClinico_valoracion_medicina_general','id_paciente','id');
	}

	public function GeriatriaMedica(){
		return $this->hasMany('\App\Model\RegistroClinico_valoracion_especialista_geriatria','id_paciente','id');
	}
	
}
