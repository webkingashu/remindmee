<?php namespace App\Handlers\Commands;

use App\Commands\CreateSMSReminderCommand;

use Illuminate\Queue\InteractsWithQueue;

class CreateSMSReminderCommandHandler {

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
	 * @param  CreateSMSReminderCommand  $command
	 * @return void
	 */
	public function handle(CreateSMSReminderCommand $command)
	{
		// lets insert the sms reminder record one by one
            $reminder_set = $command->reminder_set;
            $contact_id = $command->contact_id;
            switch ($reminder_set) {
                case 'birthday':
                  return $this->createBirthdaySMS($contact_id);
                break;
                case 'anniversary':
                  return $this->createAnniversarysms($contact_id);
                break;
                default:
                  return $this->createSMS($contact_id);
                break;
            }
            
	}
        /**
         * Create A Birthday SMS Reminder for given $contact_id
         * @param $contact_id Primary ID of the contact received from handler method
         */ 
        public function createBirthdaySMS($contact_id) {
            $contactid = $contact_id;
            $contact  = \App\Contact::find($contactid);
           // dd($contact);
            $reminder = new \App\Reminder;
            $reminder->reminder_set = 'birthday';
            $reminder->reminder_from = 'REMIND';
            $reminder->reminder_to = $contact->contact_mobile;
            $reminder->reminder_type = 'sms';
            $reminder->reminder_date = $contact->getNextBirthday($contact->birthday);
            $reminder->reminder_time = date('Y-m-d  H:i:s',strtotime($reminder->reminder_date));
            $reminder->reminder_msg = $reminder->getBirthdaySMSMsg($contactid);
            $reminder->reminder_contactid = $contactid;
            $reminder->reminder_owner = $contact->contact_ownerid;
            $reminder->reminder_note = "Birthday SMS with Default Template";
            $reminder->created_at = \Carbon\Carbon::now('Asia/Kolkata');
            $reminder->updated_at = \Carbon\Carbon::now('Asia/Kolkata');
            $reminder->save();
        }
         /**
         * Create A Anniversary SMS Reminder for given $contact_id
         * @param $contact_id Primary ID of the contact received from handler method
         */ 
        public function createAnniversarySMS($contact_id) {
            $contactid = $contact_id;
            $contact  = \App\Contact::find($contactid);
           // dd($contact);
            $reminder = new \App\Reminder;
            $reminder->reminder_set = 'anniversary';
            $reminder->reminder_from = 'REMIND';
            $reminder->reminder_to = $contact->contact_mobile;
            $reminder->reminder_type = 'sms';
            $reminder->reminder_date = $contact->getNextAnniversary($contact->anniversary);
            $reminder->reminder_time = date('Y-m-d  H:i:s',strtotime($reminder->reminder_date));
            $reminder->reminder_msg = $reminder->getAnniversarySMSMsg($contactid);
            $reminder->reminder_contactid = $contactid;
            $reminder->reminder_owner = $contact->contact_ownerid;
            $reminder->reminder_note = "Anniversary SMS with Default Template";
            $reminder->created_at = \Carbon\Carbon::now('Asia/Kolkata');
            $reminder->updated_at = \Carbon\Carbon::now('Asia/Kolkata');
            $reminder->save();
        }
}
