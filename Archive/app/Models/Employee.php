<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $guarded = ['id'];
    
    public function salaryComponents()
    {
        return $this->hasMany(SalaryComponent::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
