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
    Route::post('/subcategories', 'SubcategoryController@store')->name('subcategories.store');
    Route::get('/subcategories', 'SubcategoryController@create')->name('subcategories.create');
    Route::get('/subcategories/{id}/edit', 'SubcategoryController@edit')->name('subcategories.edit');
    Route::patch('/subcategories/{id}', 'SubcategoryController@update')->name('subcategories.update');
    Route::delete('/subcategories/{id}', 'SubcategoryController@destroy')->name('subcategories.delete');
    Route::get('/formations', 'FormationController@index')->name('formations');
    Route::post('/formations', 'FormationController@store')->name('formations.store');
    Route::get('/formations/{id}/edit', 'FormationController@edit')->name('formations.edit');
    Route::patch('/formations/{id}', 'FormationController@update')->name('formations.update');
    Route::delete('/formations/{id}', 'FormationController@destroy')->name('formations.delete');
    Route::get('/regions', 'RegionController@index')->name('regions');
    Route::post('/regions', 'RegionController@store')->name('regions.store');
    Route::get('/regions/{id}/edit', 'RegionController@edit')->name('regions.edit');
    Route::patch('/regions/{id}', 'RegionController@update')->name('regions.update');
    Route::delete('/regions/{id}', 'RegionController@destroy')->name('regions.delete');
   

});

Route::middleware(['auth'])->middleware(['freelancer'])->prefix('freelancer')->group(function () {
    
});

Route::middleware(['auth'])->middleware(['manager'])->prefix('manager')->group(function () {
    
    Route::get('/', 'HomeController@index')->name('manager');
});

