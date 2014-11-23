<?php 

class MainServicesPackage extends Eloquent{

/*
|--------------------------------------------------------------------------
| Configs
|--------------------------------------------------------------------------
*/
	protected $table      = 'main_services_packages';
	public    $timestamps = false;

/*
|--------------------------------------------------------------------------
| Relatioships
|--------------------------------------------------------------------------
*/	
	public function package_day()
	{
		return $this->belongsTo('PackageDay');
	}

	public function serviceDay()
	{
		return $this->belongsTo('ServiceDay');
	}
}
