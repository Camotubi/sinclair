<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FurnitureRestoration extends Model
{
	protected $table = "legal_entity_furniture_restoration";

	public function legalEntity()
	{
		return $this->belongsTo('App\LegalEntity', 'legalEntityId');
    }

    public function furniture()
    {
	    return $this->belongsTo('App\Furniture', 'furnitureId');
    }
}
