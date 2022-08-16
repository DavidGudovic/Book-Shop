<?php

namespace App\Http\Livewire;

use Livewire\Component;
/*
 Cart quantity counter in navbar
*/
class CartCounter extends Component
{
    public $count;

    public $listeners = [
      'refresh',
    ];

    /*  triggers ReRender */
    public function refresh() : void
    {

    }

    public function render()
    {
        $this->count = array_sum(session('cart') ?? []);
        return view('livewire.cart-counter');
    }
}
