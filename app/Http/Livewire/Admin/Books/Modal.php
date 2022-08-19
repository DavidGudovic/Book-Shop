<?php

namespace App\Http\Livewire\Admin\Books;

use Livewire\Component;
use App\Http\Livewire\ModalBase;
use App\Models\Book;

class Modal extends ModalBase
{
    public $book;

    public $listeners = [
      'showModal' => 'showModal',
      'edit' => 'edit',
    ];

    public function render()
    {
        return view('livewire.admin.books.modal');
    }

    public function edit(Book $book) : void
    {
      $this->book = $book;
      $this->showModal();
    }
}
