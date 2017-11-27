<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Tag;

class TagController extends Controller
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
		$tags = Tag::paginate(10);
		return view('tag.index', ['tags' => $tags]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
	  return view('tag.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
	  $tag = new Tag;
	  $tag->name = $request-> input('name');
	  $tag->save();
		return redirect('dashboard')->with('success' , 'Etiqueta registrada');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
		$tag = Tag::find($id);
		if(!is_null($tag))
		{
		  return view('tag.show', ['tag' => $tag]);
		}
		else
		{
		  return redirect('dashboard')->with('error' , 'Etiqueta no encontrada');
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
		$tag = Tag::find($id);
		if(!is_null($tag))
		{
		  return view('tag.edit', ['tag' => $tag]);
		}
		else
		{
		  return redirect('dashboard')->with('error' , 'Etiqueta no encontrada');
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
	  $tag = Tag::find($id);
		$tag->name = $request-> input('name');
	  $tag->save();
		return redirect('tag/'.$id);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
	  $tag = Tag::find($id);
		$tag->delete();
		return redirect('dashboard')->with('success' , 'Etiqueta eliminada');
  }

	public function showDeleteConfirmation($id)
	{
		$tag = Tag::find($id);
		if(!is_null($tag))
		{
			return view('tag.delete', ['tag' => $tag]);
		}
		else
		{
			return redirect('dashboard')->with('error' , 'Etiqueta no encontrada');
		}

	}
}
