<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Approver;

class PeminjamanRuangan extends Model
{
    use HasFactory;

    protected $table = "peminjaman_ruangan";

    protected $fillable = [
        'nama_karyawan',
        'tanggal_pengajuan',
        'tanggal_diperlukan',
        'waktu_pelaksanaan',
        'unit',
        'departemen',
        'nama_kegiatan',
        'tempat_kegiatan',
        'ruangan',
        'jumlah',
        'keterangan',
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

    // Casting 'ruangan', 'jumlah', dan 'keterangan' ke format array
    protected $casts = [
        'ruangan' => 'array',
        'jumlah' => 'array',
        'keterangan' => 'array',
        'approved_at' => 'datetime',
        'rejected_at' => 'datetime',
        'approval_history' => 'array',
    ];

    public function approver()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    public function rejector()
    {
        return $this->belongsTo(User::class, 'rejected_by');
    }

    /**
     * Get approvers for current level
     */
    public function getCurrentApprovers()
    {
        return Approver::where('module', 'peminjaman-ruangan')
            ->where('department_type', $this->department_type ?? 'non-akademik')
            ->where('approval_level', $this->current_approval_level)
            ->where('active', true)
            ->with('user')
            ->get();
    }

    /**
     * Check if current user can approve at current level
     */
    public function canBeApprovedBy($user)
    {
        if ($this->status !== 'pending') {
            return false;
        }

        return Approver::where('module', 'peminjaman-ruangan')
            ->where('department_type', $this->department_type ?? 'non-akademik')
            ->where('approval_level', $this->current_approval_level)
            ->where('user_id', $user->id)
            ->where('active', true)
            ->exists();
    }

    /**
     * Get next approval level
     */
    public function getNextApprovalLevel()
    {
        return Approver::where('module', 'peminjaman-ruangan')
            ->where('department_type', $this->department_type ?? 'non-akademik')
            ->where('approval_level', '>', $this->current_approval_level)
            ->where('active', true)
            ->min('approval_level');
    }

    /**
     * Check if this is the final approval level
     */
    public function isFinalApprovalLevel()
    {
        return $this->getNextApprovalLevel() === null;
    }

    /**
     * Approve the request
     */
    public function approve($approverId, $remarks = null)
    {
        $history = $this->approval_history ?? [];
        $history[] = [
            'level' => $this->current_approval_level,
            'user_id' => $approverId,
            'user_name' => User::find($approverId)->name,
            'action' => 'approved',
            'remarks' => $remarks,
            'timestamp' => now()->toISOString()
        ];

        if ($this->isFinalApprovalLevel()) {
            $this->update([
                'status' => 'approved',
                'final_status' => 'approved',
                'approved_by' => $approverId,
                'approved_at' => now(),
                'approval_history' => $history
            ]);
        } else {
            $nextLevel = $this->getNextApprovalLevel();
            $this->update([
                'current_approval_level' => $nextLevel,
                'approval_history' => $history
            ]);
        }
    }

    /**
     * Reject the request
     */
    public function reject($rejecterId, $message)
    {
        $history = $this->approval_history ?? [];
        $history[] = [
            'level' => $this->current_approval_level,
            'user_id' => $rejecterId,
            'user_name' => User::find($rejecterId)->name,
            'action' => 'rejected',
            'remarks' => $message,
            'timestamp' => now()->toISOString()
        ];

        $this->update([
            'status' => 'rejected',
            'final_status' => 'rejected',
            'rejected_by' => $rejecterId,
            'rejected_at' => now(),
            'rejected_message' => $message,
            'approval_history' => $history
        ]);
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
     * Get approval timeline
     */
    public function getApprovalTimeline()
    {
        $timeline = [];
        $history = $this->approval_history ?? [];
        
        foreach ($history as $item) {
            $timeline[] = [
                'level' => $item['level'],
                'user_name' => $item['user_name'],
                'action' => $item['action'],
                'remarks' => $item['remarks'] ?? null,
                'date' => $item['timestamp']
            ];
        }
        
        return $timeline;
    }
}
