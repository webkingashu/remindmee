<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ContactController extends Controller {

        /* lets declare some protected variables
         * useful throughout the contact controller class
         * 
        */
  
      

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
	public function index( )
	{
		//
            $contact_ownerid = \Auth::user()->ID;
            $columns = array('meta_value');
            $users = \App\Usermeta::
                     where('user_id','=',$contact_ownerid)
                     ->where('meta_key','=','wp_capabilities')
                     ->get($columns);
      
           if ($users['0']['meta_value']=='a:1:{s:13:"administrator";b:1;}'){
          //  dd($users);
          //dd("hi Admin you nailed it.. Huh !!");
           $contact_columns = array('contact_name','contact_type','birthday','anniversary','contact_email','contact_mobile','contact_ownerid');
           $contacts = \App\Contact::all($contact_columns);
           //dd($contacts);
           $user_type = 'administrator';
           return view('contact.index', compact('contacts','user_type'));

           }
            elseif ($users['0']['meta_value']=='a:1:{s:8:"customer";b:1;}'){      
            //corporate user
           // dd("Hi Customer.. wait oiling .. LOL ");  
            $contact_columns = array('contact_name','contact_type','birthday','anniversary','contact_email','contact_mobile');
            $contacts = \App\Contact::where('contact_ownerid','=',$contact_ownerid)->get($contact_columns);
            
            //$employee_count = \App\Contact::where('contact_ownerid','=',$contact_ownerid)->count();
            //dd($employee_count);
            $user_type = 'corporate';
            $owner_name = "Me";
            return view('contact.index', compact('contacts','user_type','owner_name'));
            }
            else {
                echo "Really!! U must be alien, wait.. give me call 720836039";
            }
            
            
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
	/*
         *check if user have required credits 
         * and redirect to upgrade method or page 
        */
            $contact_ownerid = \Auth::user()->ID;
            
        return view('contact.create',  compact('contact_ownerid'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Requests\StoreNewContact $request)
	{
            $contact = new \App\Contact;
            /*
             * conditional check to use appropriate store method 
             * as per relationship & children status
             */
            if($request->input('emp_relship')=='yes' && $request->input('have_children')=='yes'){
                //dd("This is ep_rel yes and child yes");
                return $this->storeEmployeeSpouseChild($request);
                 
            }
            elseif($request->input('emp_relship')=='yes' && $request->input('have_children')=='no'){
                // dd("This is ep_rel yes and child no");
                return $this->storeEmployeeSpouse($request);
            }
            elseif($request->input('emp_relship')=='no' && $request->input('have_children')=='no'){
                 //dd("This is ep_rel no and child no");
               return $this->storeEmployee($request); 
            }
            else{
                $createcontact_msg = "Incorrect Format, Submit Again";
            }
           return view('contact.create', compact('createcontact_msg'));
	}
        
        /**
	 * Store only employee record
	 * @return createcontact_msg
	 */
        public function storeEmployee($request) {
            $contact = new \App\Contact;
            $contact->contact_name = $request->input('emp_fullname');
            $contact->contact_email = $request->input('emp_email');
            $contact->contact_mobile = $request->input('emp_mobile');
            $contact->contact_ownerid = \Auth::user()->ID;
            $contact->contact_type = "employee";
            $contact->contact_parent = 0;
            $contact->birthday = $request->input('emp_dob');   
            $contact->created_at = \Carbon\Carbon::now('Asia/Kolkata');
            $contact->updated_at = \Carbon\Carbon::now('Asia/Kolkata');
            if($contact->save()){
                    $createcontact_msg = "An Employee Contact with Name : $contact->contact_name have been Added";
                    $contactid = $contact->id;
                    $this->dispatch(new \App\Commands\CreateEmailReminderCommand($contactid,'birthday'));
                    $this->dispatch(new \App\Commands\CreateSMSReminderCommand($contactid,'birthday'));
                }
             return view('contact.create', compact('createcontact_msg'));
        }
        /**
	 * Store Employee record & pass to create spouse record
	 * @return $createcontact_msg
	 */
        public function storeEmployeeSpouse($request) {
            $contact = new \App\Contact;
            $contact->contact_name = $request->input('emp_fullname');
            $contact->contact_email = $request->input('emp_email');
            $contact->contact_mobile = $request->input('emp_mobile');
            $contact->contact_ownerid = \Auth::user()->ID;
            $contact->contact_type = "employee";
            $contact->contact_parent = 0;
            $contact->birthday = $request->input('emp_dob');
            $contact->anniversary = $request->input('anniversary');    
            $contact->created_at = \Carbon\Carbon::now('Asia/Kolkata');
            $contact->updated_at = \Carbon\Carbon::now('Asia/Kolkata');
            if($contact->save()){
                    //$createcontact_msg['employee'] = "An Employee Contact with Name : $contact->contact_name have been Added";
                   $emp_id = $contact->id;
                   $this->dispatch(new \App\Commands\CreateEmailReminderCommand($emp_id,'birthday'));
                   $this->dispatch(new \App\Commands\CreateEmailReminderCommand($emp_id,'anniversary'));
                   $this->dispatch(new \App\Commands\CreateSMSReminderCommand($emp_id,'birthday'));
                   $this->dispatch(new \App\Commands\CreateSMSReminderCommand($emp_id,'anniversary'));
                   return $this->storeSpouse($emp_id,$request);
                }
             //return view('contact.create', compact('createcontact_msg'));
        }
        
         /**
	 * Store Spouse record based on the $emp_id as parent
	 * @return $createcontact_msg
	 */
        public function storeSpouse($emp_id,$request) {
            $contact = new \App\Contact;
                $parent_id = $emp_id;
                $contact->contact_name = $request->input('spouse_fullname');
                $contact->contact_email = $request->input('emp_email');
                $contact->contact_mobile = $request->input('emp_mobile');
                $contact->contact_ownerid = \Auth::user()->ID;
                $contact->contact_type = "spouse";
                $contact->contact_parent =  $parent_id;
                $contact->birthday = $request->input('spouse_dob');
                $contact->anniversary = $request->input('anniversary');    
                $contact->created_at = \Carbon\Carbon::now('Asia/Kolkata');
                $contact->updated_at = \Carbon\Carbon::now('Asia/Kolkata');
              
                if($contact->save()){
                   $createcontact_msg = "An Employee Contact & Spouse Contact Added";
                   $spouse_contactid = $contact->id;
                   $this->dispatch(new \App\Commands\CreateEmailReminderCommand($spouse_contactid,'birthday'));
                   $this->dispatch(new \App\Commands\CreateEmailReminderCommand($spouse_contactid,'anniversary'));
                   $this->dispatch(new \App\Commands\CreateSMSReminderCommand($spouse_contactid,'birthday'));
                   $this->dispatch(new \App\Commands\CreateSMSReminderCommand($spouse_contactid,'anniversary'));
                }
                 return view('contact.create', compact('createcontact_msg'));
        }
        
        /**
	 * Store Employee record & pass $emp_id to create spouse record
         * Store Spouse Record and pass $emp_id to create child record
	 * @return $createcontact_msg
	 */
        public function storeEmployeeSpouseChild($request) {
           $contact = new \App\Contact;
            // three level insert employee spouse and then child
           // dd($request);
            $contact->contact_name = $request->input('emp_fullname');
            $contact->contact_email = $request->input('emp_email');
            $contact->contact_mobile = $request->input('emp_mobile');
            $contact->contact_ownerid = \Auth::user()->ID;
            $contact->contact_type = "employee";
            $contact->contact_parent = 0;
            $contact->birthday = $request->input('emp_dob');
            $contact->anniversary = $request->input('anniversary');    
            $contact->created_at = \Carbon\Carbon::now('Asia/Kolkata');
            $contact->updated_at = \Carbon\Carbon::now('Asia/Kolkata');
            if($contact->save()){
                    //$createcontact_msg['employee'] = "An Employee Contact with Name : $contact->contact_name have been Added";
                   $emp_id = $contact->id;
                   $this->dispatch(new \App\Commands\CreateEmailReminderCommand($emp_id,'birthday'));
                   $this->dispatch(new \App\Commands\CreateEmailReminderCommand($emp_id,'anniversary'));
                   $this->dispatch(new \App\Commands\CreateSMSReminderCommand($emp_id,'birthday'));
                   $this->dispatch(new \App\Commands\CreateSMSReminderCommand($emp_id,'anniversary'));
                   //dd($emp_id);
                   return $this->storeSpouseChild($emp_id,$request);
                }
           
        }
        
        public function storeSpouseChild($emp_id,$request) {
                $contact = new \App\Contact;
                $parent_id = $emp_id;
                //dd($parent_id);
                $contact->contact_name = $request->input('spouse_fullname');
                $contact->contact_email = $request->input('emp_email');
                $contact->contact_mobile = $request->input('emp_mobile');
                $contact->contact_ownerid = \Auth::user()->ID;
                $contact->contact_type = "spouse";
                $contact->contact_parent =   $parent_id;
                $contact->birthday = $request->input('spouse_dob');
                $contact->anniversary = $request->input('anniversary');    
                $contact->created_at = \Carbon\Carbon::now('Asia/Kolkata');
                $contact->updated_at = \Carbon\Carbon::now('Asia/Kolkata');
              
            if($contact->save()){
                    $spouse_contactid = $contact->id;
                   $this->dispatch(new \App\Commands\CreateEmailReminderCommand($spouse_contactid,'birthday'));
                   $this->dispatch(new \App\Commands\CreateEmailReminderCommand($spouse_contactid,'anniversary'));
                   $this->dispatch(new \App\Commands\CreateSMSReminderCommand($spouse_contactid,'birthday'));
                   $this->dispatch(new \App\Commands\CreateSMSReminderCommand($spouse_contactid,'anniversary'));
                   return $this->storeChild($parent_id,$request);
                }
            
        }
        
        public function storeChild($emp_id,$request) {
                $parent_id = $emp_id;
                if($request->input('schild_name')!='' && $request->input('schild_dob')!=''){
                    //dd("store first second child call method");
                    return $this->storeFirstSecondChild($parent_id,$request);
                }
                else{
                    //dd("store first only child call method");
                    //dd($request);
                    return $this->storeFirstChild($parent_id,$request);
                }
                //return view('contact.create',  compact('createcontact_msg'));
        }
        
        public function storeFirstSecondChild($emp_id,$request) {
                $contact = new \App\Contact;
                $parent_id = $emp_id;
                $contact->contact_name = $request->input('fchild_name');
                $contact->contact_email = $request->input('emp_email');
                $contact->contact_mobile = $request->input('emp_mobile');
                $contact->contact_ownerid = \Auth::user()->ID;
                $contact->contact_type = "fchild";
                $contact->contact_parent =  $parent_id;
                $contact->birthday = $request->input('fchild_dob');
                $contact->created_at = \Carbon\Carbon::now('Asia/Kolkata');
                $contact->updated_at = \Carbon\Carbon::now('Asia/Kolkata');
                if($contact->save()){
                   // dd($request);
                  $fchild_contactid = $contact->id;
                  $this->dispatch(new \App\Commands\CreateEmailReminderCommand($fchild_contactid,'birthday'));
                  $this->dispatch(new \App\Commands\CreatSMSReminderCommand($fchild_contactid,'birthday'));
                  return $this->storeSecondChild( $parent_id,$request);
                }
        }
        
        public function storeSecondChild($emp_id,$request) {
                $contact = new \App\Contact;
                $parent_id = $emp_id;
                $contact->contact_name = $request->input('schild_name');
                $contact->contact_email = $request->input('emp_email');
                $contact->contact_mobile = $request->input('emp_mobile');
                $contact->contact_ownerid = \Auth::user()->ID;
                $contact->contact_type = "schild";
                $contact->contact_parent =  $parent_id;
                $contact->birthday = $request->input('schild_dob');
                $contact->created_at = \Carbon\Carbon::now('Asia/Kolkata');
                $contact->updated_at = \Carbon\Carbon::now('Asia/Kolkata');
              if($contact->save()){
                 // dd("this is store second child");
                 $createcontact_msg = "Employee, Spouse, First Child & Second Child contacts created";
                 $schild_contactid= $contact->id;
                 $this->dispatch(new \App\Commands\CreateEmailReminderCommand($schild_contactid,'birthday'));
                 $this->dispatch(new \App\Commands\CreatSMSReminderCommand($schild_contactid,'birthday'));
                 
                }
                return view('contact.create', compact('createcontact_msg'));
        }
        
        public function storeFirstChild($emp_id,$request){
            $contact = new \App\Contact;
                $parent_id = $emp_id;
                $contact->contact_name = $request->input('fchild_name');
                $contact->contact_email = $request->input('emp_email');
                $contact->contact_mobile = $request->input('emp_mobile');
                $contact->contact_ownerid = \Auth::user()->ID;
                $contact->contact_type = "fchild";
                $contact->contact_parent =  $parent_id;
                $contact->birthday = $request->input('fchild_dob');
                $contact->created_at = \Carbon\Carbon::now('Asia/Kolkata');
                $contact->updated_at = \Carbon\Carbon::now('Asia/Kolkata');
                if($contact->save()){
                   // dd("this is store first child");
                 $createcontact_msg = "Employee, Spouse, First Child contacts created";
                 $fchild_contactid = $contact->id;
                 $this->dispatch(new \App\Commands\CreateEmailReminderCommand($fchild_contactid,'birthday'));
                 $this->dispatch(new \App\Commands\CreateSMSReminderCommand($fchild_contactid,'birthday'));
                 
                }
                 return view('contact.create', compact('createcontact_msg'));
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
