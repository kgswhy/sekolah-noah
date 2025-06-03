# 🧪 Multilevel Approval System - Testing Guide

## 📊 Current Status
**Status:** ✅ **CONTROLLERS & ROUTES UPDATED** - Ready for Testing!

---

## 🎯 Development Progress

### ✅ Completed Components

#### 1. **Models** (Already implemented)
- ✅ All models have approval methods (`approve()`, `reject()`, `canBeApprovedBy()`)
- ✅ Approval history tracking
- ✅ Multilevel approval progression
- ✅ Department type filtering

#### 2. **Controllers** (Just Updated)
- ✅ `PermintaanDesignController` - Added approve/reject methods
- ✅ `OperationalRequestController` - Added approve/reject methods  
- ✅ All other controllers already had approval methods
- ✅ Permission checking implemented
- ✅ Proper error handling

#### 3. **Routes** (Just Updated)
- ✅ `permintaan-design` approval routes added
- ✅ `operasional` approval routes added
- ✅ All other modules already had approval routes

#### 4. **Database** (Already configured)
- ✅ 44 approvers configured across modules
- ✅ 3-level approval hierarchy
- ✅ Department type separation (akademik/non-akademik)

---

## 📋 Testing Data

### Available Pending Applications
```
✅ Cuti: 19 pending applications
✅ Request ATK: 5 pending applications  
✅ Permintaan Design: 1 pending application
✅ Total: 25+ pending applications ready for testing
```

### Test Approvers Setup
```
Level 1: Lidya Keisha Halimah (User ID: 4)
Level 2: Approval 1 (User ID: 7)  
Level 3: Approval 2 (User ID: 8)
Final: Yudha (User ID: 1) - Admin
```

---

## 🔧 Testing Scenarios

### Scenario 1: Single Level Approval
```php
// Test with a Level 1 approver
1. Login as Level 1 approver (User ID: 4)
2. Navigate to any module with pending applications
3. Click "Approve" on a pending request
4. Verify status progression
```

### Scenario 2: Multi-Level Approval
```php
// Test full 3-level approval flow
1. Login as Level 1 approver → Approve → Should progress to Level 2
2. Login as Level 2 approver → Approve → Should progress to Level 3  
3. Login as Level 3 approver → Approve → Should mark as final approved
```

### Scenario 3: Rejection at Any Level
```php
// Test rejection functionality
1. Login as any level approver
2. Click "Reject" and provide reason
3. Verify application is marked as rejected
4. Check rejection message is saved
```

### Scenario 4: Permission Validation
```php
// Test unauthorized access
1. Login as regular user (non-approver)
2. Try to access approval actions
3. Should receive "unauthorized" error
```

---

## 🌐 Testing URLs

### Main Modules to Test
```
📋 Cuti (Leave): /cuti
📋 Request ATK: /administrasi/request-atk  
📋 Fotocopy: /administrasi/request-fotocopy
📋 Brief Absen: /brief-absen
📋 Klaim Berobat: /klaim-berobat
📋 Lembur Honor: /lembur-honor
📋 Surat Tugas: /surat-tugas
📋 Fixing Request: /it/fixing-request
📋 Equipment Loan: /it/equipment-loan
📋 Permintaan Design: /permintaan-design
📋 Operasional: /operasional/kurir-mobil
```

### Approval Actions to Test
```
POST /{module}/{id}/approve - Approve application
POST /{module}/{id}/reject - Reject application (requires reason)
```

---

## 🎮 Test Cases

### Case 1: Approve Cuti Request
```bash
# API Test
curl -X POST http://localhost:8000/cuti/1/approve \
  -H "Content-Type: application/json" \
  -H "Authorization: Bearer {token}"
```

### Case 2: Reject with Reason
```bash
# API Test  
curl -X POST http://localhost:8000/cuti/1/reject \
  -H "Content-Type: application/json" \
  -H "Authorization: Bearer {token}" \
  -d '{"rejected_message": "Insufficient documentation provided"}'
```

### Case 3: Check Approval Status
```bash
# Check current status
curl -X GET http://localhost:8000/cuti/1 \
  -H "Authorization: Bearer {token}"
```

---

## 📊 Expected Behaviors

### Approval Flow
```
Request Created (Level 1) 
    ↓ [Approve by Level 1]
Level 2 Approval Required
    ↓ [Approve by Level 2]  
Level 3 Approval Required
    ↓ [Approve by Level 3]
APPROVED ✅ (Final Status)
```

### Rejection Flow
```
Request at Any Level
    ↓ [Reject with reason]
REJECTED ❌ (Final Status)
```

### Permission Flow
```
User Action → Check canBeApprovedBy() → Allow/Deny
```

---

## 🔍 Validation Checklist

### ✅ Controller Methods
- [ ] `approve()` method works correctly
- [ ] `reject()` method works correctly  
- [ ] Permission checking prevents unauthorized access
- [ ] Proper error messages displayed
- [ ] Redirect after action works

### ✅ Model Logic
- [ ] `canBeApprovedBy()` returns correct permission
- [ ] `approve()` progresses to next level correctly
- [ ] `reject()` marks as final rejected
- [ ] Approval history is tracked
- [ ] Status text displays correctly

### ✅ Database Updates
- [ ] `current_approval_level` increments correctly
- [ ] `status` changes appropriately
- [ ] `approval_history` JSON is populated
- [ ] Timestamps are recorded
- [ ] Final status is set correctly

### ✅ Routes & UI
- [ ] Approval buttons appear for authorized users
- [ ] Approval routes are accessible
- [ ] POST requests work correctly
- [ ] Form validation works (for rejection reason)
- [ ] Success/error messages display

---

## 🚨 Known Issues & Fixes

### Issue 1: Missing User Relations
**Problem:** Some models don't have proper user relationships  
**Fix:** Update models to include user relations where needed

### Issue 2: Column Mismatches  
**Problem:** Some tables have different column names than expected
**Fix:** Use actual column names from table structure

### Issue 3: Permission Conflicts
**Problem:** Admin vs Approver permission conflicts
**Fix:** Clarify permission hierarchy in User model

---

## 🎯 Next Development Steps

### Phase 1: UI Enhancement ⏳
- [ ] Add approval buttons to all module views
- [ ] Add status badges and indicators
- [ ] Add approval history timeline
- [ ] Add permission-based button visibility

### Phase 2: Notifications 📧
- [ ] Email notifications for pending approvals
- [ ] In-app notification system
- [ ] SMS alerts for urgent requests
- [ ] Dashboard notification counter

### Phase 3: Reporting 📈
- [ ] Approval analytics dashboard
- [ ] Performance metrics (approval time)
- [ ] Bottleneck identification
- [ ] User activity reports

### Phase 4: Advanced Features 🚀
- [ ] Bulk approval actions
- [ ] Conditional approval rules
- [ ] Auto-approval for certain criteria
- [ ] Integration with external systems

---

## 📞 Support & Documentation

### Quick Commands
```bash
# Check approval setup
php artisan tinker --execute="dd(App\Models\Approver::count());"

# Test user permissions  
php artisan tinker --execute="dd(App\Models\User::find(4)->isApproverFor('cuti', 1, 'non-akademik'));"

# Check pending applications
php artisan tinker --execute="dd(App\Models\Cuti::where('status', 'pending')->count());"
```

### Useful Database Queries
```sql
-- Check approver configuration
SELECT module, approval_level, department_type, COUNT(*) as approver_count 
FROM approvers WHERE active = 1 
GROUP BY module, approval_level, department_type;

-- Check pending applications by module
SELECT 'cuti' as module, COUNT(*) as pending FROM cutis WHERE status = 'pending'
UNION ALL  
SELECT 'request_atk', COUNT(*) FROM request_atk WHERE status = 'pending'
UNION ALL
SELECT 'permintaan_design', COUNT(*) FROM permintaan_designs WHERE status = 'pending';
```

---

**Status:** 🎉 **READY FOR FULL TESTING!**  
**Last Updated:** 2025-06-03 15:48:00 