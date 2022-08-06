<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Displays login page ; logs in, Logs out users.
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
  public function store(Request $request)
  {
    //validate
    $this -> validate($request, [
      'username' => 'required',
      'password' => 'required',
    ]);

    //try login and redirect accordingly
    if(auth()->attempt($request->only('username','password'),$request->remember)){
      return redirect()->route('home');
    } else{  //redirect with error
      return back()->with(['status' => 'error',
      'status_msg' => 'Uneli ste pogrešne podatke!',]);
    }
  }

  /*
  . Logs the user out
  */
  public function destroy(Request $request)
  {
    auth()->logout();
    return redirect()->route('home');
  }
}
