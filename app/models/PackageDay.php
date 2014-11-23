<?php 

class PackageDay extends Eloquent{

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

	public function mainServices()
	{
		return $this->hasMany('MainServicesPackage');
	}

	public function optional_services()
	{
		return $this->hasMany('OptionalServicesPackage');
	}

	//public function serviceDays()
	//{
	//	return $this->hasMany('ServiceDay');
	//}

	public function city_package_day()
	{
		return $this->belongsToMany('City', 'city_package_day', 'package_day_id', 'city_id');
	//	return $this->belongsToMany('CityPackageDay', 'city_package_day', 'city_id', 'package_day_id');
	}
}
