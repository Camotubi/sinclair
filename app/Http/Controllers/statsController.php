<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ArtPiece;
class statsController extends Controller
{
	public function statPage()
	{
		$artPiecesQuntity =ArtPiece::orderBy('quantityOfTraffic','desc')->take(10)->get();
		return view('stats.index',['artPiecesQ' => $artPiecesQuntity]);
	}
}
