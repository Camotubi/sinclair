<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
	use Notifiable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'email', 'password',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];

	public function types()
	{
		return $this->belongsToMany('App\UserType','users_user_type','userId','userTypeId');
    }

    public function isAdmin()
    {
	    return	$this->types()->where('user_type.id',config('app.userType.adminId'))->exists();

    }

    public function publications()
    {
	    return $this->hasMany('App\Publication', 'userId', 'id');
    }
}
