<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Chirp;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = User::factory()
            ->count(50)
            ->create();
        
        $chirpAmounts=10;
        foreach ($users as $user) {
            for ($i=0; $i < $chirpAmounts; $i++) { 
                $user
                ->chirps() // Get the user.chirps relationships
                ->create(['message' =>fake()->text(255)]);
            }
        }
    }
}
