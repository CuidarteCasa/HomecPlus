<?php

namespace App\Http\Controllers;

use Request;

class CuentasporPagarProfesionalesController extends Controller
{
    //

    public function PreCCStore(){
    	$arry = Request::input('arry');
    	try{
    		\DB::transaction(function() use ($arry){
	    	$precc = new \App\Model\Contabilidad_PreCuentasporpagar_Profesional; 
	    	$precc->id_profesional = Request::input('user');
	    	$precc->total = Request::input('total');
	    	$precc->fecha = date('Y-m-d');
	    	$precc->id_creador = \Auth::id();
	    	$precc->save();

	    	foreach ($arry as $key => $value) {

	    		$precc->user_honorario()->attach($value);
	    		$honorario = \App\Model\Contabilidad_User_Honorario::find($value);
                $honorario->_enprecc = 1;
                $honorario->save();
	    	}
    	});
    	}catch(Exception $e){
    		return $e;
    	}
	    	
    }
}
