<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Services\CategoryService;

/*
 Filter component on books.index
*/
class Filters extends Component
{
  public $fiction_categories; //mounted
  public $nonFiction_categories; //mounted
  public $search_query = ""; //search criteria

  //filter criteria
  public $category_list; //[K:categoryID -> V:true/false]
  public $price_range;
  public $sort_by = 'title';
  public $sort_direction = 'ASC';


  public $listeners = [
    'search' => 'search',
  ];

  public function mount(CategoryService $categoryService)
  {
    $this->fiction_categories = $categoryService->getAll('fiction');
    $this->nonFiction_categories = $categoryService->getAll('nonFiction');
  }

  public function render()
  {
    return view('livewire.filters');
  }

  /*
  Soft resets filters
  emits search query to ProductCatalog component
  */
  public function search() : void
  {
    $this->softResetFilter();
    $this->emit("applySearch", $this->search_query);
  }


  /*
  Emits filter criteria from form to ProductCatalog
  Called when applying filters
  Resets search query (Items are filtered by filtes, not searchBar)
  */
  public function submit() : void
  {
    $this->resetSearchBar();
    $this->emit("filter", $this->category_list, $this->price_range, $this->sort_by, $this->sort_direction);
  }

  /*
  Resets searchQuery, reRenders SearchBar
  */
  public function resetSearchBar() : void
  {
    $this->search_query = "";
  }
  /*
  input type(reset) behaviour but works on non user inputed data
  Resets form without emiting new filters to ProductCatalog
  */
  public function softResetFilter() : void
  {
    $this->sort_by = "title";
    $this->sort_direction = "ASC";
    $this->price_range = null;
    foreach($this->category_list as $category => $checked){
      $this->category_list[$category] = false;
    }
  }
  /*
  calls soft reset
  Resets search query
  Emits empty filter to ProductCatalog ( displays all products )
  */
  public function resetFilter() : void
  {
    $this->softResetFilter();
    $this->resetSearchBar();
    $this->emit("filter");
  }

}
