<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LegalEntity extends Model
{
	protected $table = "legal_entity";

	public function artPiecePossession()
	{
		return $this->belongsToMany('App\ArtPiece', 'legal_entity_art_piece_possession',
			'legalEntityId', 'artPieceId');
    }

    public function artPieceRestoration()
    {
	    return $this->belongsToMany('App\ArtPiece', 'legal_entity_art_piece_restoration',
		    'legalEntityId', 'artPieceId');
    }

    public function rent()
    {
	    return $this->hasMany('App\Rent', 'legalEntityId', 'id');
    }

    public function exhibition()
    {
	    return $this->belongsToMany('App\Exhibition', 'legal_entity_exhibition',
		    'legalEntityId', 'exhibitionId');
    }

    public function furniturePossession()
    {
	    return $this->belongsToMany('App\Furniture', 'legal_entity_furniture_possession',
		    'legalEntityId', 'furnitureId');
    }

    public function furnitureRestoration()
    {
	    return $this->belongsToMany('App\Furniture',
		    'legal_entity_furniture_restoration', 'legalEntityId', 'furnitureId');
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
