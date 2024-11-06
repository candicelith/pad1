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
        for ($i=0; $i < 10; $i++) {

            UserDetails::create([
                'id_users' => fake()->unique()->numberBetween(1,10),
                'name' => fake()->name(),
                'nim' => fake()->unique()->numerify('2#/######/SV/#####'),
                'email' => fake()->unique()->safeEmail(),
                'phone' => fake()->phoneNumber(),
                'profile_photo' =>fake()->imageUrl(),
                'user_description' =>fake()->sentence(5),

                // 'current_job' => fake()->sentence(),
                // 'current_company' => fake()->sentence(),

                'graduate_year' => fake()->numberBetween(2018,2024),
                'modifiedBy' => fake()->name(),
                'modifiedDate' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
