<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
	protected $table = "publication";

	public function tag()
	{
		return $this->belongsToMany('App\Tag');
  }

  public function user()
  {
	  return $this->belongsTo('App\User', 'userId');
  }
}
