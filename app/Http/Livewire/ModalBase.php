<?php

namespace App\Http\Livewire;

use Livewire\Component;

/*
  Base Modal class
*/
class ModalBase extends Component
{
  public $showModal = false;

  public function showModal(){
    $this->showModal = !$this->showModal;
  }

  public $listeners = [
    'showModal' => 'showModal',
  ];
}
