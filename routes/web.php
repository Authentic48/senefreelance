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
Route::post('/searchResults', 'SearchController@search')->name('search');
Route::get('autocomplete', 'SearchController@autocompleteSearch')->name('search.autocomplete');

Auth::routes(['verify' => true]);


Route::get('/profile', 'ProfileController@index')->name('profile');
Route::patch('/profile', 'ProfileController@update')->name('profile.update');
Route::get('/verify/email', 'HomeController@verify')->name('verify.user');

Route::middleware(['auth'])->middleware(['admin'])->prefix('admin')->group(function () {
    
    Route::get('/users', 'UserController@index')->name('admin.users');
    Route::get('/users/create', 'UserController@create')->name('admin.users.create');
    Route::post('/users', 'UserController@store')->name('admin.users.store');
    Route::get('/users/{ref}', 'UserController@edit')->name('admin.users.edit');
    Route::patch('/users/{ref}', 'UserController@update')->name('admin.users.update');
    Route::delete('/users/{ref}', 'UserController@destroy')->name('admin.users.delete');
    Route::get('/freelancers', 'ManFreelancerController@index')->name('admin.freelancers');
    Route::get('/freelancers/{ref}', 'ManFreelancerController@edit')->name('admin.freelancers.edit');
    Route::patch('/freelancers/{ref}', 'ManFreelancerController@update')->name('admin.freelancers.update');
    Route::delete('/freelancers/{ref}', 'ManFreelancerController@destroy')->name('admin.freelancers.delete');
    Route::get('/freelancer/{ref}', 'ManFreelancerController@show')->name('admin.freelancers.show');
   
});

Route::middleware(['auth'])->middleware(['verified'])->middleware(['freelancer'])->prefix('freelancer')->group(function () {

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
    Route::get('/dashboard', 'FreelancerController@dashboard')->name('freelancer.dashboard');
    
});

Route::middleware(['auth'])->middleware(['manager'])->prefix('manager')->group(function () {
    
    Route::get('/users', 'UserController@index')->name('manager.users');
    Route::get('/users/create', 'UserController@create')->name('manager.users.create');
    Route::post('/users', 'UserController@store')->name('manager.users.store');
    Route::get('/users/{ref}', 'UserController@edit')->name('manager.users.edit');
    Route::patch('/users/{ref}', 'UserController@update')->name('manager.users.update');
    Route::delete('/users/{ref}', 'UserController@destroy')->name('manager.users.delete');
    Route::get('/freelancers', 'ManFreelancerController@index')->name('manager.freelancers');
    Route::get('/freelancers/{ref}', 'ManFreelancerController@edit')->name('manager.freelancers.edit');
    Route::patch('/freelancers/{ref}', 'ManFreelancerController@update')->name('manager.freelancers.update');
    Route::delete('/freelancers/{ref}', 'ManFreelancerController@destroy')->name('manager.freelancers.delete');
    Route::get('/freelancer/{ref}', 'ManFreelancerController@show')->name('manager.freelancers.show');

});

