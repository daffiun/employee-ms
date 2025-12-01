<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Department extends Model
{
    //
    use HasFactory;
    
    protected $fillable = ['name', 'code', 'description', 'active',];

    public function employees() {
        return $this->hasMany(Employee::class);
    }

    public function currentManager(){
        return $this->hasOne(ManagerHistory::class)->whereNull('end_date');
    }

    public function managerHistory() {
        return $this->hasMany(ManagerHistory::class);
    }

    public function scopeActive($query) {
        return $query->where('active', true);
    }
}
