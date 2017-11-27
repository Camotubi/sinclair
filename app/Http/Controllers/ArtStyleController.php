<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ArtStyle;

class ArtStyleController extends Controller
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
		$artStyles = ArtStyle::paginate(10);
	  return view('artStyle.index', ['artStyles' => $artStyles]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
	  return view('artStyle.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
	  $artStyle = new ArtStyle;
	  $artStyle->name = $request-> input('name');
	  $artStyle->description = $request-> input('description');
	  $artStyle->save();
		return redirect('dashboard')->with('success' , 'Estilo registrado');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
		$artStyle = ArtStyle::find($id);
		if(!is_null($artStyle))
		{
		  return view('artStyle.show', ['artStyle' => $artStyle]);
		}
		else
		{
		  return redirect('dashboard')->with('error' , 'Estilo de arte no encontrada');
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
		$artStyle = ArtStyle::find($id);
		if(!is_null($artStyle))
		{
		  return view('artStyle.edit', ['artStyle' => $artStyle]);
		}
		else
		{
		  return redirect('dashboard')->with('error' , 'Estilo de arte no encontrada');
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
	  $artStyle = ArtStyle::find($id);
		$artStyle->name = $request-> input('name');
	  $artStyle->description = $request-> input('description');
	  $artStyle->save();
		return redirect('artStyle/'.$id);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
	  $artStyle = ArtStyle::find($id);
		$artStyle->delete();
		return redirect('dashboard')->with('success' , 'Estilo eliminado');
  }

public function test()
{

	return view('test',['items'=>ArtStyle::paginate(10)]);
}

public function showDeleteConfirmation($id)
{
	$artStyle = ArtStyle::find($id);
	if(!is_null($artStyle))
	{
		return view('artStyle.delete', ['artStyle' => $artStyle]);
	}
	else
	{
		return redirect('dashboard')->with('error' , 'Estilo de arte no encontrado');
	}

}
}
