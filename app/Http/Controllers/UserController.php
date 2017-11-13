<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserType;
class UserController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function __construct()
	{
		//$this->middleware('admin')->only(['create','store']);

	}
    public function index()
    {
	    //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

	    return (view('user.create'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
	    $user = new User;
	    $user->name = $request->input('username');
	    $user->password = bcrypt($request->input('password'));
	    $user->email = $request->input('email');
	    $user->firstName = $request->input('firstName');
	    $user->lastName = $request->input('lastName');
	    $user->save();
	    if($request->input('adminType'))
	    {
		    $user->types()->attach(UserType::where('userType.id',config('app.userType.adminId'))->first());
	    }
	    if($request->input('editorType'))
	    {

		    $user->types()->attach(UserType::where('userType.id',config('app.userType.editorId'))->first());
	    }
	    return('aiuda');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
	    //
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
    public function findUsername($username)
    {
	    return User::where('name',$username)->exists() ? 'true' : 'false';
    }
    public function findEmail($email)
    {
	    return User::where('email',$email)->exists() ? 'true' : 'false';
    }
}
