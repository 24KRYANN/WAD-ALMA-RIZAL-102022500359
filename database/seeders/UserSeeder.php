<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $akun = [
            ['name' => 'Admin Utama', 'email' => 'admin@mail.com', 'role' => 'admin'],
            ['name' => 'Petugas Kasir', 'email' => 'petugas@mail.com', 'role' => 'petugas'],
        ];

        foreach ($akun as $a) {
            DB::table('users')->updateOrInsert(
                ['email' => $a['email']],
                [
                    'name' => $a['name'],
                    'role' => $a['role'],
                    'password' => Hash::make('password'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }
    }
}