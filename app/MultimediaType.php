<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MultimediaType extends Model
{
	protected $table = "multimediaType";

	public function multimedia()
	{
		return $this->hasMany('App\Multimedia', 'multimediaTypeId', 'id');
    }
}
