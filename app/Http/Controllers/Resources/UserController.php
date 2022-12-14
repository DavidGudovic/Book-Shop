<?php

namespace App\Http\Controllers\Resources;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\UserService;
use App\Http\Requests\User\UpdateRequest;

/*
 Resource controller for Models\User
*/
class UserController extends Controller
{
  /**
  * Display a listing of the resource.
  */
  public function index()
  {
    return view('users.index');
  }
  /*
  Displays the form for deleting the account
  */
  public function delete(User $user)
  {
    return view('users.delete');
  }

  /**
  */
  public function create()
  {
    //
  }

  /**
  * Store a newly created resource in storage.
  */
  public function store(Request $request)
  {

  }

  /**
  * Display the specified resource.
  */
  public function show(User $user)
  {
    return view('users.show', ['user' => $user]);
  }

  /**
  * Show the form for editing the specified resource.
  */
  public function edit(User $user)
  {
    //
  }

  /**
  * Update the user in storage.
  */
  public function update(UpdateRequest $request,UserService $userService, User $user)
  {
  if(!Hash::check($request->input('current_password'), $user->password)){
    return back()->withErrors(['current_password'=>'Uneli ste pogrešnu šifru']);
  }
  $userService->updateUser($request->validated());
  return back()->with(['status'=> 'success', 'status_msg' => 'Uspešno ste izmenili podatke!']);
}


/**
* Remove the specified resource from storage.
*/
public function destroy(User $user, UserService $userService,Request $request)
{
  if(!Hash::check($request->input('password'), $user->password)){
    return back()->withErrors(['password'=>'Uneli ste pogrešnu šifru']);
  }

  $userService->deleteUser($user->id);
  return redirect()->route('home');
}
}
