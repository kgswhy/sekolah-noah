<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PengajuanFotocopy extends Model
{
    use HasFactory;

    protected $table = 'pengajuan_fotocopy';

    protected $fillable = [
        'employee_id',
        'nama_lengkap',
        'nomor_induk_karyawan',
        'unit',
        'divisi',
        'status_karyawan',
        'jabatan',
        'kegiatan',
        'subject',
        'kelas',
        'tanggal_penggunaan',
        'nama_barang',
        'jumlah_halaman',
        'jumlah_diperlukan',
        'keterangan',
        'status',
        'current_approval_level',
        'department_type',
        'approved_by',
        'approved_at',
        'rejected_message',
        'rejected_at',
        'rejected_by',
        'final_status',
        'approval_history'
    ];

    protected $casts = [
        'nama_barang' => 'array',
        'jumlah_halaman' => 'array',
        'jumlah_diperlukan' => 'array',
        'keterangan' => 'array',
        'approval_history' => 'array',
        'tanggal_penggunaan' => 'date',
        'approved_at' => 'datetime',
        'rejected_at' => 'datetime'
    ];

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }

    public function approver(): BelongsTo
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    public function rejecter(): BelongsTo
    {
        return $this->belongsTo(User::class, 'rejected_by');
    }

    public function isApproved()
    {
        return $this->status === 'approved';
    }

    public function isRejected()
    {
        return $this->status === 'rejected';
    }

    public function isPending()
    {
        return $this->status === 'pending';
    }

    public function canBeApprovedBy(User $user)
    {
        $approver = Approver::where('user_id', $user->id)
            ->where('module', 'fotocopy')
            ->where('department_type', $this->department_type)
            ->where('approval_level', $this->current_approval_level)
            ->first();

        return $approver !== null;
    }

    public function getNextApprovalLevel(): int
    {
        return $this->current_approval_level + 1;
    }

    public function isFinalApproval(): bool
    {
        $maxLevel = Approver::where('module', 'fotocopy')
            ->where('department_type', $this->department_type)
            ->max('approval_level');

        return $this->current_approval_level >= $maxLevel;
    }

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

    public function getTotalPages(): int
    {
        $total = 0;
        for ($i = 0; $i < count($this->jumlah_halaman); $i++) {
            $total += $this->jumlah_halaman[$i] * $this->jumlah_diperlukan[$i];
        }
        return $total;
    }
}
