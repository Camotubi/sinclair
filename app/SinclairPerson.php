<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SinclairPerson extends Model
{
	protected $table = "sinclair_person";

	public function relationshipTypes()
	{
		return $this->belongsToMany('App\RelationshipType');
    }
}
