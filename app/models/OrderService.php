<?php namespace Aeatour\Icarus;

class OrderService extends BaseModel {

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
	 * Indicates the database in which the model should connect
	 *
	 * @var string
	 */
	protected $connection = 'icarus';

/*
|--------------------------------------------------------------------------
| Relationships
|--------------------------------------------------------------------------
*/
	public function days_order()
	{
		return $this->belongsTo('Aeatour\Icarus\DaysOrder');
	}

	public function child_of()
	{
		return $this->belongsTo('Aeatour\Icarus\OrderService', 'child_of');
	}

	public function service_data()
	{
		return $this->belongsTo('Aeatour\Icarus\HermesService', 'foreign_key_service', 'id');
	}
}