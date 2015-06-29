<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class SenderId extends Model {

	/*
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'sender_ids';
        /**
         * id of sender_ids table also a primary key auto increment
         */
        protected $primaryKey = 'id'; 
       /**
	 * Relationship each sender id belongs to only one user
	 * 
	 */
        public function users()
        {
            return $this->belongsTo('App\User','user_id');
        }
        public function reminders()
        {
            return $this->hasMany('App\Reminder','reminder_from');
        }
        
       

}
