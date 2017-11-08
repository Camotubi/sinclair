<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JuridicalPerson;

class JuridicalPersonController extends Controller
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
        return view('juridicalPerson.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('juridicalPerson.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $juridicalPerson = new JuridicalPerson;
      $juridicalPerson->name = $request->input ('name');
      $juridicalPerson->address = $request->input ('address');
      $juridicalPerson->phone = $request->input ('phone');
      $juridicalPerson->email = $request->input ('email');
      $juridicalPerson->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('juridicalPerson.show');
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
