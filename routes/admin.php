<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect(route('adminlogin'));
});

// Authentication Routes...
Route::get('login', 'AdminAuthController@showLoginForm')->name('adminlogin');
Route::post('login', 'AdminAuthController@login');
Route::post('logout', 'AdminAuthController@logout')->name('logout');

Route::group(['middleware' => 'admin'], function () {
    Route::get('dashboard', 'AdminAuthController@showDashboard')->name('dashboard');
});