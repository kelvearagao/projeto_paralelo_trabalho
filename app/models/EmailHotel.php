<?php

class EmailHotel extends \Eloquent {

/*
|--------------------------------------------------------------------------
| Relationships
|--------------------------------------------------------------------------
*/
	public function hotel()
	{
		return $this->belongsTo('Hotel');
	}
}