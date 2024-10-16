<?php

namespace Database\Seeders;

use App\Models\JobTracking;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobTrackingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0; $i < 100; $i++) {
            JobTracking::create([
                'id_userDetails' => fake()->numberBetween(1,100),
                'id_jobs'=>fake()->numberBetween(1,10),
                'date_start' =>fake()->date(),
                'date_end' =>fake()->optional()->date(),
                'status' => fake()->randomElement(['Active','Inactive']),
                'type' => fake()->randomElement(['Fulltime','Part time','Internship']),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
