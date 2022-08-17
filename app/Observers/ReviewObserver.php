<?php

namespace App\Observers;

use App\Models\Review;
use App\Models\Book;

//Recalculates average after every crud
class ReviewObserver
{
    public $afterCommit = true;
    /*
      Returns avg score for the provided book
      Should've been in ReviewServices but it wouldnt resolve ReviewService by Type hint
    */
    public function calculateAverage(Book $book) : void
    {
       $book->average_score = $book->reviews->avg('score') ?? 0;
       $book->saveQuietly();
    }
    /**
     * Handle the Review "created" event.
     */
    public function created(Review $review) : void
    {
      $this->calculateAverage($review->book);
    }
    /**
     * Handle the Review "updated" event.
     */
    public function updated(Review $review) : void
    {
        $this->calculateAverage($review->book);
    }
    /**
     * Handle the Review "deleted" event.
     */
    public function deleted(Review $review) : void
    {
       $this->calculateAverage($review->book);
    }

}
