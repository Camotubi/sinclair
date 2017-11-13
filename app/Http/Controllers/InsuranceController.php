<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Insurance;
use App\ArtPiece;
use App\InsuranceCarrier;

class InsuranceController extends Controller
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
      return view('insurance.index');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      return view('insurance.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $insurance = new Insurance;
    $insurance->name = $request-> input('name');
    $insurance->artPiece()->attach(ArtPiece::where('artPiece.id',
    $request->input ('artPieceId'))->first());
    $insurance->insuranceCarrier()->attach(InsuranceCarrier::where('insuranceCarrier.id',
    $request->input ('insuranceCarrierId'))->first());
    $insurance->cost = $request-> input('cost');
    $insurance->effectiveDate = $request-> input('effectiveDate');
    $insurance->terminationDate = $request-> input('terminationDate');
    $insurance->save();
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
      return view('insurance.show');
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
