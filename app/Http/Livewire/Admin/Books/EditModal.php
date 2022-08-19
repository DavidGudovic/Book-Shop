<?php
namespace App\Http\Livewire\Admin\Books;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Http\Livewire\ModalBase;
use App\Models\Book;
use App\Services\BookService;
use App\Services\CategoryService;
use App\Services\AuthorService;


class EditModal extends ModalBase
{
  use WithFileUploads;

  public $book;
  public $authors = '';
  public $image;

  public $listeners = [
    'showModal' => 'showModal',
    'edit' => 'edit',
  ];

  protected $rules = [
    'book.title' => 'required|string',
    'book.isbn' => 'required|string',
    'book.price' => 'required|numeric',
    'book.category_id' => 'required|numeric',
    'book.synopsis' => 'required',
    'image' => 'nullable|image|max:1024',
  ];

  public function mount(CategoryService $categoryService)
  {
    $this->categories = $categoryService->getAll();
  }

  public function render()
  {
    $this->showModal ? : $this->resetFields();
    return view('livewire.admin.books.edit-modal');
  }
  /*
  resets all fields
  */
  public function resetFields() : void
  {
    $this->book = null;
    $this->authors = '';
    $this->image = null;
  }
  /*
  Sets the book for edditing and opens up te modal
  */
  public function edit(Book $book) : void
  {
    $this->book = $book;
    $this->prepareAuthorString();
    $this->showModal();
  }

  /*
  Transforms author names into a string seperated by a comma
  */
  public function prepareAuthorString() : void
  {
    foreach($this->book->authors as $author){
      $this->authors .= $author->name . ', ';
    }
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
  /*
  Submits the new data to the BookService
  */
  public function submit(BookService $bookService, AuthorService $authorService) : void
  {

    $this->validate();

    if($this->image){
      $this->storeImage();
    }

    $bookService->update($this->book);

    if(!empty($this->authors))
    {
      $authorService->attachAuthors($this->authors, $this->book);
    }

    session()->flash("message", "Uspešno ste izmenili knjigu");
    $this->emit('refreshIndex');
    $this->showModal();

  }
}
