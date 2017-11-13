<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ArtPiece;
use Illuminate\Support\Facades\DB;
class DashboardController extends Controller
{

	public function index()
	{
	$artPieces = DB::table('artPiece')->paginate(10);
	$users = DB::table('users')->paginate(10);
	return view('dashboard',['users'=> $users,'artPieces'=>$artPieces
	]);

	}
	public function test()
	{



	}

}
