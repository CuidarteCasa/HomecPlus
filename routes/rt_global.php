<?php

Route::post('quickNoteStore','PagesController@quickNoteStore')->name('quickNote');
Route::get('quickNoteGet','PagesController@quickNoteGet')->name('quickNote');
Route::get('activePackageForFormulation/{eps}','PagesController@activePackageForFormulation');
Route::get('/notifications/asRead','NotificationsController@asReadNtf');
Route::post('Vfail','AgendaDomiciliariaController@VfailStore');
Route::post('NrfPrf','AgendaDomiciliariaController@NrfPrfStore');
Route::get('Active/Package/{pcte}','PagesController@activePackage');
Route::get('Package/services','PagesController@packageServices');
Route::get('Userplanta/select','PagesController@sltUserPlanta');
Route::post('signatureCertified','PagesController@signatureCertified');
Route::get('Selectcie10','PagesController@Selectcie10');
?>