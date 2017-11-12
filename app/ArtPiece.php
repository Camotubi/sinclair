<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArtPiece extends Model
{
	protected $table = "artPiece";

	public function exhibit()
	{
		return $this->belongsToMany('App\Exhibition', 'artPieceExhibition',
		'artPieceId', 'exhibitionId');
	}

	public function artStyle()
	{
		return $this->belongsToMany('App\ArtStyle', 'artStyleArtPiece', 'artPieceId',
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

	public function rent()
	{
	  return $this->hasMany('App\Rent', 'artPieceId', 'id');
	}

	public function donator()
	{
		return $this->belongsTo('App\LegalEntity', 'donatorId');
	}
}
