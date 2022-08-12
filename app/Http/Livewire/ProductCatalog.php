<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Services\BookService;

class ProductCatalog extends Component
{
  public $book_list; //filter result

  public $listeners = [
    'filter' => 'filter',
    'applySearch' => 'applySearch',
  ];

  /*
   Applies filters too book list. [categories, price_range]
   Filter criteria provided by raising a filter event
  */
  public function filter(BookService $bookService, $categories = [], $price_range = null){
    $this->book_list = $bookService->getAllorFiltered(null , array_keys($categories, true));

    if(!empty($price_range)){
      foreach($this->book_list as $bookCollectionKey => $book){
        if($book->price > $price_range){
          $this->book_list->forget($bookCollectionKey);
        }
      }

    }

  }

  /*
  Applies validated search criteria passed by Filters Component
  */
  public function applySearch(BookService $bookService,$criteria){
    $this->book_list = $bookService->getBySearch($criteria);
  }

  public function render()
  {
    return view('livewire.product-catalog');
  }
}
