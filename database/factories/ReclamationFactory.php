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
      return[
        'user_id' => User::all()->random()->id,
        'order_id' => Order::all()->random()->id,
        'text' => fake()->paragraph,
        'status' => Reclamation::STATUS_PENDING,
      ];
    }
}
