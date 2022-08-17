<?php

namespace App\Http\Controllers\Resources;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Book;
use App\Services\BookService;
use App\Services\CategoryService;


/*
Resource controller for Models\Book
*/
class BookController extends Controller
{

  /*
  Display an initial listing of all book resources or filtered by a category or subcategories
  Filters from inside products.index are handled by Livewire.ProductCatalog
  */
  public function index(BookService $bookService, CategoryService $categoryService, $category = null, $subcategories = null)
  {
      $decoded = json_decode($subcategories);
      $books = $bookService->getAllorFiltered($category, $decoded);
      $filters = $categoryService->getFilters($decoded ?? []);

      return $books ? //isNull
      view('products.index')->with(['books' => $books, 'filters' => $filters]) :
      abort(404);
  }

  /*
  Show the form for creating a new resource.
  */
  public function create()
  {
    //
  }

  /*
  Store a newly created resource in storage.
  */
  public function store(Request $request)
  {
    //
  }


  /*
  Display the specified book.
  */
  public function show(BookService $bookService,Book $book)
  {
    return view('products.show', ['book' => $book]);
  }

  /*
  Show the form for editing the specified resource.
  */
  public function edit(Book $book)
  {
    //
  }

  /*
  Update the specified resource in storage.
  */
  public function update(Request $request, Book $book)
  {
    //
  }

  /*
  Remove the specified resource from storage.
  */
  public function destroy(Book $book)
  {
  }
}
