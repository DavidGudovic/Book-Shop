<?php

namespace App\Http\Livewire\Cart;

use Livewire\Component;
use App\Http\Livewire\ModalBase;
use App\Services\Cart\CartFacade as Cart;
use App\Models\Book;
use App\Models\Order;
use App\Services\BookService;
use App\Services\OrderService;

/*
Global cart modal
*/
class Modal extends ModalBase
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


  public function render(BookService $bookService)
  {
    $this->getData($bookService);
    $this->emitTo('cart.counter', 'refresh');
    return view('livewire.cart.modal');
  }

  /*
  Populates arrays for the view with data from the session and database
  arrays[$items, $quantities]

  *Issues* :
  1. Queries the database to populate $items on every interaction with modal.
  2. BookService is passed by render,couldn't type hint resolve here

  *Attempted* :
  1.1 whereIn instead of multipe where's + eager load - significantly faster now
  1.2 Querying if empty-> items | quantities - breaks modal (attempted to read 'title' on array).
  */
  public function getData(BookService $bookService) : void
  {
    $this->total = 0;
    $this->items = $bookService->getArray(Cart::get());
    foreach(Cart::get() as $bookId => $quantity){
      $this->quantities[$bookId] = $quantity;
      $this->total += $this->items[$bookId]->price * $quantity;
    }
    $this->count = Cart::count();
  }

  /*
  Clears local data, used before clearing session data to avoid bugs
  */
  public function clearData() : void
  {
    $this->count = 0;
    $this->quantities = [];
    $this->items = [];
  }

  /*
  Sets data into session, used for updating quantities
  */
  public function setData() : void
  {
    Cart::set($this->quantities);
  }

  /*
  Finalizes the order, calls for clear local and session data, flashes message
  */
  public function order(OrderService $orderService) : void
  {
    $orderService->makeOrder($this->quantities, $this->total);
    $this->clearData();
    Cart::clear();
    session()->flash('message', 'Hvala Vam!');
  }

  /*
  Decrements quantity for id
  */
  public function decrement($id) : void
  {
    if($this->quantities[$id] == 1){ return; }

    $this->quantities[$id]--;
    $this->setData();
  }
  /*
  Increments quantity for id
  can increment > 1 to fix an oversight
  */
  public function increment($id, $quantity = 1) : void
  {
    $this->quantities[$id] += $quantity;
    $this->setData();
  }

  /*
  Increments if exists, adds item to session if doesnt
  */
  public function addToCart(int $bookId, int $quantity) : void
  {
    empty($this->items[$bookId]) ?
    Cart::add($bookId, $quantity) :
    $this->increment($bookId, $quantity);
  }

  /*
  Remove items from session
  */
  public function remove(int $id)
  {
    unset($this->quantities[$id]);
    unset($this->items[$id]);
    Cart::remove($id);
  }


}
