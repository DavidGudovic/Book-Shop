<?php

namespace App\Http\Livewire\Reclamations;

use Livewire\Component;
use App\Http\Livewire\ModalBase;
use App\Models\Order;
use App\Services\ReclamationService;

/*
  Add Reclamation to order modal component on user-profile -> orders.index
*/
class Modal extends ModalBase
{
    public Order $order;
    public string $text="";

    public $listeners = [
      'showModal' => 'showModal',
      'setOrder' => 'setOrder',
    ];

    public function render()
    {
        return view('livewire.reclamations.modal');
    }

    /*
      Sets the public variable $order, emitted from OrderHistory
    */
    public function setOrder(Order $order) : void
    {
      $this->order = $order;
    }

    /*
     Gives the reclamation text and order to service for adding to db
     flashes message to user
    */
    public function makeReclamation(ReclamationService $reclamationService) : void
    {
      $reclamationService->createReclamation($this->text, $this->order);
      session()->flash("message", "Uspešno ste postavili reklamaciju");
    }
}
