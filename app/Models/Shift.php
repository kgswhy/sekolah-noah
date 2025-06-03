<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    protected $fillable = [
        'title',
        'start_time',
        'end_time'
    ];

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}
