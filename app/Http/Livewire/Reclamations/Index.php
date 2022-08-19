<?php

namespace App\Http\Livewire\Reclamations;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Reclamation;
use App\Services\ReclamationService;
/*
Reclamation list for the logged in user component on user-profile, route: user/{id}/reclamations/
*/
class Index extends Component
{
  use WithPagination;
  public $status_filter = 0;

  public $listeners = [
    'setReclamationFilters' => 'setReclamationFilters',
  ];

  public function paginationView()
  {
    return 'pagination.custom';
  }

  public function render()
  {
    // Attaches where(status) clause to query when status_filter != 0
    return view('livewire.reclamations.index',[
      'reclamations' =>auth()->user()->reclamations()
      ->when(!empty($this->status_filter), function($query){
        return $query->where('status', $this->status_filter);
      })->paginate(2),
    ]);
  }

  /*
     Calls delete from service on $reclamation
  */
  public function cancel(Reclamation $reclamation, ReclamationService $reclamationService) : void
  {
    $reclamationService->delete($reclamation);
  }
  /*
  Sets the local filters to filters emitted from outside of component (reclamations.index filters)
  */
  public function setReclamationFilters(int $statusFilter) : void
  {
    $this->status_filter =  $statusFilter;
  }
}
