<?php

class ClientsRooms extends BaseModel {

/*
|--------------------------------------------------------------------------
| Configs
|--------------------------------------------------------------------------
*/
	public $timestamps = false;
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'clients_rooms';

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

	public function client()
	{
		return $this->belongsTo('Client');
	}

	public function room()
	{
		return $this->belongsTo('OrderRoom');
	}
}