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
Route::get('/freelancers/{freelancer_ref}', 'FreelancerController@show')->name('freelancers.show');
Route::post('/report', 'ReportController@store')->name('report.store');
Route::post('/review', 'ReviewController@store')->name('review.store');
Route::get('/freelancers/categorie/{freelancer_category}', 'FreelancerController@filterByCategory')->name('freelancers.category');
Route::get('/freelancers/region/{freelancer_region}', 'FreelancerController@filterByRegion')->name('freelancers.region');


Auth::routes();

Route::get('/profile', 'ProfileController@index')->name('profile');
Route::patch('/profile', 'ProfileController@update')->name('profile.update');

Route::middleware(['auth'])->middleware(['admin'])->prefix('admin')->group(function () {
    
    Route::get('/', 'HomeController@index')->name('admin');
   
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
    Route::get('/education/create', 'EducationController@create')->name('education.create');
    Route::post('/education', 'EducationController@store')->name('education.store');
    Route::get('/education/{id}/edit', 'EducationController@edit')->name('education.edit');
    Route::patch('/education/{id}', 'EducationController@update')->name('education.update');
    Route::delete('/education/{id}', 'EducationController@destroy')->name('education.delete');
    Route::get('/education', 'EducationController@index')->name('education');
    
});

Route::middleware(['auth'])->middleware(['manager'])->prefix('manager')->group(function () {
    
    Route::get('/', 'HomeController@index')->name('manager');
});

