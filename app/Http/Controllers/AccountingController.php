<?php

namespace App\Http\Controllers;

use Request;
use \App\Model\Homecare_Ordendetrabajo;
use Illuminate\Support\Facades\DB;
use \App\Model\General_Manual_Tarifario;
class AccountingController extends Controller
{
    //

    public function copayIndex(){
    	 $page_title = 'Tesoreria';
        $page_description = 'Cuotas moderadoras y copagos';

        return view('contabilidad.tesoreria.copay', compact('page_title', 'page_description'));
    }

    public function copay(){
    	$list = DB::table('homecare_orden_de_trabajo')
    				->join('pacientes','homecare_orden_de_trabajo.id_paciente','pacientes.id')
    				->join('general_terceros_contratantes','general_terceros_contratantes.id','pacientes.id_eps')
    				->where('general_terceros_contratantes.copagomoderadora',1)
    				->where('homecare_orden_de_trabajo.id_estado',1)
    				->where('pacientes.id_estado',1)
    				->get(['homecare_orden_de_trabajo.id as order','pacientes.name','pacientes.identificacion','pacientes.telefono','pacientes.celular','pacientes.celular2','pacientes.id_tipo_usuario','pacientes.id_eps']);
    	
        $today = date("Y-m-d");
        $package = array();
        $manual_tarifario = General_Manual_Tarifario::whereDate('valido_hasta', '>', $today)->whereDate('valido_desde', '<=', $today)->where('id_tercero', $list[0]->id_eps)->first();
       
        $paquetes = $manual_tarifario->paquetes;

        $arrayPr=[];
        
        $i=0;
	       foreach ($paquetes as $key => $value) {
	       	if($value->paquete->cups){
	            $arrayPr[$i]['id']=$value->id_paquete;
	            $arrayPr[$i]['cups']=$value->paquete->cups;
	            $arrayPr[$i]['valor']=$value->pvt;
	            $i++;
	            }
	       }

    	$data = [];
    	$i=0;
    	
    	foreach ($list as $key => $value) {
    		$order = Homecare_Ordendetrabajo::find($value->order);
    		$valordePago=0;
    		//COPAGO
    		//EL COPAGO SE CALCULA POR SERVICIO DE LA ORDEN DE TRABAJO
    		if($value->id_tipo_usuario==2){
    			
    			$data['data'][$i]['order'] = $order->id;
    			$data['data'][$i]['paciente'] = $value->name;
    			$data['data'][$i]['identificacion'] =$value->identificacion;
    			$data['data'][$i]['telefonos'] =$value->telefono.' - '.$value->celular.' - '.$value->celular2;
    			$data['data'][$i]['action']=   '';
    			
    			foreach ($order->ordenes_de_servicio as $k => $v) {
    				$cups = $v->servicio->cups;
    				
    				foreach ($arrayPr as $j => $item) {
    					echo $item['cups'].'-'.$cups.'<br>';
    					if(strcasecmp($item['cups'], $cups) == 0){
    						$valordePago = $valordePago + $item['valor'];
    						echo $valordePago.'<br>';
    						
    					}
    				}

    			}
    			$data['data'][$i]['valor']= intval($valordePago*0.1150);
    			$i++;
    		}

    	}
    	return json_encode($data);
    }
}
