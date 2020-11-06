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

Route::get('/freelancers', 'FreelancerController@index')->name('freelancers');
Route::get('/freelancers/{ref}', 'FreelancerController@show')->name('freelancers.show');


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
   
});

Route::middleware(['auth'])->middleware(['freelancer'])->prefix('freelancer')->group(function () {

    Route::get('/profile/create', 'FreelancerController@create')->name('freelancers.create');
    Route::post('/freelancers', 'FreelancerController@store')->name('freelancers.store');
    Route::get('/profile/edit', 'FreelancerController@edit')->name('freelancers.edit');
    Route::patch('/profile', 'FreelancerController@update')->name('freelancers.update');
    Route::get('/competences/create', 'SkillController@create')->name('skills.create');
    Route::post('/competences', 'SkillController@store')->name('skills.store');
    Route::get('/competences/{id}/edit', 'SkillController@edit')->name('skills.edit');
    Route::patch('/competences/{id}', 'SkillController@update')->name('skills.update');
    Route::delete('/competences/{id}', 'SkillController@destroy')->name('skills.delete');
    Route::get('/competences', 'SkillController@index')->name('competences');
    Route::get('/experiences/create', 'ExperienceController@create')->name('experiences.create');
    Route::post('/experiences', 'ExperienceController@store')->name('experiences.store');
    Route::get('/experiences/{id}/edit', 'ExperienceController@edit')->name('experiences.edit');
    Route::patch('/experiences/{id}', 'ExperienceController@update')->name('experiences.update');
    Route::delete('/experiences/{id}', 'ExperienceController@destroy')->name('experiences.delete');
    Route::get('/experiences', 'ExperienceController@index')->name('experiences');
    
});

Route::middleware(['auth'])->middleware(['manager'])->prefix('manager')->group(function () {
    
    Route::get('/', 'HomeController@index')->name('manager');
});

