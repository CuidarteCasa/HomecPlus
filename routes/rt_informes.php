<?php
Route::get('Reports','ReportsController@index');
Route::get('Reports/{id}','ReportsController@show');
Route::get('Reports/auditPending/{departure}','ReportsController@auditPendingClinic');
Route::get('Reports/audited/{user}','ReportsController@auditUser');