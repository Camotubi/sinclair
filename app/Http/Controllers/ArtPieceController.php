<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ArtPieceCreateRequest;
use App\Http\Requests\ArtPieceUpdateRequest;
use App\ArtPiece;
use App\ArtStyle;
use App\Multimedia;
use App\LegalEntity;
use Illuminate\Support\Facades\DB;

class ArtPieceController extends Controller
{
	public function __construct()
	{

		if(config('app.enableGuards'))
		{
			$this->middleware('auth', ['only' => ['index','create','store','edit','update','destroy']]);
		}
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$artPieces = ArtPiece::paginate(12);
		return view('artPiece.index',['artPieces'=> $artPieces]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$legalEntities = LegalEntity::all();
		$artStyles = ArtStyle::all();
		return view('artPiece.create', ['legalEntities' => $legalEntities, 'artStyles' => $artStyles]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$artPiece = new ArtPiece;
		$artPiece->name = $request->input ('name');
		$artPiece->currentLocation = $request->input ('currentLocation');
		$artPiece->technique = $request->input ('technique');
		$artPiece->criticalAnalisis = $request->input ('criticalAnalisis');
		$artPiece->creationDate = $request->input ('creationDate');
		$artPiece->donatorId = $request->input('donatorId');
		if ( $request->input ('generatePublication') ) {
			$artPiece->generatePublication = true;
		}
		$artPiece->save();
		$artPiece->donator()->associate(LegalEntity::where('legalEntity.id',
			$request->input ('donatorId'))->first());
		$artPiece->artStyles()->attach($request->input('artStyleId'));
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
			$legalEntities = LegalEntity::all();
			$artStyles = ArtStyle::all();
			return view('artPiece.edit', ['artPiece' => $artPiece,
				'legalEntities' => $legalEntities, 'artStyles' => $artStyles]);
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
		$ArtPiece = ArtPiece::find($id);
		$ArtPiece->legalEntityRestoration()->detach();
		$ArtPiece->multimedia()->detach();
		$ArtPiece->delete();
		return redirect('dashboard')->with('success' , 'Obra eliminada');
	}

	public function apiPaginate($amount)
	{

		$artPieces = ArtPiece::paginate($amount);
		return $artPieces;
	}
	public function getArtPiece($id)
	{
		$artPiece = ArtPiece::where('id',$id)->first();
		return $artPiece;
	}

	public function frontIndex()
	{
		return view('frontend.artPiece.index', ['artPieces'=> $this->apiPaginate(15)]);
	}

	public function frontShow($id)
	{
		return view('frontend.artPiece.show',['artPiece'=>$this->getArtPiece($id)]);
	}

	public function addImage($id)
	{
		return view('artPiece.add_image',['artPiece'=>$this->getArtPiece($id)]);
	}
	public function storeImage(Request $request, $id)
	{
		$artPiece = ArtPiece::where('id',$id)->first();
		$imgFile = $request->file('image')->store('artPieceImgs','public');
		$multimedia = new Multimedia;
		$multimedia->description = $request->input('description');
		$multimedia->fileLocation = $imgFile;
		$multimedia->save();
		$multimedia->artPieces()->attach($artPiece->id);

		return redirect('artPiece/'.$id);


	}

	public function showDeleteConfirmation($id)
	{
		$artPiece = ArtPiece::find($id);
		if(!is_null($artPiece))
		{
			return view('artPiece.delete', ['artPiece' => $artPiece]);
		}
		else
		{
			return redirect('dashboard')->with('error' , 'Obra de arte no encontrada');
		}
		
	}
}
