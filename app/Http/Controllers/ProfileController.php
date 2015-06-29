<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ProfileController extends Controller {
	
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
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
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
            if (\Auth::user()->group_id==1){
                
            }
            elseif(\Auth::user()->group_id=3){
                if(\Auth::user()->profile->id==$id){
                    
                    $profile = new \App\Profile;
                    return view('profile.show', compact('profile'));
                }
            }
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
            
            if (\Auth::user()->group_id==1){
                $profile = \App\Profile::with('user')->where('id','=',$id)->first();
                //dd($profile);
                    return view('profile.edit', compact('profile'));
                    
            }
            elseif(\Auth::user()->group_id=3){
                if(\Auth::user()->profile->id==$id){
                    
                    $profile = \App\Profile::with('user')->where('id','=',\Auth::user()->profile->id)->first();
                    //dd($profile);
                    return view('profile.edit', compact('profile'));
                }
                else{
               return view('errors.401',  compact(''));       
                }
            }
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
