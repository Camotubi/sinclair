<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
	protected $table = "visitor";

	public function visitor()
	{
	  return $this->hasMany('App\Visit', 'visitorId', 'id');
	}
}
