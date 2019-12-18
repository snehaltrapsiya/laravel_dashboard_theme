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

Route::group(['middleware' => 'auth'], function () {

    // All my routes that needs a logged in user
    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('users','UserController');
    Route::get('export', 'UserController@export')->name('export');
    Route::resource('roles','RoleController');
    Route::get('role_export', 'RoleController@export')->name('roles.export');       // ->name('roles.export') will be our link route url && role_export will be our link displayed on anchor link && actual method call will be RoleController@export
    Route::post('role_import', 'RoleController@import')->name('roles.import');
});

Auth::routes();
