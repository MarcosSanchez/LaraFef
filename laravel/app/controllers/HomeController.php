<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

/*	public function showWelcome()
	{
		return View::make('hello');
	}
*/
	public function register()
	{
		return View::make('frontend.register');
	}
	

	public function activateUser($user_id,$code){
		
		try {
			
			$user = Sentry::findUserById($user_id);
	
			$status = '';
	
		    // Attempt to activate the user
		    if ($user->attemptActivation($code))
		    {
			    
			    $status = 'activo';	
		       
		    }
		    else
		    {
		        $status = 'no activo';
		    }
	    
	    }
		catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
		{
		    $status =  'Usuario no encontrado';
		}
		catch (Cartalyst\Sentry\Users\UserAlreadyActivatedException $e)
		{
		    $status = 'Usuario ya activado';
		}
	    
	    return View::make('frontend.activation',compact('status'));
		
    }
}