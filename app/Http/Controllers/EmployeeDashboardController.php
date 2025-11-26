<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Carbon\Carbon;

class EmployeeDashboardController extends Controller
{
    // Tampilkan dashboard karyawan dengan statistik bulanan
    public function index()
    {
        $employee = auth()->user()->employee;
        
        // Ambil statistik bulan berjalan
        $currentMonth = Carbon::now()->format('Y-m');
        
        $attendances = Attendance::where('employee_id', $employee->id)
            ->whereMonth('date', Carbon::now()->month)
            ->whereYear('date', Carbon::now()->year)
            ->get();

        $stats = [
            'hadir' => $attendances->where('status', 'hadir')->count(),
            'izin' => $attendances->where('status', 'izin')->count(),
            'sakit' => $attendances->where('status', 'sakit')->count(),
            'alpha' => $attendances->where('status', 'alpha')->count(),
        ];

        // Hitung bonus berdasarkan kehadiran
        $bonusPerDay = intval(\App\Models\Setting::get('bonus_per_day', 50000));
        $bonus = $stats['hadir'] * $bonusPerDay;

        return view('employee.dashboard', [
            'employee' => $employee,
            'stats' => $stats,
            'bonus' => $bonus,
            'attendances' => $attendances,
        ]);
    }
}
