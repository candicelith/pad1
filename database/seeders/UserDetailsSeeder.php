<?php

namespace Database\Seeders;

use App\Models\UserDetails;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */



    public function run(): void
    {
        for ($i=0; $i < 100; $i++) {

            UserDetails::create([
                'id_users' => fake()->unique()->numberBetween(1,100),
                'name' => fake()->name(),
                'nim' => fake()->unique()->numerify('2#/######/SV/#####'),
                'email' => fake()->unique()->safeEmail(),
                'phone' => fake()->phoneNumber(),
                'profile_photo' =>fake()->imageUrl(),
                'graduate_year' => fake()->numberBetween(2018,2024),
                'modifiedBy' => fake()->name(),
                'modifiedDate' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
