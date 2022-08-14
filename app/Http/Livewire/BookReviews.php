<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Book;
use App\Services\ReviewService;

class BookReviews extends Component
{
    use WithPagination;
    public Book $book;

    public function paginationView()
    {
      return 'pagination.reviews';
    }
    public function render()
    {
        return view('livewire.book-reviews',[
           'reviews' => $this->book->reviews()->with("user")->paginate(5),
        ]);
    }
}
