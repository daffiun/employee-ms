<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            PositionSeeder::class,    // Harus lebih dulu
            DepartmentSeeder::class,  // Harus lebih dulu
            EmployeeSeeder::class,    // Membutuhkan Position dan Department
            UserSeeder::class,        // Membutuhkan Employee
            // Seeder lain (misalnya AttendanceSeeder, SalarySeeder) bisa ditambahkan di sini
        ]);
    }
}