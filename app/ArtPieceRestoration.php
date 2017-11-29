<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArtPieceRestoration extends Model
{
	protected $table = "legal_entity_art_piece_restoration";

	public function legalEntity()
	{
		return $this->belongsTo('App\LegalEntity', 'legalEntityId');
    }

    public function artPiece()
    {
	    return $this->belongsTo('App\ArtPiece', 'artPieceId');
    }
}
