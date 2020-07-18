<?php
    
    Route::get('Users','UserController@index')->middleware('has.role:administrador');
    Route::get('MyProfile','UserController@myprofile');
    Route::get('home','UserController@myprofile');
    Route::get('User/{id}','UserController@show')->middleware('has.role:administrador');
    Route::get('User/M/Activities','UserController@activities');
    Route::post('User/fees/PreCC/store','CuentasporPagarProfesionalesController@PreCCStore');
    Route::get('User/fees/data','UserController@UserFee');
    Route::get('/User/ActiveOrders/{prf}','UserController@UserActiveOrders');
    



?>