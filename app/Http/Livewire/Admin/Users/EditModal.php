<?php

namespace App\Http\Livewire\Admin\Users;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Http\Livewire\ModalBase;

class EditModal extends ModalBase
{
    public User $user;
    public $new_password = '';

    public $listeners = [
      'showModal' => 'showModal',
      'edit' => 'edit',
    ];

    protected function rules() {
     return  [
        'user.username' => 'required|unique:users,username,' . $this->user->id,
        'user.email' => 'required|email|unique:users,email,' . $this->user->id,
        'user.name' => 'required',
        'user.role' => 'required',
        'new_password' => 'nullable|min:8',
      ];
    }

    public function render()
    {
        $this->showModal ? : $this->resetValidation();
        return view('livewire.admin.users.edit-modal');
    }

    /*
     Emits the user to admin.users.edit-modal
    */
    public function edit(User $user) : void
    {
      $this->user = $user;
      $this->showModal();
    }

    /*
     Sets a new password to the user if requested
    */
    public function setPassword() : void
    {
      if(!empty($this->new_password))
      {
        $this->user->password = Hash::make($this->new_password);
      }
    }
    /*
     Validates new data, updates user, emits refresh to admin.users.index
    */
    public function submit() : void
    {
      $this->validate();
      $this->setPassword();
      $this->user->update();
      $this->showModal();
      $this->emitTo('admin.users.index','refresh');
    }
}
