<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil ID karyawan yang sudah ada
        $employeeBudiId = DB::table('employees')->where('email', 'budi.santoso@company.com')->value('id');
        $employeeSitiId = DB::table('employees')->where('email', 'siti.aminah@company.com')->value('id');

        DB::table('users')->insert([
            // User Admin (tidak terhubung ke tabel employees)
            [
                'name' => 'Super Admin',
                'email' => 'admin@company.com',
                'phone' => '080011122233',
                'email_verified_at' => now(),
                'password' => Hash::make('password'), // Ganti dengan password yang lebih aman
                'employee_id' => null,
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // User Karyawan Budi (Manager)
            [
                'name' => 'Budi Santoso',
                'email' => 'budi.santoso@company.com',
                'phone' => '081234567890',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'employee_id' => $employeeBudiId,
                'role' => 'employee',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // User Karyawan Siti (Staff)
            [
                'name' => 'Siti Aminah',
                'email' => 'siti.aminah@company.com',
                'phone' => '082345678901',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'employee_id' => $employeeSitiId,
                'role' => 'employee',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}