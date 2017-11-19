<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Multimedia extends Model
{
	protected $table = "multimedia";

	public function artPieces()
	{
		return $this->belongsToMany('App\ArtPiece', 'multimedia_art_piece',
			'multimediaId', 'artPieceId');
  }

  public function types()
  {
	  return $this->belongsTo('App\MultimediaType', 'multimediaTypeId');
  }
}
