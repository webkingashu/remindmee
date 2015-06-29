<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'wp_users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['user_nicename','user_email','display_name'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['user_pass', 'remember_token'];
        /**
         * Lets integrate wp db with laravel, id is different
         */
        protected $primaryKey = 'ID'; 
        
        //password field is hardcoded in laravel, lets change it to wp user_pass field
        public function getAuthPassword() {
            return $this->user_pass;
        }

	
	public function contacts()
        {
            return $this->hasMany('App\Contact','contact_ownerid');
        }
        public function usermeta() {
            return $this->hasMany('App\Usermeta','user_id');
        }
        public function getMetaValue($key) {
            $usermeta = $this->usermeta->filter(function ($usermeta) use ($key) {
                return $usermeta->meta_key === $key;
            });

            if ($usermeta->count() > 0) {
              //return $usermeta[]->meta_value;
               //dd($usermeta);
                return $usermeta->first()->meta_value;
               
                
            }
           
            
        }
}
