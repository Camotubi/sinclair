<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InsuranceCarrier extends Model
{
	protected $table = "insuranceCarrier";

	public function insurance()
	{
		return $this->hasMany('App\Insurance', 'insuranceCarrierId', 'id');
    }
}
