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
   Returns a specific book with relevant info eager loaded
   throws 404 if nothing is found
  */
  public function getOne(Book $book){
    return Book::with('authors', 'category', 'reviews')->where('id',$book->id)->firstOrFail();
  }
  /*
  Returns a collection of n random recommended books
  n = $quantity
  */
  public function getRecommended(int $quantity){
    return Book::with('authors')->recommended()->inRandomOrder()->take($quantity)->get();
  }
  /*
    Used when filter criteria is ambigious,
    Determines criteria and calls relevant method.
  */
  public function getAllorFiltered($category = null, $subcategories = []){

    if(!empty($category) && empty($subcategories)){
      return $this->getByCategory($category);
    }

    if(!empty($subcategories)){
    return $this->getBySubCategories($subcategories);
    }

    if(empty($category) && empty($subcategories)){
      return $this->getAll();
    }

  }

  /*
  Return all books eager loaded
  */
  public function getAll(){
    return Book::with('authors', 'category')->get();
  }

  /*
  Returns a collection of books by categories
  */
  public function getBySubCategories($categories){
    return Book::with('authors', 'category')->whereHas('category', function ($q) use($categories){
      $q->whereIn('id', $categories);
    })->get();
  }

  /*
  Returns a collection of books filtered by passed category
  category in ['fiction','nonFiction']
  */
  public function getByCategory($category){

    if($category === 'fiction'){
      return Book::with('authors', 'category')->fiction()->get();
    }

    if($category === 'nonFiction'){
      return Book::with('authors', 'category')->nonFiction()->get();
    }

    return [];
  }


}
