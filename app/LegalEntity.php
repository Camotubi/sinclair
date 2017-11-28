<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LegalEntity extends Model
{
	protected $table = "legal_entity";

	public function artPiecePossessions()
	{
		return $this->belongsToMany('App\ArtPiece', 'legal_entity_art_piece_possession',
			'legalEntityId', 'artPieceId');
    }

    public function artPieceRestorations()
    {
	    return $this->belongsToMany('App\ArtPiece', 'legal_entity_art_piece_restoration',
		    'legalEntityId', 'artPieceId');
    }

    public function rents()
    {
	    return $this->hasMany('App\Rent', 'legalEntityId', 'id');
    }

    public function exhibitions()
    {
	    return $this->belongsToMany('App\Exhibition', 'legal_entity_exhibition',
		    'legalEntityId', 'exhibitionId');
    }

    public function furniturePossessions()
    {
	    return $this->belongsToMany('App\Furniture', 'legal_entity_furniture_possession',
		    'legalEntityId', 'furnitureId');
    }

    public function furnitureRestorations()
    {
	    return $this->belongsToMany('App\Furniture',
		    'legal_entity_furniture_restoration', 'legalEntityId', 'furnitureId');
    }

    public function artPieceDonators()
    {
	    return $this->hasMany('App\ArtPiece', 'donatorId', 'id');
    }

    public function condecorations()
    {
	    return $this->hasMany('App\Condecoration', 'condecoratorId', 'id');
    }

    public function furnitureDonators()
    {
	    return $this->hasMany('App\Furniture', 'donatorId', 'id');
    }
}
