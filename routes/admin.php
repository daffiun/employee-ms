<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SalaryAdminController;
use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {

   // Dashboard
   Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

   // Master Data
   Route::resource('departments', DepartmentController::class);
   Route::resource('positions', PositionController::class);
   Route::resource('employees', EmployeeController::class);
   
   // Payroll
   Route::get('/payroll/generate/{month}', [PayrollController::class, 'generate'])->name('payroll.generate');

   // Salary Management
   Route::resource('salaries', SalaryAdminController::class)->only(['index', 'show', 'edit', 'update']);

   // Admin Reports
   Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
   Route::get('/reports/export', [ReportController::class, 'export'])->name('reports.export');

   // Settings
   Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
   Route::post('/settings', [SettingController::class, 'update'])->name('settings.update');
});
