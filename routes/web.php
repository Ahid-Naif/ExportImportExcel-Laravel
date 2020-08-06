<?php

use Illuminate\Support\Facades\Route;

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
    return view('importexport');
});

/* Upload File */
Route::get('/uploadfile','UploadFileController@index');
Route::post('/uploadfile','UploadFileController@showUploadFile');

/* Excel import export */
// Route::get('export'          , 'UsersController@export')->name('export');
Route::get('export'          , 'AttendanceController@export')->name('export');
Route::post('import'         , 'AttendanceController@import')->name('import');

Route::get('importExportView', 'UsersController@importExportView');
// Route::post('import'         , 'UsersController@import')->name('import');