<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArtPiece extends Model
{
	protected $table = "art_piece";

	public function exhibitions()
	{
		return $this->belongsToMany('App\Exhibition', 'art_piece_exhibition',
			'artPieceId', 'exhibitionId');
	}

	public function artStyles()
	{
		return $this->belongsToMany('App\ArtStyle', 'art_style_art_piece', 'artPieceId',
			'artStyleId');
	}

	public function insurances()
	{
		return $this->hasMany('App\Insurance', 'artPieceId', 'id');
	}

	public function multimedia()
	{
		return $this->belongsToMany('App\Multimedia','multimedia_art_piece','artPieceId','multimediaId');
	}

	public function legalEntityPossession()
	{
		return $this->belongsToMany('App\LegalEntity','legal_entity_art_piece_possession','artPieceId','legalEntityId')->withPivot('possessionDate');
	}

	public function legalEntityRestoration()
	{
		return $this->belongsToMany('App\LegalEntity','legal_entity_art_piece_restoration','artPieceId','legalEntityId')
			->withPivot('restorationDate', 'description');
	}

	public function rents()
	{
		return $this->hasMany('App\Rent', 'artPieceId', 'id');
	}

	public function donator()
	{
		return $this->belongsTo('App\LegalEntity', 'donatorId');
	}
}
