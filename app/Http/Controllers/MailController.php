<?php

namespace App\Http\Controllers;

use Request;

class MailController extends Controller
{
    //
    public function index(){
    	 $page_title = 'Email';
        $page_description = 'Mensajeria interna';

        return view('email.index', compact('page_title', 'page_description'));
    }

    public static function inbox(){
    	$messages = \Auth::user()->inbox;
    	foreach ($messages as $key => $value) {
    		
    		echo '<div class="d-flex align-items-start list-item card-spacer-x py-3" data-inbox="message">
														<!--begin::Toolbar-->
														<div class="d-flex align-items-center">
															<!--begin::Actions-->
															<div class="d-flex align-items-center mr-3" data-inbox="actions">
																<label class="checkbox checkbox-single checkbox-primary flex-shrink-0 mr-3">
																	<input type="checkbox" />
																	<span></span>
																</label>
																<a href="#" class="btn btn-icon btn-xs btn-hover-text-warning active" data-toggle="tooltip" data-placement="right" title="Star">
																	<i class="flaticon-star text-muted"></i>
																</a>
																<a href="#" class="btn btn-icon btn-xs text-hover-warning" data-toggle="tooltip" data-placement="right" title="Mark as important">
																	<i class="flaticon-add-label-button text-muted"></i>
																</a>
															</div>
															<!--end::Actions-->
															<!--begin::Author-->
															<div class="d-flex align-items-center flex-wrap w-xxl-200px mr-3" data-toggle="view">
																<span class="symbol symbol-35 mr-3">
																	<span class="symbol-label" ></span>
																</span>
																<a href="#" class="font-weight-bold text-dark-75 text-hover-primary">'.$value->message->user->name.'</a>
															</div>
															<!--end::Author-->
														</div>
														<!--end::Toolbar-->
														<!--begin::Info-->
														<div class="flex-grow-1 mt-2 mr-2" data-toggle="view">
															<div>
																<span class="font-weight-bolder font-size-lg mr-2">'.$value->message->subject.' -</span>
																<span class="text-muted">'.substr($value->message->message_body, 0,50).'...</span>
															</div>
															
														</div>
														<!--end::Info-->
														<!--begin::Datetime-->
														<div class="mt-2 mr-3 font-weight-bolder w-50px text-right" data-toggle="view"></div>
														
														<!--end::Datetime-->
													</div>';
    	}
    }
}
