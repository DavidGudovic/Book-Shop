<?php

namespace App\Http\Livewire;

use Livewire\Component;

/*
  Base Modal class
*/
class ModalBase extends Component
{
  public $showModal = false;

  public $listeners = [
    'showModal' => 'showModal',
  ];

  /*
   Toggles any child modal it's emmited to
   i.e window.livewire.emitTo('cart-modal', 'showModal')
   */
  public function showModal()
  {
    $this->showModal = !$this->showModal;
  }
}
