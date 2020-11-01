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

Route::get('/profile', 'ProfileController@index')->name('profile');
Route::patch('/profile', 'ProfileController@update')->name('profile.update');

Route::middleware(['auth'])->middleware(['admin'])->prefix('admin')->group(function () {
    
    Route::get('/', 'HomeController@index')->name('admin');
    Route::get('/categories', 'CategoryController@index')->name('categories');
    Route::post('/categories', 'CategoryController@store')->name('categories.store');
    Route::get('/categories/{id}/edit', 'CategoryController@edit')->name('categories.edit');
    Route::patch('/categories/{id}', 'CategoryController@update')->name('categories.update');
    Route::delete('/categories/{id}', 'CategoryController@destroy')->name('categories.delete');
   

});

Route::middleware(['auth'])->middleware(['freelancer'])->prefix('freelancer')->group(function () {
    
});

Route::middleware(['auth'])->middleware(['manager'])->prefix('manager')->group(function () {
    
    Route::get('/', 'HomeController@index')->name('manager');
});

