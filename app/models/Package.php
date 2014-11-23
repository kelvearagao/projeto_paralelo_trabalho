<?php

class Package extends Eloquent {

/*
|--------------------------------------------------------------------------
| Configs
|--------------------------------------------------------------------------
*/
	public    $timestamps = false;

/*
|--------------------------------------------------------------------------
| Relationships
|--------------------------------------------------------------------------
*/
	public function packageDays()
	{
		return $this->hasMany('PackageDay');
	}
    
	public function descriptions() 
	{
		return $this->hasMany('PackageDescription', 'package_id');
	}
	
	public function photos()
	{
		return $this->belongsToMany('Photo');
	}
    
	public function city()
	{
		return $this->belongsTo('City');
	}
}
