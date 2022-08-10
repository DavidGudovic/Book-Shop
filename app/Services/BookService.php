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
  public function getAllorFiltered($category = null, $subcategory = null){

    if(!empty($category) && empty($subcategory)){
      return $this->getByCategory($category);
    }

    if(!empty($subcategory)){
    return $this->getBySubCategory($subcategory);
    }

    if(empty($category) && empty($subcategory)){
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
  Returns a collection of books by passed categoryId
  */
  public function getBySubCategory(int $categoryId){
    return Book::with('authors', 'category')->category($categoryId)->get();
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
