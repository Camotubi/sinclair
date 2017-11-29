<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
	protected $table = "publication";

	public function tags()
	{
		return $this->belongsToMany('App\Tag', 'tag_publication', 'publicationId', 'tagId');
  }

  public function user()
  {
	  return $this->belongsTo('App\User', 'userId');
  }
}
