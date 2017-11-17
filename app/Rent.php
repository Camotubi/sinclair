<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
	protected $table = "rent";

	public function legalEntity()
	{
		return $this->belongsTo('App\LegalEntity', 'legalEntityId');
    }

    public function artPiece()
    {
	    return $this->belongsTo('App\ArtPiece', 'artPieceId');
    }
}
