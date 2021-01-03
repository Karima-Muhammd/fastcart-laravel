<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(['middleware'=>['api'],'namespace'=>'Api'],function () {
    Route::get('/Package/{id}', 'PackageApiController@show');
    Route::get('/Package', 'PackageApiController@index');
    Route::put('/Package/{id}', 'PackageApiController@update');
    Route::post('/Package/{id}', 'PackageApiController@store');

    Route::get('/Ticket/{id}', 'TicketApiController@show');
    Route::get('/Ticket', 'TicketApiController@index');
    Route::put('/Ticket/{id}', 'TicketApiController@update');
    Route::post('/Ticket', 'TicketApiController@store');

    Route::get('/Subscriber/{id}', 'SubscriberApiController@show');
    Route::get('/Subscriber', 'SubscriberApiController@index');
    Route::put('/Subscriber/{id}', 'SubscriberApiController@update');
    Route::post('/Subscriber', 'SubscriberApiController@store');

    Route::get('/Message/{id}', 'MessageApiController@show');
    Route::get('/Message', 'MessageApiController@index');
    Route::put('/Message/{id}', 'MessageApiController@update');
    Route::post('/Message', 'MessageApiController@store');

    Route::get('/Branch/{id}', 'BranchApiController@show');
    Route::get('/Branch', 'BranchApiController@index');
    Route::put('/Branch/{id}', 'BranchApiController@update');
    Route::post('/Branch', 'BranchApiController@store');

});
