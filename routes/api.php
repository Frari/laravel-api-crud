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

Route::namespace('Api')->group(function(){
  Route::get('/movies', 'MoviesController@index');
  Route::get('/movies/{id}', 'MoviesController@show');
  Route::post('/movies', 'MoviesController@store');
  // In entrambi i casi mettiamo post al posto di put o delete perchè altrimenti dobbiamo utilizzare l hidden _method put all'iterno di postman
  Route::post('/movies/{id}', 'MoviesController@update');
  Route::post('/movies/{id}/delete', 'MoviesController@destroy');
});
