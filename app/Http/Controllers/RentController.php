<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RentCreateRequest;
use App\Http\Requests\RentUpdateRequest;

use App\Rent;
use App\ArtPiece;
use App\LegalEntity;

class RentController extends Controller
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
			$rents = Rent::paginate(10);
			return view('rent.index', ['rents' => $rents]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
			$artPieces = ArtPiece::all();
			$legalEntities = LegalEntity::all();
	    return view('rent.create', ['artPieces' => $artPieces,
				'legalEntities' => $legalEntities]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $rent = new Rent;
      $rent->moneyQuantity = $request-> input('moneyQuantity');
      $rent->effectiveDate = $request-> input('effectiveDate');
      $rent->terminationDate = $request-> input('terminationDate');
			$rent->artPiece()->associate($request->input ('artPieceId'));
			$rent->legalEntity()->associate($request->input ('legalEntityId'));
      $rent->save();
			return redirect('dashboard')->with('success' , 'Alquiler registrado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
			$rent = Rent::find($id);
			if(!is_null($rent))
			{
			  return view('rent.show', ['rent' => $rent]);
			}
			else
			{
			  return redirect('dashboard')->with('error' , 'Alquiler no encontrado');
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
			$rent = Rent::find($id);
			if(!is_null($rent))
			{
				$artPieces = ArtPiece::all();
				$legalEntities = LegalEntity::all();
			  return view('rent.edit', ['rent' => $rent, 'artPieces' => $artPieces, 'legalEntities' => $legalEntities]);
			}
			else
			{
			  return redirect('dashboard')->with('error' , 'Alquiler no encontrado');
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
	    $rent = Rent::find($id);
			$rent->moneyQuantity = $request-> input('moneyQuantity');
      $rent->effectiveDate = $request-> input('effectiveDate');
      $rent->terminationDate = $request-> input('terminationDate');
      $rent->save();
			return redirect('rent/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
	    $rent = Rent::find($id);
			$rent->artPiece()->dissociate();
			$rent->legalEntity()->dissociate();
			$rent->delete();
			return redirect('dashboard')->with('success' , 'Alquiler eliminado');
    }

		public function showDeleteConfirmation($id)
		{
			$rent = Rent::find($id);
			if(!is_null($rent))
			{
				$artPiece = ArtPiece::find($rent->artPieceId);
				$legalEntity = LegalEntity::find($rent->legalEntityId);
				return view('rent.delete', ['rent' => $rent, 'artPiece' => $artPiece,
					'legalEntity' => $legalEntity]);
			}
			else
			{
				return redirect('dashboard')->with('error' , 'Alquiler no encontrado');
			}

		}
}
