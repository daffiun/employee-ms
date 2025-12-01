<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Employee;
use App\Models\Position;

class StoreDepartmentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // middleware auth & role sudah di route
    }

    public function rules(): array
    {
        return [
            'name' => 'required|unique:departments,name,' . $this->department,
            'code' => 'nullable|unique:departments,code,' . $this->department,
            'manager_id' => [
                'nullable',
                'exists:employees,id',
                function ($attribute, $value, $fail) {
                    if ($value) {
                        $employee = Employee::find($value);
                        if (!$employee) {
                            $fail("Employee tidak ditemukan.");
                        } elseif ($employee->position_id != Position::KEPALA_BAGIAN) {
                            $fail("Employee harus memiliki posisi Kepala Bagian.");
                        }

                        $exists = Employee::where('department_id', $this->department)
                            ->where('position_id', Position::KEPALA_BAGIAN)
                            ->where('id', '!=', $value)
                            ->exists();
                        if ($exists) {
                            $fail("Departemen ini sudah memiliki Kepala Bagian.");
                        }
                    }
                },
            ],
        ];
    }
}
