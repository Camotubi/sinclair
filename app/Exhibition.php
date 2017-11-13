<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exhibition extends Model
{
	protected $table = "exhibition";

	public function artPiece()
	{
		return $this->belongsToMany('App\ArtPiece');
    }

    public function legalEntity()
    {
	    return $this->belongsToMany('App\LegalEntity');
    }
}
