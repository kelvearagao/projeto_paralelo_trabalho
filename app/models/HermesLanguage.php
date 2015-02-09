<?php

class HermesLanguage extends \Eloquent {

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
	protected $table = 'languages';

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

}