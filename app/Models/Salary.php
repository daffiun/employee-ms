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
        'bonus',
        'deduction',
        'total_salary',
    ];

    protected $casts = [
        'base_salary' => 'decimal:2',
        'allowance' => 'decimal:2',
        'bonus' => 'decimal:2',
        'deduction' => 'decimal:2',
        'total_salary' => 'decimal:2',
    ];

    public function employee() {
        return $this->belongsTo(Employee::class);
    }
}
