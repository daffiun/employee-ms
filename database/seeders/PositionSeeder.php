<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('positions')->insert([
            [
                'name' => 'Manager',
                'default_base_salary' => 12000000.00,
                'default_allowance' => 2000000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Senior Developer',
                'default_base_salary' => 10000000.00,
                'default_allowance' => 1500000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Staff',
                'default_base_salary' => 5000000.00,
                'default_allowance' => 500000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Intern',
                'default_base_salary' => 2000000.00,
                'default_allowance' => 0.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}