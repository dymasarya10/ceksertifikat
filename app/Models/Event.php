<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['s'] ?? false, function ($query, $s){
            return $query->where('name','like','%'.$s.'%');
        });
    }

    public function charter()
    {
        return $this->hasOne(Charter::class);
    }
}
