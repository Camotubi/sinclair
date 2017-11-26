<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Furniture extends Model
{
	protected $table = "furniture";

	public function type()
	{
		return $this->belongsTo('App\FurnitureType');
  }

  public function legalEntityPossession()
  {
	  return $this->belongsToMany('App\LegalEntity')->withPivot('possessionDate');
  }

  public function legalEntityRestoration()
  {
	  return $this->belongsToMany('App\LegalEntity')->withPivot('restorationDate', 'description');
  }

  public function donator()
  {
	  return $this->belongsTo('App\LegalEntity', 'donatorId');
  }
}
