<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Employee;
use App\Models\Salary;
use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PayrollController extends Controller
{
    // Generate payroll untuk bulan tertentu
    public function generate($month)
    {
        $bonusPerDay = intval(Setting::get('bonus_per_day', 50000));
        $employees = Employee::where('status', 'aktif')->get();

        $count = 0;
        foreach ($employees as $employee) {
            // Hitung hari hadir
            $hadir = Attendance::where('employee_id', $employee->id)
                ->whereYear('date', substr($month, 0, 4))
                ->whereMonth('date', substr($month, 5, 2))
                ->where('status', 'hadir')
                ->count();

            // Ambil gaji dari database atau default dari position
            $existingSalary = Salary::where('employee_id', $employee->id)
                ->where('month', $month)
                ->first();

            if (!$existingSalary) {
                $baseSalary = $employee->position->default_base_salary;
                $allowance = $employee->position->default_allowance;
                $bonus = $hadir * $bonusPerDay;
                $deduction = 0;
                $totalSalary = $baseSalary + $allowance + $bonus - $deduction;

                Salary::create([
                    'employee_id' => $employee->id,
                    'month' => $month,
                    'base_salary' => $baseSalary,
                    'allowance' => $allowance,
                    'bonus' => $bonus,
                    'deduction' => $deduction,
                    'total_salary' => $totalSalary,
                ]);

                $count++;
            }
        }

        return redirect()->route('admin.salaries.index')
            ->with('success', "Payroll {$month} berhasil digenerate ({$count} karyawan)");
    }
}
