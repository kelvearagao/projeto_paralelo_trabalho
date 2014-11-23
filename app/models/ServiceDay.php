<?php 

class ServiceDay extends Eloquent{

/*
|--------------------------------------------------------------------------
| Configs
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| Relatioships
|--------------------------------------------------------------------------
*/	
	public function service()
	{
		return $this->belongsTo('Service');
	}

	public function texts()
	{
		return $this->hasMany('ServiceDayText');
	}
}