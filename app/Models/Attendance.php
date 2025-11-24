<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    //
    protected $fillable = [
        'employee_id',
        'date',
        'time_in',
        'time_out',
        'status'
    ];

    public function employee() {
        return $this->belongTo(Employee::class);
    }
}
