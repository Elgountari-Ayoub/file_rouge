<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'password',
        'photo',
        'gender',
        'height',
        'weight',
        'goal',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
