<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Direction;
use App\Models\User;

class DirectionsTableSeeder extends Seeder
{
    public function run()
    {
        $assignedUsers = Direction::where('user_id', '!=', null)->where('deleted_at', '=', null)->get('user_id');
        $user = User::whereNotIn('id', $assignedUsers)->inRandomOrder()->first();
        $user ? Direction::factory()->for($user)->create() : "";
    }
}
