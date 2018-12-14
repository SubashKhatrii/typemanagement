<?php

use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('pages','TypesController');

Route::get('/','TypesController@index');
Route::match(['get','post'],'/pages/delete-permanently/{id}','TypesController@deletePermanently');
Route::get('/getImport','ExcelController@getImport');
Route::post('/postImport','ExcelController@postImport');
Route::get('/getExport','ExcelController@getExport');

Route::get('/download','UsersController@export');
Route::get('/import','UsersController@import');