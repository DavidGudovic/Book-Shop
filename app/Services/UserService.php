<?php
namespace App\Services;

use App\Models\User;
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
    public function createUser(array $userData): User
    {
        // Create user
        $user = User::create([
          'name' => $userData['name'],
          'username' => $userData['username'],
          'email' => $userData['email'],
          'password' => Hash::make($userData['password']),
        ]);

        return $user;
    }

    /*
    Attempts to Log the user in
    returns boolean
    */
    public function loginUser(array $userData) : bool
    {
      return auth()
      ->attempt(['username' => $userData['username'], 'password' => $userData['password']],
                $userData['remember']);
    }

    /*
    Logs the user out
    */
    public function logoutUser()
    {
      auth()->logout();
    }
}
