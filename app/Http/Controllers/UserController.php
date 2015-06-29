<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades;

class UserController extends Controller {
	
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
                if(\Auth::user()->group_id==3){
                
                return view('home');    
                }
                else{
             
                  $users = \App\User::with('usermeta')->get();
                 //dd($users);
                  $infoCorpUserCount = \App\Usermeta::with('user')->where('meta_key','=','wp_capabilities');
                  $infoCorpUserCount = $infoCorpUserCount->where('meta_value','=','a:1:{s:8:"customer";b:1;}')->count();
                  //$infoCorpUserCount = $infoCorpUserCount->where('meta_value','=',  serialize('administrator'))->count();
                  //dd($infoCorpUserCount);
                  //$infoCorpUserCount = \App\User::where('group_id', '=', '3')->count();
                  $infoAdminUserCount = \App\Usermeta::with('user')->where('meta_key','=','wp_capabilities')->where('meta_value','=','a:1:{s:13:"administrator";b:1;}')->count();
                  //dd($infoAdminUserCount);
                  //dd(session());
                    return view('user.index',  compact('users','infoCorpUserCount','infoAdminUserCount'));
                }
	}

        /**
            * count the number of users .
            *
            * @param  string  $whichtype
            * @return Response
        */
       
      
        
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
			
		/* 
                 * if(\Auth::user()->group_id==3){
                 * $user = \App\User::where('id','=',\Auth::user()->id)->get();
                 * return view('errors.401',  compact(''));   
                 * }
                 * else{
                 * return view('user.create',  compact(''));
                 * }
                 */
            return redirect('http://reemindme.com/my-account/');
            
		
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Requests\StoreNewUser $request)
	{
		// crate an objct of user model
           $user = new \App\User;
            // now request and assign validated input to array of column names in user table
            $user->first_name = $request->input('first_name');
            $user->last_name = $request->input('last_name');
            $user->email = $request->input('email');
            $user->password = Facades\Hash::make($request->input('password'));
            $user->active = $request->input('active');
            $user->group_id = $request->input('group_id');
            $user->created_at = \Carbon\Carbon::now('Asia/Kolkata');
            $user->updated_at = \Carbon\Carbon::now('Asia/Kolkata');
            $createuser_msg = "";
            if($user->save()){
                $createuser_msg = "A User with email : $user->email have been created";

            } 
            $profile = new \App\Profile;
            $profile->mobile_no = $request->input('mobile');
            $createprofile_msg = "";
            if($user->profile()->save($profile)){
             $createprofile_msg = "A Profile for User with Email: $user->email and Mobile NO: $user->profile->mobile_no "
                     . "is also created. Edit the <a href='".action('ProfileController@edit', $user->profile->id)."'>Profile</a> to Personalized";  
            }
            if(!empty($createuser_msg)&& !empty($createprofile_msg)){
            return view('user.create', compact('createuser_msg','createprofile_msg'));    
            }
           
            return view('user.create', compact('createuser_msg','createprofile_msg'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
		
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
