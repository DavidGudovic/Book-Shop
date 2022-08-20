<?php

namespace App\Http\Livewire\Admin\Orders;

use Livewire\Component;
use Livewire\WithPagination;
Use App\Models\Order;

class Index extends Component
{
   use WithPagination;

   public $search_query = "";
   public $status = Order::STATUS_PENDING;
   public $sort_by = 'created_at';
   public $sort_direction = 'DESC';

   public function paginationView()
   {
     return 'pagination.custom';
   }

    public function render()
    {
        return view('livewire.admin.orders.index', [
          'orders' => Order::when(!empty($this->status), function($query){
                                  return $query->status($this->status);
                        })->when(!empty($this->search_query), function($query){
                                  return $query->search($this->search_query);
                        })->orderBy($this->sort_by, $this->sort_direction)
                          ->with('books','user')->paginate(6),
        ]);
    }
    /*
     Declines or accepts order
     i.e processOrder($order, Order::STATUS_SUCCESSFULL);
    */
    public function processOrder(Order $order, int $status) : void
    {
      $order->status = $status;
      $order->update();
      $this->render();
    }

}
