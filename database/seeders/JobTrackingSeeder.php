<?php

namespace Database\Seeders;

use App\Models\JobTracking;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JobTrackingSeeder extends Seeder
{

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
       // Get mapping of job_name => id from the jobs table
       $jobMap = DB::table('jobs')->pluck('id_jobs', 'job_name')->toArray();

        // Your descriptive array from earlier
        $jobDescriptions = [
            'Backend Developer' => [
                'Membangun dan mengelola logika server-side serta integrasi basis data.',
                'Mengembangkan API untuk kebutuhan frontend maupun layanan eksternal.',
                'Mengoptimalkan performa dan keamanan aplikasi sisi server.',
            ],
            'Frontend Developer (React.js)' => [
                'Mengimplementasikan desain antarmuka menggunakan React.js.',
                'Mengoptimalkan tampilan dan responsivitas di berbagai perangkat.',
                'Mengintegrasikan frontend dengan backend melalui API.',
            ],
            'Mobile App Developer (Flutter)' => [
                'Membangun aplikasi mobile lintas platform menggunakan Flutter.',
                'Menyesuaikan desain dan fungsionalitas dengan platform Android dan iOS.',
                'Menangani state management dan performa aplikasi.',
            ],
            'DevOps Engineer' => [
                'Mengotomatisasi proses CI/CD untuk mempercepat pengembangan dan penerapan aplikasi.',
                'Memantau kinerja sistem dan memperbaiki masalah operasional secara proaktif.',
                'Berkolaborasi dengan tim developer dan infrastruktur untuk memastikan integrasi sistem yang lancar.',
            ],
            'Data Analyst' => [
                'Mengolah dan menganalisis data untuk mendapatkan insight bisnis.',
                'Membuat dashboard dan visualisasi menggunakan tools seperti Tableau atau Power BI.',
                'Berkontribusi dalam proses pengambilan keputusan berbasis data.',
            ],
            'Cybersecurity Analyst' => [
                'Memantau sistem untuk mendeteksi potensi ancaman dan serangan siber.',
                'Melakukan audit keamanan dan pengujian penetrasi.',
                'Menyusun kebijakan keamanan dan melakukan pelatihan kepada karyawan.',
            ],
            'UI/UX Designer' => [
                'Mengembangkan elemen visual seperti palet warna, tipografi, dan ikonografi.',
                'Melakukan pengujian A/B untuk membandingkan berbagai versi desain.',
                'Menyusun dokumentasi dan spesifikasi desain untuk memudahkan pengembang.',
            ],
            'System Administrator' => [
                'Mengelola akun pengguna dan hak akses di dalam jaringan.',
                'Memastikan ketersediaan dan keamanan sistem server dan jaringan.',
                'Melakukan backup dan recovery data secara rutin.',
            ],
            'Product Manager (Tech)' => [
                'Menentukan visi produk dan mengelola backlog fitur.',
                'Menyusun prioritas dan roadmap pengembangan produk.',
                'Menjadi penghubung antara tim teknik, bisnis, dan pengguna.',
            ],
            'QA Engineer' => [
                'Menyusun dan menjalankan skenario pengujian fungsional dan non-fungsional.',
                'Mengotomatisasi pengujian untuk meningkatkan efisiensi.',
                'Melaporkan dan mendokumentasikan bug serta validasi perbaikannya.',
            ],
            'Full Stack Developer' => [
                'Mengembangkan frontend dan backend aplikasi web atau mobile secara menyeluruh.',
                'Mengelola API, database, dan logika bisnis aplikasi.',
                'Menjamin responsivitas dan performa aplikasi lintas perangkat.',
            ],
            'Mobile App Developer (Android)' => [
                'Mengembangkan aplikasi Android menggunakan Kotlin atau Java.',
                'Menyesuaikan UI dengan panduan Material Design.',
                'Mengoptimalkan kinerja dan kompatibilitas aplikasi di berbagai perangkat Android.',
            ],
            'Mobile App Developer (iOS)' => [
                'Mengembangkan aplikasi native iOS menggunakan Swift atau Objective-C.',
                'Mengintegrasikan aplikasi dengan API eksternal dan layanan backend.',
                'Melakukan testing dan debugging untuk menjamin kualitas aplikasi.',
            ],
            'Machine Learning Engineer' => [
                'Mendesain dan melatih model machine learning untuk berbagai use case.',
                'Mengelola pipeline data untuk pelatihan dan validasi model.',
                'Mengintegrasikan model ke dalam aplikasi atau sistem produksi.',
            ],
            'Data Engineer' => [
                'Membangun pipeline ETL untuk mengintegrasikan dan membersihkan data.',
                'Mengelola data warehouse dan data lake.',
                'Memastikan ketersediaan data berkualitas tinggi untuk analisis.',
            ],
            'Site Reliability Engineer' => [
                'Meningkatkan ketersediaan dan skalabilitas sistem produksi.',
                'Menyusun automasi monitoring dan alerting untuk operasional.',
                'Berkoordinasi dengan tim dev untuk memastikan deployment yang stabil.',
            ],
            'Scrum Master' => [
                'Memfasilitasi daily stand-up, sprint planning, dan retrospective meeting.',
                'Menjaga agar tim tetap fokus dan menghilangkan hambatan kerja.',
                'Menyediakan laporan kemajuan sprint kepada stakeholder.',
            ],
            'Technical Writer' => [
                'Membuat dokumentasi teknis seperti manual pengguna, API docs, dan tutorial.',
                'Berkolaborasi dengan tim engineering untuk memahami spesifikasi teknis.',
                'Menyusun dokumentasi dengan bahasa yang jelas dan mudah dipahami.',
            ],
            'DevOps Consultant' => [
                'Menganalisis kebutuhan klien dan merancang solusi DevOps yang sesuai.',
                'Memberikan pelatihan dan workshop mengenai tools dan praktik terbaik DevOps.',
                'Membantu migrasi sistem lama ke arsitektur berbasis cloud atau kontainer.',
            ],
            'Business Analyst (IT)' => [
                'Menganalisis kebutuhan bisnis dan menerjemahkannya menjadi requirement teknis.',
                'Membuat dokumen spesifikasi sistem dan diagram alur proses.',
                'Berkoordinasi dengan stakeholder untuk validasi kebutuhan dan solusi.',
            ],
            'Database Administrator' => [
                'Mendesain, mengimplementasikan, dan memelihara struktur basis data.',
                'Menjamin keamanan, integritas, dan ketersediaan data.',
                'Melakukan tuning kinerja query dan backup rutin.',
            ],
            'Blockchain Developer' => [
                'Merancang dan mengembangkan smart contract pada platform seperti Ethereum.',
                'Membangun sistem backend berbasis blockchain yang aman dan terdesentralisasi.',
                'Menguji dan menyebarkan dApp (decentralized applications).',
            ],
            'Technical Support Engineer' => [
                'Menangani dan menyelesaikan masalah teknis yang dialami oleh pengguna.',
                'Melakukan instalasi, konfigurasi, dan pemeliharaan perangkat keras dan perangkat lunak.',
                'Memberikan pelatihan dan dokumentasi penggunaan sistem kepada pengguna.',
            ],
        ];

        $jobNames = array_keys($jobDescriptions);
        for ($i = 0; $i < 100; $i++) {
            $randomJobName = $faker->randomElement($jobNames);
            if (!isset($jobMap[$randomJobName])) {
                continue; // skip if no matching job_id
            }

            JobTracking::create([
                'id_userDetails' => $faker->numberBetween(1, 38),
                'id_jobs' => $jobMap[$randomJobName],
                'date_start' => $faker->date(),
                'date_end' => $faker->optional()->date(),
                'job_description' => $jobDescriptions[$randomJobName],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
