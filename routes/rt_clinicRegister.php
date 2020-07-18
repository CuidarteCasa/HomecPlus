<?php
Route::get('/ClinicRecordEvolution/{order}/{service}/{activity}','PagesController@ClinicalRecords');
Route::get('/ClinicRecordEvolution/chargePackage','PagesController@chargePackage');
Route::get('/ClinicRecordEvolution/validatePlan','PagesController@validatePlan');
Route::get('/ClinicRecordPrint/{tableName}/{format}/{activity}/{activityName}','RegistrosClinicosController@registerPdfMaker');
Route::get('/ClinicRecordDisplay','RegistrosClinicosController@registerDisplay');


Route::post('ClinicRecordStore/{name}','RegistrosClinicosController@ClinicRecordStore');

Route::post('ClinicRecordFormulation','RegistrosClinicosController@newFormulacion');
Route::post('ClinicRecordDx/Evento','RegistrosClinicosController@EventDxPaciente');

Route::post('ClinicalRecords/SaveAndClose','RegistrosClinicosController@SaveAndClose');
?>
