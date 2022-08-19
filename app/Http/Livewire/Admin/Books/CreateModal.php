<?php
namespace App\Http\Livewire\Admin\Books;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Http\Livewire\ModalBase;
use App\Models\Book;
use App\Services\BookService;
use App\Services\CategoryService;
use App\Services\AuthorService;

class CreateModal extends ModalBase
{
  use WithFileUploads;

  public $book;
  public $image;
  public $authors;
  public $categories;

  public $listeners = [
    'showModal' => 'showModal',
  ];

  protected $rules = [
    'book.title' => 'required|string',
    'book.isbn' => 'required|string|unique:books,isbn',
    'book.price' => 'required|numeric',
    'book.category_id' => 'required|numeric',
    'book.synopsis' => 'required',
    'image' => 'required|image|max:1024',
    'authors' => 'required',
  ];

  public function mount(CategoryService $categoryService)
  {
    $this->categories = $categoryService->getAll();
    $this->book = Book::make([ 'category_id' => 1]);
  }

  public function render()
  {
    $this->showModal ? : $this->resetFields();
    return view('livewire.admin.books.create-modal');
  }

  /*
  resets all fields
  */
  public function resetFields() : void
  {
    $this->book = Book::make([ 'category_id' => 1]);
    $this->authors = '';
    $this->image = null;
  }
  /*
  Submits the new data to the BookService
  */
  public function submit(BookService $bookService, AuthorService $authorService) : void
  {
    $this->validate();
    $this->storeImage();
    $this->book->save();
    $authorService->attachAuthors($this->authors, $this->book);
    session()->flash("message", "Uspešno ste dodali knjigu");
    $this->emit('refreshIndex');
    $this->showModal();
  }

  /*
  Stores the image in public/images
  sets the current book's image to the new image
  */
  public function storeImage() : void
  {
    $this->image->storeAs('images', $this->image->getClientOriginalName(), 'real_public');
    $this->book->image = $this->image->getClientOriginalName();
  }

}
