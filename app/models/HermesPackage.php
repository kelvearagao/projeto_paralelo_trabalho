<?php

class HermesPackage extends \Eloquent {

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
	protected $table = 'packages';

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

	public function descriptions() 
	{
		return $this->hasMany('PackageDescription', 'package_id', 'id');
	}

	public function city()
	{
		return $this->belongsTo('City', 'city_id', 'id');
	}

}