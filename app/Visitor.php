<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
	protected $table = "visitor";

	public function visitors()
	{
		return $this->hasMany('App\Visit', 'visitorId', 'id');
	}
}
