<?php

namespace App\Providers;

use App\Models\Review;
use App\Observers\ReviewObserver;
use App\Services\ReviewService;
use App\Services\Cart\CartService;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public function register()
    {
      Schema::defaultStringLength(191);
      $this->app->bind('Cart',function($app){
           return new CartService;
       });
    }

    public function boot()
    {
        //  calculates average score
        Review::observe(ReviewObserver::class);
    }
}
