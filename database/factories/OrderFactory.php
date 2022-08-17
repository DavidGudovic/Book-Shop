<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Order;

class OrderFactory extends Factory
{

    public function definition()
    {
        return [
            'user_id' => User::all()->random()->id,
            'status' => Order::STATUS_PENDING,
            'total_price' => 0,
        ];
    }

}
