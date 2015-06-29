<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Reminder extends Model {

	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	 protected $table = 'reminders';

	 /**
	 * The primary key of the table to be used by the model.
	 *
	 * @var BIGINT autoincrement
	 */

	 protected $primaryKey = 'reminder_id'; 
         
         public function contacts()
        {
            return $this->belongsTo('App\Contact','reminder_contactid');
        }
        public function senderids()
        {
            return $this->belongsTo('App\SenderId','reminder_from');
        }
        
        public function getBirthdayEmailMsg($contactid) {
            $contact_id = $contactid;
            $columns = array('contact_name');
            $contact = \App\Contact::find($contact_id, $columns);
            $toname = $contact->contact_name;
            $msg = \view('emails.birthdayemail', ['toname' => $toname])->render();
            return $msg;
        }
        public function getAnniversaryEmailMsg($contactid) {
            $contact_id = $contactid;
            $columns = array('contact_name');
            $contact = \App\Contact::find($contact_id, $columns);
            $toname = $contact->contact_name;
            $msg = \view('emails.anniversaryemail', ['toname' => $toname])->render();
            return $msg;
        }
        public function getBirthdaySMSMsg($contactid) {
            $contact_id = $contactid;
            $columns = array('contact_name');
            $contact = \App\Contact::find($contact_id, $columns);
            $toname = $contact->contact_name;
            $msg = \view('sms.birthdaysms', ['toname' => $toname])->render();
            return $msg;
        }
        public function getAnniversarySMSMsg($contactid) {
            $contact_id = $contactid;
            $columns = array('contact_name');
            $contact = \App\Contact::find($contact_id, $columns);
            $toname = $contact->contact_name;
            $msg = \view('sms.anniversarysms', ['toname' => $toname])->render();
            return $msg;
        }
        

}
