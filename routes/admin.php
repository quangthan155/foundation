<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/
Route::group(['middleware' => 'web'], function () {
    Route::get('/login', 'Admin\LoginController@showLoginForm');
    Route::post('/login', 'Admin\LoginController@login')       
    ->name('admin_login');
    Route::get('/logout', 'Admin\LoginController@logout')       
    ->name('admin_logout');
    Route::get('/dashboard', 'Admin\AdminController@dashboard');
    Route::get('/user', 'Admin\UserController@index')->name('admin.user.index');
});





/*
|--------------------------------------------------------------------------
| User management
|--------------------------------------------------------------------------
*/


Route::get('/user/create', 'Admin\UserController@create')->name('admin.user.create');
Route::post('/user/store', 'Admin\UserController@store')->name('admin.user.store');
Route::get('/user/{id}', 'Admin\UserController@show')->name('admin.user.show');
Route::get('/user/{id}/edit', 'Admin\UserController@edit')->name('admin.user.edit');
Route::post('/user/{id}/update', 'Admin\UserController@update')->name('admin.user.update');
Route::delete('/user/{id}/destroy', 'Admin\UserController@destroy')->name('admin.user.destroy');

?>