<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LegalEntityCreateRequest;
use App\Http\Requests\LegalEntityUpdateRequest;

use App\LegalEntity;

class LegalEntityController extends Controller
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
		$legalEntities = LegalEntity::paginate(10);
		return view('legalEntity.index', ['legalEntities' => $legalEntities]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
	  return view('legalEntity.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(LegalEntityCreateRequest $request)
  {
	  $legalEntity = new LegalEntity;
	  $legalEntity->name = $request->input ('name');
	  $legalEntity->email = $request->input ('email');
	  $legalEntity->phone = $request->input ('phone');
	  $legalEntity->address = $request->input ('address');
	  $legalEntity->ruc = $request->input ('ruc');
	  $legalEntity->identificationNumber = $request->input ('identificationNumber');
	  if ( $request->input ('philanthropy') ) {
		  $legalEntity->philanthropy = true;
      }
      $legalEntity->save();
			return redirect('dashboard')->with('success' , 'Entidad Legal registrada');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
		$legalEntity = LegalEntity::find($id);
		if(!is_null($legalEntity))
		{
		  return view('legalEntity.show', ['legalEntity' => $legalEntity]);
		}
		else
		{
		  return redirect('dashboard')->with('error' , 'Entidad Legal no encontrada');
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
		$legalEntity = LegalEntity::find($id);
		if(!is_null($legalEntity))
		{
		  return view('legalEntity.edit', ['legalEntity' => $legalEntity]);
		}
		else
		{
		  return redirect('dashboard')->with('error' , 'Entidad Legal no encontrada');
		}
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(LegalEntityUpdateRequest $request, $id)
  {
	  $legalEntity = LegalEntity::find($id);
		$legalEntity->name = $request->input ('name');
	  $legalEntity->email = $request->input ('email');
	  $legalEntity->phone = $request->input ('phone');
	  $legalEntity->address = $request->input ('address');
	  $legalEntity->ruc = $request->input ('ruc');
	  $legalEntity->identificationNumber = $request->input ('identificationNumber');
	  if ( $request->input ('philanthropy') ) {
		  $legalEntity->philanthropy = true;
      }
      $legalEntity->save();
			return redirect('legalEntity/'.$id);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
	  $legalEntity = LegalEntity::find($id);
		$legalEntity->delete();
		return redirect('dashboard')->with('success' , 'Entidad Legal eliminada');
  }
	public function apiPaginate($amount)
	{

		return LegalEntity::paginate($amount);
	}
}
