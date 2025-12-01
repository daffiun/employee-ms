<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil ID yang diperlukan
        $hrDepartmentId = DB::table('departments')->where('code', 'HR')->value('id');
        $itDepartmentId = DB::table('departments')->where('code', 'IT')->value('id');
        $managerPositionId = DB::table('positions')->where('name', 'Manager')->value('id');
        $staffPositionId = DB::table('positions')->where('name', 'Staff')->value('id');
        
        // Data karyawan
        $employees = [
            // Manager IT (ID 1)
            [
                'id' => 1,
                'full_name' => 'Budi Santoso',
                'email' => 'budi.santoso@company.com',
                'phone' => '081234567890',
                'birthdate' => '1985-05-15',
                'address' => 'Jl. Merdeka No. 1, Jakarta',
                'join_date' => '2018-01-10',
                'employment_type' => 'fulltime',
                'department_id' => $itDepartmentId,
                'position_id' => $managerPositionId,
                'manager_id' => null, // Dia adalah Manager
                'overtime_rate' => 50000.00,
                'late_penalty_rate' => 40000.00,
                'status' => 'aktif',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Staff HR (ID 2)
            [
                'id' => 2,
                'full_name' => 'Siti Aminah',
                'email' => 'siti.aminah@company.com',
                'phone' => '082345678901',
                'birthdate' => '1995-10-20',
                'address' => 'Jl. Sudirman No. 2, Bandung',
                'join_date' => '2020-03-01',
                'employment_type' => 'fulltime',
                'department_id' => $hrDepartmentId,
                'position_id' => $staffPositionId,
                // manager_id akan diupdate setelah semua karyawan dibuat
                'manager_id' => null, 
                'overtime_rate' => 30000.00,
                'late_penalty_rate' => 20000.00,
                'status' => 'aktif',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('employees')->insert($employees);

        // Update manager_id untuk Siti Aminah (Asumsikan Budi Santoso adalah Manager HR untuk contoh)
        // Kita gunakan ID 1 (Budi Santoso) sebagai Manager untuk Siti Aminah (ID 2)
        DB::table('employees')
            ->where('id', 2)
            ->update(['manager_id' => 1, 'updated_at' => now()]);
    }
}