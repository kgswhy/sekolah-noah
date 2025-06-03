<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KlaimBerobat extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'employee_id',
        'tanggal_berobat',
        'nama_pasien',
        'hubungan',
        'diagnosa',
        'nama_dokter',
        'nama_rs',
        'biaya',
        'bukti_pembayaran',
        'status',
        'current_approval_level',
        'department_type',
        'final_status',
        'approval_history',
        'approved_by',
        'approved_at',
        'rejected_message',
        'rejected_by',
        'rejected_at',
    ];
    
    protected $casts = [
        'tanggal_berobat' => 'date',
        'biaya' => 'decimal:2',
        'approved_at' => 'datetime',
        'rejected_at' => 'datetime',
        'approval_history' => 'array'
    ];
    
    /**
     * Get the employee that owns the medical claim request.
     */
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    /**
     * Get the user who approved this request.
     */
    public function approvedBy()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    /**
     * Get the user who rejected this request.
     */
    public function rejectedBy()
    {
        return $this->belongsTo(User::class, 'rejected_by');
    }

    /**
     * Check if the request is approved.
     */
    public function isApproved()
    {
        return $this->status === 'approved';
    }

    /**
     * Check if the request is rejected.
     */
    public function isRejected()
    {
        return $this->status === 'rejected';
    }

    /**
     * Check if the request is pending.
     */
    public function isPending()
    {
        return $this->status === 'pending';
    }

    /**
     * Check if the user can approve this request.
     */
    public function canBeApprovedBy(User $user)
    {
        $approver = Approver::where('user_id', $user->id)
            ->where('module', 'klaim-berobat')
            ->where('department_type', $this->department_type)
            ->where('approval_level', $this->current_approval_level)
            ->where('active', true)
            ->first();

        return $approver !== null;
    }

    /**
     * Get the next approval level.
     */
    public function getNextApprovalLevel(): ?int
    {
        $maxLevel = Approver::where('module', 'klaim-berobat')
            ->where('department_type', $this->department_type)
            ->where('active', true)
            ->max('approval_level');

        return $this->current_approval_level < $maxLevel ? $this->current_approval_level + 1 : null;
    }

    /**
     * Check if this is the final approval level.
     */
    public function isFinalApproval(): bool
    {
        $maxLevel = Approver::where('module', 'klaim-berobat')
            ->where('department_type', $this->department_type)
            ->where('active', true)
            ->max('approval_level');

        return $this->current_approval_level >= $maxLevel;
    }

    /**
     * Add approval history entry.
     */
    public function addApprovalHistory($status, $notes = null): void
    {
        $history = $this->approval_history ?? [];
        $history[] = [
            'level' => $this->current_approval_level,
            'status' => $status,
            'approver_name' => auth()->user()->name,
            'timestamp' => now()->format('Y-m-d H:i:s'),
            'notes' => $notes
        ];
        $this->approval_history = $history;
        $this->save();
    }
} 