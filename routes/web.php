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

Route::get('/', function () {
    return view('public.presentation.home');
});


Route::get('bootstrap', function () {
    return view('bootstrap');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/wizard','WizardController@general');
Route::post('/wizard/general','WizardController@general');
Route::get('/wizard/categories','WizardController@categories');
Route::post('/wizard/categories','WizardController@categories');
Route::get('/wizard/emails','WizardController@emails');
Route::post('/wizard/emails','WizardController@emails');
Route::get('/wizard/preview','WizardController@preview');
Route::get('/wizard','WizardController@create');
