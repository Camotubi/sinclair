<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ArtPiece;
class QueriesController extends Controller
{
	public function test()
	{
		return ArtPiece::all();
	}
}
