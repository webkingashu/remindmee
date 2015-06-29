<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class SenderIdController extends Controller {
    
    
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
        {   $owner_columns = array('ID','user_email');
            $senderidowners = \App\User::all($owner_columns);
            $senderid_userid = \Auth::user()->ID;
            $columns = array('meta_value');
            $users = \App\Usermeta::
                     where('user_id','=',$senderid_userid)
                     ->where('meta_key','=','wp_capabilities')
                     ->get($columns);

            if ($users['0']['meta_value']=='a:1:{s:13:"administrator";b:1;}'){
           //  dd($users);
           //dd("hi Admin you nailed it.. Huh !!");

            $senderids = \App\SenderId::all();
            //dd($contacts);
            $user_type = 'administrator';
            return view('senderids.adminindex', compact('senderids','user_type','senderidowners'));

            }
            elseif ($users['0']['meta_value']=='a:1:{s:8:"customer";b:1;}'){      
                //corporate user
               // dd("Hi Customer.. wait oiling .. LOL ");  
               $senderid_columns = array('id','senderid_name','senderid_status','senderid_note');
               $senderids = \App\SenderId::where('user_id','=',$senderid_userid)->get($senderid_columns);

               $user_type = 'corporate';

               return view('senderids.corpindex', compact('senderids','user_type'));
            }
            else{
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
            $senderid_userid = \Auth::user()->ID;
            $columns = array('meta_value');
            $users = \App\Usermeta::
                     where('user_id','=',$senderid_userid)
                     ->where('meta_key','=','wp_capabilities')
                     ->get($columns);

            if ($users['0']['meta_value']=='a:1:{s:13:"administrator";b:1;}'){
                return $this->index();
            //$senderids = \App\SenderId::all();
            
            //$user_type = 'administrator';
            //return view('senderids.adminindex', compact('senderids','user_type'));

            }
            elseif ($users['0']['meta_value']=='a:1:{s:8:"customer";b:1;}'){      
               
               $senderids_count = \App\SenderId::where('user_id','=',$senderid_userid)->count();
               if($senderids_count == 0){
                   $user_type = 'corporate';
                   return view('senderids.create', compact('senderid_userid','user_type'));    
               }
               else {
                   return $this->index();
               }
            }
            else{
                echo "Really!! U must be alien, wait.. Just Kidding Contact Support :-)";
            }
           
            
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Requests\StoreNewSenderID $request)
	{
		//
            $senderid = new \App\SenderId;
            $senderid->user_id = \Auth::user()->ID;
            $senderid->senderid_name = $request->input('senderid_name');
            $senderid->senderid_status = 'pending';
            $senderid->senderid_note = 'New Sender ID Requested. Awaiting Approval';
            $senderid->created_at = \Carbon\Carbon::now('Asia/Kolkata');
            $senderid->updated_at = \Carbon\Carbon::now('Asia/Kolkata');
            if($senderid->save()){
                    $senderidmsg = "Sender ID Request Submitted";
                    $senderid_columns = array('id','senderid_name','senderid_status','senderid_note');
                    $senderids = \App\SenderId::where('user_id','=',$senderid->user_id)->get($senderid_columns);
                    
            }
                    
             return view('senderids.corpindex', compact('senderidmsg'));
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
            $senderid_id = $id;
            $admin_id = \Auth::user()->ID;
            $columns = array('meta_value');
            $users = \App\Usermeta::
                     where('user_id','=',$admin_id)
                     ->where('meta_key','=','wp_capabilities')
                     ->get($columns);

            if ($users['0']['meta_value']=='a:1:{s:13:"administrator";b:1;}'){
            $senderid_record = \App\SenderId::find($senderid_id);
            return view('senderids.update', compact('senderid_record'));
            }
            else {
                return $this->index();
            }
            
            
          
            
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  Request $request
	 * @return Response
	 */
	public function update(Requests\UpdateSenderIDStatus $request)
	{
            $senderid_id = $request->input('id');
            $senderid = \App\SenderId::find($senderid_id);
            
            
           // $senderid->senderid_name = $request->input('senderid_name');
            $senderid->senderid_status = $request->input('senderid_status');
            $senderid->senderid_note = $request->input('senderid_note');
           // $senderid->created_at = \Carbon\Carbon::now('Asia/Kolkata');
            $senderid->updated_at = \Carbon\Carbon::now('Asia/Kolkata');
            if($senderid->push()){
                    $senderidmsg = "Sender ID Status updates";
                   // $senderid_columns = array('id','senderid_name','senderid_status','senderid_note');
                    $senderids = \App\SenderId::all();                    
            }
                    
             return view('senderids.adminindex', compact('senderidmsg','senderids'));
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
