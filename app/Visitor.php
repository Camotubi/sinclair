<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
	protected $table = "visitor";

	public function visits()
	{
		return $this->hasMany('App\Visit', 'visitorId', 'id');
	}
}
