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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::middleware(['auth:api'])->group(function () {
    Route::get('cars', 'App\Http\Controllers\CarController@getAll');
    Route::get('car/{id}', 'App\Http\Controllers\CarController@getById');
    Route::get('car-selling-report/{id}', 'App\Http\Controllers\CarController@getSellingReport');
    Route::get('car-search', 'App\Http\Controllers\CarController@getByName');
    Route::post('car', 'App\Http\Controllers\CarController@save');
    Route::get('motorcycles', 'App\Http\Controllers\MotorcycleController@getAll');
    Route::get('motorcycle/{id}', 'App\Http\Controllers\MotorcycleController@getById');
    Route::get('motorcycle-selling-report/{id}', 'App\Http\Controllers\MotorcycleController@getSellingReport');
    Route::get('motorcycle-search', 'App\Http\Controllers\MotorcycleController@getByName');
    Route::post('motorcycle', 'App\Http\Controllers\MotorcycleController@save');
    Route::post('sell-car', 'App\Http\Controllers\SellingCarController@save');
    Route::post('sell-motorcycle', 'App\Http\Controllers\SellingMotorcycleController@save');
    Route::get('buyers', 'App\Http\Controllers\BuyerController@getAll');
    Route::get('buyer/{id}', 'App\Http\Controllers\BuyerController@getById');
    Route::get('buyer-search', 'App\Http\Controllers\BuyerController@getByName');
});

Route::group([
    'prefix' => 'auth'
], function(){
    Route::post('register', 'App\Http\Controllers\AuthController@register');
    Route::post('login', 'App\Http\Controllers\AuthController@login');
    Route::group([
        'middleware' => 'auth:api'
    ], function(){
        Route::post('logout', 'App\Http\Controllers\AuthController@logout');
        Route::post('refresh', 'App\Http\Controllers\AuthController@refresh');
        Route::get('data', 'App\Http\Controllers\AuthController@data');
    });
});