<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Salary;
use App\Models\Setting;
use Carbon\Carbon;

class SalaryController extends Controller
{
    // Tampilkan gaji karyawan bulan berjalan
    public function show()
    {
        $employee = auth()->user()->employee;
        $currentMonth = Carbon::now()->format('Y-m');

        // Ambil data gaji dari database
        $salary = Salary::where('employee_id', $employee->id)
            ->where('month', $currentMonth)
            ->first();

        // Jika belum ada, hitung on-the-fly
        if (!$salary) {
            $bonusPerDay = intval(Setting::get('bonus_per_day', 50000));
            
            $hadir = Attendance::where('employee_id', $employee->id)
                ->whereMonth('date', Carbon::now()->month)
                ->whereYear('date', Carbon::now()->year)
                ->where('status', 'hadir')
                ->count();

            $baseSalary = $employee->position->default_base_salary;
            $allowance = $employee->position->default_allowance;
            $bonus = $hadir * $bonusPerDay;
            $deduction = 0;
            $totalSalary = $baseSalary + $allowance + $bonus - $deduction;

            $salary = (object)[
                'base_salary' => $baseSalary,
                'allowance' => $allowance,
                'bonus' => $bonus,
                'deduction' => $deduction,
                'total_salary' => $totalSalary,
                'hadir' => $hadir,
            ];
        }

        return view('employee.salary', [
            'employee' => $employee,
            'salary' => $salary,
            'currentMonth' => $currentMonth,
        ]);
    }
}
