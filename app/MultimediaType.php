<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MultimediaType extends Model
{
	protected $table = "multimedia_type";

	public function multimedia()
	{
		return $this->hasMany('App\Multimedia', 'multimediaTypeId', 'id');
    }
}
