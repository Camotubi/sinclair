<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Insurance;
use App\ArtPiece;
use App\InsuranceCarrier;

class InsuranceController extends Controller
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
		$insurances = Insurance::paginate(10);
		return view('insurance.index', ['insurances' => $insurances]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$artPieces = ArtPiece::all();
		$insuranceCarriers = InsuranceCarrier::all();
		return view('insurance.create', ['artPieces' => $artPieces, 'insuranceCarriers' => $insuranceCarriers]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$insurance = new Insurance;
		$insurance->name = $request-> input('name');
		$insurance->cost = $request-> input('cost');
		$insurance->effectiveDate = $request-> input('effectiveDate');
		$insurance->terminationDate = $request-> input('terminationDate');
		$insurance->artPiece()->associate(explode('-',$request->input('artPiece'))[0]);
		$insurance->insuranceCarrier()->associate(explode('-',$request->input('insuranceCarrier'))[0]);
		$insurance->save();
		return redirect('dashboard')->with('success' , 'Seguro registrado');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$insurance = Insurance::find($id);
		if(!is_null($insurance))
		{
			$artPiece = $insurance->artPiece();
			$insuranceCarrier = $insurance->insuranceCarrier();
		  return view('insurance.show', ['insurance' => $insurance, ]);

		}
		else
		{
		  return redirect('dashboard')->with('error' , 'Seguro no encontrado');
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
		$insurance = Insurance::find($id);
		if(!is_null($insurance))
		{
			$artPieces = artPiece::all();
			$insuranceCarrier = InsuranceCarrier::all();
		  return view('insurance.edit', ['insurance' => $insurance,
				'artPiece' => $artPiece, 'insuranceCarrier' => $insuranceCarrier]);

		}
		else
		{
		  return redirect('dashboard')->with('error' , 'Seguro no encontrado');
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
		$insurance = Insurance::find($id);
		$insurance->name = $request-> input('name');
		$insurance->cost = $request-> input('cost');
		$insurance->effectiveDate = $request-> input('effectiveDate');
		$insurance->terminationDate = $request-> input('terminationDate');
		$insurance->save();
		return redirect('insurance/'.$id);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$insurance = Insurance::find($id);
		$insurance->artPiece()->dissociate();
		$insurance->insuranceCarrier()->dissociate();
		$insurance->delete();
		return redirect('dashboard')->with('success' , 'Seguro eliminado');
	}
	public function showDeleteConfirmation($id)
	{
		$insurance = insurance::find($id);
		if(!is_null($insurance))
		{
			$artPiece = artPiece::find($insurance->artPieceId);
			$insuranceCarrier = InsuranceCarrier::find($insurance->insuranceCarrierId);
			return view('insurance.delete', ['insurance' => $insurance,
				'artPieces' => $artPieces, 'insuranceCarriers' => $insuranceCarriers]);
		}
		else
		{
			return redirect('dashboard')->with('error' , 'Seguro no encontrado');
		}

	}
}
