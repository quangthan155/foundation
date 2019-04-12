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
});

Route::get('/logout', 'Admin\LoginController@logout')       
->name('admin_logout');

Route::get('/dashboard', 'Admin\AdminController@dashboard');
?>