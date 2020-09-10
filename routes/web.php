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

// use Illuminate\Routing\Route;

Route::resource('alumni', 'AlumniController');
Route::get('/alumni/export/excel', 'AlumniController@export_excel')->name('alumni.export');
Route::get('/', function () {
    return redirect()->route('alumni.index');
});
