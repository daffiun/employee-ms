<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Employee;
use App\Models\Setting;
use Carbon\Carbon;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $today = Carbon::now()->toDateString();
        $workStartTime = Setting::get('work_start_time', '09:00:00');

        $totalEmployees = Employee::where('status', 'aktif')->count();

        $todayAttendances = Attendance::where('date', $today)->get();
        $presentToday = $todayAttendances->where('status', 'hadir')->count();
        $sickToday = $todayAttendances->where('status', 'sakit')->count();
        $leaveToday = $todayAttendances->where('status', 'izin')->count();
        $alphaToday = $todayAttendances->where('status', 'alpha')->count();

        $onTimeToday = $todayAttendances->filter(function ($att) use ($workStartTime) {
            return $att->time_in && $att->time_in <= $workStartTime;
        })->count();
        
        $onTimePercentage = $todayAttendances->count() > 0 
            ? round(($onTimeToday / $todayAttendances->count()) * 100, 2) 
            : 0;

        $monthAttendances = Attendance::whereMonth('date', Carbon::now()->month)
            ->whereYear('date', Carbon::now()->year)
            ->get();

        $monthOnTime = $monthAttendances->filter(function ($att) use ($workStartTime) {
            return $att->time_in && $att->time_in <= $workStartTime;
        })->count();

        $monthOnTimePercentage = $monthAttendances->count() > 0
            ? round(($monthOnTime / $monthAttendances->count()) * 100, 2)
            : 0;

        $latestEmployees = $monthAttendances
            ->filter(function ($att) use ($workStartTime) {
                return $att->time_in && $att->time_in > $workStartTime;
            })
            ->sortByDesc(function ($att) use ($workStartTime) {
                return strtotime($att->time_in) - strtotime($workStartTime);
            })
            ->take(5);

        return view('admin.dashboard', [
            'totalEmployees' => $totalEmployees,
            'presentToday' => $presentToday,
            'sickToday' => $sickToday,
            'leaveToday' => $leaveToday,
            'alphaToday' => $alphaToday,
            'onTimePercentage' => $onTimePercentage,
            'monthOnTimePercentage' => $monthOnTimePercentage,
            'latestEmployees' => $latestEmployees,
            'recentAttendances' => $todayAttendances->take(10),
        ]);
    }
}
