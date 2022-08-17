<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /*
      Validates request,
      $user->id passed in as thrid parameter of unique is id to ignore.
     */
    public function rules(User $user)
    {
      $user = $this->route('user');
        return [
                'username' => 'required|unique:users,username,' . $user->id,
                'email' => 'required|email|unique:users,email,' . $user->id,
                'name' => 'required',
                'current_password' => 'required|min:8',
                'new_password' => 'required|min:8',
        ];
    }
}
