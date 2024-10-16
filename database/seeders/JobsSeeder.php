<?php

namespace Database\Seeders;

use App\Models\Job;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0; $i < 100; $i++) {
            Job::create([
                'id_company'=>fake()->numberBetween(1,100),
                'job_name'=>fake()->sentence(2),
                'job_description'=>fake()->sentence(4),
                'job_role'=>fake()->sentence(2),
            ]);
        }
    }
}
