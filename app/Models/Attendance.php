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

    protected $casts = [
        'date' => 'date',
        'time_in' => 'datetime:H:i:s',
        'time_out' => 'datetime:H:i:s',
    ];

    public function employee() {
        return $this->belongTo(Employee::class);
    }
}
