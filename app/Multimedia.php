<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Multimedia extends Model
{
  protected $table = "multimedia";

  public function artPiece()
  {
    return $this->belongsToMany('App\ArtPiece', 'multimediaArtPiece',
    'multimediaId', 'artPieceId');
  }

  public function type()
  {
    return $this->belongsTo('App\MultimediaType');
  }
}
