<?php

Route::get('/Paciente/{id}','PacienteController@show');
Route::get('/Paciente','PacienteController@index');
Route::get('/Dt_pacientes','PacienteController@Dt_pacientes');
Route::get('/Paciente/dx/{id}','PacienteController@dxList');
Route::get('/Paciente/medNutCompl/{id}','PacienteController@medNutCompl');
Route::get('/Paciente/med/Valid/','PacienteController@validMed');
Route::get('Paciente/nut/Valid/','PacienteController@validNut');
Route::get('Paciente/complementario/Valid','PacienteController@validCompl');
Route::get('/Paciente/dx/History/records','PacienteController@dxHistory');
Route::get('/Paciente/info/vitals','PacienteController@vitalsInfo');
Route::get('/Paciente/info/mna','PacienteController@mnaInfo');
Route::get('/Paciente/info/antecedentes','PacienteController@antecedentesInfo');
Route::post('/Paciente/new/antecedente','PacienteController@antecedentesNew');
Route::get('/Paciente/dx/History/records/resume','PacienteController@DxResume');
Route::get('/Paciente/Medical/History','PacienteController@MedicalHistory');
Route::get('/Paciente/vFail/History','PacienteController@VFailHistory');
Route::get('Paciente/NtfPrf/History','PacienteController@NtfPrfHistory');
Route::get('Paciente/Status/History','PacienteController@StatusHistory');
Route::get('Paciente/SPADAnalist/History','PacienteController@SPADAnalist');
Route::get('Paciente/SPADPrf/History','PacienteController@SPADPrf');
Route::get('Paciente/News/History','PacienteController@News');
Route::get('Paciente/save/newDx','PacienteController@saveNewCie');
?>