<?php



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('pages','TypesController');

Route::get('/','TypesController@index');
Route::match(['get','post'],'/pages/delete-permanently/{id}','TypesController@deletePermanently');