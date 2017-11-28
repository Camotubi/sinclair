<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InsuranceCarrier extends Model
{
	protected $table = "insurance_carrier";

	public function insurances()
	{
		return $this->hasMany('App\Insurance', 'insuranceCarrierId', 'id');
    }
}
