<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InsuranceCarrier extends Model
{
    protected $table = "insuranceCarrier";

    public function artPiece()
    {
      return $this->belongsToMany('App\ArtPiece', 'insurance', 'insuranceCarrierId',
       'artPieceId');
    }
}
