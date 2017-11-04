<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ArtPiece;
class DashboardController extends Controller
{

	public function index()
	{
		return view('dashboard',['artPieces' => ArtPiece::all()]);
	}

}
