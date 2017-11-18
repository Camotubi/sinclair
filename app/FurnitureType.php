<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FurnitureType extends Model
{
	protected $table = "furniture_type";

	public function furniture()
	{
		return $this->hasMany('App\Furniture', 'furnitureTypeId', 'id');
    }
}
