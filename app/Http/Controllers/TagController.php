<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Tag;

class TagController extends Controller
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
