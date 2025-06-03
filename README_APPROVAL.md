# 🚀 Multilevel Approval System - Quick Guide

## 📋 Overview
Sistem persetujuan bertingkat untuk semua modul aplikasi sekolah-noah.

**Status:** ✅ **IMPLEMENTED** - Ready for Controller/View Integration

---

## 🎯 Quick Usage

### For Models
```php
// Check if user can approve
if ($request->canBeApprovedBy($user)) {
    // Show approve button
}

// Process approval
$request->approve($user->id, $remarks);

// Process rejection  
$request->reject($user->id, $message);

// Get status
echo $request->getApprovalStatusText();
```

### For Controllers
```php
public function approve(Request $request, $id)
{
    $application = ModelName::findOrFail($id);
    
    if (!$application->canBeApprovedBy(auth()->user())) {
        return back()->with('error', 'Unauthorized');
    }
    
    $application->approve(auth()->id(), $request->remarks);
    
    return back()->with('success', 'Application approved');
}
```

### For Views
```blade
@if($application->canBeApprovedBy(auth()->user()))
    <button class="btn btn-success" onclick="approve({{ $application->id }})">
        Approve
    </button>
    <button class="btn btn-danger" onclick="reject({{ $application->id }})">
        Reject  
    </button>
@endif

<span class="badge">{{ $application->getApprovalStatusText() }}</span>
```

---

## 📊 Approval Flow

```
Request Submitted (Level 1) 
    ↓
Koordinator Approval (Level 1)
    ↓
Manager Approval (Level 2)  
    ↓
Direktur Approval (Level 3)
    ↓
APPROVED ✅
```

---

## 🔧 Modules Available

| Module | Controller | Model |
|--------|------------|-------|
| Lembur Honor | `LemburHonorController` | `LemburHonor` |
| Surat Tugas | `SuratTugasController` | `SuratTugas` |
| Perbaikan Barang | `FixingRequestController` | `FixingRequest` |
| Peminjaman Barang | `EquipmentLoanController` | `EquipmentLoan` |
| Peminjaman Ruangan | `PeminjamanRuanganController` | `PeminjamanRuangan` |
| Permintaan Design | `PermintaanDesignController` | `PermintaanDesign` |
| Kurir/Mobil | `OperationalRequestController` | `OperationalRequest` |

---

## 🛠️ Implementation Checklist

### Controllers ❌ (Pending)
- [ ] Add `approve()` method
- [ ] Add `reject()` method  
- [ ] Update `index()` with approval filters
- [ ] Add middleware for approvers

### Views ❌ (Pending)
- [ ] Add approval buttons
- [ ] Add status badges
- [ ] Add approval history
- [ ] Add permission checks

### Routes ❌ (Pending)
- [ ] Add approval routes
- [ ] Add rejection routes
- [ ] Group with middleware

---

## 📚 Quick Reference

### Available Methods
```php
$model->getCurrentApprovers()      // Get current level approvers
$model->canBeApprovedBy($user)     // Check permission
$model->approve($userId, $remarks) // Approve request
$model->reject($userId, $message)  // Reject request
$model->getApprovalStatusText()    // Get status text
$model->getApprovalTimeline()      // Get history
```

### Database Tables
- `approvers` - Configuration table (44 records)
- All module tables have approval fields added

### Settings
- Approvers managed via `/setting/approval`
- 3 levels per module
- Department type: `non-akademik`

---

**Next:** Start with Controller updates, then Views, then Routes. 