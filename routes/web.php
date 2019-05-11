<?php

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

Route::get('/', 'PagesController@index');

Auth::routes();

// Group Auth middleware
Route::group(["middleware" => "auth", "prefix" => "admin"], function(){
	Route::get('/', 'AdminPagesController@dashboard');
	
	Route::get('/my-profile', 'Admin\MyProfileController@index');
	Route::put('/my-profile', 'Admin\MyProfileController@update');
	
	Route::get('/about-me', 'Admin\AboutMeController@index');
	Route::put('/about-me', 'Admin\AboutMeController@update');

	Route::get('/quotes', 'Admin\QuotesController@index');
	Route::put('/quotes', 'Admin\QuotesController@update');

	Route::get('/setting', 'Admin\SettingController@index');
	Route::put('/setting', 'Admin\SettingController@update');

	Route::resource('/experience', 'Admin\ExperienceController');

	Route::resource('/education', 'Admin\EducationController');

	Route::resource('/skills', 'Admin\SkillController');

	Route::resource('/portfolio', 'Admin\PortfolioController');
});