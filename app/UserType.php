<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{

	protected $table = "user_type";

	public function users()
	{

		return $this->belongsToMany('App\User','users_user_type','userTypeId','userId');

	}

}
