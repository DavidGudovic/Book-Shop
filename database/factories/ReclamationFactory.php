<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Order;
use App\Models\Reclamation;


class ReclamationFactory extends Factory
{

    public function definition()
    {
        $order = Order::all()->random();
      return[
        'user_id' => $order->user_id,
        'order_id' => $order->id,
        'text' => fake()->paragraph,
        'status' => Reclamation::STATUS_PENDING,
      ];
    }
}
