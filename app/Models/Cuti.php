<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuti extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'tanggal_mulai',
        'tanggal_selesai',
        'alasan',
        'keterangan',
        'dokumen',
        'telepon',
        'status',
        'rejected_message',
        'current_approval_level',
        'department_type',
        'final_status',
        'approval_history',
        'approved_by',
        'approved_at',
        'rejected_by',
        'rejected_at',
    ];

    protected $casts = [
        'approval_history' => 'array',
        'tanggal_mulai' => 'date',
        'tanggal_selesai' => 'date',
        'approved_at' => 'datetime',
        'rejected_at' => 'datetime',
    ];

    // Define the relationship with the Employee model
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    // Relationship with approver users
    public function approvedBy()
    {
        return $this->belongsTo(\App\Models\User::class, 'approved_by');
    }

    public function rejectedBy()
    {
        return $this->belongsTo(\App\Models\User::class, 'rejected_by');
    }

    /**
     * Check if the request can be approved by the given user
     */
    public function canBeApprovedBy($user)
    {
        if ($this->status !== 'pending') {
            return false;
        }

        // Admin can approve everything
        if ($user->isAdmin()) {
            return true;
        }

        // Check if user is an approver for this level and department type
        return $user->approvers()
            ->where('module', 'cuti')
            ->where('department_type', $this->department_type ?? 'non-akademik')
            ->where('approval_level', $this->current_approval_level)
            ->where('active', true)
            ->exists();
    }

    /**
     * Get the next approval level
     */
    private function getNextApprovalLevel()
    {
        $maxLevel = \App\Models\Approver::where('module', 'cuti')
            ->where('department_type', $this->department_type ?? 'non-akademik')
            ->where('active', true)
            ->max('approval_level');

        return $this->current_approval_level < $maxLevel ? $this->current_approval_level + 1 : null;
    }

    /**
     * Check if this is the final approval level
     */
    private function isFinalApprovalLevel()
    {
        $maxLevel = \App\Models\Approver::where('module', 'cuti')
            ->where('department_type', $this->department_type ?? 'non-akademik')
            ->where('active', true)
            ->max('approval_level');

        return $this->current_approval_level >= $maxLevel;
    }

    /**
     * Approve the request
     */
    public function approve($approverId, $notes = null)
    {
        $history = $this->approval_history ?? [];
        $history[] = [
            'level' => $this->current_approval_level,
            'status' => 'approved',
            'approver_id' => $approverId,
            'approver_name' => \App\Models\User::find($approverId)->name,
            'notes' => $notes,
            'timestamp' => now()->toDateTimeString(),
        ];

        if ($this->isFinalApprovalLevel()) {
            $this->update([
                'status' => 'approved',
                'final_status' => 'approved',
                'approved_by' => $approverId,
                'approved_at' => now(),
                'approval_history' => $history,
            ]);
        } else {
            $nextLevel = $this->getNextApprovalLevel();
            $this->update([
                'current_approval_level' => $nextLevel,
                'approval_history' => $history,
            ]);
        }
    }

    /**
     * Reject the request
     */
    public function reject($rejectedById, $rejectedMessage)
    {
        $history = $this->approval_history ?? [];
        $history[] = [
            'level' => $this->current_approval_level,
            'status' => 'rejected',
            'approver_id' => $rejectedById,
            'approver_name' => \App\Models\User::find($rejectedById)->name,
            'notes' => $rejectedMessage,
            'timestamp' => now()->toDateTimeString(),
        ];

        $this->update([
            'status' => 'rejected',
            'final_status' => 'rejected',
            'rejected_by' => $rejectedById,
            'rejected_at' => now(),
            'rejected_message' => $rejectedMessage,
            'approval_history' => $history,
        ]);
    }

    /**
     * Get status badge class
     */
    public function getStatusBadgeClass()
    {
        return [
            'pending' => 'badge-warning',
            'approved' => 'badge-success',
            'rejected' => 'badge-danger',
        ][$this->status] ?? 'badge-secondary';
    }

    /**
     * Get approval status text
     */
    public function getApprovalStatusText()
    {
        if ($this->status === 'pending') {
            return "Menunggu persetujuan level {$this->current_approval_level}";
        }
        return ucfirst($this->status);
    }

    /**
     * Get approval history formatted
     */
    public function getFormattedApprovalHistory()
    {
        $history = $this->approval_history ?? [];
        return collect($history)->map(function ($item) {
            return (object) $item;
        });
    }
}
