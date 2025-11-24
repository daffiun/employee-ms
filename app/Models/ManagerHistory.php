<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ManagerHistory extends Model
{
    //
    protected $table = 'manager_hsitory';
    protected $fillable = [
        'employee_id',
        'department_id',
        'start_date',
        'end_date',
    ];

    public function employee() {
        return $this->belongsTo(Employee::class);
    }
    public function department() {
        return $this->belongsTo(Department::class);
    }
}
