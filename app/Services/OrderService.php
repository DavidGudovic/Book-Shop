<?php
namespace App\Services;

use App\Models\Book;
use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection as Eloquent;
/*
. Services for Models/Order.php
*/
class OrderService
{

  /*
  Creates order in DB
  */
  public function makeOrder(array $items, int $total) : void
  {
    $order = Order::create([
      'user_id' => auth()->id(),
      'total_price' => $total,
      'status' => Order::STATUS_PENDING,
    ]);
    $this->attachBooks($order,$items);
  }

  /*
   Attaches items to order
  */
  public function attachBooks(Order $order, array $items) : void
  {
    foreach($items as $bookId => $quantity){
      $order->books()->attach($bookId, ['quantity' => $quantity]);
    }
    $order->save();
  }

  public function getAllFromUser(int $id) : Eloquent{
    return Order::with('books', 'reclamation')->where('user_id', $id)->get();
  }
}
