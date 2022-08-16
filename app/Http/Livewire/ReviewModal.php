<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Http\Livewire\ModalBase;
use App\Models\Book;
use App\Models\Review;

class ReviewModal extends ModalBase
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

    public function mount()
    {
      $this->review = Review::where([
        ['user_id', auth()->id()],
        ['book_id', $this->book->id],
        ])->first();

        if($this->review){
          $this->score = $this->review->score;
          $this->text = $this->review->text;
        }
    }

    public function render()
    {
        return view('livewire.review-modal');
    }

    /*
     Creates a new review in DB
    */
    public function create() : void
    {
      $this->review = Review::create([
        'user_id' => auth()->id(),
        'book_id' => $this->book->id,
        'score' =>  $this->score,
        'text' => $this->text,
      ]);
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
    Updates a review
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
      Flashes a message to the book preview page
      Refreshes it
    */
    private function flashMessage(string $message) : void
    {
      $this->showModal = false;
      $this->emit('reviewUpdate', $message);
    }



}
