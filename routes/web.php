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
    return view('welcome');
});

Auth::routes(['reset' => false]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('records/report', 'RecordController@report');
Route::resource('records', 'RecordController');
Route::resource('medical_rs', 'Medical_rController');
Route::resource('diagnostics', 'DiagnosticController');