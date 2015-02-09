<?php

class DaysOrder extends BaseModel {

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
	protected $table = 'days_order';

	/**
	 * Indicates the database in which the model should connect
	 *
	 * @var string
	 */
/*
|--------------------------------------------------------------------------
| Relationships
|--------------------------------------------------------------------------
*/
	public function hotel()
	{
		return $this->hasOne('OrderHotel');
	}

	public function services()
	{
		return $this->hasMany('Aeatour\Icarus\OrderService');
	}

	public function orders()
	{
		return $this->belongsTo('Order');
	}
}