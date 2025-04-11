<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'password' => Hash::make('12345'), // Ganti dengan password yang diinginkan
                'email_verified_at' => now(),
                'is_admin' => true, // Pastikan Anda menambahkan kolom is_admin di tabel users
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Regular User',
                'email' => 'user@example.com',
                'password' => Hash::make('123456'), // Ganti dengan password yang diinginkan
                'email_verified_at' => now(),
                'is_admin' => false, // Pengguna biasa
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
