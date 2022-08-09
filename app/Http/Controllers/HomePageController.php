<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\BookService;

// Handles calls to display Home Page
class HomePageController extends Controller
{

   // Gets relevant data and forwards it to home page view
    public function index(BookService $bookService){
      $recommends = $bookService->getRecommended();
      return view('index', ['recommends' => $recommends]);
    }
}
