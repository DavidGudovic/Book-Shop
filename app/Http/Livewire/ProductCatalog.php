<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Services\BookService;

class ProductCatalog extends Component
{
  public $book_list; //filtered result

  public $listeners = [
    'filter' => 'filter',
    'applySearch' => 'applySearch',
  ];

  public function render()
  {
    return view('livewire.product-catalog');
  }

  /*
   Emits addToCart event with item id,
   Event cought and processed by CartModal Component
  */
  public function addToCart($id) : void
  {
    $this->emit('addToCart', $id, 1);
  }

  /*
  Applies filters too book list. [categories, price_range, sorting]
  Filter criteria provided by Filters component by raising a filter event
  */
  public function filter(BookService $bookService, $category_list = [], $price_range = null, $sort_by='title', $sort_direction='ASC') : void
  {
    $this->book_list = $bookService->getAllorFiltered(null , array_keys($category_list, true));

    if(!empty($price_range)){
      $this->filterPrice($price_range);
    }

    $this->sort($sort_by, $sort_direction);
  }

  /*
    Removes elements from $book_list where item price is higher then $price_range
  */
  public function filterPrice(int $price_range) : void
  {
    foreach($this->book_list as $bookCollectionKey => $book){
      if($book->price > $price_range){
        $this->book_list->forget($bookCollectionKey);
      }
    }
  }

  /*
   Sorts the book list by criteria and direction
  */
  public function sort($sort_by, $sort_direction) : void
  {
    $this->book_list =
    $sort_direction == 'ASC' ?
    $this->book_list->sortBy($sort_by) : // 0 1 2...n
    $this->book_list->sortByDesc($sort_by); // n... 2 1 0
  }

  /*
  Applies validated search criteria passed by event raised by Filters Component
  */
  public function applySearch(BookService $bookService,$searchQuery) : void
  {
    $this->book_list = $bookService->getBySearch($searchQuery);
  }

}
