<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Employee;
use App\Http\Requests\StoreAttendanceRequest; 
use Carbon\Carbon;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /** @var \App\Models\User $user */
    // Tampilkan halaman absensi
    public function index()
    {
        $employee = auth()->user()->employee;
        $today = Carbon::now()->toDateString();
        
        // Cek apakah sudah check-in hari ini
        $todayAttendance = Attendance::where('employee_id', $employee->id)
            ->where('date', $today)
            ->first();

        // Ambil riwayat 7 hari terakhir
        $recentAttendances = Attendance::where('employee_id', $employee->id)
            ->whereBetween('date', [Carbon::now()->subDays(7), $today])
            ->orderBy('date', 'desc')
            ->get();

        return view('employee.attendance', [
            'employee' => $employee,
            'todayAttendance' => $todayAttendance,
            'recentAttendances' => $recentAttendances,
        ]);
    }

    // Check-in absensi
    public function checkIn(Request $request)
    {
        $employee = auth()->user()->employee;
        $today = Carbon::now()->toDateString();

        // Cek apakah sudah ada record hari ini
        $attendance = Attendance::where('employee_id', $employee->id)
            ->where('date', $today)
            ->first();

        if (!$attendance) {
            $attendance = Attendance::create([
                'employee_id' => $employee->id,
                'date' => $today,
                'time_in' => Carbon::now(),
                'status' => 'hadir',
            ]);
        } else {
            abort(400, 'Anda sudah melakukan check-in hari ini');
        }

        return redirect()->route('attendance.index')->with('success', 'Check-in berhasil');
    }

    // Check-out absensi
    public function checkOut(Request $request)
    {
        $employee = auth()->user()->employee;
        $today = Carbon::now()->toDateString();

        $attendance = Attendance::where('employee_id', $employee->id)
            ->where('date', $today)
            ->first();

        if (!$attendance) {
            abort(404, 'Belum melakukan check-in hari ini');
        }

        $attendance->update(['time_out' => Carbon::now()]);

        return redirect()->route('attendance.index')->with('success', 'Check-out berhasil');
    }

    // Buat permintaan sakit/izin
    public function mark(StoreAttendanceRequest $request)
    {
        $employee = auth()->user()->employee;
        $date = $request->date ?? Carbon::now()->toDateString();

        Attendance::updateOrCreate(
            ['employee_id' => $employee->id, 'date' => $date],
            ['status' => $request->status]
        );

        return redirect()->route('attendance.index')->with('success', 'Absensi berhasil dicatat');
    }
}
