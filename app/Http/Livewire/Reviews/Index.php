<?php

namespace App\Http\Livewire\Reviews;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Book;
use App\Services\ReviewService;

/*
 Review component on books.show
*/
class Index extends Component
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
    return view('livewire.reviews.index',[
      'reviews' => $this->book->reviews()->with(["user" => function($query){
        $query->select('username', 'id');
      }])->orderBy($this->sort_by, $this->sort_direction)->paginate(5),
    ]);

  }
}
