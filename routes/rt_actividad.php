<?php
Route::get('Activity/ModalInfo','ActividadController@ModalInfo');
Route::post('Activity/SeguimientoTelefonico','ActividadController@seguimientoTel');
Route::post('Activity/AuditStore','ActividadController@auditStore');
Route::post('Activity/DisclaimerStore','ActividadController@DisclaimerStore');
Route::get('Activities/unsigned','ActividadController@unsigned');
Route::get('Activities/unresolved','ActividadController@unresolved');
?>