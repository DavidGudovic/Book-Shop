<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Services\CategoryService;

class Filters extends Component
{
  public $fiction_categories; //mounted
  public $nonFiction_categories; //mounted
  public $search_query = ""; //search criteria

  //filter criteria
  public $category_list; //[K:categoryID -> V:true/false]
  public $price_range;
  public $sort_by;
  public $sort_direction;


  public $listeners = [
    'search' => 'search',
  ];

  public $rules = [
    'search_query' => 'required',
  ];
  public $messages = [
    'search_query' => 'Unesite tekst pretrage',
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
  Validates search query
  Soft resets filters
  emits search query to ProductCatalog component
  */
  public function search()
  {
    $this->validate();
    $this->softResetFilter();
    $this->emit("applySearch", $this->search_query);
  }


  /*
  Emits filter criteria from form to ProductCatalog
  Called when applying filters
  Resets search query (Items are filtered by filtes, not searchBar)
  */
  public function submit()
  {
    $this->resetSearchBar();
    $this->emit("filter", $this->category_list, $this->price_range, $this->sort_by, $this->sort_direction);
  }

  /*
  Resets searchQuery, reRenders SearchBar
  */
  public function resetSearchBar()
  {
    $this->search_query = "";
  }
  /*
  input type(reset) behaviour but works on non user inputed data
  Resets form without emiting new filters to ProductCatalog
  */
  public function softResetFilter()
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
  public function resetFilter()
  {
    $this->softResetFilter();
    $this->resetSearchBar();
    $this->emit("filter");
  }

}
