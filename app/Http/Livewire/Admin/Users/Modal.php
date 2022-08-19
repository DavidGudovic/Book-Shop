<?php

namespace App\Http\Livewire\Admin\Users;

use Livewire\Component;
use App\Http\Livewire\ModalBase;

class Modal extends ModalBase
{
    public $listeners = [
      'showModal' => 'showModal',
    ];
    
    public function render()
    {
        return view('livewire.admin.users.modal');
    }
}
