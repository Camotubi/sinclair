<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FurnitureCreateRequest;
use App\Http\Requests\FurnitureUpdateRequest;
use App\Furniture;
use App\FurnitureType;
use App\LegalEntity;

class FurnitureController extends Controller
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
		$furnitures = Furniture::paginate(10);
		return view('furniture.index', ['furnitures' => $furnitures]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$legalEntities = LegalEntity::all();
		$furnitureTypes = FurnitureType::all();
		return view('furniture.create', ['legalEntities' => $legalEntities,
			'furnitureTypes' => $furnitureTypes]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(FurnitureCreateRequest $request)
	{
		$furniture = new Furniture;
		$furniture->name = $request-> input('name');
		$furniture->save();
		$furniture->donator()->associate($request->input ('donatorId'));
		$furniture->type()->associate($request-> input('furnitureTypeId'));
		return redirect('dashboard')->with('success' , 'Inmobiliario registrado');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$furniture = Furniture::find($id);
		if(!is_null($furniture))
		{
		  return view('furniture.show', ['furniture' => $furniture]);
		}
		else
		{
		  return redirect('dashboard')->with('error' , 'Inmobiliario no encontrado');
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
		$furniture = Furniture::find($id);
		if(!is_null($furniture))
		{
			$legalEntities = LegalEntity::all();
			$furnitureTypes = FurnitureType::all();
		  return view('furniture.edit', ['furniture' => $furniture,
				'legalEntities' => $legalEntities, 'furnitureTypes' => $furnitureTypes]);
		}
		else
		{
		  return redirect('dashboard')->with('error' , 'Inmobiliario no encontrado');
		}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(FurnitureUpdateRequest $request, $id)
	{
		$furniture = Furniture::find($id);
		$furniture->name = $request-> input('name');
		$furniture->save();
		return redirect('furniture/'.$id);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$furniture = Furniture::find($id);
		$furniture->donator()->dissociate();
		$furniture->furnitureTypes()->dissociate();
		$furniture->legalEntityPossession()->detach();
		$furniture->legalEntityRestoration()->detach();
		$furniture->delete();
		return redirect('dashboard')->with('success' , 'Inmobiliario eliminado');
	}

	public function showDeleteConfirmation($id)
	{
		$furniture = Furniture::find($id);
		if(!is_null($furniture))
		{
			return view('furniture.delete', ['furniture' => $furniture]);
		}
		else
		{
			return redirect('dashboard')->with('error' , 'Inmobiliario no encontrado');
		}

	}
}
