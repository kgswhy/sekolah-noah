<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Approver extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'module',
        'description',
        'active',
        'approval_level',
        'department_type',
    ];

    /**
     * Get the user that is an approver
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Scope a query to only include active approvers.
     */
    public function scopeActive($query)
    {
        return $query->where('active', true);
    }

    /**
     * Scope a query to only include approvers for a specific module.
     */
    public function scopeForModule($query, $module)
    {
        return $query->where('module', $module);
    }
}
