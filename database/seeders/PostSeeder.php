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

        $descriptions = [
            'Software Engineer' => 'Design, develop, and maintain scalable software solutions in a collaborative team environment.',
            'Frontend Developer' => 'Create responsive and dynamic user interfaces using modern JavaScript frameworks like React or Vue.',
            'Backend Developer' => 'Build robust server-side applications and APIs using Node.js, Laravel, or Django.',
            'DevOps Engineer' => 'Implement and manage CI/CD pipelines, cloud infrastructure, and deployment automation.',
            'Data Scientist' => 'Analyze large datasets to uncover insights and build predictive models to support business decisions.',
            'Cloud Architect' => 'Design scalable, secure, and high-performance cloud solutions on AWS, Azure, or Google Cloud.',
            'Cybersecurity Analyst' => 'Protect systems and networks from cyber threats through continuous monitoring and security improvements.',
            'Full Stack Developer' => 'Handle both frontend and backend development for complete web application solutions.',
            'Mobile App Developer' => 'Develop mobile applications for iOS and Android using native or cross-platform technologies.',
            'AI/ML Engineer' => 'Develop intelligent systems and machine learning models to solve real-world problems.'
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
            $position = $positions[$i];

            Vacancy::create([
                'id_company' => fake()->numberBetween(1, 15),
                'id_users' => fake()->numberBetween(1, 10),
                'position' => $position,
                'vacancy_description' => $descriptions[$position],

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
