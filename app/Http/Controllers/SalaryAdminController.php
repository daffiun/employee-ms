<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Salary;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SalaryAdminController extends Controller
{
    // Daftar gaji (payroll list)
    public function index(Request $request)
    {
        $month = $request->month ?? Carbon::now()->format('Y-m');
        
        $salaries = Salary::with('employee.department')
            ->where('month', $month)
            ->paginate(20);

        $totalPayroll = $salaries->sum('total_salary');

        return view('admin.salaries.index', [
            'salaries' => $salaries,
            'month' => $month,
            'totalPayroll' => $totalPayroll,
        ]);
    }

    // Detail gaji karyawan
    public function show(Salary $salary)
    {
        return view('admin.salaries.show', ['salary' => $salary]);
    }

    // Form edit gaji
    public function edit(Salary $salary)
    {
        return view('admin.salaries.edit', ['salary' => $salary]);
    }

    // Update gaji
    public function update(Request $request, Salary $salary)
    {
        $validated = $request->validate([
            'base_salary' => 'required|numeric|min:0',
            'allowance' => 'required|numeric|min:0',
            'bonus' => 'required|numeric|min:0',
            'deduction' => 'required|numeric|min:0',
        ]);

        $validated['total_salary'] = $validated['base_salary'] + $validated['allowance'] + $validated['bonus'] - $validated['deduction'];
        
        $salary->update($validated);

        return redirect()->route('admin.salaries.index')
            ->with('success', 'Gaji berhasil diperbarui');
    }
}
