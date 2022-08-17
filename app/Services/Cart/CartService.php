<?php
namespace App\Services\Cart;
/*
. Services for managing the shopping cart in session storage
*/
class CartService
{
  // session->[int bookId  =>  int quantity]

  // If there's no cart sets it to empty on construct
  public function __construct()
  {
    if($this->get() === [])
    $this->set([]);
  }

  // Gets the cart array from session, or empty array
  public function get(): array
  {
    return request()->session()->get('cart') ?? [];
  }

  // Puts the cart into session
  public function set($cart): void
  {
    request()->session()->put('cart', $cart);
  }

  // Adds a book to cart
  public function add(int $bookId, int $quantity): void
  {
    $cart = $this->get();
    $cart[$bookId] = $quantity;
    $this->set($cart);
  }

  // Removes a specific book from cart
  public function remove(int $bookId): void
  {
    $cart = $this->get();
    unset($cart[$bookId]);
    $this->set($cart);
  }

  // Clears the cart
  public function clear(): void
  {
    $this->set([]);
  }

  // Returns count of cart items
  public function count(): int
  {
    return count($this->get());
  }


}
