<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LegalEntity extends Model
{
    protected $table = "legalEntity";

    public function artPiecePossession()
    {
      return $this->belongsToMany('App\ArtPiece', 'legalEntityArtPiecePossession',
      'legalEntityId', 'artPieceId');
    }

    public function artPieceRestoration()
    {
      return $this->belongsToMany('App\ArtPiece', 'legalEntityArtPieceRestoration',
      'legalEntityId', 'artPieceId');
    }

    public function rent()
    {
      return $this->belongsToMany('App\ArtPiece', 'rent', 'legalEntityId',
      'artPieceId');
    }

    public function exhibition()
    {
      return $this->belongsToMany('App\Exhibition', 'legalEntityExhibition',
      'legalEntityId', 'exhibitionId');
    }

    public function furniturePossession()
    {
      return $this->belongsToMany('App\Furniture', 'legalEntityFurniturePossession',
      'legalEntityId', 'furnitureId');
    }

    public function furnitureRestoration()
    {
      return $this->belongsToMany('App\Furniture',
      'legalEntityFurnitureRestoration', 'legalEntityId', 'furnitureId');
    }

    public function artPieceDonator()
    {
      return $this->hasMany('App\ArtPiece', 'donatorId', 'id');
    }

    public function condecoration()
    {
      return $this->hasMany('App\Condecoration', 'condecoratorId', 'id');
    }

    public function furnitureDonator()
    {
      return $this->hasMany('App\Furniture', 'donatorId', 'id');
    }
}
