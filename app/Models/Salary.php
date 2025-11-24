<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    //
    protected $fillable = [
        'employee_id',
        'month',
        'base_salary',
        'allowance',
        'deduction',
        'total_salary',
    ];

    public function employee() {
        return $this->belongsTo(Employee::class);
    }
}
