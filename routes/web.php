<?php

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

/*Route::get('/', function () {
    return view('welcome');
});*/


Route::get('/','sentinelauth\SentinelAuthController@loginpage')->name('sentinel_loginpage');

Route::post('backend/login','sentinelauth\SentinelAuthController@loginprocess')->name('sentinel_loginprocess');

Route::get('backend/logout','sentinelauth\SentinelAuthController@logoutprocess')->name('sentinel_logoutprocess');

Route::get('backend/registration','sentinelauth\SentinelAuthController@registrationpage')->name('sentinel_registrationpage');

Route::post('backend/registrationprocess','sentinelauth\SentinelAuthController@registrationprocess')->name('sentinel_registrationprocess');

Route::get('backend/activateuser/{user_email}','sentinelauth\SentinelAuthController@activateuser')->name('sentinel_activateuser');

Route::get('backend/forgotpasswordpage','sentinelauth\SentinelAuthController@forgotpasswordpage')->name('sentinel_forgotpasswordpage');

Route::post('backend/checkemail','sentinelauth\SentinelAuthController@checkemail')->name('sentinel_checkemail');

Route::get('backend/resetpasswordpage/{user_email}/{activation_code}','sentinelauth\SentinelAuthController@resetpasswordpage')->name('sentinel_resetpasswordpage');

Route::post('backend/resetpasswordprocess','sentinelauth\SentinelAuthController@resetpasswordprocess')->name('sentinel_resetpasswordprocess');


Route::group(['middleware' => ['iamadministrator','prevent-back-history'],'prefix' => 'backend'], function () {

	Route::get('dashboard',function(){
		return view('backend.dashboard');
	})->name('backend_dashboard');

	Route::resource('sections','SectionsController');

	Route::post('set_sections_position','SectionsController@set_sections_position')->name('set_sections_position');

	Route::resource('company', 'CompanyController')->only(['index', 'update']);

});