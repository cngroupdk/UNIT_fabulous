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

Route::get('/', 'HomeController@index');


Route::get('bootstrap', function () {
    return view('bootstrap');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
<<<<<<< HEAD


Route::get('/wizard','WizardController@general');
//Route::post('/wizard/general','WizardController@general');
Route::get('/wizard/categories','WizardController@categories');
//Route::post('/wizard/categories','WizardController@categories');
//Route::get('/wizard/emails','WizardController@emails');
//Route::post('/wizard/emails','WizardController@emails');
//Route::get('/wizard/preview','WizardController@preview');
//Route::get('/wizard','WizardController@create');
=======
Route::post('/home', 'HomeController@search');
Route::get('/{code}', 'FeedbackController@index');

Route::group(['middleware' => ['auth']], function () {

});
>>>>>>> f16684f96080700042d68f7c8004cc1167b27b85
