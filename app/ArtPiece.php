<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArtPiece extends Model
{
	protected $table = "art_piece";

	public function exhhibitions()
	{
		return $this->belongsToMany('App\Exhibition', 'art_piece_exhibition',
			'artPieceId', 'exhibitionId');
	}

	public function artStyle()
	{
		return $this->belongsToMany('App\ArtStyle', 'art_style_art_piece', 'artPieceId',
			'artStyleId');
	}

	public function insurance()
	{
		return $this->hasMany('App\Insurance', 'artPieceId', 'id');
	}

	public function multimedia()
	{
		return $this->belongsToMany('App\Multimedia');
	}

	public function legalEntityPossession()
	{
		return $this->belongsToMany('App\LegalEntity');
	}

	public function legalEntityRestoration()
	{
		return $this->belongsToMany('App\LegalEntity');
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
