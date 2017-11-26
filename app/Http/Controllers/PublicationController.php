<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PublicationCreateRequest;
use App\Http\Requests\PublicationUpdateRequest;

use App\Publication;
use App\User;

class PublicationController extends Controller
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
			$publications = Publication::paginate(10);
			return view('publication.index', ['publications' => $publications]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	    return view('publication.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PublicationCreateRequest $request)
    {
      $publication = new Publication;
      $publication->title = $request-> input('title');
      $publication->body = $request-> input('body');
      $apublication->save();
      $publication->user()->attach(User::where('users.id',
      $request->input ('userId'))->first());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
			$publication = Publication::find($id);
			if(!is_null($publication))
			{
			  return view('publication.show', ['publication' => $publication]);
			}
			else
			{
			  return redirect('dashboard')->with('error' , 'Publicación no encontrada');
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
			$publication = Publication::find($id);
			if(!is_null($publication))
			{
			  return view('publication.edit', ['publication' => $publication]);
			}
			else
			{
			  return redirect('dashboard')->with('error' , 'Publicación no encontrada');
			}
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PublicationUpdateRequest $request, $id)
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
