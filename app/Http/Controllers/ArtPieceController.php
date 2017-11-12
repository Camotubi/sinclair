<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ArtPieceCreateRequest;
use App\Http\Requests\ArtPieceUpdateRequest;
use App\ArtPiece;

class ArtPieceController extends Controller
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
        return view('artPiece.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('artPiece.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArtPieceCreateRequest $request)
    {
        $artPiece = new ArtPiece;
        $artPiece->name = $request->input ('name');
        $artPiece->currentLocation = $request->input ('currentLocation');
        $artPiece->style = $request->input ('style');
        $artPiece->era = $request->input ('era');
        $artPiece->technique = $request->input ('technique');
        $artPiece->criticalAnalisis = $request->input ('criticalAnalisis');
        $artPiece->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('artPiece.show');
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
    public function update(ArtPieceUpdateRequest $request, $id)
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
