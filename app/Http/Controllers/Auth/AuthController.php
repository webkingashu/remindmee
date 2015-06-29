<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Registration & Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users, as well as the
	| authentication of existing users. By default, this controller uses
	| a simple trait to add these behaviors. Why don't you explore it?
	|
	*/

	use AuthenticatesAndRegistersUsers;

	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
	 * @return void
	 */
	public function __construct(Guard $auth, Registrar $registrar)
	{
		$this->auth = $auth;
		$this->registrar = $registrar;

		$this->middleware('guest', ['except' => 'getLogout']);
	}
        /**
         * lets customize the login method 
         * 
         * @param \App\Http\Controllers\Auth\Request $request
         * @return type
         * 
         */
        public function postLogin(\Illuminate\Http\Request $request)
	{
            $this->validate($request, ['user_email' => 'required|email', 'user_pass' => 'required']);

           //$credentials = $request->only('user_email', 'user_pass');
           $user_email = $request->user_email;
           $user_pass = $request->user_pass;
           //$remember = $request->remember;
          // var_dump($this->auth->attempt(['user_email'=>$user_email,'password'=>$user_pass]));
           
           
            //dd($query);
    // First attempt with model in config
         if ($this->auth->attempt(['user_email'=>$user_email,'password'=>$user_pass], $request->has('remember')))
            {
             // return redirect('home');
              $columns = array('meta_value');
             $users = \App\Usermeta::
                     where('user_id','=',\Auth::user()->ID)
                     ->where('meta_key','=','wp_capabilities')
                     ->get($columns);
      
           if ($users['0']['meta_value']=='a:1:{s:13:"administrator";b:1;}'){
         //dd($users)
        // echo "hi done!!";
           return redirect()->action('HomeController@index');
        }
    elseif ($users['0']['meta_value']=='a:1:{s:8:"customer";b:1;}') {      
         //corporate user  
        return redirect()->action('HomeController@index');
	    
        }
 else {
     echo "Really!! U must be alien";
 }
            }
            return redirect($this->loginPath())
					->withInput($request->only('user_email', 'remember'))
					->withErrors([
						'email' => $this->getFailedLoginMessage(),
					]);

	}
        

}
