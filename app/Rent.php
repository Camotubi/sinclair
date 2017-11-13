<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    protected $table = "rent";

    public function legalEntity()
    {
      return $this->belongsTo('App\LegalEntity');
    }

    public function artPiece()
    {
      return $this->belongsTo('App\ArtPiece');
    }
}
