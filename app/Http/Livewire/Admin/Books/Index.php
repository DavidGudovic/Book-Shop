<?php

namespace App\Http\Livewire\Admin\Books;

use Livewire\Component;
use App\Services\CategoryService;
use App\Services\BookService;
use App\Models\Book;
/*
Index of books for administration
*/
class Index extends Component
{
  public $categories;
  public $books;

  public $search_query = "";
  public $category = 0;
  public $sort_by = 'created_at';
  public $sort_direction = 'DESC';

  public function mount(CategoryService $categoryService, BookService $bookService)
  {
    $this->books = $bookService->getAll();
    $this->categories = $categoryService->getAll();
  }

  public function render (BookService $bookService)
  {
    return view('livewire.admin.books.index');
  }


  /*
  Calls getBySearch and sets the book list to the result
  */
  public function edit(Book $book) : void
  {
    $this->emitTo('admin.books.modal', 'edit', $book);
  }
  /*
  Calls getBySearch and sets the book list to the result
  */
  public function delete(BookService $bookService, int $bookId) : void
  {
    $bookService->delete($bookId);
  }
  /*
  Filters the book list by category
  */
  public function filter(BookService $bookService) : void
  {
    $this->books = $this->category == 0 ?
    $bookService->getAll() :
    $bookService->getBySubCategories([$this->category]);

    $this->sort();
    $this->clearSearchBar();
  }
  /*
  Calls getBySearch and sets the book list to the result
  */
  public function search(BookService $bookService) : void
  {
    $this->books = $bookService->getBySearch($this->search_query);
    $this->sort();
  }
  /*
  Clears the query string in searchBar
  */
  public function clearSearchBar() : void
  {
    $this->search_query = "";
  }

  /*
  Sorts the book list by criteria and direction
  */
  public function sort() : void
  {
    $this->books =
    $this->sort_direction == 'ASC' ?
    $this->books->sortBy($this->sort_by) :
    $this->books->sortByDesc($this->sort_by);
  }
  /*
    Flips recommended status
  */
  public function flipRecommended(BookService $bookService, Book $book) : void
  {
     $bookService->flipRecommended($book);
  }


}
