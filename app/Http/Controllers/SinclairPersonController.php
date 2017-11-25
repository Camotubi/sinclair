<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\SinclairPerson;

class SinclairPersonController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('admin'['only' => ['create','store','edit','update','destroy']]);
		$this->middleware('editor'['only' => ['store','edit']]);
  }
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
		$sinclairPersons = SinclairPerson::paginate(10);
		return view('sinclairPerson.index', ['sinclairPersons' => $sinclairPersons]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
	  return view('sinclairPerson.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
	  $sinclairPerson = new SinclairPerson;
	  $sinclairPerson->firstname = $request-> input('firstname');
	  $sinclairPerson->lastname = $request-> input('lastname');
	  $sinclairPerson->nin = $request-> input('nin');
	  $sinclairPerson->save();
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
		$sinclairPerson = SinclairPerson::find($id);
		if(!is_null($sinclairPerson))
		{
		  return view('sinclairPerson.show', ['sinclairPerson' => $sinclairPerson]);
		}
		else
		{
		  return redirect('dashboard')->with('error' , 'Persona no encontrada');
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
		$sinclairPerson = SinclairPerson::find($id);
		if(!is_null($sinclairPerson))
		{
		  return view('sinclairPerson.edit', ['sinclairPerson' => $sinclairPerson]);
		}
		else
		{
		  return redirect('dashboard')->with('error' , 'Persona no encontrada');
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
