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
        for ($i = 0; $i < 100; $i++) {
            JobTracking::create([
                'id_userDetails' => fake()->numberBetween(1, 10),
                'id_jobs' => fake()->numberBetween(1, 100),
                'date_start' => fake()->date(),
                'date_end' => fake()->optional()->date(),
                // 'type' => fake()->randomElement(['Fulltime', 'Part time', 'Internship']),
                'job_description' => [
                    fake()->sentence(),
                    fake()->sentence(),
                    fake()->sentence(),
                ],
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
