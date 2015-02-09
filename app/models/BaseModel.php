<?php

class BaseModel extends \Eloquent {

	public function getCreatedAtAttribute($date)
	{
	    return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d-m-Y');
	}

}