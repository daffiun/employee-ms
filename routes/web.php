<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\PositionController;

Route::get('/', function () {
    return view('welcome');
});
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function(){
        return view('admin.dashboard');
    })->name('dashboard');
    // buat crud
    Route::resource('employees', EmployeeController::class);
    Route::resource('departments', DepartmentController::class);
    Route::resource('positions', PositionController::class);
});

Route::middleware(['auth', 'role:employee'])
    ->get('/dashboard', function () {
        return view('employees.dashboard');
    })->name('employees.dashboard');

require __DIR__.'/auth.php';
