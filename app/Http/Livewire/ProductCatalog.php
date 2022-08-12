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
  public function filter(BookService $bookService, $category_list = [], $price_range = null, $sort_by='title', $sort_direction='ASC')
  {
    $this->book_list = $bookService->getAllorFiltered(null , array_keys($category_list, true));

    if(!empty($price_range)){
      foreach($this->book_list as $bookCollectionKey => $book){
        if($book->price > $price_range){
          $this->book_list->forget($bookCollectionKey);
        }
      }
    }
    $this->sort($sort_by, $sort_direction);
  }
  /*
   Sorts the book list by criteria and direction
  */
  public function sort($sort_by, $sort_direction){
    $this->book_list =
    $sort_direction == 'ASC' ?
    $this->book_list->sortBy($sort_by) : // 0 1 2...n
    $this->book_list->sortByDesc($sort_by); // n... 2 1 0
  }
  /*
  Applies validated search criteria passed by Filters Component
  */
  public function applySearch(BookService $bookService,$criteria)
  {
    $this->book_list = $bookService->getBySearch($criteria);
  }

  public function render()
  {
    return view('livewire.product-catalog');
  }
}
