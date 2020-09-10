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

Route::get('alumniapi', 'AlumniController@api')->name('alumni.api');
Route::get('alumniapi/detail/{id}', 'AlumniController@apiDetail')->name('alumni.apidetail');
Route::get('alumniapi/piechart', 'AlumniController@apiPieChart')->name('alumni.apipiechart');
Route::get('alumniapi/barchart', 'AlumniController@apiBarChart')->name('alumni.apibarchart');
