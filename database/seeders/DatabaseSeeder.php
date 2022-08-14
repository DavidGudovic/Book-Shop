<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /*
     Only seeds Users, Reclamations and Reviews
    */
    public function run()
    {
         \App\Models\User::factory(20)->create();
         \App\Models\Review::factory(100)->create();
         //\App\Models\Reclamation::factory(100)->create();
         //\App\Models\Order::factory(100)->create();
    }
}
