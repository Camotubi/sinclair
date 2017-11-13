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
        return view('multimedia.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('multimedia.create');
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
      $multimedia->types()->attach(MultimediaType::where('MultimediaType.id',
      $request->input ('multimediaTypeId'))->first());
      $multimedia->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('multimedia.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
