<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /*
  Doesnt seed Books, Authors, Categories since they're not suitable for fake data.
  */
  public function run()
  {
    \App\Models\User::factory(200)->create();
    \App\Models\Review::factory(400)->create();
    \App\Models\Order::factory(1000)->create();
    /*
    Super inefficient, but is only run once to seed fake data, works and there's
    20 books, 1000 orders in the database when it runs so performance is a non issue
    */
    foreach(\App\Models\Order::all() as $order){
      foreach(\App\Models\Book::inRandomOrder()->limit(rand(1,5))->get() as $book){
        $quantity = rand(1,5);
        $order->books()->attach($book, ['quantity' => $quantity]);
        $order->total_price += $book->price * $quantity;
        $order->save();
      }
    }
    \App\Models\Reclamation::factory(200)->create();

  }
}
