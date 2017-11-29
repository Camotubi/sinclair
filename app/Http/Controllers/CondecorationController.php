<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Condecoration;
use App\LegalEntity;

class CondecorationController extends Controller
{
	public function __construct()
	{
		if(config('app.enableGuards'))
		{
			$this->middleware('auth'['only' => ['create','store','edit','update','destroy']]);
		}
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
		$legalEntities = LegalEntity::all();
		return view('condecoration.create', ['legalEntities' => $legalEntities]);
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
		$condecoration->condecorator()->associate($request->input ('condecoratorId'));
		$condecoration->save();
		return redirect('dashboard')->with('success' , 'Condecoración registrada');
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
			$condecorator = LegalEntity::find($condecoration->condecoratorId);
		  return view('condecoration.show', ['condecoration' => $condecoration,
				'condecorator' => $condecorator]);
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
			$legalEntities = LegalEntity::all();
		  return view('condecoration.edit', ['condecoration' => $condecoration,
				'legalEntities' => $legalEntities]);
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
		$condecoration = Condecoration::find($id);
			$condecoration->name = $request-> input('name');
			$condecoration->date = $request-> input('date');
			$condecoration->desription = $request-> input('description');
			$condecoration->save();
			return redirect('condecoration/'.$id);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$condecoration = Condecoration::find($id);
		$condecoration->condecorator()->dissociate();
		$condecoration->delete();
		return redirect('dashboard')->with('success' , 'Condecoración eliminada');
	}

	public function showDeleteConfirmation($id)
	{
		$condecoration = Condecoration::find($id);
		if(!is_null($condecoration))
		{
			return view('condecoration.delete', ['condecoration' => $condecoration]);
		}
		else
		{
			return redirect('dashboard')->with('error' , 'Condecoración no encontrada');
		}

	}
}
