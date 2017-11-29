<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\SinclairPerson;
use App\RelationshipType;

class SinclairPersonController extends Controller
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
		$sinclairPersons = SinclairPerson::paginate(10);
		return view('sinclairPerson.index', ['sinclairPersons' => $sinclairPersons]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create(Request $request)
  {
		$relationshipTypes = RelationshipType::all();
		$numRelationshipTypes = $request->input('numRelationshipTypes');
		if(is_null($numRelationshipTypes))
	  {
		$numRelationshipTypes = 1;
	  }
		$modRelationshipTypeFields = $request->input('modRelationshipTypeFields');
		if($modRelationshipTypeFields == 'p')
	  {
		$numRelationshipTypes++;
	}elseif($modRelationshipTypeFields == 'm')
	  {
		$numRelationshipTypes--;
	  }
	  return view('sinclairPerson.create',
			[
				'numRelationshipTypes' => $numRelationshipTypes,
				'modRelationshipTypeFields' => $modRelationshipTypeFields,
				'relationshipTypes' => $relationshipTypes
			]
		);
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
		$relationshipTypesString = $request->input('relationshipTypes');
		$relationshipTypesId   = array();
	  foreach($relationshipTypesString as $key=>$string)
	  {
		$relationshipTypesId[$key] = explode('-',$string)[0];
	  }
		$sinclairPerson->relationshipTypes()->attach($relationshipTypesId);
		return redirect('dashboard')->with('success' , 'Persona registrada');
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
			$relationshipTypes = $sinclairPerson->relationshipTypes();
		  return view('sinclairPerson.show', ['sinclairPerson' => $sinclairPerson,
				'relationshipTypes' => $relationshipTypes]);
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
			$relationshipTypes = RelationshipType::all();
		  return view('sinclairPerson.edit', ['sinclairPerson' => $sinclairPerson,
				'relationshipTypes' => $relationshipTypes]);
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
		$sinclairPerson = SinclairPerson::find($id);
		$sinclairPerson->firstname = $request-> input('firstname');
	  $sinclairPerson->lastname = $request-> input('lastname');
	  $sinclairPerson->nin = $request-> input('nin');
	  $sinclairPerson->save();
		return redirect('sinclairPerson/'.$id);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
	  $sinclairPerson = SinclairPerson::find($id);
		$sinclairPerson->relationshipTypes()->detach();
		$sinclairPerson->delete();
		return redirect('dashboard')->with('success' , 'Persona eliminada');
  }

	public function showDeleteConfirmation($id)
	{
		$sinclairPerson = SinclairPerson::find($id);
		if(!is_null($sinclairPerson))
		{
			return view('sinclairPerson.delete', ['sinclairPerson' => $sinclairPerson]);
		}
		else
		{
			return redirect('dashboard')->with('error' , 'Persona no encontrada');
		}

	}

	public function apiPaginate($amount)
	{

		$sinclairPersons = SinclairPerson::paginate($amount);
		return $sinclairPersons;
	}
}
