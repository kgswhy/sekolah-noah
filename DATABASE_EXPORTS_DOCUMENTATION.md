# 📊 Database Exports Documentation - Sekolah Noah

## 📋 Export Summary

**Date Generated:** 2025-06-04  
**Database:** sekolah_noah (MySQL)  
**Total Tables:** 57 tables  
**Export Location:** `database/exports/`

---

## 📁 Available Exports

### **1. Full Database Export** 📦
**File:** `sekolah_noah_full_20250604_075639.sql` (105KB)
- **Contains:** Complete database schema + all data
- **Tables:** All 57 tables
- **Size:** ~1,554 lines
- **Use Case:** Complete backup, production deployment, full restore

### **2. Schema Only Export** 🏗️
**File:** `sekolah_noah_schema_only_20250604_075849.sql` (61KB)
- **Contains:** Database structure only (no data)
- **Tables:** All 57 tables
- **Size:** ~1,165 lines  
- **Use Case:** Setting up new environments, structure analysis

### **3. Data Only Export** 💾
**File:** `sekolah_noah_data_only_20250604_075901.sql` (45KB)
- **Contains:** All data without table structures
- **Tables:** All 57 tables
- **Size:** ~417 lines
- **Use Case:** Data migration, content updates

### **4. Approval System Export** ⚡
**File:** `sekolah_noah_approval_system_20250604_075929.sql` (56KB)
- **Contains:** Approval system tables only (schema + data)
- **Tables:** 16 approval-related tables
- **Size:** ~765 lines
- **Use Case:** Approval system deployment, testing

### **5. Laravel Seeder** 🌱
**File:** `database/seeders/ApprovalSystemSeeder.php`
- **Contains:** Approval configuration as Laravel seeder
- **Purpose:** Recreate approval system configuration
- **Use Case:** Fresh installations, testing environments

---

## 🗂️ Approval System Tables Included

The approval system export includes these key tables:

### **Core Approval Infrastructure:**
- `approval_settings` - Configuration for each module
- `approvers` - User approval assignments
- `approvals` - General approval records

### **Module Tables with Approval Fields:**
1. `cutis` - Leave requests
2. `request_atk` - Office supplies requests
3. `permintaan_designs` - Design requests
4. `operational_requests` - Operational/courier requests
5. `pengajuan_fotocopy` - Photocopy requests
6. `izin_briefs` - Brief permissions
7. `klaim_berobats` - Medical claims
8. `slip_gaji_skk` - Salary slip requests
9. `equipment_loans` - Equipment borrowing
10. `fixing_requests` - Repair requests
11. `lembur_honor` - Overtime honor requests
12. `peminjaman_ruangan` - Room borrowing
13. `surat_tugas` - Assignment letters

---

## 📥 How to Import Exports

### **Full Database Restore:**
```bash
# Drop existing database (CAUTION!)
mysql -u root -p -e "DROP DATABASE IF EXISTS sekolah_noah;"
mysql -u root -p -e "CREATE DATABASE sekolah_noah;"

# Import full database
mysql -u root -p sekolah_noah < database/exports/sekolah_noah_full_20250604_075639.sql
```

### **Schema Only Setup:**
```bash
# Create new database
mysql -u root -p -e "CREATE DATABASE sekolah_noah_new;"

# Import schema
mysql -u root -p sekolah_noah_new < database/exports/sekolah_noah_schema_only_20250604_075849.sql
```

### **Data Only Import:**
```bash
# Import data into existing schema
mysql -u root -p sekolah_noah < database/exports/sekolah_noah_data_only_20250604_075901.sql
```

### **Approval System Only:**
```bash
# Import approval system tables
mysql -u root -p sekolah_noah < database/exports/sekolah_noah_approval_system_20250604_075929.sql
```

### **Laravel Seeder Usage:**
```bash
# Add to DatabaseSeeder.php
$this->call(ApprovalSystemSeeder::class);

# Run specific seeder
php artisan db:seed --class=ApprovalSystemSeeder

# Or run all seeders
php artisan db:seed
```

---

## 🔄 Migration vs Export Strategy

### **For Development:**
1. Use **Laravel migrations** for schema changes
2. Use **ApprovalSystemSeeder** for approval configuration
3. Use **schema export** for new developer setup

### **For Production:**
1. Use **Laravel migrations** for incremental updates
2. Use **full export** for complete backups
3. Use **approval system export** for approval-only deployments

### **For Testing:**
1. Use **schema export** + **ApprovalSystemSeeder**
2. Use **approval system export** for isolated testing
3. Use **data export** for realistic test data

---

## 📊 Database Statistics

### **Overall Database:**
- **Total Tables:** 57
- **Approval Tables:** 16 (28% of database)
- **Total Migrations:** 45 successfully applied
- **Approvers Configured:** 44 across all modules
- **Approval Levels:** 3 levels per module

### **Data Volume:**
- **Pending Applications:** 25+ test records
- **Users with Approval Rights:** 9 users
- **Modules with Approval:** 11 complete modules
- **Department Types:** akademik, non-akademik

---

## 🛠️ Export Commands Used

### **Full Export:**
```bash
mysqldump -h 127.0.0.1 -u root -p sekolah_noah > sekolah_noah_full_$(date +%Y%m%d_%H%M%S).sql
```

### **Schema Only:**
```bash
mysqldump -h 127.0.0.1 -u root -p --no-data sekolah_noah > sekolah_noah_schema_only_$(date +%Y%m%d_%H%M%S).sql
```

### **Data Only:**
```bash
mysqldump -h 127.0.0.1 -u root -p --no-create-info sekolah_noah > sekolah_noah_data_only_$(date +%Y%m%d_%H%M%S).sql
```

### **Approval System:**
```bash
mysqldump -h 127.0.0.1 -u root -p sekolah_noah approval_settings approvals approvers cutis equipment_loans fixing_requests izin_briefs klaim_berobats lembur_honor operational_requests peminjaman_ruangan pengajuan_fotocopy permintaan_designs request_atk slip_gaji_skk surat_tugas > sekolah_noah_approval_system_$(date +%Y%m%d_%H%M%S).sql
```

---

## 🔒 Security Considerations

### **Sensitive Data:**
- ✅ Password hashes included (safe)
- ⚠️ Personal employee data included
- ⚠️ Application content included
- ✅ No plain text passwords

### **Production Use:**
- 🔐 Encrypt exports before transfer
- 🔐 Store in secure locations
- 🔐 Use environment-specific credentials
- 🔐 Regular backup rotation

### **Development Use:**
- ⚠️ Sanitize personal data for dev environments
- ✅ Approval system configuration safe to share
- ✅ Schema exports safe for development

---

## 📈 Backup Strategy Recommendations

### **Daily Backups:**
```bash
# Automated daily backup script
mysqldump -h 127.0.0.1 -u root -p sekolah_noah > backup_$(date +%Y%m%d).sql
```

### **Pre-Deployment Backups:**
```bash
# Before major updates
mysqldump -h 127.0.0.1 -u root -p sekolah_noah > pre_deployment_$(date +%Y%m%d_%H%M).sql
```

### **Approval System Backups:**
```bash
# Before approval configuration changes
mysqldump -h 127.0.0.1 -u root -p sekolah_noah approvers approval_settings > approval_backup_$(date +%Y%m%d).sql
```

---

## 🎯 Usage Scenarios

### **New Developer Onboarding:**
1. Import `schema_only` export
2. Run `ApprovalSystemSeeder`
3. Create test data as needed

### **Staging Environment Setup:**
1. Import `full` export
2. Sanitize sensitive data
3. Update configuration for staging

### **Production Deployment:**
1. Backup current database
2. Run Laravel migrations
3. Deploy code changes
4. Verify approval system

### **Testing Approval System:**
1. Import `approval_system` export
2. Run approval tests
3. Verify multilevel workflow

---

## 📞 Support Information

### **Export Files Location:**
```
database/
├── exports/
│   ├── sekolah_noah_full_20250604_075639.sql
│   ├── sekolah_noah_schema_only_20250604_075849.sql
│   ├── sekolah_noah_data_only_20250604_075901.sql
│   └── sekolah_noah_approval_system_20250604_075929.sql
└── seeders/
    └── ApprovalSystemSeeder.php
```

### **Related Documentation:**
- `DATABASE_MIGRATION_STATUS.md` - Migration tracking
- `MIGRATION_COMPLIANCE_REPORT.md` - Compliance verification
- `TESTING_APPROVAL_SYSTEM.md` - Testing guidelines
- `DEVELOPMENT_COMPLETE.md` - Development status

---

**📝 Documentation Status:** ✅ **COMPLETE**  
**Last Updated:** 2025-06-04  
**Export Count:** 5 comprehensive exports  
**Coverage:** 100% database + approval system specific 