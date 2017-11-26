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
		$this->middleware('auth', ['only' => ['index','create','store','edit','update','destroy']]);
		$this->middleware('admin', ['only' => ['create','store','edit','update','destroy']]);
		$this->middleware('editor', ['only' => ['store','edit']]);
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
	    return view('rent.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RentCreateRequest $request)
    {
      $rent = new Rent;
      $rent->moneyQuantity = $request-> input('moneyQuantity');
      $rent->effectiveDate = $request-> input('effectiveDate');
      $rent->terminationDate = $request-> input('terminationDate');
      $rent->save();
      $rent->artPiece()->associate(ArtPiece::where('artPiece.id',
      $request->input ('artPieceId'))->first());
      $rent->legalEntity()->associate(LegalEntity::where('legalEntity.id',
      $request->input ('legalEntityId'))->first());
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
			  return view('rent.edit', ['rent' => $rent]);
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
    public function update(RentUpdateRequest $request, $id)
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
}
