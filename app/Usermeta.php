<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Usermeta extends Model {

	//
        protected $table = 'wp_usermeta';
        protected $primaryKey = 'umeta_id'; 
     
        protected $fillable = ['user_id','meta_key','meta_value'];

        public function user() {
            return $this->belongsTo('App\User','user_id');
        }
}
