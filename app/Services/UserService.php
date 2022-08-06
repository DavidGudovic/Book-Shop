<?php
namespace App\Services;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

/*
 . Services for Models/User.php
*/
class UserService
{
    /*
    Creates a user in database
    returns an Eloquent Model object of the user
    */
    public function createUser(Request $request): User
    {
        // Create user
        $user = User::create([
          'name' => $request-> name,
          'username' => $request-> username,
          'email' => $request-> email,
          'password' => Hash::make($request->password),
        ]);

        return $user;
    }

    /*
    Attempts to Log the user in
    returns boolean
    */
    public function loginUser(Request $request) : bool
    {
      return auth()->attempt($request->only('username','password'),$request->remember);
    }

    /*
    Logs the user out
    */
    public function logoutUser()
    {
      auth()->logout();
    }
}
