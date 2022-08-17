<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Book;
use App\Services\ReviewService;

/*
 Review component on books.show
*/
class BookReviews extends Component
{
  use WithPagination;
  public Book $book;
  public $message;
  public $sort_by = 'created_at';
  public $sort_direction = 'DESC';

  protected $listeners = [
        'reviewUpdate' => 'reviewUpdate',
    ];

  /*
    Flashes message, rerenders page
  */
  public function reviewUpdate(string $message) : void
  {
    $this->message = $message;
  }

  public function paginationView()
  {
    return 'pagination.custom';
  }

  public function render()
  {
    return view('livewire.book-reviews',[
      'reviews' => $this->book->reviews()->with(["user" => function($query){
        $query->select('username', 'id');
      }])->orderBy($this->sort_by, $this->sort_direction)->paginate(5),
    ]);

  }
}
