<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Furniture extends Model
{
	protected $table = "furniture";

	public function furnitureType()
	{
		return $this->belongsTo('App\FurnitureType', 'furnitureTypeId');
  }

  public function legalEntityPossessions()
  {
	  return $this->belongsToMany('App\LegalEntity', 'legal_entity_furniture_possession', 'furnitureId', 'legalEntityId')->withPivot('possessionDate');
  }

  public function legalEntityRestorations()
  {
	  return $this->belongsToMany('App\LegalEntity', 'legal_entity_furniture_restoration', 'furnitureId', 'legalEntityId')->withPivot('restorationDate', 'description');
  }

  public function donator()
  {
	  return $this->belongsTo('App\LegalEntity', 'donatorId');
  }
}
