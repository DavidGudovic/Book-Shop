<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Services\CategoryService;

class Filters extends Component
{
  public $fiction_categories; //mounted
  public $nonFiction_categories; //mounted
  public $category_list; //filter criteria [categoryID -> true/false]
  public $price_range; //filter criteria
  public $searchQuery = ""; //Query string

  public $listeners = [
    'search' => 'search',
  ];

  public $rules = [
    'searchQuery' => 'required',
  ];
  public $messages = [
    'searchQuery' => 'Unesite tekst pretrage',
  ];

  public function mount(CategoryService $categoryService){
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
    $this->emit("applySearch", $this->searchQuery);
  }
  /*

  /*
  Pass filter criteria from form to ProductCatalog
  Called when applying filters
  Resets search query (Items are filtered by filtes, not searchBar)
  */
  public function submit()
  {
    $this->searchQuery = "";
    $this->emit("filter", $this->category_list, $this->price_range);
  }

  /*
  calls soft reset
  Resets search query
  Emits filter event with no criteria ( displays all products )
  */
  public function resetFilter()
  {
    $this->softResetFilter();
    $this->searchQuery = "";
    $this->emit("filter");
  }
  /*
    input type(reset) behaviour but works on non user inputed data
  */
  public function softResetFilter()
  {
    $this->price_range = null;
    foreach($this->category_list as $category => $checked){
      $this->category_list[$category] = false;
    }
  }
}
