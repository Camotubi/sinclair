<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Insurance extends Model
{
    protected $table = "insurance";

    public function insuranceCarrier()
    {
      return $this->belongsTo('App\InsuranceCarrier');
    }

    public function artPiece()
    {
      return $this->belongsTo('App\ArtPiece');
    }
}
