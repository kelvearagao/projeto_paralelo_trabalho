<?php

class Currency extends \Eloquent {

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
	protected $table = 'currencies';

	/**
	 * The database's overrided primary key
	 *
	 * @var string
	 */
	protected $primaryKey = 'currency_id';

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