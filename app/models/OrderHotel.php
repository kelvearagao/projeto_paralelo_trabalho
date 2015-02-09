<?php 

class OrderHotel extends BaseModel {

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
	public function rooms()
	{
		return $this->hasMany('OrderRoom', 'hotel_id');
	}

	public function email_hotel()
	{
		return $this->hasMany('EmailHotel');
	}

	public function days_order()
	{
		return $this->belongsTo('DaysOrder');
	}

	public function child_of()
	{
		return $this->belongsTo('OrderHotel', 'child_of');
	}

	public function hotel_data()
	{
		return $this->belongsTo('Aeatour\Icarus\HermesHotel', 'foreign_key_hotel', 'id');
	}

	public function currency()
	{
		return $this->belongsTo('Aeatour\Icarus\Currency', 'foreign_key_currency', 'currency_id');
	}
}