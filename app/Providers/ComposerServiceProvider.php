<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Auth;
class ComposerServiceProvider extends ServiceProvider
{
	/**
	 * Register bindings in the container.
	 *
	 * @return void
	 */
	public function boot()
	{
		// Using class based composers...
		view()->composer('*', function($view){
			$view->with('user', Auth::user());
	});	
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
	    //
    }
}
