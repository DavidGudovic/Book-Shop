<?php

namespace App\Http\Livewire\Admin\Reports;

use Livewire\Component;
use App\Models\Order;
use App\Models\User;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class Show extends Component
{
  public $month;

  public $orderReport;
  public $userReport;
  public $productQuantities = [];
  public $productTotals = [];
  public $products = [];
  public $totalOrders;
  public $totalProducts;
  public $totalIncome;
  public $newUsers;

  public function mount()
  {
    $this->month = Carbon::now()->month;
  }
  public function render()
  {
    $this->generate();
    return view('livewire.admin.reports.show');
  }

  /*
   Generates report
  */
  public function generate() : void
  {
    $this->clear();
    $this->getProductReport();
    $this->getUserReport();
    $this->getOrderReport();
  }

  /*
    Gets number of orders and total spending of 10 users with most STATUS_SUCCESSFULL orders for the month
  */
  public function getUserReport() : void
  {
    $this->userReport = Order::select(DB::raw('COUNT(*) as count,SUM(total_price) as total, user_id'))
                                  ->whereMonth('created_at', $this->month)
                                  ->status(Order::STATUS_SUCCESSFULL)
                                  ->groupBy('user_id')
                                  ->orderBy('count', 'DESC')
                                  ->take(10)->get()->keyBy('user_id');
    $this->newUsers = User::whereMonth('created_at', $this->month)->count();
  }
  /*
    Gets count of orders and the sum of their totals from month by their status + total orders for the month
  */
  public function getOrderReport() : void
  {
    $this->orderReport = Order::select(DB::raw('COUNT(*) as count,SUM(total_price) as total, status'))
                              ->whereMonth('created_at', $this->month)
                              ->groupBy('status')
                              ->get()->keyBy('status');

    $this->totalOrders = $this->orderReport->sum('count');
  }

  /*
    Very inefficient, couldn't figure out Eloquent way of grouping pivot table
    Gets all STATUS_SUCCESSFULL orders from $this->month, loops through each of their pivots to get products sold data
  */
  public function getProductReport() : void
  {
       $orders = Order::whereMonth('created_at', $this->month)->status(Order::STATUS_SUCCESSFULL)->with('books')->get();
       foreach($orders as $order)
       {
         foreach($order->books as $book){
           if(empty($this->productQuantities[$book->id])){
             $this->productQuantities[$book->id] = $book->pivot->quantity;
             $this->productTotals[$book->id] = $book->pivot->quantity * $book->price;
             $this->products[$book->id] = $book;
           } else {
             $this->productQuantities[$book->id] += $book->pivot->quantity;
             $this->productTotals[$book->id] += $book->pivot->quantity * $book->price;
           }
         }
       }
       ksort($this->productQuantities);
       ksort($this->productTotals);
       ksort($this->products);
       $this->totalProducts = array_sum($this->productQuantities);
       $this->totalIncome = array_sum($this->productTotals);
  }

  /*
   Clears fields that aren't replaced by $this->generate
  */
  public function clear() : void
  {
    $this->productQuantities = [];
    $this->productTotals = [];
    $this->products = [];
    $this->totalProducts = 0;
    $this->totalIncome = 0;
  }
}
