<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserDetails;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TrplSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sql = File::get(base_path('trpl_user.sql'));
        DB::unprepared($sql);

        $user = User::create([
            'email' => 'admin@example.com',
            'password' => Hash::make('admin123'), // ✅ hash here
            'id_roles' => 1
        ]);

        UserDetails::create([
            'id_users' => $user->id_users,
            'name' => "admin",
            'nim' => "00/20000/SV/20000",
            'entry_year' => 2019,
            'graduate_year' => 2025,
            'status' => "approved"
        ]);
    }
}
