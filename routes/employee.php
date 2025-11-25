<?php
   use App\Http\Controller\EmployeeDashboardController;
   use App\Http\Controller\AttendanceController;
   use App\Http\Controller\SalaryController;
   use App\Http\Controller\ReportController;
   use Illuminate\Support\Facades\Route;

   Route::middleware(['auth', 'role:employee'])->group(function () {
      Route::get('/dashboard', [EmployeeDasboardController::class. 'index'])->name('employee.dashboard');

      // Attendance
      Route::get('/attendance', [AttendanceController::class, 'index'])->name('attendance.index');

      Route::post('/attendance/check-in', [AttendanceController::class, 'checkIn'])->name('attendance.checkin');

      Route::post('/attendance/check-out', [AttendanceController::class, 'checkOut'])->name('attendance.checkout');

      Route::post('/attendance/mark', [AttendanceController::class, 'mark'])->name('attendance.mark');

      // Salary
      Route::get('/salary', [SalaryController::class, 'show'])->name('salary.show');

      // Personal Report
      Route::get('/reports', [ReportController::class, 'personal'])->name('reports.personal');

      Route::get('/reports/export', [ReportController::class, 'export'])->name('reports.export');
   });
?>