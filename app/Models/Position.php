<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Position extends Model
{
    //
    use HasFactory;
    
    protected $fillable = ['name', 'default_base_salary', 'default_allowance'];

    protected $casts = [
        'default_base_salary' => 'decimal:2',
        'default_allowance' => 'decimal:2',
    ];

    public function employees(){
        return $this->hasMany(Employee::class);
    }
}
