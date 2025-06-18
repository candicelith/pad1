<?php

namespace Database\Seeders;

use App\Models\JobTracking;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class JobTrackingSeeder extends Seeder
{

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 100; $i++) {
            JobTracking::create([
                'id_userDetails' => $faker->numberBetween(1, 38),
                'id_jobs' =>$faker->numberBetween(1, 25),
                'date_start' =>$faker->date(),
                'date_end' =>$faker->optional()->date(),
                'job_description' => [
                   $faker->sentence(),
                   $faker->sentence(),
                   $faker->sentence(),
                ],
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
