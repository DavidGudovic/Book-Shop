<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Order;
use App\Services\OrderService;
/*
  Order list for the logged in user component on user-profile, route: user/{id}/orders/
*/
class OrderHistory extends Component
{
  use WithPagination;
  public $statusFilter = 0;
  public $monthFilter = 0;

  public $listeners = [
    'setOrderFilters' => 'setOrderFilters',
    'cancelOrder' => 'cancelOrder',
  ];

  public function paginationView()
  {
    return 'pagination.custom';
  }

  public function render()
  {
    return view('livewire.order-history', [
      //Attaches where - whereMonth clauses if $statusFilter - $monthFilter aren't empty
      'orders' => auth()->user()->orders()
      ->when(!empty($this->statusFilter), function ($query) {
        return $query->where('status', $this->statusFilter);
      })->when(!empty($this->monthFilter), function ($query) {
        return $query->whereMonth('created_at', $this->monthFilter);
      })->with('reclamation', 'books')->orderBy('created_at', 'DESC')->paginate(2),
    ]);
  }

  /*
    Applies status and month filter
    Filter passed by event raised outside of Livewire
  */
  public function setOrderFilters($status, $month): void
  {
    $this->statusFilter = $status;
    $this->monthFilter = $month;
    $this->resetPage();
  }

  /*
   Calls OrderServices to cancel an order
  */
  public function cancelOrder(Order $order, OrderService $orderService) : void
  {
    $orderService->cancelOrder($order);
  }
  /*
   Emits the orderId and showModal to the Reclamation Modal
  */
  public function addReclamation(Order $order) : void{
    $this->emitTo('reclamation-modal', 'setOrder', $order);
    $this->emitTo('reclamation-modal', 'showModal');
  }
}
