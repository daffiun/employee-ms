<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Department;
use App\Models\Position;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $employees = Employee::with(['department', 'position', 'manager'])->paginate(10);
        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('employees.create', [
            'departments' => Department::all(),
            'positions'   => Position::all(),
            'managers'    => Employee::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'full_name'     => 'required',
            'email'         => 'required|email|unique:employees',
            'phone'         => 'nullable',
            'department_id' => 'required',
            'position_id'   => 'required',
            'manager_id'    => 'nullable',
            'join_date'     => 'required|date'
        ]);

        Employee::create($validated);

        return redirect()->route('employees.index')->with('success', 'Karyawan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
        $employee->load(['department', 'position', 'manager', 'subordinates']);
        return view('employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        //
        return view('employees.edit', [
            'employee'    => $employee,
            'departments' => Department::all(),
            'positions'   => Position::all(),
            'managers'    => Employee::where('id', '!=', $employee->id)->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        //
        $validated = $request->validate([
            'full_name'     => 'required',
            'email'         => 'required|email|unique:employees,email,' . $employee->id,
            'phone'         => 'nullable',
            'department_id' => 'required',
            'position_id'   => 'required',
            'manager_id'    => 'nullable',
            'join_date'     => 'required|date'
        ]);

        $employee->update($validated);

        return redirect()->route('employees.index')->with('success', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        //
        $employee->delete();
        return back()->with('success', 'Karyawan dihapus');
    }
}
