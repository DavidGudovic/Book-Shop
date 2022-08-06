<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

    /*
    Custom blade directives
    */
class BladeServiceProvider extends ServiceProvider
{

    public function register()
    {
        //
    }


    public function boot()
    {
         // @admin --html to render if user is admin-- @endadmin
          Blade::if('admin', function() {
            return auth()->user() && auth()->user()->role === 'admin';
          });
    }
}
