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

Route::get('/contact', 'PagesController@contact')->name('contact');

Route::get('/privacy', 'PagesController@privacy')->name('privacy');

Route::get('/terms', 'PagesController@terms')->name('terms');

Route::get('/appointment', 'PagesController@appointment')->name('appointment');

Route::get('/how', 'PagesController@how')->name('how');

Route::get('/pricing', 'PagesController@pricing')->name('pricing');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
