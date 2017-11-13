<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Condecoration;
use App\LegalEntity;

class CondecorationController extends Controller
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
	  return view('condecoration.index');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
	  return view('condecoration.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
	  $condecoration = new Condecoration;
	  $condecoration->name = $request-> input('name');
	  $condecoration->date = $request-> input('date');
	  $condecoration->desription = $request-> input('description');
	  $condecoration->condecorator()->attach(LegalEntity::where('legalEntity.id',
		  $request->input ('condecoratorId'))->first());
	  $condecoration->save();
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
	  return view('condecoration.show');
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
	  //
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
