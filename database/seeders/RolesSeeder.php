<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::insert([
            [
                'roleName' => 'Admin',
                'roleDesription' => 'Administrator with full access',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'roleName' => 'Alumni',
                'roleDesription' => 'User with full access, able to create post, edit profile and else',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'roleName' => 'Mahasiswa',
                'roleDesription' => 'Guest user with minimal access',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'roleName' => 'Guest',
                'roleDesription' => 'Guest user with minimal access',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
