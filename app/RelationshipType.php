<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RelationshipType extends Model
{
	protected $table = "relationshipType";

	public function sinclairPerson()
	{
		return $this->belongsToMany('App\SinclairPerson',
			'relationshipTypeSinclairPerson', 'relationshipTypeId', 'sinclairPersonId');
    }
}
