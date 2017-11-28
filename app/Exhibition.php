<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exhibition extends Model
{
	protected $table = "exhibition";

	public function artPieces()
	{
		return $this->belongsToMany('App\ArtPiece');
    }

    public function legalEntities()
    {
	    return $this->belongsToMany('App\LegalEntity');
    }
}
