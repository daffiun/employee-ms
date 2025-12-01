<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Position extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'default_base_salary', 
        'default_allowance'
    ];

    protected $casts = [
        'default_base_salary' => 'decimal:2',
        'default_allowance' => 'decimal:2',
    ];

    /**
     * RELATIONSHIP
     */
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    /**
     * CONSTANTS UNTUK POSISI KHUSUS
     */
    const KEPALA_BAGIAN = 1; // contoh ID di table positions
    const MANAGER = 2;
    const STAFF = 3;

    /**
     * SCOPE UNTUK FILTER POSISI
     */
    public function scopeHead($query)
    {
        return $query->where('id', self::KEPALA_BAGIAN);
    }

    public function scopeManager($query)
    {
        return $query->where('id', self::MANAGER);
    }

    public function scopeStaff($query)
    {
        return $query->where('id', self::STAFF);
    }
}
