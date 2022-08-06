<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use App\Services\UserService;


/*
 . Displays login page ; logs in, Logs out users.
*/
class LoginController extends Controller
{
  /*
  . Displays the page with the login form
  */
  public function index()
  {
    return view('auth.login');
  }

  /*
  . Logs in the user
  */
  public function store(LoginRequest $request, UserService $userService)
  {
    //validate
    $request->validated();

    //try login and redirect accordingly
    if($userService->loginUser($request)){
      return redirect()->route('home');
    } else{  //redirect with error
      return back()->with(['status' => 'error',
      'status_msg' => 'Uneli ste pogrešne podatke!',]);
    }
  }

  /*
  . Logs the user out
  */
  public function destroy(Request $request, UserService $userService)
  {
    $userService->logoutUser();
    return redirect()->route('home');
  }
}
