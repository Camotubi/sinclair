<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Visitor;

class VisitorController extends Controller
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
	  $visitors = Visitor::paginate(10);
		return view('visitor.index', ['visitors' => $visitors]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
	  return view('visitor.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
	  $visitor = new Visitor;
	  $visitor->firstname = $request-> input('firstname');
	  $visitor->lastname = $request-> input('lastname');
	  $visitor->nin = $request-> input('nin');
	  $visitor->save();
		return redirect('dashboard')->with('success' , 'Visitante registrado');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
		$visitor = Visitor::find($id);
		if(!is_null($visitor))
		{
		  return view('visitor.show', ['visitor' => $visitor]);
		}
		else
		{
		  return redirect('dashboard')->with('error' , 'Visitante no encontrada');
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
		$visitor = Visitor::find($id);
		if(!is_null($visitor))
		{
		  return view('visitor.edit', ['visitor' => $visitor]);
		}
		else
		{
		  return redirect('dashboard')->with('error' , 'Visitante no encontrada');
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
	  $visitor = Visitor::find($id);
		$visitor->firstname = $request-> input('firstname');
	 	$visitor->lastname = $request-> input('lastname');
	 	$visitor->nin = $request-> input('nin');
	 	$visitor->save();
		return redirect('visitor/'.$id);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
	  $visitor = Visitor::find($id);
		$visits = $visitor->visits()->get();
		foreach ($visits as $visit) {
			$visit->visitors()->dissociate();
			$visit->delete();
		}
		$visitor->delete();
		return redirect('dashboard')->with('success' , 'Visitante eliminado');
  }

	public function showDeleteConfirmation($id)
	{
		$visitor = Visitor::find($id);
		if(!is_null($visitor))
		{
			return view('visitor.delete', ['visitor' => $visitor]);
		}
		else
		{
			return redirect('dashboard')->with('error' , 'Visitante no encontrado');
		}

	}
}
