<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class OrderHistory extends Component
{
  use WithPagination;

  public function paginationView()
  {
    return 'pagination.custom';
  }

  public function render()
  {
    return view('livewire.order-history', [
      'orders' => auth()->user()->orders()->with('reclamation', 'user')->paginate(2),
    ]);
  }
}
