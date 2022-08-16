<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use App\Models\Book;
use App\Models\Review;
use App\Models\User;
use App\Models\Order;

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

    // @reviewed($book) --html to render if has reviewed -- @endreviewed
    Blade::if('reviewed', function (Book $book) {
      foreach(auth()->user()->reviews as $review){
        if($review->book_id == $book->id){
          return true;
        }
      }
      return false;
    });

    // @reclamated($order) --html to render if has reclamated -- @endreviewed
    Blade::if('reclamated', function (Order $order) {
      foreach(auth()->user()->reclamations as $reclamation){
        if($reclamation->order_id == $order->id){
          return true;
        }
      }
      return false;
    });

  }
}
