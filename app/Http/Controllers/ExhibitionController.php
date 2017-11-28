<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Exhibition;

use App\ArtPiece;
use App\LegalEntity;
class ExhibitionController extends Controller
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
		$exhibitions = exhibition::paginate(10);
		return view('exhibition.index', ['exhibitions' => $exhibitions]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create(Request $request)
  {
	  $artPieces = ArtPiece::all();
	  $legalEntities = LegalEntity::all();
	  $numArtPieces = $request->input('numArtPieces');
	  $numLegalEntities = $request->input('numLegalEntities');
	  if(is_null($numArtPieces))
	  {
		$numArtPieces = 1;
	  }
	  if(is_null($numLegalEntities))
	  {
		$numLegalEntities = 1;
	  }
	  $modArtPieceFields = $request->input('modArtPieceFields');
	  $modLegalEntityFields = $request->input('modLegalEntityFields');
	  if($modLegalEntityFields == 'p')
	  {
		$numLegalEntities++;
	  }elseif($modLegalEntityFields == 'm')
	  {
		$numLegalEntities--;
	  }
	  if($modArtPieceFields == 'p')
	  {
		$numArtPieces++;
	  }elseif($modArtPieceFields == 'm')
	  {
		$numArtPieces--;
	  }
	  
	  return view('exhibition.create',
		  [
		  	'numArtPieces' => $numArtPieces,
			'numLegalEntities' => $numLegalEntities,
			'modLegalEntityFields' => $modLegalEntityFields,
			'modArtPieceFields' => $modArtPieceFields,
			'artPieces' => $artPieces,
			'legalEntities' => $legalEntities

		  ]
	  );
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
	  $exhibition = new Exhibition;
	  $exhibition->name = $request-> input('name');
	  $exhibition->location = $request-> input('location');
	  $exhibition->date = $request-> input('date');

	$res   = array();
foreach($strings as $key=>$string){
  preg_match('/^(?P<number>\d)/',$string,$match);
  $res[$key] = $match['number'];
}

	  $exhibition->save();
		return redirect('dashboard')->with('success' , 'Exhibición registrada');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
		$exhibition = Exhibition::find($id);
		if(!is_null($exhibition))
		{
		  return view('exhibition.show', ['exhibition' => $exhibition]);
		}
		else
		{
		  return redirect('dashboard')->with('error' , 'Exhibición no encontrada');
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
		$exhibition = Exhibition::find($id);
		if(!is_null($exhibition))
		{
		  return view('exhibition.edit', ['exhibition' => $exhibition]);
		}
		else
		{
		  return redirect('dashboard')->with('error' , 'Exhibición no encontrada');
		}
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
	  $exhibition = Exhibition::find($id);
		$exhibition->name = $request-> input('name');
	  $exhibition->location = $request-> input('location');
	  $exhibition->date = $request-> input('date');
	  $exhibition->save();
		return redirect('exhibition/'.$id);

  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
	  $exhibition = Exhibition::find($id);
		$exhibition->delete();
		return redirect('dashboard')->with('success' , 'Exhibición eliminada');
  }

	public function showDeleteConfirmation($id)
	{
		$exhibition = Exhibition::find($id);
		if(!is_null($exhibition))
		{
			return view('exhibition.delete', ['exhibition' => $exhibition]);
		}
		else
		{
			return redirect('dashboard')->with('error' , 'Exhibición no encontrada');
		}

	}
}
