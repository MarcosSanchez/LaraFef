<?php

class Page extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		 'title' => 'required|min:3',
		 'slug'	=> 'required|min:3',
		 'content' => 'min:5'
	];

	// Don't forget to fill this array
	protected $fillable = [];

}