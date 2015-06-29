<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	 protected $table = 'groups';
	
	/**
     * Override the default primary key convention of the Model
     *
     * @var BIGINT
     */
	protected $primaryKey = "id";
	/**
     * Set timestamps to false, groups are not being created frequently
     * Indicates if the model should be timestamped.
     * @var bool
     */
	
    public $timestamps = false;
    public function users()
{
    return $this->hasMany('App\User');
}
}
