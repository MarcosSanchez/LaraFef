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
				   
		
		
		$contacts = Contact::all(); 

		/*    echo '<pre>';
	        var_export($contacts);
	        die();*/
        
        /*echo '<pre>';
		print_r(Sentry::getUser());
		die();*/

		$current_user = Sentry::getUser();

		return View::make('users.index', compact('users','current_user','contacts'));
		//return View::make('users.index', compact('users','current_user'));
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
		
		
		$validator = Validator::make($data = Input::except('action'), User::$rules);

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
	/*	echo '<pre>';
		//print_r(input::all());
		print_r(Input::get('action'));
		die();
	*/	
		if(Input::get('action'))

			return Redirect::to('admin/users')->with('message','Usuario '.$user->id.' actualizado');
		else
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
		$avatar = array();
		
		$user = User::findOrFail($id);
		
		$rules = User::$rulesEdit;

		if($user->email != Input::get('email')){
			$rules['email'] = $rules['email'] . '|unique:users';
		}

		$validator = Validator::make($data = Input::all(),$rules);

		if ($validator->fails()/* or User::existEmail(Input::get('email'))*/)
		{
			
			return Redirect::back()->withErrors($validator)->withInput();
		}
		
		if(File::exists(public_path().'/'.$user->avatar) and Input::hasFile('avatar'))
		{
			
			File::delete(public_path().'/'.$user->avatar);
			
			$avatar = array('avatar' => $this->uploadAvatar());
		
		}
// suma de arrays 
		$user->update(Input::except('avatar') + $avatar);

		return Redirect::to('admin/users')->with('message','Usuario '.$user->id.' actualizado');
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

		return Redirect::to('admin/users')->with('message','Usuario '.$id.' actualizado');
	}

}