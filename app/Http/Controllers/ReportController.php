<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    // Laporan pribadi karyawan
    public function personal(Request $request)
    {
        $employee = auth()->user()->employee;
        $month = $request->month ?? Carbon::now()->format('Y-m');

        $startDate = Carbon::createFromFormat('Y-m', $month)->startOfMonth();
        $endDate = $startDate->copy()->endOfMonth();

        $attendances = Attendance::where('employee_id', $employee->id)
            ->whereBetween('date', [$startDate, $endDate])
            ->orderBy('date')
            ->get();

        $stats = [
            'hadir' => $attendances->where('status', 'hadir')->count(),
            'izin' => $attendances->where('status', 'izin')->count(),
            'sakit' => $attendances->where('status', 'sakit')->count(),
            'alpha' => $attendances->where('status', 'alpha')->count(),
        ];

        return view('employee.reports', [
            'employee' => $employee,
            'attendances' => $attendances,
            'stats' => $stats,
            'month' => $month,
        ]);
    }

    // Laporan admin - daftar semua absensi
    public function index(Request $request)
    {
        $query = Attendance::with('employee.department', 'employee.position');

        if ($request->filled('employee_id')) {
            $query->where('employee_id', $request->employee_id);
        }

        if ($request->filled('month')) {
            $month = $request->month;
            $query->whereYear('date', substr($month, 0, 4))
                  ->whereMonth('date', substr($month, 5, 2));
        }

        $attendances = $query->orderBy('date', 'desc')->paginate(50);

        return view('admin.reports.index', ['attendances' => $attendances]);
    }

    // Export laporan ke CSV
    public function export(Request $request)
    {
        $month = $request->month ?? Carbon::now()->format('Y-m');
        
        $attendances = Attendance::with('employee')
            ->whereYear('date', substr($month, 0, 4))
            ->whereMonth('date', substr($month, 5, 2))
            ->orderBy('date')
            ->get();

        $filename = "laporan_absensi_{$month}.csv";
        
        header('Content-Type: text/csv');
        header("Content-Disposition: attachment; filename=\"$filename\"");

        $file = fopen('php://output', 'w');
        fputcsv($file, ['Tanggal', 'Nama Karyawan', 'Status', 'Jam Masuk', 'Jam Keluar']);

        foreach ($attendances as $attendance) {
            fputcsv($file, [
                $attendance->date,
                $attendance->employee->full_name,
                $attendance->status,
                $attendance->time_in,
                $attendance->time_out,
            ]);
        }

        fclose($file);
        exit;
    }
}
