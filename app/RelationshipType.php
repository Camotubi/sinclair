<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RelationshipType extends Model
{
	protected $table = "relationship_type";

	public function sinclairPerson()
	{
		return $this->belongsToMany('App\SinclairPerson',
			'relationship_type_sinclair_person', 'relationshipTypeId', 'sinclairPersonId');
    }
}
