<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RelationshipType extends Model
{
	protected $table = "relationship_type";

	public function sinclairPersons()
	{
		return $this->belongsToMany('App\SinclairPerson',
			'relationship_type_sinclair_person', 'relationshipTypeId', 'sinclairPersonId');
    }
}
