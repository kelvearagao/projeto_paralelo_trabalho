<?php 

class PackageDescription extends Eloquent{

/*
|--------------------------------------------------------------------------
| Configs
|--------------------------------------------------------------------------
*/
	public $timestamps = false;

/*
|--------------------------------------------------------------------------
| Relatioships
|--------------------------------------------------------------------------
*/	
	public function package()
	{
		return $this->belongsTo('Package');
	}

	public function language()
	{
		return $this->belongsTo('Language');
	}
}