<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ArtPieceCreateRequest;
use App\Http\Requests\ArtPieceUpdateRequest;
use App\ArtPiece;
use App\LegalEntity;
use Illuminate\Support\Facades\DB;

class ArtPieceController extends Controller
{
	public function __construct()
	{
		//        $this->middleware('auth', ['only' => ['index','create','store','edit','update','destroy']]);
		//      $this->middleware('admin', ['only' => ['create','store','edit','update','destroy']]);
		//    $this->middleware('editor', ['only' => ['store','edit']]);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$artPieces = DB::table('artPiece')->paginate(10);
		return view('artPiece.index',['artPieces'=> $artPieces]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('artPiece.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(ArtPieceCreateRequest $request)
	{
		$artPiece = new ArtPiece;
		$artPiece->name = $request->input ('name');
		$artPiece->currentLocation = $request->input ('currentLocation');
		$artPiece->style = $request->input ('style');
		$artPiece->era = $request->input ('era');
		$artPiece->technique = $request->input ('technique');
		$artPiece->criticalAnalisis = $request->input ('criticalAnalisis');
		$artPiece->creationDate = $request->input ('creationDate');
		if ( $request->input ('generatePublication') ) {
			$artPiece->generatePublication = true;
		}
		$artPiece->save();
		$artPiece->donator()->attach(LegalEntity::where('legalEntity.id',
			$request->input ('donatorId'))->first());
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$artPiece = ArtPiece::find($id);
		if(!is_null($artPiece))
		{
			return view('artPiece.show', ['artPiece' => $artPiece]);
		}
		else
		{
			return redirect('dashboard')->with('error' , 'Obra de arte no encontrada');
		}
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$artPiece = ArtPiece::find($id);
		if(!is_null($artPiece))
		{
			return view('artPiece.edit', ['artPiece' => $artPiece]);
		}
		else
		{
			return redirect('dashboard')->with('error' , 'Obra de arte no encontrada');
		}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(ArtPieceUpdateRequest $request, $id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		//
	}

	public function apiPaginate($amount)
	{

		$artPieces = DB::table('artPiece')->paginate($amount);
		return $artPieces;
	}
	public function frontIndex()
	{
		$artPiece = DB::table('artPiece')
			->select('name')
			->get();
		return view('frontend.artPiece.index', compact('artPiece'));
	}

	public function frontShow()
	{
		return view('frontend.artPiece.show');
	}
}
