<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    //
    protected $fillable = ['name', 'default_base_salary', 'default_allowance'];

    protected $casts = [
        'default_base_salary' => 'decimal:2',
        'default_allowance' => 'decimal:2',
    ];

    public function employees(){
        return $this->hasMany(Employee::class);
    }
}
