<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FurnitureCreateRequest;
use App\Http\Requests\FurnitureUpdateRequest;
use App\Furniture;
use App\LegalEntity;

class FurnitureController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth', ['only' => ['index','create','store','edit','update','destroy']]);
		$this->middleware('admin', ['only' => ['create','store','edit','update','destroy']]);
		$this->middleware('editor', ['only' => ['store','edit']]);
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
		return view('furniture.create');
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
		$furniture->donator()->associate(LegalEntity::where('legalEntity.id',
			$request->input ('donatorId'))->first());
		$furniture->type()->associate(LegalEntity::where('legalEntity.id',
			$request-> input('furnitureTypeId'))->first());
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
		  return view('furniture.edit', ['furniture' => $furniture]);
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
