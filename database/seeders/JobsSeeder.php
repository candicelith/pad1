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
            $jobs = [
                [
                    'id_company' => 1,
                    'job_name' => 'Backend Developer',
                    'job_description' => 'Build and maintain backend services using Laravel and Node.js.',
                    'job_role' => 'Software Engineering',
                ],
                [
                    'id_company' => 2,
                    'job_name' => 'Frontend Developer (React.js)',
                    'job_description' => 'Implement responsive UIs using React.js and integrate with REST APIs.',
                    'job_role' => 'Software Engineering',
                ],
                [
                    'id_company' => 3,
                    'job_name' => 'Mobile App Developer (Flutter)',
                    'job_description' => 'Develop cross-platform mobile applications with Flutter.',
                    'job_role' => 'Mobile Development',
                ],
                [
                    'id_company' => 4,
                    'job_name' => 'DevOps Engineer',
                    'job_description' => 'Manage CI/CD pipelines, infrastructure automation, and cloud deployment.',
                    'job_role' => 'DevOps & Infrastructure',
                ],
                [
                    'id_company' => 5,
                    'job_name' => 'Data Analyst',
                    'job_description' => 'Analyze business data to extract insights and support decision making.',
                    'job_role' => 'Data Analytics',
                ],
                [
                    'id_company' => 6,
                    'job_name' => 'Cybersecurity Analyst',
                    'job_description' => 'Monitor and protect IT systems against cyber threats and attacks.',
                    'job_role' => 'Cybersecurity',
                ],
                [
                    'id_company' => 7,
                    'job_name' => 'UI/UX Designer',
                    'job_description' => 'Design intuitive and user-friendly interfaces for web and mobile apps.',
                    'job_role' => 'Design',
                ],
                [
                    'id_company' => 8,
                    'job_name' => 'System Administrator',
                    'job_description' => 'Maintain internal systems, networks, and servers for optimal performance.',
                    'job_role' => 'IT Support & Infrastructure',
                ],
                [
                    'id_company' => 9,
                    'job_name' => 'Product Manager (Tech)',
                    'job_description' => 'Oversee the development and launch of new tech products.',
                    'job_role' => 'Product Management',
                ],
                [
                    'id_company' => 10,
                    'job_name' => 'QA Engineer',
                    'job_description' => 'Ensure software quality through automated and manual testing.',
                    'job_role' => 'Quality Assurance',
                ],
                [
                    'id_company' => 11,
                    'job_name' => 'Full Stack Developer',
                    'job_description' => 'Develop frontend and backend services for integrated platforms.',
                    'job_role' => 'Full Stack Development',
                ],
                [
                    'id_company' => 12,
                    'job_name' => 'Mobile App Developer (Android)',
                    'job_description' => 'Create native Android apps using Kotlin and follow clean architecture.',
                    'job_role' => 'Mobile Development',
                ],
                [
                    'id_company' => 13,
                    'job_name' => 'Mobile App Developer (iOS)',
                    'job_description' => 'Build robust iOS apps using Swift and integrate with REST APIs.',
                    'job_role' => 'Mobile Development',
                ],
                [
                    'id_company' => 14,
                    'job_name' => 'Machine Learning Engineer',
                    'job_description' => 'Build machine learning models for predictive analytics and classification tasks.',
                    'job_role' => 'AI/ML',
                ],
                [
                    'id_company' => 15,
                    'job_name' => 'Data Engineer',
                    'job_description' => 'Design and build scalable data pipelines and data lakes.',
                    'job_role' => 'Data Engineering',
                ],
                [
                    'id_company' => 16,
                    'job_name' => 'Site Reliability Engineer',
                    'job_description' => 'Improve system reliability and automate infrastructure monitoring.',
                    'job_role' => 'Infrastructure',
                ],
                [
                    'id_company' => 17,
                    'job_name' => 'Scrum Master',
                    'job_description' => 'Facilitate daily stand-ups and ensure agile practices are followed.',
                    'job_role' => 'Agile Management',
                ],
                [
                    'id_company' => 18,
                    'job_name' => 'Technical Writer',
                    'job_description' => 'Write and maintain technical documentation for software products.',
                    'job_role' => 'Documentation',
                ],
                [
                    'id_company' => 19,
                    'job_name' => 'IT Project Manager',
                    'job_description' => 'Manage timelines, budgets, and stakeholder communication in IT projects.',
                    'job_role' => 'Project Management',
                ],
                [
                    'id_company' => 20,
                    'job_name' => 'DevOps Consultant',
                    'job_description' => 'Advise teams on CI/CD best practices and infrastructure optimization.',
                    'job_role' => 'DevOps & Infrastructure',
                ],
                [
                    'id_company' => 21,
                    'job_name' => 'Business Analyst (IT)',
                    'job_description' => 'Translate business needs into technical specifications and system workflows.',
                    'job_role' => 'Business Analysis',
                ],
                [
                    'id_company' => 22,
                    'job_name' => 'Database Administrator',
                    'job_description' => 'Administer and optimize MySQL and PostgreSQL databases.',
                    'job_role' => 'Database Administration',
                ],
                [
                    'id_company' => 23,
                    'job_name' => 'Blockchain Developer',
                    'job_description' => 'Design smart contracts and DApps on Ethereum using Solidity.',
                    'job_role' => 'Blockchain Development',
                ],
                [
                    'id_company' => 24,
                    'job_name' => 'Technical Support Engineer',
                    'job_description' => 'Resolve tier-2 issues and ensure client satisfaction with deployed systems.',
                    'job_role' => 'IT Support',
                ],
                [
                    'id_company' => 25,
                    'job_name' => 'AI Prompt Engineer',
                    'job_description' => 'Design prompts and optimize them for AI-powered systems.',
                    'job_role' => 'AI/ML',
                ],
                [
                    'id_company' => 26,
                    'job_name' => 'BI Developer',
                    'job_description' => 'Build dashboards and reports using Power BI or Tableau.',
                    'job_role' => 'Business Intelligence',
                ],
                [
                    'id_company' => 27,
                    'job_name' => 'Penetration Tester',
                    'job_description' => 'Simulate attacks to uncover security vulnerabilities.',
                    'job_role' => 'Cybersecurity',
                ],
                [
                    'id_company' => 28,
                    'job_name' => 'Game Developer',
                    'job_description' => 'Create mobile and PC games using Unity or Unreal Engine.',
                    'job_role' => 'Game Development',
                ],
                [
                    'id_company' => 29,
                    'job_name' => 'CRM Specialist',
                    'job_description' => 'Configure and maintain CRM systems like Salesforce or Zoho.',
                    'job_role' => 'CRM & Sales Tech',
                ],
                [
                    'id_company' => 30,
                    'job_name' => 'SEO Specialist',
                    'job_description' => 'Optimize websites for search engine performance and ranking.',
                    'job_role' => 'Digital Marketing',
                ],
            ];

            $jobs = array_map(function ($job) {
                $job['id_company'] = rand(1, 15); // 👈 Assign random company ID
                return $job;
            }, $jobs);


            foreach ($jobs as $job) {
                Job::create($job);
            }
        }
    };
