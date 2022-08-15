<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Http\Livewire\Modal;
use App\Services\Cart\CartFacade as Cart;
use App\Models\Book;
use App\Models\Order;
use App\Services\BookService;
use App\Services\OrderService;

class CartModal extends Modal
{
  public $items = []; //  Books
  public $quantities = []; // [ id => quantity ]
  public $total = 0;
  public $count = 0;

  public $listeners = [
    'showModal' => 'showModal',
    'remove' => 'remove',
    'addToCart' => 'addToCart',
  ];

  public function mount(){
    $this->getData();
  }

  public function render()
  {
    $this->getData();
    $this->emitTo('cart-counter', 'refresh');
    return view('livewire.cart-modal');
  }
  /*
  Finalizes the order, calls for clear local and session data, flashes message
  */
  public function order(OrderService $orderService){
    $orderService->makeOrder($this->quantities, $this->total);
    $this->clearData();
    Cart::clear();
    session()->flash('message', 'Hvala Vam!');
  }
  /*
    Clears local data, used before clearing session data to avoid bugs
  */
  public function clearData(){
    $this->count = 0;
    $this->quantities = [];
    $this->items = [];
  }

  /*
  Sets data into session, used for updating quantities
  */
  public function setData(){
    Cart::set($this->quantities);
  }

  /*
  Decrements quantity for id
  */
  public function decrement($id){

    if($this->quantities[$id] == 1){ return; }

    $this->quantities[$id]--;
    $this->setData();
  }
  /*
  Increments quantity for id
  */
  public function increment($id){
    $this->quantities[$id]++;
    $this->setData();
  }

  /*
  Populates arrays for the view with data from the session and database
  */
  public function getData(){
    $this->total = 0;
    foreach(Cart::get() as $bookId => $quantity){
      $this->quantities[$bookId] = $quantity;
      $this->items[$bookId] = Book::where('id',$bookId)->first();  // TODO FIX THIS -> TOO MANY QUERIES ON EVERY RENDER
      $this->total += $this->items[$bookId]->price * $quantity;
    }
    $this->count = Cart::count();
  }

  /*
  Adds item to session
  */
  public function addToCart(int $bookId, int $quantity){
    Cart::add($bookId, $quantity);
  }

  /*
  Remove items from session
  */
  public function remove(int $id){
    unset($this->quantities[$id]);
    unset($this->items[$id]);
    Cart::remove($id);
  }


}
