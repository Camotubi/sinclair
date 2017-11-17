<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{

	protected $table = "userType";

	public function users()
	{

		return $this->belongsToMany('App\User','usersUserType','userTypeId','userId');

	}

}
