<?php

namespace App\Http\Controllers;

use Request;

use \App\Model\General_Informe;
use Illuminate\Support\Facades\DB;
use \App\Model\RegistroClinico_registrossclinicos_servicio;
class ReportsController extends Controller
{
    //

    public function index(){
    	 return view('informes.index');
    }

    public function show($id){
    	$informe = General_Informe::find($id);
    	$blade = $informe->_blade;

    	$page_title = $informe->Area->nombre;
        $page_description = $informe->nombre;

        return view('informes.'.$page_title.'/'.$blade, compact('page_title', 'page_description'));
    }

    public function auditUser($user){
        $DBdata = DB::table('homecare_actividades_orden_de_servicio')
                        ->where('auditedbyfact',$user)
                        ->whereNotNull('auditedbyfactdate')
                        ->select('auditedbyfactdate',DB::raw('count(id) as audited '))
                        ->groupBy('auditedbyfactdate')
                        ->get();
          return $DBdata;                  
    }

    public function auditPendingClinic($departure){
        
        $option = ($departure=="clinic") ? 'homecare_actividades_orden_de_servicio._isvalid': 'homecare_actividades_orden_de_servicio._isvalid_fact' ;
        $DBdata = DB::table('homecare_actividades_orden_de_servicio')
                    ->join('homecare_orden_de_servicio','homecare_orden_de_servicio.id','homecare_actividades_orden_de_servicio.id_orden_de_servicio')
                    ->join('homecare_orden_de_trabajo','homecare_orden_de_trabajo.id','homecare_orden_de_servicio.id_orden_trabajo')
                    ->join('pacientes','pacientes.id','homecare_orden_de_trabajo.id_paciente')
                    ->join('homecare_servicio','homecare_servicio.id','homecare_orden_de_servicio.id_servicio')
                    ->where($option,3)
                    ->get(['homecare_orden_de_trabajo.id as order','homecare_actividades_orden_de_servicio.id as osa','homecare_actividades_orden_de_servicio.id as activity','homecare_servicio.tag','pacientes.identificacion','pacientes.name','homecare_orden_de_trabajo.valida_desde','homecare_orden_de_trabajo.valida_hasta']);
         $data = [];
         foreach ($DBdata as $key => $value) {
                        $data['data'][$key]['order'] = $value->order;
                        $data['data'][$key]['fecha'] = $value->valida_desde.' / '.$value->valida_hasta;
                        $data['data'][$key]['osa'] = $value->osa;
                        $data['data'][$key]['activity'] = $value->activity;
                        $data['data'][$key]['tag'] = $value->tag;
                        $data['data'][$key]['name'] = $value->name;
                        $data['data'][$key]['identificacion'] = $value->identificacion;
                    }           

        return json_encode($data); 
       
    }
}
