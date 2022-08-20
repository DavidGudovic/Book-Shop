<?php

namespace App\Http\Livewire\Admin\Users;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\User;

class Index extends Component
{
  use WithPagination;

  public $search_query = "";
  public $role = '';
  public $sort_by = 'created_at';
  public $sort_direction = 'DESC';

  public $listeners = [
    'showModal' => 'showModal',
    'refresh' => 'refresh',
  ];

  public function refresh() : void
  {
      // Trigger render
  }

  public function paginationView()
  {
    return 'pagination.custom';
  }

  public function render()
  {
    return view('livewire.admin.users.index', [
      'users' => User::when(!empty($this->role), function($query){
                           return $query->role($this->role);
                   })->when(!empty($this->search_query), function($query){
                           return $query->search($this->search_query);
                   })->orderBy($this->sort_by,$this->sort_direction)->paginate(10),
                   ]);
  }

  /*
   deletes passed user
  */
  public function delete(User $user) : void
  {
    User::destroy($user->id);
  }
}
