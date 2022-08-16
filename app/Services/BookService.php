<?php
namespace App\Services;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Collection as Eloquent;

/*
. Services for Models/Book.php
*/
class BookService
{

  /*
  Returns [int bookId => Eloquent book] by passed [int bookId => somevalue]
  Used to mitigate performance issues in CartModal
  */
  public function getArray(array $query) : array{
    $result = [];
    foreach(Book::with('authors')->whereIn('id', array_keys($query))->get()  as $book){
      $result[$book->id] = $book;
    }
    return $result;
  }
  /*
  Returns books by criteria,
  Matches with Title, Author, ISBN
  */
  public function getBySearch(string $queryString) : Eloquent{

    //Adds flexibility to search
    // I.E "John Doe" query wouldn't return "John J. D. Doe" without explode->join
    $queryPieces = explode(" ", $queryString);
    $queryString = join("%", $queryPieces);

    return  Book::where('title','LIKE','%'.$queryString.'%')
    ->orWhere('isbn','LIKE','%'.$queryString.'%')
    ->orWhereHas('authors', function($q) use ($queryString){
      $q->where('name','LIKE','%'.$queryString.'%');
    })
    ->get();
  }
  /*
  Returns a specific book with relevant info eager loaded
  throws 404 if nothing is found
  */
  public function getOne(int $book) : Book{
    return Book::with('authors', 'category', 'reviews')->where('id', $book)->firstOrFail();
  }
  /*
  Returns a collection of n random recommended books
  n = $quantity
  */
  public function getRecommended(int $quantity) : Eloquent {
    return Book::with('authors')->recommended()->inRandomOrder()->take($quantity)->get();
  }
  /*
  Used when filter criteria is ambigious,
  Determines criteria and calls relevant method.
  */
  public function getAllorFiltered($category = null, $subcategories = []) : Eloquent{

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
  public function getAll() : Eloquent{
    return Book::with('authors', 'category')->get();
  }
  /*
  Returns a collection of books by categories
  */
  public function getBySubCategories($categories) : Eloquent{
    return Book::with('authors', 'category')->whereHas('category', function ($q) use($categories){
      $q->whereIn('id', $categories);
    })->get();
  }
  /*
  Returns a collection of books filtered by passed category
  category in ['fiction','nonFiction']
  */
  public function getByCategory($category) : Eloquent{

    if($category === 'fiction'){
      return Book::with('authors', 'category')->fiction()->get();
    }

    if($category === 'nonFiction'){
      return Book::with('authors', 'category')->nonFiction()->get();
    }

    abort(404);
  }
  /*
  Return book eager loaded
  */
  public function loadRelations(Book $book) : Book{
    return Book::with('authors', 'category', 'reviews')->where('id', $book->id)->first();
  }

}
