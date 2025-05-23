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
        $positions = [
            'Software Engineer', 'Frontend Developer', 'Backend Developer',
            'DevOps Engineer', 'Data Scientist', 'Cloud Architect',
            'Cybersecurity Analyst', 'Full Stack Developer', 'Mobile App Developer',
            'AI/ML Engineer'
        ];

        $qualifications = [
            'Bachelor’s degree in Computer Science or related field',
            '3+ years of experience in software development',
            'Proficient in JavaScript, Python, or Java',
            'Experience with cloud platforms like AWS or Azure',
            'Familiarity with CI/CD pipelines and DevOps practices'
        ];

        $responsibilities = [
            'Develop and maintain web applications',
            'Collaborate with cross-functional teams',
            'Write clean, scalable, and efficient code',
            'Conduct code reviews and unit testing',
            'Monitor application performance and troubleshoot issues'
        ];

        $benefits = [
            'Health and dental insurance',
            'Flexible working hours',
            'Remote work opportunities',
            'Professional development budget',
            'Annual performance bonuses'
        ];

        for ($i = 0; $i < 10; $i++) {
            Vacancy::create([
                'id_company' => fake()->numberBetween(1, 15),
                'id_users' => fake()->numberBetween(1, 10),
                'position' => $positions[$i],
                'vacancy_description' => fake()->paragraph(3),

                'vacancy_qualification' => [
                    $qualifications[array_rand($qualifications)],
                    $qualifications[array_rand($qualifications)],
                    $qualifications[array_rand($qualifications)],
                ],
                'vacancy_responsibilities' => [
                    $responsibilities[array_rand($responsibilities)],
                    $responsibilities[array_rand($responsibilities)],
                    $responsibilities[array_rand($responsibilities)],
                ],
                'vacancy_benefits' => [
                    $benefits[array_rand($benefits)],
                    $benefits[array_rand($benefits)],
                    $benefits[array_rand($benefits)],
                ],

                'date_open' => fake()->dateTimeBetween('-1 month', 'now'),
                'date_closed' => fake()->dateTimeBetween('now', '+1 month'),
                // 'vacancy_picture' => fake()->imageUrl(),
                'vacancy_link' => fake()->url()
            ]);
        }
    }
}
