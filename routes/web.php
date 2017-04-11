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

Route::get('/logout', 'Auth\LoginController@logout');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::post('/home', 'HomeController@search');


Route::get('/box/{id}/feedback', 'BoxController@showFeedback');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/wizard','WizardController@showGeneral');
    Route::post('/wizard/general','WizardController@storeGeneral');
    Route::get('/wizard/categories','WizardController@showCategories');
    Route::post('/wizard/categories','WizardController@storeCategories');
    Route::get('/wizard/emails','WizardController@showEmails');
    Route::post('/wizard/emails','WizardController@storeEmails');
    Route::get('/wizard/preview','WizardController@showPreview');

    Route::get('/wizard/create','WizardController@create');

});

Route::get('/lang/{code}', 'HomeController@changeLang');

Route::get('/{code}', 'FeedbackController@create');
Route::post('/{code}', 'FeedbackController@store');
