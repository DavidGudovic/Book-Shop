<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Services\BookService;

class ProductCatalog extends Component
{
  use WithPagination;

  public $booksaa;
  public $categories;
  public $price_range;
  public $test = 'AAAAAAAAAA';

  public $listeners = [
    'filter' => 'filter',
  ];

    public function filter(){
      dd();
    }

    public function render()
    {
        return view('livewire.product-catalog');
    }
}
