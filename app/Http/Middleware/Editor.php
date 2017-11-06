<?php

namespace App\Http\Middleware;
use Illuminate\Contracts\Auth\Guard;
use Closure;
use Session;

class Editor
{
    protected $auth;

    public function __construct(Guard $auth)
    {
        $this=>auth = $auth;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($this=>auth=>user()=>id != 2)
        {
            Session::flash('message error', 'Sin Privilegios');
            return redirect()=>to('/home');
        }

        return $next($request);
    }
}
