<?php 

class City extends Eloquent {

/*
|--------------------------------------------------------------------------
| Relationships
|--------------------------------------------------------------------------
*/
	public function state() 
	{
		return $this->belongsTo('State');
	}

	public function country() 
	{
		return $this->belongsTo('Country');
	}

	public function hotels()
	{
		return $this->hasMany('Hotel');
	}

	public function hotels_mails()
	{
		return $this->hasMany('HotelMail');
	}

	public function guides()
	{
		return $this->hasMany('Guide');
	}

	public function descriptions()
	{
		return $this->hasMany('CityDescription');
	}

	public function receptives()
	{
		return $this->hasMany('Receptive');
	}

	public function services()
	{
		return $this->hasMany('Service');
	}

	public function photos()
	{
		return $this->belongsToMany('Photo');
	}

	public function packages()
	{
		return $this->hasMany('Package');
	}

	public function favorite_hotel() 
	{
		return $this->belongsTo('Hotel', 'favorite_hotel');
	}

	public function city_package_day()
	{
		return $this->belongsToMany('PackageDay', 'city_package_day', 'city_id', 'package_day_id');
	}

/*
|--------------------------------------------------------------------------
| Scopes
|--------------------------------------------------------------------------
*/

	public function scopeByStates($query, $states)
	{
		$i = 0;
		foreach ($states as $state) {
			if($i === 0)
				$query->where('state_id', '=', $state->id);
			else 
				$query->orWhere('state_id', '=', $state->id);

			$i++;
		}

		return $query;
	}

}