<?php

namespace Database\Seeders;

use App\Models\Vacancy;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
            Vacancy::create([
                'id_company' => fake()->numberBetween(1, 100),
                'id_users' => fake()->numberBetween(1, 10),
                'position' => fake()->sentence(1),
                'vacancy_description' => fake()->sentence(2),
                'date_open' => fake()->date(),
                'date_closed' => fake()->date(),
                'vacancy_picture' => fake()->imageUrl(),
                'vacancy_link' => fake()->url()
            ]);
        }

    }
}
