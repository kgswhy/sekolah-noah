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

    public function salarySlips()
    {
        return $this->hasMany(SalarySlip::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getLatestSalarySlip()
    {
        return $this->salarySlips()->latest('date')->first();
    }

    public function getUnpaidSalarySlips()
    {
        return $this->salarySlips()->where('status', 'unpaid')->get();
    }
}
