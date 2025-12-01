<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use App\Models\Position;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDepartmentRequest;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Department::with(['currentManager', 'employees'])
        ->get()
        ->map(function ($dept) {
            $dept->total_employees = $dept->employees->count();
            return $dept;
        });

        return view('admin.departments.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = Employee::where('position_id', Position::KEPALA_BAGIAN)->get();
        return view('admin.departments.create', compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDepartmentRequest $request)
    {
        $department = Department::create($request->validated());

        return redirect()->route('admin.departments.index')
            ->with('success', 'Department berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        $department->load('manager', 'employees');
        return view('admin.departments.show', compact('department'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
    {
        //
        $employees = Employee::where('position_id', Position::KEPALA_BAGIAN)
            ->orWhere('id', $department->manager_id)
            ->get();

        return view('admin.departments.edit', compact('department', 'employees'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreDepartmentRequest $request, Department $department)
    {
        $department->update($request->validated());

        return redirect()->route('admin.departments.index')
            ->with('success', 'Department berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        //
        $department->delete();
        return redirect()->route('admin.departments.index')
            ->with('success', 'Department berhasil dihapus');
    }
}
