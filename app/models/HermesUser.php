<?php 

class HermesUser extends \Eloquent {

/*
|--------------------------------------------------------------------------
| Configs
|--------------------------------------------------------------------------
*/

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The database's overrided primary key
	 *
	 * @var string
	 */
	protected $primaryKey = 'public_api_key';

	/**
	 * Indicates the database in which the model should connect
	 *
	 * @var string
	 */
	protected $connection = 'hermes';


/*
|--------------------------------------------------------------------------
| Relationships
|--------------------------------------------------------------------------
*/
	public function profile()
	{
		$this->primaryKey = 'id';

		return $this->hasOne('Profile', 'user_id');
	}
}