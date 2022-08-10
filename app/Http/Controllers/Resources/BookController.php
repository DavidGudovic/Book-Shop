<?php

namespace App\Http\Controllers\Resources;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Book;
use App\Services\BookService;


/*
Resource controller for Models\Book
*/
class BookController extends Controller
{

  /*
  Display a listing of all book resources or filtered by a category or sub category
  */
  public function index(BookService $bookService, $category = null, $subcategory = null)
  {
      $books = $bookService->getAllorFiltered($category, $subcategory);
      return view('products.index')->with(['books' => $books]);
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
  Display the specified resource.
  */
  public function show(Book $book)
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
