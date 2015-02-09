<?php

class OrderRoom extends BaseModel {

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
	protected $table = 'rooms';

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
	public function hotel()
	{
		return $this->belongsTo('OrderHotel');
	}

	public function clients()
	{
		return $this->hasMany('ClientsRooms', 'room_id', 'id');
	}
}