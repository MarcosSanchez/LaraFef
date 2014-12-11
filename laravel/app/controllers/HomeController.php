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
    |   Route::get('/', 'HomeController@showWelcome');
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
    
///  contacto

    public function contactForm()
    {
        
        $pages = Page::all();
        
        return View::make('frontend.contact', compact('pages'));
        
    }

    // contacto formulario que viene por ajax
    public function contactFormPost()
    {
        
        if(Request::ajax()) {
    
     $messages = array(
            'required'        => 'El campo :attribute es obligatorio.',
            'min'             => 'El campo :attribute no puede tener menos de :min carácteres.',
            'email'         => 'El campo :attribute debe ser un email válido.',
        );

            //$validator = Validator::make($data = Input::all('_token'), Contact::$rules, $messages);
           $validator = Validator::make($data = Input::all(), Contact::$rules, $messages);
             
    

            
            if($validator->passes())
            {
                
                $contact = new Contact;
                
                $contact->nombre = Input::get('nombre');
                
                $contact->email = Input::get('email');
                
                $contact->asunto = Input::get('asunto');
                
                $contact->mensaje = e(strip_tags(Input::get('mensaje')));
                
                if($contact->save()){
                    
                    Mail::send('emails.contact', array('data' => Input::all()), 
                    function($message)
                    {
                        $message->to('pepe@pepito.com')->subject('Tienes un contacto!');
                    });
                    
                    return Response::json(array('success' => 'Mensaje enviado'));
                    
                } else {
                    
                    return Response::json(array('error' => 'Problema en el envio'));
                    
                }
                
            } else {
                
                return Response::json(array('error' => $validator->messages()));
                
            }
        
        } else {
            
            return Response::json(array('Invalid action'));         
        }
        
    }
    



/// login 
    public function login()
    {$pages = Page::all();
        return View::make('frontend.login', compact('pages'));
    }
    
    public function logout()
    {
        
        Sentry::logout();
        
        return Redirect::to('/')->with('message','Logout correcto');
        
    }
    
    public function loginPost(){
        /*echo '<pre>';
        //print_r(input::all());
        print_r(Input::all());
        die();*/
        
        try
        {
            //TO-DO: Validar las credenciales primero 
    
            $rules = array(     
                'email'             =>  'required|email',
                'password'          =>  'required|min:6'
            );
            $messages = array(  
                'required'      =>  'El campo :attribute es obligatorio.',
                'min'           =>  'El campo :attribute debe ser un email válido.',
                'email'         =>  'El campo debe ser un email válido'
            );
            $validation = Validator::make($data = Input::all(),$rules,$messages);
            if ($validation->fails())
            {
                  return Response::json(array(
                    'success' => false,
                    'errors'  => $validation->getMessageBag()->toArray()
                    ));
                  //devuelve a js con errores.
                  //return Redirect::back()->withErrors($validator,'createuser')->withInput();
            }else{          
                $credentials = array(
                    'email'    => Input::get('email'),
                    'password' => Input::get('password')
                );
            
                // Authenticate the user
                $user = Sentry::authenticate($credentials, false);

                
                if(!empty($user))
                {
  
                   //return Redirect::route('admin.users.index'); 
                       return Response::json(array(
                    'success' => true,
                    'message'  => 'Regitro correcto'
                    ));
                    
                }
                return Response::json(array(
                    'success' => false,
                    'errors'  => $message
                    ));
                //return Redirect::to('/')->withInput()->with('message',$message);
            }
        }
        catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
        {
            $message =  array('Usuario'  => 'Login, campo requerido.');
        }
        catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
        {
            $message =  array('Clave'  => 'Campo Password requerido');
            
        }
        catch (Cartalyst\Sentry\Users\WrongPasswordException $e)
        {
            $message =  array('Clave'  => 'Usuario o clave no correcto');
        }
        catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
        {
            $message =  array('Usuario'  => 'Usuario o clave no enctrado');
        }
        catch (Cartalyst\Sentry\Users\UserNotActivatedException $e)
        {
            $message =  array('Usuario'  => 'Usuario no activado , revise su email.');
        }
        
        // The following is only required if the throttling is enabled
        catch (Cartalyst\Sentry\Throttling\UserSuspendedException $e)
        {
            $message =  array('Usuario'  => 'Usuario, revise su email.');
        }
        catch (Cartalyst\Sentry\Throttling\UserBannedException $e)
        {
            $message = array('errors'  => 'User is banned.');
        }
        return Response::json(array(
                    'success' => false,
                    'errors'  => $message
                    ));
        //return Redirect::to('/')->withInput()->with('message',$message);
        
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