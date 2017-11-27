<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\InsuranceCarrier;

class InsuranceCarrierController extends Controller
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
		$insuranceCarriers = InsuranceCarrier::paginate(10);
		return view('insuranceCarrier.index', ['insuranceCarriers' => $insuranceCarriers]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
	  return view('insuranceCarrier.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
	  $insuranceCarrier = new InsuranceCarrier;
	  $insuranceCarrier->name = $request-> input('name');
	  $insuranceCarrier->phone = $request-> input('phone');
	  $insuranceCarrier->email = $request-> input('email');
	  $insuranceCarrier->ruc = $request-> input('ruc');
	  $insuranceCarrier->save();
		return redirect('dashboard')->with('success' , 'Aseguradora registrada');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
		$insuranceCarrier = InsuranceCarrier::find($id);
		if(!is_null($insuranceCarrier))
		{
		  return view('insuranceCarrier.show', ['insuranceCarrier' => $insuranceCarrier]);
		}
		else
		{
		  return redirect('dashboard')->with('error' , 'Aseguradora no encontrada');
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
		$insuranceCarrier = InsuranceCarrier::find($id);
		if(!is_null($insuranceCarrier))
		{
		  return view('insuranceCarrier.edit', ['insuranceCarrier' => $insuranceCarrier]);
		}
		else
		{
		  return redirect('dashboard')->with('error' , 'Aseguradora no encontrada');
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
	  $insuranceCarrier = InsuranceCarrier::find($id);
		$insuranceCarrier->name = $request-> input('name');
	  $insuranceCarrier->phone = $request-> input('phone');
	  $insuranceCarrier->email = $request-> input('email');
	  $insuranceCarrier->ruc = $request-> input('ruc');
	  $insuranceCarrier->save();
		return redirect('insuranceCarrier/'.$id);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
	  $insuranceCarrier = InsuranceCarrier::find($id);
		$insuranceCarrier->delete();
		return redirect('dashboard')->with('success' , 'Aseguradora eliminada');
  }

	public function showDeleteConfirmation($id)
	{
		$insuranceCarrier = insuranceCarrier::find($id);
		if(!is_null($insuranceCarrier))
		{
			return view('insuranceCarrier.delete', ['insuranceCarrier' => $insuranceCarrier]);
		}
		else
		{
			return redirect('dashboard')->with('error' , 'Aseguradora no encontrada');
		}

	}
}
