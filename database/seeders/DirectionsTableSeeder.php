<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Direction;

class DirectionsTableSeeder extends Seeder
{
    public function run()
    {
        Direction::factory(10)->create();
    }
}
