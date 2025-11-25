<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ManagerHistory extends Model
{
    //
    protected $table = 'manager_histories';
    protected $fillable = [
        'manager_id',
        'department_id',
        'start_date',
        'end_date',
    ];
    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    public function manager() {
        return $this->belongsTo(Employee::class, 'manager_id');
    }
    public function department() {
        return $this->belongsTo(Department::class);
    }
}
