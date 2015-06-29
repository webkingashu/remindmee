<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	 protected $table = 'contacts';
       
         /**
	 * The primary key of the table to be used by the model.
	 *
	 * @var BIGINT
	 */

	 protected $primaryKey = 'id'; 
         public function users()
        {
            return $this->belongsTo('App\User','contact_ownerid');
        }
         public function reminders()
        {
            return $this->hasMany('App\Reminder','reminder_contactid');
        }
        public function getNextBirthday($birthday) {
            $nextbirthday = new \DateTime($birthday, new \DateTimeZone('Asia/Kolkata'));
            $nextbirthday->modify('+' . date('Y') - $nextbirthday->format('Y') . ' years');
            if($nextbirthday < new \DateTime()) {
                $nextbirthday->modify('+1 year');
            }
           return $nextbirthday->format('Y-m-d');
        }
         public function getNextAnniversary($anniversary) {
            $nextanniversary = new \DateTime($anniversary, new \DateTimeZone('Asia/Kolkata'));
            $nextanniversary->modify('+' . date('Y') - $nextanniversary->format('Y') . ' years');
            if($nextanniversary < new \DateTime()) {
               $nextanniversary->modify('+1 year');
            }
           return $nextanniversary->format('Y-m-d');
        }
        
        
        

}
