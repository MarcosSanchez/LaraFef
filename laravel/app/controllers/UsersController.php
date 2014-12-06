<?php

class UsersController extends \BaseController {

	/**
	 * Display a listing of users
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = User::all();

		return View::make('users.index', compact('users'));
	}

	/**
	 * Show the form for creating a new user
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('users.create');
	}

	/**
	 * Store a newly created user in storage.
	 *
	 * @return Response
	 */
	public function store()

	{
		
		$validator = Validator::make($data = Input::all(), User::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator,'createuser')->withInput();
		}
		
		if(Input::file('avatar')->isValid()) {
			
			$avatar_url = $this->uploadAvatar();

			$user = Sentry::register(array(
		        'email'    	=> Input::get('email'),
		        'password' 	=> Input::get('password'),
		        'first_name' => Input::get('first_name'),
		        'last_name' => Input::get('last_name'),
		        'avatar' 	=> $avatar_url,
		    ));
		    
		   $this->sendEmail($user);
		   

		}
		
		return Redirect::to('login');
		
		
	}
	
	private function uploadAvatar(){
		
		$extension = Input::file('avatar')->getClientOriginalExtension();
			
		$name_file = md5(Input::get('email')).'.'.$extension;
		
		$path = 'uploads/'.date('Y').'/'.date('m').'/';
		
		//Subimos la imagen
		Input::file('avatar')->move($path,$name_file); 
		
		//Escalamos la imagen a 150px de ancho
		$img = Image::make($path.$name_file);
		
		$img->resize(150, null, function ($constraint) {
			
		    $constraint->aspectRatio();
		    
		})->save();
		
		return $path.$name_file;
		
	}

	private function sendEmail($user){
		
		Mail::send('emails.activation', array('code' => $user->getActivationCode(), 'user_id' => $user->id), 
		function($message) use ($user)
		{
		    $message->to($user->email, $user->first_name)->subject('Activate!');
		});
		
	}

	/**
	 * Display the specified user.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = User::findOrFail($id);

		return View::make('users.show', compact('user'));
	}

	/**
	 * Show the form for editing the specified user.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = User::find($id);

		return View::make('users.edit', compact('user'));
	}

	/**
	 * Update the specified user in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$user = User::findOrFail($id);

		$validator = Validator::make($data = Input::all(), User::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$user->update($data);

		return Redirect::route('users.index');
	}

	/**
	 * Remove the specified user from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		User::destroy($id);

		return Redirect::route('users.index');
	}

}
