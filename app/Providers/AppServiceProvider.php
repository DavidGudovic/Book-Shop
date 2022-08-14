<?php

namespace App\Providers;

use App\Models\Review;
use App\Observers\ReviewObserver;
use App\Services\ReviewService;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public function register()
    {
      Schema::defaultStringLength(191);
    }

    public function boot()
    {
        //  calculates average score
        Review::observe(ReviewObserver::class);
    }
}
