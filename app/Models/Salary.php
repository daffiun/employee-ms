<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Salary extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'month',
        'base_salary',
        'allowance',
        'bonus',
        'deduction',
        'total_salary'
    ];

    protected $casts = [
        'month' => 'string',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function scopeForMonth($q, $month)
    {
        return $q->where('month', $month);
    }
}
