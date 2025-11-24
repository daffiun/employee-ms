<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //
    protected $fillable = [
        'full_name',
        'email',
        'phone',
        'birthdate',
        'address',
        'join_date',
        'department_id',
        'position_id',
        'manager_id',
        'status',        
    ];

    public function department() {
        return $this->belongsTo(Department::class);
    }
    public function position() {
        return $this->belongsTo(Position::class);
    }
    public function manager() {
        return $this->belongsTo(Employee::class, 'manager_id');
    }
    public function subordinates(){
        return $this->hasMany(Employee::class, 'manager_id');
    }
    public function attendance() {
        return $this->hasMany(Attendance::class);
    }
    public function salaries() {
        return $this->hasMany(Salary::class);
    }
    public function user() {
        return $this->hasOne(User::class);
    }
    public function managerHistory(){
        return $this->hasMany(ManagerHistory::class);
    }
}
