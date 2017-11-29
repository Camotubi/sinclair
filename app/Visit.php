<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
	protected $table = "visit";

	public function visitors()
	{
		return $this->belongsTo('App\Visitor', 'visitorId');
    }
}
