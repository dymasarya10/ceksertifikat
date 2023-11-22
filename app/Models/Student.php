<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name'
    ];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['s'] ?? false, function ($query, $s) {
            return $query->where('name', 'like', '%' . $s . '%');
        });
    }

    public function charters()
    {
        return $this->hasMany(Charter::class);
    }
}
