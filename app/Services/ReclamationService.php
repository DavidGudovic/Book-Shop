<?php
namespace App\Services;

use App\Models\Reclamation;
use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection as Eloquent;
/*
. Services for Models/Reclamation.php
*/
class ReclamationService
{
  /*
  Calls delete on passed reclamation
  */
  public function delete(Reclamation $reclamation) : void
  {
    $reclamation->delete();
  }
  /*
  Makes an entry in the DB
  */
  public function createReclamation(string $text, Order $order) : void
  {
    Reclamation::create([
      'order_id' => $order->id,
      'user_id' => auth()->id(),
      'text' => $text,
      'status' => Reclamation::STATUS_PENDING,
    ]);
  }

}
