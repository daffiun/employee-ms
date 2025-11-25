<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees',
            'phone' => 'required|string',
            'birthdate' => 'required|date',
            'address' => 'required|string',
            'join_date' => 'required|date',
            'department_id' => 'required|exists:departments,id',
            'position_id' => 'required|exists:positions,id',
            'manager_id' => 'nullable|exists:employees,id',
            'status' => 'required|in:aktif,tidak aktif',
        ];
    }
    public function messages(): array
    {
        return [
            'full_name.required' => 'Nama lengkap harus diisi',
            'email.required' => 'Email harus diisi',
            'email.unique' => 'Email sudah terdaftar',
            'phone.required' => 'Nomor telepon harus diisi',
            'birthdate.required' => 'Tanggal lahir harus diisi',
            'address.required' => 'Alamat harus diisi',
            'join_date.required' => 'Tanggal bergabung harus diisi',
            'department_id.required' => 'Departemen harus dipilih',
            'position_id.required' => 'Posisi harus dipilih',
        ];
    }
}
