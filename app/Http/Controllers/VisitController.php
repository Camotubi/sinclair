<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Visit;
use App\Visitor;

class VisitController extends Controller
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
		$visits = Visit::paginate(10);
		return view('visit.index', ['visits' => $visits]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
	  return view('visit.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
      $visit = new Visit;
      $visit->date = $request-> input('date');
      $visit->save();
      $visit->visitor()->attach(Visitor::where('visitor.id',
      $request->input ('visitorId'))->first());
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
		$visit = Visit::find($id);
		if(!is_null($visit))
		{
		  return view('visit.show', ['visit' => $visit]);
		}
		else
		{
		  return redirect('dashboard')->with('error' , 'Visita no encontrada');
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
		$visit = Visit::find($id);
		if(!is_null($visit))
		{
		  return view('visit.edit', ['visit' => $visit]);
		}
		else
		{
		  return redirect('dashboard')->with('error' , 'Visita no encontrada');
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
