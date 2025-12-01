<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    //
    use HasFactory;
    protected $fillable = [
        'full_name',
        'email',
        'phone',
        'birthdate',
        'address',
        'join_date',
        'employment_type',
        'department_id',
        'position_id',
        'manager_id',
        'overtime_rate',
        'late_penalty_rate',
        'status',        
    ];

    protected $casts = [
        'birthdate' => 'date',
        'join_date' => 'date',
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
        return $this->hasMany(ManagerHistory::class, 'manager_id');
    }

    public function allSubordinates()
    {
        return $this->subordinates()->with('allSubordinates');
    }

    public function allManagers()
    {
        return $this->manager()->with('allManagers');
    }

    public function getCurrentSalaryAttribute()
    {
        $month = now()->format('Y-m');

        return $this->salaries()
            ->where('month', $month)
            ->first();
    }

    public function getFullPositionAttribute()
    {
        return $this->position->name . ' - ' . $this->department->name;
    }

    public function scopeActive($q)
    {
        return $q->where('status', 'aktif');
    }

    public function scopeWithPositionSalary($q)
    {
        return $q->with('position:id,default_base_salary,default_allowance');
    }
}
