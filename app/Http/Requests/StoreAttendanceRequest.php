<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAttendanceRequest extends FormRequest
{
   public function authorize(): bool
   {
      return true;
   }
   public function rules(): array
   {
      return [
         'status' => 'required|in:hadir,sakit,izin,alpha',
      ];
   }
   public function messages(): array
   {
      return [
         'status.required' => 'Status absensi harus dipilih',
         'status.in' => 'Status tidak valid',
      ];
   }
}
