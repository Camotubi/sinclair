<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Multimedia extends Model
{
	protected $table = "multimedia";

	public function artPiece()
	{
		return $this->belongsToMany('App\ArtPiece', 'multimedia_art_piece',
			'multimediaId', 'artPieceId');
  }

  public function type()
  {
	  return $this->belongsTo('App\MultimediaType', 'multimediaTypeId');
  }
}
