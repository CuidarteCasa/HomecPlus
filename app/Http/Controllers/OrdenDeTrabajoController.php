<?php

namespace App\Http\Controllers;

use Request;
use \App\Model\Homecare_Ordendetrabajo;
use \App\Model\Paciente;
use \App\Model\Homecare_Ordendetrabajo_Records;

class OrdenDeTrabajoController extends Controller
{
    //

    

    public static function storeHistory($order,$type,$message){
    	
    	try{
    			$newLine = new Homecare_Ordendetrabajo_Records;
    			$newLine->id_order = $order;
    			$newLine->id_user = \Auth::user()->id;
    			$newLine->type = $type;
    			$newLine->descripcion = $message;
    			$newLine->fecha = date("Y-m-d");
    			$newLine->save();
    	}catch(\Illuminate\Database\QueryException $ex) {
                
                return response()->json([
                    'message'=>'Error en la base de datos',
                    'error' => $ex->getMessage()
                ],400);
        }   

    		
    }

    public static function orderHistory($id){
        $history = Homecare_Ordendetrabajo_Records::where('id_order',$id)->get();
        foreach ($history as $key => $value) {
               echo '<div class="timeline-item align-items-start">
                                                        <!--begin::Label-->
                                                        <div class="timeline-label font-weight-bolder text-dark-75 font-size-lg">'.$value->fecha.'</div>
                                                        <!--end::Label-->
                                                        <!--begin::Badge-->
                                                        <div class="timeline-badge">
                                                            <i class="fa fa-genderless text-'.$value->type.' icon-xl"></i>
                                                        </div>
                                                        <!--end::Badge-->
                                                        <!--begin::Text-->
                                                        <div class="font-weight-mormal font-size-lg timeline-content text-dark pl-3">'.$value->descripcion.'</div>
                                                        <!--end::Text-->
                                                    </div>';
           }   
    }


	public function show($id){
		$page_title = 'Orden de Trabajo';
        


		$order = Homecare_Ordendetrabajo::find($id);
		$page_description = $order->id;
		$paciente = $order->paciente;


        return view('ordendetrabajo.show', compact('page_title', 'page_description','order','paciente'));	

	}	


    //FUNCION RETURN HTML

    public static function orderServices($idOrder){
    	$order = Homecare_Ordendetrabajo::find($idOrder);
    	$paciente = $order->paciente;
    	$services = $order->ordenes_de_servicio;
    	foreach ($services as $key => $value) {
    		$servicio = $value->servicio;
    		$percent = ($value->actividades_realizadas>0) ? intval(($value->actividades_realizadas/$value->cantidad_actividades)*100) : '0';
            $profesional = ($value->profesional) ? '<span class="text-primary font-weight-bold d-block">'.$value->profesional->name.'</span>': '<span class="text-danger font-weight-bold d-block">PENDIENTE ASIGANACION</span>';
    		$color = 'bg-danger';
    		switch ($percent) {
    			case $percent>75:
    				$color = 'bg-success';
    				break;
    			case $percent>40 and $percent<75:
    				$color = 'bg-primary';
    				break;
    			default:
    				$color = 'bg-danger';
    				break;
    		}
    			echo '<tr>
    					<td class="pl-0">
						<a class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg">'.$servicio->tag.'</a>
						'.$profesional.'
						</td>
						<td>
																	<div class="d-flex flex-column w-100 mr-2">
																		<div class="d-flex align-items-center justify-content-between mb-2">
																			<span class="text-muted mr-2 font-size-sm font-weight-bold">
																				'.$percent.'%
																			</span>
																			
																		</div>
																		<div class="progress progress-xs w-100">
																			<div class="progress-bar '.$color.'" role="progressbar" style="width: '.$percent.'%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
																		</div>
																	</div>
																</td>
																<td>'.$value->cantidad_actividades.'</td><td>'.$value->actividades_realizadas.'</td><td><div class="dropdown dropdown-inline">
                                                        <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="ki ki-bold-more-hor"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                                            <!--begin::Navigation-->
                                                            <ul class="navi navi-hover py-5">
                                                            <li class="navi-item">
                                                                    <a  class="navi-link showService" data-id="'.$value->id.'" >
                                                                        <span class="navi-icon">
                                                                            <i class="flaticon2-drop"></i>
                                                                        </span>
                                                                        <span class="navi-text">Ver Registros</span>
                                                                    </a>
                                                                </li>
                                                                <li class="navi-item">
                                                                    <a href="#" class="navi-link" >
                                                                        <span class="navi-icon">
                                                                            <i class="flaticon2-drop"></i>
                                                                        </span>
                                                                        <span class="navi-text">Observaciones</span>
                                                                    </a>
                                                                </li>
                                                                <li class="navi-item">
                                                                    <a href="#" class="navi-link btnReasignService" data-toggle="modal" data-target="#reassignService"  data-serviceId="'.$servicio->id.'" data-zoneId="'.$paciente->id_zonaclinica.'" data-id="'.$value->id.'" data-actionRefresh="true">
                                                                        <span class="navi-icon">
                                                                            <i class="flaticon2-drop"></i>
                                                                        </span>
                                                                        <span class="navi-text">Reasiganar</span>
                                                                    </a>
                                                                </li>
                                                                
                                                                
                                                            </ul>
                                                            <!--end::Navigation-->
                                                        </div>
                                                    </div></td>
					  </tr>';
    		}	
    }

    public static function OrderProgress($id_paciente){
    	$paciente = Paciente::find($id_paciente);
    	$orders = $paciente->ordenes_de_trabajo->where('id_estado',1);
    	foreach ($orders as $key => $value) {
    		$services = $value->ordenes_de_servicio;
            echo '<tr class="bg-light-primary text-dark"><td><a href="'.url("OrdendeTrabajo/".$value->id).'" target="blank">'.$value->id.'</a></td><td colspan="2">'.$value->paquete->nombre.'</td><td>Asig</td><td>Real</td><td>Pend</td><td></td></tr>';
    	foreach ($services as $k => $v) {
    		$percent = ($v->actividades_realizadas>0) ? intval(($v->actividades_realizadas/$v->cantidad_actividades)*100) : '0';
    		$color = 'bg-danger';
           
    		switch ($percent) {
    			case $percent>75:
    				$color = 'bg-success';
                 
    				break;
    			case $percent>40 and $percent<75:
    				$color = 'bg-primary';
                  
    				break;
    			default:
    				$color = 'bg-danger';
                   
    				break;
    		}
    		$servicio = $v->servicio->tag;
            $pendientes = ($v->actividades_realizadas) ? $v->cantidad_actividades-$v->actividades_realizadas : $v->cantidad_actividades;
    		$profesional = ($v->profesional) ? $v->profesional->name : 'Sin asignacion'; 
    		echo '<tr>
																<td class="pl-0 py-5">
																	<div class="symbol symbol-50 symbol-light mr-2">
																		<span class="symbol-label">
																			<img src="/media/svg/icons/Code/Right-circle.svg" class="h-50 align-self-center" alt="">
																		</span>
																	</div>
																</td>
																<td class="pl-0">
																	<a href="#" class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg">'.$servicio.'</a>
																	<span class="text-primary font-weight-bold d-block">'.$profesional.'</span>
																</td>
																<td>
																	<div class="d-flex flex-column w-100 mr-2">
																		<div class="d-flex align-items-center justify-content-between mb-2">
																			<span class="text-muted mr-2 font-size-sm font-weight-bold">
																				'.$percent.'%
																			</span>
																			<span class="text-dark font-size-sm font-weight-bold">
																				Progreso
																			</span>
																		</div>
																		<div class="progress progress-xs w-100">
																			<div class="progress-bar '.$color.'" role="progressbar" style="width: '.$percent.'%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
																		</div>
																	</div>
																</td><td style="text-align: center;">'.$v->cantidad_actividades.'</td><td  style="text-align: center;">'.$v->actividades_realizadas.'</td ><td style="text-align: center;">'.$pendientes.'</td>
																<td class="text-right pr-0">
																	<a  class="btn btn-icon btn-light btn-sm showService"  data-id="'.$v->id.'" >
																		<i class="icon-2x text-success flaticon2-copy"></i></a>
																	</td>
																</tr>';
    	}
    	}
    	
    }

    //END RETURN HTML

    //CARGAR PREORDENES SOBRE UNA ORDEN DE TRABAJO EN ORDENAMIENTOS
    public static function OrderPreOrders($idorder){

        $order = Homecare_Ordendetrabajo::find($idorder);
        $preorders = $order->hijas->where('id_estado',2);


        foreach ($preorders as $key => $value) {
            $services = $value->ordenes_de_servicio;
            echo '<tr class="bg-light-primary text-dark"><td><a href="'.url("OrdendeTrabajo/".$value->id).'" target="blank">'.$value->id.'</a></td><td colspan="2">'.$value->paquete->nombre.'</td><td>Cantidad</td><td></td></tr>';
        foreach ($services as $k => $v) {
            
            $servicio = $v->servicio->tag;
            $cantidad = $v->cantidad_actividades;
            $profesional = ($v->profesional) ? $v->profesional->name : 'Sin asignacion'; 
            echo '<tr>
                                                                
                                                                <td class="pl-0">
                                                                    <a href="#" class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg">'.$servicio.'</a>
                                                                    
                                                                </td>
                                                                <td colspan="2"><span class="text-primary font-weight-bold d-block">'.$profesional.'</span></td>
                                                                <td style="text-align: center;"><input type="number" class="form-control" value="'.$cantidad.'"></input></td>
                                                                <td class="text-right pr-0">
                                                                    <a  class="btn btn-icon btn-light btn-sm "  data-id="'.$v->id.'" >
                                                                        <i class="icon-2x text-danger flaticon2-trash"></i></a>
                                                                    </td>
                                                                </tr>';
        }
        }
        
    }

    //
}
