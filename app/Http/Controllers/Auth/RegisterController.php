<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use App\Services\UserService;



//Displays register form, creates user
class RegisterController extends Controller
{
  /*
  .Displays register form
  */
   public function create()
   {
     return view('auth.register');
   }

   /*
   .Registers new user
   */
   public function store(RegisterRequest $request, UserService $userService)
   {
     //add to database
     $userService->createUser($request->validated());
     //redirect to login with success message
     return redirect()->route('login')->with(['status' => 'success',
                                              'status_msg' => 'Uspesna registracija, ulogujte se!']);
   }
}
