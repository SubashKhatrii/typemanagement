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

Route::get('/pages/importExport', 'TypesController@importExport')->name('import-export');
Route::get('/pages/downloadExcel/{type}', 'TypesController@downloadExcel')->name('pages-download');
Route::post('pages/importExcel', 'TypesController@importExcel')->name('pages-import');