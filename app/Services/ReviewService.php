<?php
namespace App\Services;

use App\Models\User;
use App\Models\Review;

/*
 . Services for Models/Review.php
*/
class ReviewService
{
  /*
   Returns a review by bookid, userid pair
  */
  public function getOne(int $bookId, int $userId) : ?Review
  {
    return Review::where([
      ['user_id', $userId],
      ['book_id', $bookId],
      ])->first();
  }
  /*
   Adds review to database, returns the Review model
  */
  public function createReview(int $bookId, int $score, string $text) : Review
  {
    return Review::create([
      'user_id' => auth()->id(),
      'book_id' => $bookId,
      'score' =>  $score,
      'text' => $text,
    ]);
  }
}
