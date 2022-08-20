<?php

namespace App\Http\Livewire\Admin\Reclamations;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Reclamation;

class Index extends Component
{
  use WithPagination;

  public $search_query = "";
  public $status = Reclamation::STATUS_PENDING;
  public $sort_by = 'created_at';
  public $sort_direction = 'DESC';

  public function paginationView()
  {
    return 'pagination.custom';
  }

  public function render()
  {
    return view('livewire.admin.reclamations.index', [
      'reclamations' => Reclamation::when(!empty($this->status), function($query){
                                           return $query->status($this->status);
                                 })->when(!empty($this->search_query), function($query){
                                           return $query->search($this->search_query);
                                 })->orderBy($this->sort_by, $this->sort_direction)
                                   ->with('user', 'order')->paginate(6),
                                 ]);
    }
    /*
    Declines or accepts reclamation
    i.e processReclamation($reclamation, Reclamation::STATUS_REFUNDED);
    */
    public function processReclamation(Reclamation $reclamation, int $status) : void
    {
      $reclamation->status = $status;
      $reclamation->update();
      $this->render();
    }
  }
