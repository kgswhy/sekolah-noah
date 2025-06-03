<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    protected $fillable = [
        'schedule_id',
        'clock_in',
        'clock_out',
        'status',
        'late',
    ];

    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }
}
