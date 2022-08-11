<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Services\CategoryService;

class Filters extends Component
{
  public $fiction_categories; // mounted
  public $nonFiction_categories; // mounted
  public $category_list; //filter criteria [categoryID -> true/false]
  public $price_range; //filter criteria

  public function mount(CategoryService $categoryService){
    $this->fiction_categories = $categoryService->getAll('fiction');
    $this->nonFiction_categories = $categoryService->getAll('nonFiction');
  }

  public function render()
  {
    return view('livewire.filters');
  }

  /*
  Pass filter criteria from form to ProductCatalog
  */
  public function submit(){
    $this->emit("filter", $this->category_list, $this->price_range);
  }
  /*
  input type(reset) behaviour but works on non user inputed data
  Emits filter event with no criteria ( displays all products )
  */
  public function resetFilter(){
    $this->price_range = null;
    foreach($this->category_list as $category => $checked){
      $this->category_list[$category] = false;
    }
    $this->emit("filter");
  }
}
