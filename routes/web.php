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

Route::get('/', 'PagesController@welcome')->name('welcome');

Route::get('/about', 'PagesController@about')->name('about');

Route::get('/how', 'PagesController@how')->name('how');

Auth::routes();

Route::middleware(['auth'])->middleware(['admin'])->prefix('admin')->group(function () {
    
    Route::get('/', 'HomeController@index')->name('admin');
    Route::get('/profile', 'ProfileController@index')->name('profile');
    Route::patch('/profile', 'ProfileController@update')->name('profile.update');
});

Route::middleware(['auth'])->middleware(['freelancer'])->prefix('freelancer')->group(function () {
    
    Route::get('/', 'HomeController@index')->name('freelancer');
});

