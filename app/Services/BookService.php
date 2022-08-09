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
   Returns a collection of Books
  */
  public function getRecommended(){
    return Book::with('authors')->where('isRecommended', 1)->get()->random(3);
  }

}
