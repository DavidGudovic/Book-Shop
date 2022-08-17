<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\BookService;
use App\Services\CategoryService;

// Handles calls to display Home Page
class HomePageController extends Controller
{
  // Gets relevant data and forwards it to home page view
  public function index(BookService $bookService , CategoryService $categoryService ){
    return view('index', ['recommends' => $bookService->getRecommended(3),
                          'fictionCategories' => $categoryService->getAll('fiction'),
                          'nonFictionCategories' => $categoryService->getAll('nonFiction')]);
  }
}
