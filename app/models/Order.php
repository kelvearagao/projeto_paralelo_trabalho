<?php

class Order extends BaseModel {

/*
|--------------------------------------------------------------------------
| Configs
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| Relationships
|--------------------------------------------------------------------------
*/
	public function clients()
	{
		return $this->hasMany('Client');
	}

	public function packages()
	{
		return $this->hasMany('HermesPackage', 'package_ids', 'id');
	}

	public function days_order()
	{
		return $this->hasMany('DaysOrder');
	}

	public function requester()
	{
		return $this->belongsTo('HermesUser', 'requesters_public_key', 'public_api_key');
	}

	public function responsible()
	{
		return $this->hasOne('Responsible', 'order_id');
	}
}