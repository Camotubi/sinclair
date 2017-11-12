<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FurnitureType extends Model
{
    protected $table = "furnitureType";

    public function furniture()
    {
      return $this->hasMany('App\Furniture', 'furnitureTypeId', 'id');
    }
}
