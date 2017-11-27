<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Exhibition;

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
  public function create()
  {
	  return view('exhibition.create');
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
