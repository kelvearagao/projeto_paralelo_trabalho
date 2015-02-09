<?php

class HermesHotel extends \Eloquent {

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
	protected $table = 'hotels';
	
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

	public function type()
	{
		return $this->belongsTo('Type');
	}

}