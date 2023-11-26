<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function scopeFilter($query, array $filters)
    {
        // $query->when($filters['search'] ?? false, function ($query, $search){
        //     return $query->where('id',$search);
        // });

        $query->when(
            $filters['s'] ?? false,
            fn($query, $s) =>
            $query->whereHas(
                'student',
                fn($query) =>
                $query->where('id',$s)
            )
        );
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
