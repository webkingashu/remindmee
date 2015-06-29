<?php namespace App\Http\Controllers;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
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
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
        $columns = array('meta_value');
	$users = \App\Usermeta::where('user_id','=',\Auth::user()->ID)->where('meta_key','=','wp_capabilities')->get($columns);
   // dd($users['0']['meta_value']);
        //dd($users->getMetaValue('wp_capabilities'));
     if ($users['0']['meta_value']=='a:1:{s:13:"administrator";b:1;}'){
         //dd($users)
        // echo "hi done!!";
           return HomeController::adminDashboard();
        }
    elseif ($users['0']['meta_value']=='a:1:{s:8:"customer";b:1;}') {      
         //corporate user  
         return HomeController::corpDashboard();
	    
        }
 else {
     dd($users);
 }

	}
        public function adminDashboard() {
             $infoCorpUserCount = \App\Usermeta::with('user')->where('meta_key','=','wp_capabilities');
             $infoCorpUserCount = $infoCorpUserCount->where('meta_value','=','a:1:{s:8:"customer";b:1;}')->count();
            //$usercorpcount = $usercorpcount->count();
            $infoCorpUserTitle = "Corporate Subscription";
            $infoContactCount = \App\Contact::all()->count();
            $infoContactTitle = "Total Contact(s) Added by Customers";
            $infoReminderCount = \App\Reminder::where('reminder_status','=','scheduled')->count();
            $infoReminderTitle = "Reminder(s) Are Scheduled";
             $infoSubscribType = "Admin";
            // second param
           // $infodata
            //dd($adminData);
            return view('admin.dashboard',  compact('infoSubscribType','infoCorpUserCount',
                                         'infoCorpUserTitle',
                                         'infoContactCount',
                                         'infoContactTitle',
                                         'infoReminderCount',
                                         'infoReminderTitle'
                                        )
                       );
        }
        public function corpDashboard() {
            $user_id = \Auth::user()->ID;
            $infoSubscribType = "Corporate";
            $infoSubscribTitle = "Subscription Type";
            $infoCorpEmployeeCount = \App\Contact::where('contact_ownerid', '=', $user_id);
           $infoCorpEmployeeCount = $infoCorpEmployeeCount->where('contact_type','=','employee')->count();
            $infoCorpEmployeeTitle = "Employee(s)";
            //$infoContactCount = \App\Contact::where('contact_ownerid','=',$user_id)->count();
            $infoContactCount = 12;
            $infoContactTitle = "Total Contact(s)";
            $infoReminderCount = \App\Reminder::where('reminder_owner','=',$user_id);
            $infoReminderCount = $infoReminderCount->where('reminder_status','=','scheduled')->count();
            $infoReminderTitle = "Reminder(s) Are Scheduled";
            $reminderCredit = "";
            //dd($info1data);
           // dd($user_id);
                return view('corporate.dashboard',compact(  'infoSubscribType',
                                         'infoSubscribTitle',
                                         'infoCorpEmployeeCount',
                                         'infoCorpEmployeeTitle',
                                         'infoContactCount',
                                         'infoContactTitle',
                                         'infoReminderCount',
                                         'infoReminderTitle'
                                        )
                        );
        }

}
