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
	
	public function pageView($slug = null)
	{
		/*echo 'hola';
		echo $slug;*/

		
		$pages = Page::all();
		
		if(!is_null($slug))
		
			$page = Page::where('slug',$slug)->first();
			
		else {
			
			$page = Page::where('main',1)->first();
			
		}
		
		if(!empty($page))		
			return View::make('frontend.custompage',compact('page','pages'));
		else
			return View::make('errors.404');		
	}
	
	public function login()
	{
		return View::make('frontend.login');
	}
	
	public function logout()
	{
		
		Sentry::logout();
		
		return Redirect::to('login')->with('message','Logout correcto');
		
	}
	
	public function loginPost(){
		/*echo '<pre>';
		//print_r(input::all());
		print_r(Input::all());
		die();*/
		
		try
		{
		    //TO-DO: Validar las credenciales primero 
		    
		    $credentials = array(
		        'email'    => Input::get('email'),
		        'password' => Input::get('password'),
		    );
		
		    // Authenticate the user
		    $user = Sentry::authenticate($credentials, false);

		    
		    if(!empty($user))
		    {
			   
			   return Redirect::route('admin.users.index'); 
			    
		    }
		    
		    return Redirect::to('login')->withInput()->with('message',$message);
		
		}
		catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
		{
		    $message =  'Login field is required.';
		}
		catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
		{
		    $message =  'Password field is required.';
		    
		}
		catch (Cartalyst\Sentry\Users\WrongPasswordException $e)
		{
		    $message =  'Wrong password, try again.';
		}
		catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
		{
		    $message =  'User was not found.';
		}
		catch (Cartalyst\Sentry\Users\UserNotActivatedException $e)
		{
		    $message =  'User is not activated.';
		}
		
		// The following is only required if the throttling is enabled
		catch (Cartalyst\Sentry\Throttling\UserSuspendedException $e)
		{
		    $message =  'User is suspended.';
		}
		catch (Cartalyst\Sentry\Throttling\UserBannedException $e)
		{
		    $message = 'User is banned.';
		}
		
		return Redirect::to('login')->withInput()->with('message',$message);
		
	}

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