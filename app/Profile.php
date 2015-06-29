<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model {

	//
/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	 protected $table = 'profiles';

	 /**
	 * The primary key of the table to be used by the model.
	 *
	 * @var BIGINT
	 */

	 protected $primaryKey = 'id'; 
        public function user()
        {
            return $this->belongsTo('App\User','user_id');
        }
}
