<?php

namespace App\Http\Livewire\Reviews;

use Livewire\Component;
use App\Http\Livewire\ModalBase;
use App\Models\Book;
use App\Models\Review;
use App\Services\ReviewService;

/*
 Add new Review modal component on books.show
*/
class Modal extends ModalBase
{
    public Book $book;
    public ?Review $review;
    public int $score = 1;
    public string $text = "";

    public $listeners = [
      'showModal' => 'showModal',
      'create' => 'create',
      'update' => 'update',
    ];

    public function mount(ReviewService $reviewService)
    {
        $this->review = $reviewService->getOne($this->book->id, auth()->id());
        if($this->review){
          $this->score = $this->review->score;
          $this->text = $this->review->text;
        }
    }

    public function render()
    {
        return view('livewire.reviews.modal');
    }

    /*
     Creates a new review in DB
    */
    public function create(ReviewService $reviewService) : void
    {
      $this->review = $reviewService->createReview($this->book->id, $this->score, $this->text);
      $this->flashMessage('Uspešno ste postavili Vašu recenziju');
    }

    /*
    Updates a review
    */
    public function update() : void
    {
      $this->fillReview($this->score);
      $this->review->update();
      $this->flashMessage('Uspešno ste izmenili Vašu recenziju');
    }

    /*
    deletes a reveiw
    */
    public function delete() : void
    {
      $this->review->delete();
      $this->flashMessage('Uspešno ste izbrisali Vašu recenziju');
    }

    /*
    Fills review with data
    */
    private function fillReview(int $score) : void
    {
      $this->review->user_id = auth()->user()->id;
      $this->review->book_id = $this->book->id;
      $this->review->score = $score;
      $this->review->text = $this->text;
    }
    /*
      Flashes a message reviews.index 
      Refreshes it
    */
    private function flashMessage(string $message) : void
    {
      $this->showModal = false;
      $this->emit('reviewUpdate', $message);
    }



}
