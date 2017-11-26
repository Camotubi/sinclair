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
		$condecorations = Condecoration::paginate(10);
		return view('condecoration.index', ['condecorations' => $condecorations]);
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
		$condecoration->save();
		$condecoration->condecorator()->associate(LegalEntity::where('legalEntity.id',
			$request->input ('condecoratorId'))->first());
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$condecoration = Condecoration::find($id);
		if(!is_null($condecoration))
		{
		  return view('condecoration.show', ['condecoration' => $condecoration]);
		}
		else
		{
		  return redirect('dashboard')->with('error' , 'Condecoración no encontrada');
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
		$condecoration = Condecoration::find($id);
		if(!is_null($condecoration))
		{
		  return view('condecoration.edit', ['condecoration' => $condecoration]);
		}
		else
		{
		  return redirect('dashboard')->with('error' , 'Condecoración no encontrada');
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
