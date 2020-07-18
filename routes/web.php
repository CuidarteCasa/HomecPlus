<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function(){
	return view('auth.login');
});


// Demo routes
Route::get('/datatables', 'PagesController@datatables');
Route::get('/ktdatatables', 'PagesController@ktDatatables');
Route::get('/select2', 'PagesController@select2');
Route::get('/icons/custom-icons', 'PagesController@customIcons');
Route::get('/icons/flaticon', 'PagesController@flaticon');
Route::get('/icons/fontawesome', 'PagesController@fontawesome');
Route::get('/icons/lineawesome', 'PagesController@lineawesome');
Route::get('/icons/socicons', 'PagesController@socicons');
Route::get('/icons/svg', 'PagesController@svg');

// Quick search dummy route to display html elements in search dropdown (header search)
Route::get('/quick-search', 'PagesController@quickSearch')->name('quick-search');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function () {

Route::get('/test',function(){
	return view('pages.test');
});

require (__DIR__ . '/rt_user.php');
require (__DIR__ . '/rt_paciente.php');
require (__DIR__ . '/rt_agenda.php');
require (__DIR__ . '/rt_clinicRegister.php');
require (__DIR__ . '/rt_mail.php');
require (__DIR__ . '/rt_programador.php');
require (__DIR__ . '/rt_ordendeservicio.php');
require (__DIR__ . '/rt_actividad.php');
require (__DIR__ . '/rt_global.php');
require (__DIR__ . '/rt_formulacion.php');
require (__DIR__ . '/rt_ordendetrabajo.php');
require (__DIR__ . '/rt_informes.php');
require (__DIR__ . '/rt_contabilidad.php');

});

