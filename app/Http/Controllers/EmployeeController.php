<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeRequest;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Position;
use App\Models\User;

class EmployeeController extends Controller
{
    // Daftar karyawan
    public function index()
    {
        $employees = Employee::with('department', 'position')
            ->paginate(15);
        return view('admin.employees.index', ['employees' => $employees]);
    }

    // Form tambah karyawan
    public function create()
    {
        $departments = Department::all();
        $positions = Position::all();
        $managers = Employee::where('status', 'aktif')->get();
        
        return view('admin.employees.create', [
            'departments' => $departments,
            'positions' => $positions,
            'managers' => $managers,
        ]);
    }

    // Simpan karyawan baru
    public function store(StoreEmployeeRequest $request)
    {
        $employee = Employee::create($request->validated());

        // Buat user account jika diminta
        if ($request->has('create_user')) {
            User::create([
                'name' => $request->full_name,
                'email' => $request->email,
                'password' => bcrypt('password123'),
                'employee_id' => $employee->id,
                'role' => 'employee',
            ]);
        }

        return redirect()->route('admin.employees.index')->with('success', 'Karyawan berhasil ditambahkan');
    }

    // Form edit karyawan
    public function edit(Employee $employee)
    {
        $departments = Department::all();
        $positions = Position::all();
        $managers = Employee::where('status', 'aktif')->where('id', '!=', $employee->id)->get();
        
        return view('admin.employees.edit', [
            'employee' => $employee,
            'departments' => $departments,
            'positions' => $positions,
            'managers' => $managers,
        ]);
    }

    // Update karyawan
    public function update(StoreEmployeeRequest $request, Employee $employee)
    {
        $employee->update($request->validated());
        return redirect()->route('admin.employees.index')->with('success', 'Karyawan berhasil diubah');
    }

    // Hapus karyawan
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('admin.employees.index')->with('success', 'Karyawan berhasil dihapus');
    }
}
