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

Route::get('csv/upload', 'Web\CsvController@upload')->name('csv.upload.page');
Route::post('csv/upload', 'Web\CsvController@handleUpload')->name('csv.upload.process');

Route::get('category/{Field}', 'Web\CategoryController@categoryByField')->name('category.Field.get');

Route::resource('admin/category', 'CategoryController');

Route::resource('admin/field', 'FieldController');