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

Route::middleware('auth')->group(function(){
    Route::get('/', 'AuthController@home')->name('home');
    Route::post('/changePassword','UserController@changePassword')->name('changePassword');
    Route::put('/changeProfile','UserController@changeProfile')->name('changeProfile');
    Route::get('/profile', 'UserController@profile')->name('profile');
    Route::resource('kategori', 'KategoriController');
    Route::resource('subkategori', 'SubKategoriController');
    Route::resource('status', 'StatusController');
    Route::resource('tipe', 'TipeController');
    Route::resource('moment', 'MomentController');
    Route::get('/profile','UserController@profile')->name('profile');
    Route::get('findSubKategori/{id}', 'SubKategoriController@findSubKategori');


});
Route::get('/login', 'AuthController@login')->name('login');
Route::post('/loginProses', 'AuthController@loginProses')->name('loginProses');
Route::get('/logout', 'AuthController@logout')->name('logout');

Route::get('/linkstorage', function () {
    \Illuminate\Support\Facades\Artisan::call('storage:link');
    echo 'ok';
});