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
        for ($i = 0; $i < 10; $i++) {
            $entryYear = fake()->numberBetween(2018,2024);

            UserDetails::create([
                'id_users' => fake()->unique()->numberBetween(1, 10),
                'name' => fake()->name(),
                'nim' => fake()->unique()->numerify('2#/######/SV/#####'),
                'phone' => fake()->phoneNumber(),
                // 'profile_photo' =>fake()->imageUrl(),
                'user_description' =>fake()->sentence(5),
                'current_job' => fake()->sentence(1),
                'current_company' => fake()->sentence(1),
                'entry_year' =>$entryYear,
                'graduate_year' => $entryYear+4,
                'modifiedBy' => fake()->name(),
                'modifiedDate' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
