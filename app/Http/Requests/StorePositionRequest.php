<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePositionRequest extends FormRequest
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
            'name' => 'required|string|max:255|unique:positions',
            'default_base_salary' => 'required|numeric|min:0',
            'default_allowance' => 'required|numeric|min:0',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Nama posisi harus diisi',
            'name.unique' => 'Nama posisi sudah terdaftar',
            'default_base_salary.required' => 'Gaji pokok default harus diisi',
            'default_allowance.required' => 'Tunjangan default harus diisi',
        ];
    }
}
