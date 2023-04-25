<?php

namespace App\Models;

use App\Models\Coach;
use App\Models\Client;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
