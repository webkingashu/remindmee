<?php namespace App\Handlers\Commands;

use App\Commands\CreateEmailReminderCommand;

use Illuminate\Queue\InteractsWithQueue;

class CreateEmailReminderCommandHandler {

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
	 * @param  CreateEmailReminderCommand  $command
	 * @return void
	 */
	public function handle(CreateEmailReminderCommand $command)
	{
		// lets insert the reminder record one by one
            $reminder_set = $command->reminder_set;
            $contact_id = $command->contact_id;
            switch ($reminder_set) {
                case 'birthday':
                  return $this->createBirthdayEmail($contact_id);
                break;
                case 'anniversary':
                  return $this->createAnniversaryEmail($contact_id);
                break;
                default:
                  return $this->createEmail($contact_id);
                break;
            }
            
	}
        /**
         * Create A Birthday Email Reminder for given $contact_id
         * @param $contact_id Primary ID of the contact received from handler method
         */ 
        public function createBirthdayEmail($contact_id) {
            $contactid = $contact_id;
            $contact  = \App\Contact::find($contactid);
           // dd($contact);
            $reminder = new \App\Reminder;
            $reminder->reminder_set = 'birthday';
            $reminder->reminder_from = 'reminder@reemindme.com';
            $reminder->reminder_to = $contact->contact_email;
            $reminder->reminder_type = 'email';
            $reminder->reminder_date = $contact->getNextBirthday($contact->birthday);
            $reminder->reminder_time = date('Y-m-d  H:i:s',strtotime($reminder->reminder_date));
            $reminder->reminder_msg = $reminder->getBirthdayEmailMsg($contactid);
            $reminder->reminder_contactid = $contactid;
            $reminder->reminder_owner = $contact->contact_ownerid;
            $reminder->reminder_note = "Birthday Email with Default Template";
            $reminder->created_at = \Carbon\Carbon::now('Asia/Kolkata');
            $reminder->updated_at = \Carbon\Carbon::now('Asia/Kolkata');
            $reminder->save();
        }
        
        /**
         * Create A Anniversary Email Reminder for given $contact_id
         * @param $contact_id Primary ID of the contact received from handler method
         */ 
        public function createAnniversaryEmail($contact_id) {
            $contactid = $contact_id;
            $contact  = \App\Contact::find($contactid);
           // dd($contact);
            $reminder = new \App\Reminder;
            $reminder->reminder_set = 'birthday';
            $reminder->reminder_from = 'reminder@reemindme.com';
            $reminder->reminder_to = $contact->contact_email;
            $reminder->reminder_type = 'email';
            $reminder->reminder_date = $contact->getNextAnniversary($contact->anniversary);
            $reminder->reminder_time = date('Y-m-d  H:i:s',strtotime($reminder->reminder_date));
            $reminder->reminder_msg = $reminder->getAnniversaryEmailMsg($contactid);
            $reminder->reminder_contactid = $contactid;
            $reminder->reminder_owner = $contact->contact_ownerid;
            $reminder->reminder_note = "Anniversary Email with Default Template";
            $reminder->created_at = \Carbon\Carbon::now('Asia/Kolkata');
            $reminder->updated_at = \Carbon\Carbon::now('Asia/Kolkata');
            $reminder->save();
        }

}
