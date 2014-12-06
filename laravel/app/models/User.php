<?php

/*use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;*/
use Cartalyst\Sentry\Users\Eloquent\User as SentryUserModel;

class User extends SentryUserModel {

	//use UserTrait, RemindableTrait;
	
	public static $rules = array( 	'first_name' 		=> 	'required',
									'last_name'			=>  'required',
									'email'				=> 	'required|email|unique:users',
									'password'			=>	'required|min:6',
									'password-repeat'	=>	'required|same:password',
									'avatar'			=>	'required|mimes:jpeg,bmp,png',
	);

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

}