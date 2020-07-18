<?php
Route::get('Service/modalInfo','OrdenDeServicioController@ModalInfo');
Route::get('Service/UserList','OrdenDeServicioController@serviceUserList');
Route::post('Service/reasignService','OrdenDeServicioController@reasignService');
Route::get('Service/observations','OrdenDeServicioController@observationlist');


?>