<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//both
Route::get('cities', 'LocationController@getCities');
Route::get('states', 'LocationController@getStates');
Route::get('positions', 'PositionController@get');
Route::get('institutions', 'InstitutionController@get');
//both

//user
Route::prefix('user')->group(function () {
    Route::post('register', 'UserController@register')->name('register');
    Route::post('login', 'UserController@login')->name('login');
 
    Route::post('email/verify/{id}', 'VerificationController@verify')->name('verification.verify');
    Route::post('email/resend', 'VerificationController@resend')->name('verification.resend');
    Route::post('reset-password', 'UserController@sendPasswordResetLink');
    Route::post('reset/password', 'UserController@callResetPassword');

});
Route::group(['middleware' => ['jwt.verify'], 'prefix' => 'user'], function(){
    Route::get('profile', 'UserController@get');
    Route::post('logout', 'UserController@logout');
    Route::put('update', 'UserController@update');
    Route::put('update-password', 'UserController@updatePassword');

    Route::get('search', 'SearchController@index');
    Route::get('messages', 'MessageController@get');
    Route::post('message-create', 'MessageController@create');

    Route::get('permuts', 'PermutController@get');
    Route::post('permut-create', 'PermutController@create');
    Route::put('permut-update', 'PermutController@update');

    Route::get('payments', 'PaymentController@get');
    Route::get('premium', 'PaymentController@create');
    Route::get('mercadopago/callback', 'PaymentController@check');
});
//user

//admin
Route::prefix('admin')->group(function () {
    Route::post('login', 'AdminController@login')->name('login');
 
    Route::post('email/verify/{id}', 'VerificationController@verify')->name('verification.verify');
    Route::post('email/resend', 'VerificationController@resend')->name('verification.resend');
    Route::post('reset-password', 'AdminController@sendPasswordResetLink');
    Route::post('reset/password', 'AdminController@callResetPassword');

});
Route::group(['middleware' => ['jwt.admin'], 'prefix' => 'admin'], function(){
    Route::get('profile', 'AdminController@get');
    Route::post('logout', 'AdminController@logout');
    Route::put('update', 'AdminController@update');
    Route::put('update-password', 'AdminController@updatePassword');

    Route::post('register', 'AdminController@register')->name('register');

    //Location routes
    Route::post('create-state', 'LocationController@createState');
    Route::post('create-city', 'LocationController@createCity');

    Route::put('update-state', 'LocationController@updateState');
    Route::put('update-city', 'LocationController@updateCity');

    Route::delete('delete-state', 'LocationController@destroyState');
    Route::delete('delete-city', 'LocationController@destroyCity');
    //Location routes

    Route::post('create-position', 'PositionController@create');
    Route::put('update-position', 'LocationController@update');
    Route::delete('delete-position', 'LocationController@destroy');

    Route::post('create-institution', 'InstitutionController@create');
    Route::put('update-institution', 'InstitutionController@update');
    Route::delete('delete-institution', 'InstitutionController@destroy');

    Route::get('messages', 'MessageController@getAll');

    Route::get('permuts', 'PermutController@getAll');

    Route::get('payments', 'PaymentController@getAll');
});

    
//admin