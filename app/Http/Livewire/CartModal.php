<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Http\Livewire\Modal;

class CartModal extends Modal
{
  public $tester = [1,2,3,4];

  public function remove($id){
    unset($this->tester[$id]);
  }
  public function render()
  {
    return view('livewire.cart-modal');
  }
}
