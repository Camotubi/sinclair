<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MultimediaCreateRequest;
use App\Http\Requests\MultimediaUpdateRequest;

use App\Multimedia;
use App\MultimediaType;

class MultimediaController extends Controller
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
			$multimedias = Multimedia::paginate(10);
			return view('multimedia.index', ['multimedias' => $multimedias]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
			$multimediaTypes = MultimediaType::all();
	    return view('multimedia.create', ['multimediaTypes' => $multimediaTypes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MultimediaCreateRequest $request)
    {
	    $multimedia = new Multimedia;
	    if ( $request->input ('sinclairMemorability') ) {
		    $multimedia->sinclairMemorability = true;
      }
      $multimedia->creationDate = $request->input ('creationDate');
      $multimedia->description = $request->input ('description');
      $multimedia->fileLocation = $request->input ('fileLocation');
      $multimedia->save();
      $multimedia->types()->associate(MultimediaType::where('MultimediaType.id',
		$request->input ('multimediaTypeId'))->first());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
			$multimedia = Multimedia::find($id);
			if(!is_null($multimedia))
			{
			  return view('multimedia.show', ['multimedia' => $multimedia]);
			}
			else
			{
			  return redirect('dashboard')->with('error' , 'Memorabilia no encontrada');
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
			$multimedia = Multimedia::find($id);
			if(!is_null($multimedia))
			{
				$multimediaTypes = MultimediaType::all();
			  return view('multimedia.edit', ['multimedia' => $multimedia, 'multimediaTypes' => $multimediaTypes]);
			}
			else
			{
			  return redirect('dashboard')->with('error' , 'Memorabilia no encontrada');
			}
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MultimediaUpdateRequest $request, $id)
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
