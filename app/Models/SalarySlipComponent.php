<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalarySlipComponent extends Model
{
    use HasFactory;

    protected $table = 'payroll_components';

    protected $fillable = [
        'payroll_id',
        'title',
        'description',
        'amount'
    ];

    protected $casts = [
        'amount' => 'decimal:2'
    ];

    public function salarySlip()
    {
        return $this->belongsTo(SalarySlip::class, 'payroll_id');
    }

    public function employee()
    {
        return $this->hasOneThrough(Employee::class, SalarySlip::class, 'id', 'id', 'payroll_id', 'employee_id');
    }
}
