<?php

namespace App\Observers;

use App\Models\Review;
use App\Models\Book;
use App\Services\ReviewService;

//Recalculates average after every crud
class ReviewObserver
{
    public $afterCommit = true;
    /*
      Returns avg score for the provided book
      Should've been in ReviewServices but I couldn't get the Dispatcher to pass an instance
    */
    public function calculateAverage(Book $book){
       return $book->reviews->avg('score');
    }
    /**
     * Handle the Review "created" event.
     */
    public function created(Review $review)
    {
      $review->book->average_score = $this->calculateAverage($review->book);
      $review->book->saveQuietly();
    }
    /**
     * Handle the Review "updated" event.
     */
    public function updated(Review $review)
    {
        $review->book->average_score = $this->calculateAverage($review->book);
        $review->book->saveQuietly();
    }
    /**
     * Handle the Review "deleted" event.
     */
    public function deleted(Review $review)
    {
      $review->book->average_score = $this->calculateAverage($review->book);
      $review->book->saveQuietly();
    }

}
