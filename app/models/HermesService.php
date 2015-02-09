<?php

class HermesService extends \Eloquent {

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
	protected $table = 'services';

	/**
	 * The database's overrided primary key
	 *
	 * @var string
	 */
	protected $primaryKey = 'id';

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

	public function service_days()
	{
		return $this->hasMany('ServiceDay', 'service_id');
	}

	public function optionals()
	{
		return $this->belongsToMany('ServiceOption', 'service_optional_data', 'service_id', 'option_id');
	}
}