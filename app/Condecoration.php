<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Condecoration extends Model
{
	protected $table = "condecoration";

	public function condecorator()
	{
		return $this->belongsTo('App\LegalEntity', 'condecoratorId');
    }
}
