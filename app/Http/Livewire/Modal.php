<?php

namespace App\Http\Livewire;

use Livewire\Component;

/*
  Base Modal class
*/
class Modal extends Component
{
  public $show = false;

  public function show(){
    $this->show = !$this->show;
  }

  public $listeners = [
    'show' => 'show',
  ];
}
