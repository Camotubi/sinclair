<?php

namespace App\Http\Middleware;
use Illuminate\Contracts\Auth\Guard;
use Closure;
use Session;
use Auth;
class Admin
{
	protected $auth;

	public function __construct(Guard $auth)
	{
		$this->auth = $auth;
    }
    public function handle($request, Closure $next)
    {
	    if(Auth::check())
	    {

		    if(Auth::user()->isAdmin())
		    {

			    return $next($request);
		    }
		    else
		    {

			    return redirect()->to('/dashboard');
		    }
	    }
	    else
	    {


		    return redirect()->to('/login');
	    }

    }
}
