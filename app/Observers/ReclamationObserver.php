<?php

namespace App\Observers;

use App\Models\Reclamation;
use App\Models\Order;

class ReclamationObserver
{

    public $afterCommit = true;
    /**
     * Change the status of the related order if its refunded
     */
    public function updated(Reclamation $reclamation)
    {
        if($reclamation->status === Reclamation::STATUS_REFUNDED){
          $order = $reclamation->order;
          $order->status = Order::STATUS_REFUNDED;
          $order->save();
        }
    }

}
