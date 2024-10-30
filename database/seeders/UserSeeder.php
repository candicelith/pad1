<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Contracts\Hashing\Hasher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
    //  */
    public function run(): void
    {
        for ($i=0; $i < 100; $i++) {
            User::create([
                'id_roles' => fake()->numberBetween(1, 3), // Assuming you have 3 roles
                'email' => fake()->unique()->safeEmail,
                'password' => Hash::make('password')
            ]);
        }
    }
}
