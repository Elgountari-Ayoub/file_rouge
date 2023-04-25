<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $fillable = [
        'coach_id',
        'client_id',
        'start_time',
        'end_time',
        'status',
    ];

    public function coach()
    {
        return $this->belongsTo(Coach::class);
    }
}
