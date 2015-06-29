<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ReminderController extends Controller {

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
            	//
            $reminder_ownerid = \Auth::user()->ID;
            $columns = array('meta_value');
            $users = \App\Usermeta::
                     where('user_id','=',$reminder_ownerid)
                     ->where('meta_key','=','wp_capabilities')
                     ->get($columns);
      
           if ($users['0']['meta_value']=='a:1:{s:13:"administrator";b:1;}'){
          //  dd($users);
          //dd("hi Admin you nailed it.. Huh !!");
           //$contact_columns = array('reminder_set','contact_type','reminder_from','reminder_to','contact_email','reminder_type','reminder_date','reminder_msg');
           $reminders = \App\Reminder::all();
           //dd($contacts);
           $user_type = 'administrator';
           return view('reminders.adminindex', compact('reminders','user_type'));

           }
            elseif ($users['0']['meta_value']=='a:1:{s:8:"customer";b:1;}'){      
            //corporate user
           // dd("Hi Customer.. wait oiling .. LOL ");  
            $reminder_columns = array('reminder_set','reminder_type','reminder_from','reminder_to','reminder_date','reminder_msg','reminder_status');
            $reminders = \App\Reminder::where('reminder_owner','=',$reminder_ownerid)->get($reminder_columns);
            
            //$employee_count = \App\Contact::where('contact_ownerid','=',$contact_ownerid)->count();
            //dd($employee_count);
            $user_type = 'corporate';
            
            return view('reminders.corpindex', compact('reminders','user_type'));
            }
            else {
                echo "Really!! U must be alien, wait.. give me call 720836039 with a LOL";
            }
            
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
