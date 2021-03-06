<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


//=============
//! Frontend 
//=============


/*Route::get('/', function()
{
	//return View::make('home');
});*/
Route::get('/', 'HomeController@pageView');



Route::get('register', 'HomeController@register');

Route::get('login', 'HomeController@login');
Route::post('login', 'HomeController@loginPost');
Route::get('logout', 'HomeController@logout');

Route::get('contacto', 'HomeController@contactForm');
Route::post('contacto', 'HomeController@contactFormPost');

Route::get('{slug}', 'HomeController@pageView');



Route::get('activation/{user_id}/{code}', 'HomeController@activateUser');


//============
//! Backend 
//============


Route::group(array('prefix' => 'admin'), function()
{

	Route::resource('users', 'UsersController');
	
	Route::resource('pages', 'PagesController');
	
	Route::resource('blogs', 'BlogsController');

});