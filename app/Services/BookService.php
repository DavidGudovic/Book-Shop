<?php
namespace App\Services;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Support\Facades\Hash;

/*
. Services for Models/Book.php
*/
class BookService
{

  /*
   Returns a collection of n random recommended books
   n = $quantity
  */
  public function getRecommended(int $quantity){
    return Book::with('authors')->where('isRecommended', 1)->get()->random($quantity);
  }

}
