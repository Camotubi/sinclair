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

		//		$this->middleware('auth', ['only' => ['index','create','store','edit','update','destroy']]);
		//$this->middleware('admin', ['only' => ['create','store','edit','update','destroy']]);
		//$this->middleware('editor', ['only' => ['store','edit']]);

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
