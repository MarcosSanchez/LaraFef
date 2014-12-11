<?php

class Contact extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		 'firs_name' => 'required|min:3',
		 'email'	=> 'required|email',
		 'subject' => 'required',
		 'message' => '',
	];

	// Don't forget to fill this array
	protected $fillable = [];

}