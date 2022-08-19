<?php
namespace App\Services;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Collection as Eloquent;

/*
. Services for Models/Authors.php
*/
class AuthorService
{

  /*
   Processes string ( author1, author2, author3, ... ) then syncs it
   If an array is passed just syncs
  */
  public function attachAuthors($authors, Book $book) : void
  {
     if(is_string($authors)){
       $authors = explode(',',$authors);
       foreach($authors as $index => $author)
       {
         if($author != " "){
             $authors[$index] = Author::firstOrCreate(['name' => trim($author)])->id;
         } else {
           unset($authors[$index]);
         }
       }
     }
    $book->authors()->sync($authors);
  }
}
