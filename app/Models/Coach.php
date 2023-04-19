<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Coach extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'password',
        'photo',
        'country',
        'phone',
        'specialization',
        'experience',
        'story',
    ];

    public function scopeFilter($query, array $filters)
    {
        if ($filters['search'] ?? false) {
            $query->where('name', 'like', '%' . request('search') . '%')
                ->orWhere('specialization', 'like', '%' . request('search') . '%')
                ->orWhere('experience', 'like', '%' . request('search') . '%');
        }
    }


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
