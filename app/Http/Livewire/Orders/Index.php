<?php

namespace App\Http\Livewire\Orders;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Order;
use App\Services\OrderService;
/*
Order list for the logged in user component on user-profile, route: user/{id}/orders/
*/
class Index extends Component
{
  use WithPagination;
  public $status_filter = 0;
  public $month_filter = 0;

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
    return view('livewire.orders.index', [
      //Attaches where(status) and\or whereMonth clauses if $status_filter and\or $month_filter aren't empty
      'orders' => auth()->user()->orders()
      ->when(!empty($this->status_filter), function ($query) {
        return $query->status($this->status_filter);
      })->when(!empty($this->month_filter), function ($query) {
        return $query->whereMonth('created_at', $this->month_filter);
      })->with('reclamation', 'books')->orderBy('created_at', 'DESC')->paginate(2),
    ]);
  }

  /*
  Applies status and month filter
  Filter passed by event raised outside of Livewire
  */
  public function setOrderFilters($status, $month): void
  {
    $this->status_filter = $status;
    $this->month_filter = $month;
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
    $this->emitTo('reclamations.modal', 'setOrder', $order);
    $this->emitTo('reclamations.modal', 'showModal');
  }
}
