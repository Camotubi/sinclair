<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ArtPiece;
use App\User;
use Illuminate\Support\Facades\DB;
class DashboardController extends Controller
{

	public function __construct()
	{

		if(config('app.enableGuards'))
		{
			$this->middleware('auth');
		}
	}
	public function index()
	{
		$artPieces = ArtPiece::paginate(10);
		$users = User::paginate(10);
		return view('dashboard',['users'=> $users,'artPieces'=>$artPieces
		]);

	}
	public function test()
	{



	}

}
