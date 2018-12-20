<?php

use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::any('/pages/create', 'TypesController@store') -> name('pages-store');

Route::any('/pages/edit/{id}', 'TypesController@edit') -> name('pages-edit');

Route::get('/pages/index','TypesController@index') -> name('pages-index');
 Route::get('/pages/enable/{id}', 'TypesController@enable') -> name('pages-enable');
  Route::get('/pages/disable/{id}', 'TypesController@disable') -> name('pages-disable');


Route::get('/download','UsersController@export');
Route::get('/import','UsersController@import');