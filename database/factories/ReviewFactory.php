<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
* @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
*/
class ReviewFactory extends Factory
{
  /**
  * Define the model's default state.
  *
  * @return array<string, mixed>
  */
  public function definition()
  {

     $book = Book::all()->random()->id;
    return[
      'user_id' => User::all()->random()->id,
      'book_id' => $book,
      'text' => fake()->paragraph,
      'score' => $book % 2 === 1 ? rand(3,5) : rand(1,2),
    ];
  }
}
