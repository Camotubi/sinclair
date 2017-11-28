<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
	protected $table = "tag";

	public function publications()
	{
		return $this->belongsToMany('App\Publication', 'tag_publication', 'tagId',
			'publicationId');
    }
}
