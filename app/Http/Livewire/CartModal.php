<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Http\Livewire\Modal;

class CartModal extends Modal
{
  public function render()
  {
    return view('livewire.cart-modal');
  }
}
