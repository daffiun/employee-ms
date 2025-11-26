<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDepartmentRequest;
use App\Models\Department;

class DepartmentController extends Controller
{
    // Daftar departemen
    public function index()
    {
        $departments = Department::paginate(15);
        return view('admin.departments.index', ['departments' => $departments]);
    }

    // Form tambah departemen
    public function create()
    {
        return view('admin.departments.create');
    }

    // Simpan departemen baru
    public function store(StoreDepartmentRequest $request)
    {
        Department::create($request->validated());
        return redirect()->route('admin.departments.index')->with('success', 'Departemen berhasil ditambahkan');
    }

    // Form edit departemen
    public function edit(Department $department)
    {
        return view('admin.departments.edit', ['department' => $department]);
    }

    // Update departemen
    public function update(StoreDepartmentRequest $request, Department $department)
    {
        $department->update($request->validated());
        return redirect()->route('admin.departments.index')->with('success', 'Departemen berhasil diubah');
    }

    // Hapus departemen
    public function destroy(Department $department)
    {
        $department->delete();
        return redirect()->route('admin.departments.index')->with('success', 'Departemen berhasil dihapus');
    }
}
