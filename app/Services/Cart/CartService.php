<?php
namespace App\Services\Cart;
/*
. Services for the Shopping cart
*/
class CartService
{
  // session->[int id  =>  int quantity]

  // If there's no cart sets it to empty on construct
  public function __construct()
  {
    if($this->get() === [])
    $this->set($this->empty());
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
    $this->set($this->empty());
  }

  // Returns count of cart items
  public function count(): int
  {
    return count($this->get());
  }

  // Returns an empty assoc array
  public function empty(): array
  {
    return [];
  }


}
