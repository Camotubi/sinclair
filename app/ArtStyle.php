<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArtStyle extends Model
{
	protected $table = "art_style";

	public function artPieces()
	{
		return $this->belongsToMany('App\ArtPiece', 'art_style_art_piece', 'artStyleId',
		'artPieceId');
    }
}
