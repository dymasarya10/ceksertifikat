<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['s'] ?? false, function ($query, $s) {
            return $query->where('identity_number', 'like', '%' . $s . '%');
        });
    }
}
