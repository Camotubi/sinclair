<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SinclairPerson extends Model
{
    protected $table = "sinclairPerson";

    public function relationshipType()
    {
      return $this->belongsToMany('App\RelationshipType');
    }
}
