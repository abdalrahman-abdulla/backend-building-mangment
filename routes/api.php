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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('users/all', 'userController@index');
Route::delete('users/{id}', 'userController@destroy');

Route::post('revenues', 'viewController@revenues');
Route::post('workstages', 'viewController@workstages');
Route::post('money', 'viewController@money');
Route::post('notifications', 'viewController@notifications');

Route::post('users', 'userController@store');


Route::post('building', 'buildingController@store');
Route::post('building/{id}/payment', 'paymentController@store');
Route::post('building/{id}/payment/all', 'paymentController@index');
Route::delete('building/{id}/payment/{payment_id}', 'paymentController@destroy');
Route::put('building/{id}/payment/{payment_id}', 'paymentController@update');


Route::put('building/{id}/payment/{payment_id}/add_repayment', 'paymentController@add_repayment');


Route::post('building/all', 'buildingController@index');
Route::delete('building/{id}', 'buildingController@destroy');

Route::post('building/{id}', 'buildingController@show');
Route::put('building/{id}', 'buildingController@update');
Route::post('users/{id}', 'userController@update');

Route::post('statistics', 'statController@index');


Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});
