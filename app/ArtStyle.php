<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArtStyle extends Model
{
	protected $table = "art_style";

	public function artPiece()
	{
		return $this->belongsToMany('App\ArtPiece');
    }
}
