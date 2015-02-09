<?php

class Client extends BaseModel {

/*
|--------------------------------------------------------------------------
| Configs
|--------------------------------------------------------------------------
*/

	/**
	 * Indicates the database in which the model should connect
	 *
	 * @var string
	 */
	//protected $connection = 'icarus';

/*
|--------------------------------------------------------------------------
| Relationships
|--------------------------------------------------------------------------
*/
	public function order()
	{
		return $this->belongsTo('Order');
	}
}