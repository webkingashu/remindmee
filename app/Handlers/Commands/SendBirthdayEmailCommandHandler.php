<?php namespace App\Handlers\Commands;

use App\Commands\SendBirthdayEmailCommand;

use Illuminate\Queue\InteractsWithQueue;

class SendBirthdayEmailCommandHandler {

	/**
	 * Create the command handler.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//
	}

	/**
	 * Handle the command.
	 *
	 * @param  SendBirthdayEmailCommand  $command
	 * @return void
	 */
	public function handle(SendBirthdayEmailCommand $command)
	{
		//
            $reminders = \App\Reminder::all()->where('reminder_status','=','scheduled')
                         ->where('reminder_set','=','birthday')
                         ->where('reminder_type','=','email')
                         ->where('reminder_time','<=',  \Carbon\Carbon::now('Asia/Kolkata'));
                 foreach ($reminders as $reminder) {
                     $this->sendEmailNow($reminder);
                 }
	}
        /**
         * send The Email Immediately to queue
         * 
         * @param \App\Reminder $reminder_record get Email Constrains from reminder table 
         * and create an email payload to be queued
         */
        public function sendEmailNow($reminder_record) {
        $reminderdata = $reminder_record;
        $from = $reminderdata->reminder_from;
        $to = $reminderdata->reminder_to;
        $msgstring = $reminderdata->reminder_msg;
            \Illuminate\Support\Facades\Mail::queue(
                    ['html' => 'emails.bdaymailhtml'], 
                    $msgstring, function($message){
                      $message->from('reminder@reemindme.com', 'ReemindMe');
                      $message->to($to,$to)->subject('Happy Birthday to You!');
                    }
                   
            );
        }

}
