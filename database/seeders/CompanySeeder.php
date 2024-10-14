<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 5; $i++) {
            Company::create([
                'company_name' => fake()->sentence(2),
                'company_description' => fake()->sentence(3),
                'company_phone' => fake()->phoneNumber(),
                'company_picture' => fake()->optional()->imageUrl()
            ]);
        }

    }
}
