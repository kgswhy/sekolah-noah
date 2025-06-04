-- MySQL dump 10.13  Distrib 9.3.0, for macos15.2 (arm64)
--
-- Host: 127.0.0.1    Database: sekolah_noah
-- ------------------------------------------------------
-- Server version	9.3.0

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `approval_settings`
--

DROP TABLE IF EXISTS `approval_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `approval_settings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `approval_settings`
--

LOCK TABLES `approval_settings` WRITE;
/*!40000 ALTER TABLE `approval_settings` DISABLE KEYS */;
/*!40000 ALTER TABLE `approval_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `approvals`
--

DROP TABLE IF EXISTS `approvals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `approvals` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `module_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `module_id` bigint unsigned NOT NULL,
  `current_level` int NOT NULL DEFAULT '1',
  `status` enum('pending','approved','rejected') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_by` bigint unsigned NOT NULL,
  `approved_by` bigint unsigned DEFAULT NULL,
  `rejected_by` bigint unsigned DEFAULT NULL,
  `rejected_message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `rejected_at` timestamp NULL DEFAULT NULL,
  `approved_at` timestamp NULL DEFAULT NULL,
  `final_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approval_history` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `approvals_created_by_foreign` (`created_by`),
  KEY `approvals_approved_by_foreign` (`approved_by`),
  KEY `approvals_rejected_by_foreign` (`rejected_by`),
  CONSTRAINT `approvals_approved_by_foreign` FOREIGN KEY (`approved_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `approvals_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `approvals_rejected_by_foreign` FOREIGN KEY (`rejected_by`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `approvals`
--

LOCK TABLES `approvals` WRITE;
/*!40000 ALTER TABLE `approvals` DISABLE KEYS */;
INSERT INTO `approvals` VALUES (1,'Request ATK',2,1,'pending',1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-05-27 23:53:53','2025-05-27 23:53:53'),(2,'Request ATK',3,1,'pending',1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-05-27 23:54:04','2025-05-27 23:54:04');
/*!40000 ALTER TABLE `approvals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `approvers`
--

DROP TABLE IF EXISTS `approvers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `approvers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `module` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'cuti',
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `approval_level` tinyint NOT NULL DEFAULT '1',
  `department_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'non-akademik',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `approvers_user_id_module_approval_level_unique` (`user_id`,`module`,`approval_level`),
  CONSTRAINT `approvers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `approvers`
--

LOCK TABLES `approvers` WRITE;
/*!40000 ALTER TABLE `approvers` DISABLE KEYS */;
INSERT INTO `approvers` VALUES (18,1,'cuti',NULL,1,1,'non-akademik','2025-05-28 10:09:51','2025-06-03 06:05:34'),(19,1,'cuti',NULL,1,2,'non-akademik','2025-05-28 10:10:07','2025-05-28 10:10:07'),(20,1,'cuti',NULL,1,3,'non-akademik','2025-05-28 10:10:15','2025-05-28 10:10:15'),(21,1,'fotocopy',NULL,1,2,'non-akademik','2025-05-28 10:16:59','2025-05-28 10:16:59'),(22,1,'fotocopy',NULL,1,3,'non-akademik','2025-05-28 10:17:10','2025-05-28 10:17:10'),(24,4,'fotocopy',NULL,1,1,'non-akademik','2025-06-03 13:08:45','2025-06-03 13:08:45'),(25,7,'request-atk',NULL,1,1,'non-akademik','2025-06-03 13:08:59','2025-06-03 13:08:59'),(26,8,'request-atk',NULL,1,2,'non-akademik','2025-06-03 13:09:15','2025-06-03 13:09:15'),(27,1,'request-atk',NULL,1,3,'non-akademik','2025-06-03 13:09:27','2025-06-03 13:09:27'),(29,7,'cuti',NULL,1,1,'akademik','2025-06-03 13:09:55','2025-06-03 13:09:55'),(30,8,'cuti',NULL,1,2,'akademik','2025-06-03 13:12:59','2025-06-03 13:12:59'),(42,4,'brief-absen',NULL,1,1,'non-akademik','2025-06-03 14:01:50','2025-06-03 14:01:50'),(43,7,'brief-absen',NULL,1,2,'non-akademik','2025-06-03 14:02:03','2025-06-03 14:02:03'),(44,8,'brief-absen',NULL,1,3,'non-akademik','2025-06-03 14:02:03','2025-06-03 14:02:03'),(45,4,'klaim-berobat',NULL,1,1,'non-akademik','2025-06-03 14:02:03','2025-06-03 14:02:03'),(46,7,'klaim-berobat',NULL,1,2,'non-akademik','2025-06-03 14:02:03','2025-06-03 14:02:03'),(47,8,'klaim-berobat',NULL,1,3,'non-akademik','2025-06-03 14:02:03','2025-06-03 14:02:03'),(52,4,'slip-gaji-skk',NULL,1,1,'non-akademik','2025-06-03 14:05:13','2025-06-03 14:05:13'),(53,7,'slip-gaji-skk',NULL,1,2,'non-akademik','2025-06-03 14:05:13','2025-06-03 14:05:13'),(54,8,'slip-gaji-skk',NULL,1,3,'non-akademik','2025-06-03 14:05:13','2025-06-03 14:05:13'),(55,4,'pinjaman-cicilan',NULL,1,1,'non-akademik','2025-06-03 14:05:13','2025-06-03 14:05:13'),(56,7,'pinjaman-cicilan',NULL,1,2,'non-akademik','2025-06-03 14:05:13','2025-06-03 14:05:13'),(57,8,'pinjaman-cicilan',NULL,1,3,'non-akademik','2025-06-03 14:05:13','2025-06-03 14:05:13'),(62,4,'lembur-honor',NULL,1,1,'non-akademik','2025-06-03 14:36:06','2025-06-03 14:36:06'),(63,7,'lembur-honor',NULL,1,2,'non-akademik','2025-06-03 14:36:06','2025-06-03 14:36:06'),(64,8,'lembur-honor',NULL,1,3,'non-akademik','2025-06-03 14:36:06','2025-06-03 14:36:06'),(65,4,'surat-tugas',NULL,1,1,'non-akademik','2025-06-03 14:36:06','2025-06-03 14:36:06'),(66,7,'surat-tugas',NULL,1,2,'non-akademik','2025-06-03 14:36:06','2025-06-03 14:36:06'),(67,8,'surat-tugas',NULL,1,3,'non-akademik','2025-06-03 14:36:06','2025-06-03 14:36:06'),(72,4,'fixing-requests',NULL,1,1,'non-akademik','2025-06-03 14:36:25','2025-06-03 14:36:25'),(73,7,'fixing-requests',NULL,1,2,'non-akademik','2025-06-03 14:36:25','2025-06-03 14:36:25'),(74,8,'fixing-requests',NULL,1,3,'non-akademik','2025-06-03 14:36:25','2025-06-03 14:36:25'),(75,4,'equipment-loans',NULL,1,1,'non-akademik','2025-06-03 14:36:25','2025-06-03 14:36:25'),(76,7,'equipment-loans',NULL,1,2,'non-akademik','2025-06-03 14:36:25','2025-06-03 14:36:25'),(77,8,'equipment-loans',NULL,1,3,'non-akademik','2025-06-03 14:36:25','2025-06-03 14:36:25'),(82,4,'peminjaman-ruangan',NULL,1,1,'non-akademik','2025-06-03 14:36:42','2025-06-03 14:36:42'),(83,7,'peminjaman-ruangan',NULL,1,2,'non-akademik','2025-06-03 14:36:42','2025-06-03 14:36:42'),(84,8,'peminjaman-ruangan',NULL,1,3,'non-akademik','2025-06-03 14:36:42','2025-06-03 14:36:42'),(85,4,'permintaan-design',NULL,1,1,'non-akademik','2025-06-03 14:36:42','2025-06-03 14:36:42'),(86,7,'permintaan-design',NULL,1,2,'non-akademik','2025-06-03 14:36:42','2025-06-03 14:36:42'),(87,8,'permintaan-design',NULL,1,3,'non-akademik','2025-06-03 14:36:42','2025-06-03 14:36:42'),(92,4,'kurir-mobil',NULL,1,1,'non-akademik','2025-06-03 14:36:59','2025-06-03 14:36:59'),(93,7,'kurir-mobil',NULL,1,2,'non-akademik','2025-06-03 14:36:59','2025-06-03 14:36:59'),(94,8,'kurir-mobil',NULL,1,3,'non-akademik','2025-06-03 14:36:59','2025-06-03 14:36:59');
/*!40000 ALTER TABLE `approvers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cutis`
--

DROP TABLE IF EXISTS `cutis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cutis` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `employee_id` bigint unsigned NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `alasan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `dokumen` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telepon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','approved','rejected') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `approved_by` bigint unsigned DEFAULT NULL,
  `approved_at` timestamp NULL DEFAULT NULL,
  `department_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'non-akademik',
  `current_approval_level` int NOT NULL DEFAULT '0',
  `final_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rejected_message` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rejected_by` bigint unsigned DEFAULT NULL,
  `rejected_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `approval_history` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `cutis_employee_id_foreign` (`employee_id`),
  KEY `cutis_approved_by_foreign` (`approved_by`),
  KEY `cutis_rejected_by_foreign` (`rejected_by`),
  CONSTRAINT `cutis_approved_by_foreign` FOREIGN KEY (`approved_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `cutis_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE,
  CONSTRAINT `cutis_rejected_by_foreign` FOREIGN KEY (`rejected_by`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cutis`
--

LOCK TABLES `cutis` WRITE;
/*!40000 ALTER TABLE `cutis` DISABLE KEYS */;
INSERT INTO `cutis` VALUES (10,10,'2025-05-02','2025-05-23','Sakit','test','private/dokumen_cuti/c8mMBGLSE4Fehhu6tdSDcVqNMKiOEYGdMgYtDQ28.jpg','2131','approved',NULL,NULL,'non-akademik',0,NULL,NULL,NULL,NULL,'2025-05-21 12:44:04','2025-05-22 10:58:44',NULL),(11,2,'2025-05-16','2025-05-20','Izin','Liburan','private/dokumen_cuti/9uCm6IfOL9CIMHinMfVKzKaRvYv5Gl245Bus1qRK.pdf','081228480149','approved',1,'2025-06-03 06:23:15','non-akademik',3,'approved','-',NULL,NULL,'2025-05-21 18:47:52','2025-06-03 06:23:15',NULL),(12,10,'2025-05-22','2025-05-30','Cuti','test',NULL,'123123','rejected',NULL,NULL,'non-akademik',2,'rejected','yahayu gagal',1,'2025-05-22 11:21:56','2025-05-22 11:19:14','2025-05-22 11:21:56',NULL),(13,10,'2025-05-24','2025-05-24','Cuti','test',NULL,'12312','approved',1,'2025-05-22 11:43:53','non-akademik',2,'approved',NULL,NULL,NULL,'2025-05-22 11:32:11','2025-05-22 11:43:53',NULL),(14,10,'2025-05-22','2025-05-24','Sakit','test',NULL,'1213','approved',1,'2025-05-22 11:43:54','non-akademik',2,'approved',NULL,NULL,NULL,'2025-05-22 11:42:57','2025-05-22 11:43:54',NULL),(15,10,'2025-05-29','2025-05-31','Izin','test','private/dokumen_cuti/cpWD7t9RQdG4uQUfRQKhMWxEwaDkLifhKo86DQaM.jpg','123123','approved',1,'2025-05-28 10:10:23','non-akademik',3,'approved',NULL,NULL,NULL,'2025-05-28 10:08:36','2025-05-28 10:10:23',NULL),(16,10,'2025-06-03','2025-06-08','Cuti',NULL,NULL,'0812321451234','pending',NULL,NULL,'non-akademik',1,NULL,NULL,NULL,NULL,'2025-06-03 06:25:14','2025-06-03 06:25:14',NULL),(17,2,'2025-06-08','2025-06-14','Keperluan pribadi yang mendesak','Consequatur aut animi aut ab aut nulla exercitationem ut illo laboriosam eos saepe.',NULL,'0721 6019 341','pending',NULL,NULL,'akademik',1,NULL,NULL,NULL,NULL,'2025-05-31 22:21:02','2025-06-03 08:23:45',NULL),(18,2,'2025-06-06','2025-06-09','Menghadiri acara keluarga','Sapiente et sapiente labore ipsa necessitatibus alias culpa debitis odio similique autem ut voluptas.',NULL,'(+62) 443 6402 740','pending',NULL,NULL,'akademik',1,NULL,NULL,NULL,NULL,'2025-05-30 20:02:06','2025-06-03 08:23:45',NULL),(19,3,'2025-06-14','2025-06-17','Keperluan pribadi yang mendesak','Et sint accusantium facilis laborum atque saepe officia enim exercitationem praesentium optio dolores.',NULL,'(+62) 403 7550 849','pending',NULL,NULL,'akademik',1,NULL,NULL,NULL,NULL,'2025-05-30 00:40:16','2025-06-03 08:23:45',NULL),(20,3,'2025-06-05','2025-06-11','Menghadiri acara keluarga','Dolorum ipsam est sit quia id repellat vel.',NULL,'(+62) 977 9956 115','pending',NULL,NULL,'akademik',1,NULL,NULL,NULL,NULL,'2025-06-01 13:16:33','2025-06-03 08:23:45',NULL),(21,2,'2025-06-24','2025-06-30','Menghadiri acara keluarga','Dolorum doloribus numquam alias quia natus quisquam aperiam vero numquam at ut mollitia.',NULL,'0269 1555 548','pending',NULL,NULL,'akademik',2,NULL,NULL,NULL,NULL,'2025-05-30 18:17:38','2025-06-03 08:27:59',NULL),(22,2,'2025-06-17','2025-06-22','Umroh bersama keluarga','Ipsum quas quae qui fuga vel mollitia optio et nesciunt atque sit.',NULL,'0888 0701 214','pending',NULL,NULL,'akademik',2,NULL,NULL,NULL,NULL,'2025-06-01 13:54:42','2025-06-03 08:27:59',NULL),(23,3,'2025-06-12','2025-06-16','Cuti sakit berkepanjangan','Rem et culpa nemo qui enim et eaque earum.',NULL,'0845 1915 2723','pending',NULL,NULL,'akademik',1,NULL,NULL,NULL,NULL,'2025-05-31 18:30:57','2025-06-03 08:27:59',NULL),(24,3,'2025-06-08','2025-06-10','Keperluan pribadi yang mendesak','Maiores error enim voluptate ad aut modi dolorem.',NULL,'(+62) 983 9717 596','pending',NULL,NULL,'akademik',2,NULL,NULL,NULL,NULL,'2025-05-30 18:12:45','2025-06-03 08:27:59',NULL),(25,2,'2025-07-01','2025-07-06','Cuti tahunan untuk liburan keluarga','Cupiditate sit et neque est enim voluptas non id.',NULL,'(+62) 514 5984 9393','pending',NULL,NULL,'akademik',2,NULL,NULL,NULL,NULL,'2025-05-28 19:37:47','2025-06-03 08:29:34',NULL),(26,2,'2025-06-16','2025-06-21','Keperluan pribadi yang mendesak','Consequatur est eos velit ex impedit in veniam sit necessitatibus eveniet nulla accusamus quae.',NULL,'026 0007 193','pending',NULL,NULL,'akademik',2,NULL,NULL,NULL,NULL,'2025-05-28 02:45:34','2025-06-03 08:29:34',NULL),(27,3,'2025-06-22','2025-06-25','Menghadiri acara keluarga','Et ea tempore omnis quo aliquam quibusdam quam.',NULL,'0526 4625 0151','pending',NULL,NULL,'akademik',2,NULL,NULL,NULL,NULL,'2025-05-30 10:38:46','2025-06-03 08:29:34',NULL),(28,3,'2025-07-02','2025-07-07','Keperluan pribadi yang mendesak','Quia omnis ut quisquam quam amet eaque quas quo occaecati vel et.',NULL,'0678 5287 5522','pending',NULL,NULL,'akademik',2,NULL,NULL,NULL,NULL,'2025-05-27 22:37:19','2025-06-03 08:29:34',NULL),(29,2,'2025-06-13','2025-06-15','Cuti sakit berkepanjangan','Adipisci nam quis consequatur ratione explicabo exercitationem velit maiores molestiae est.',NULL,'(+62) 791 1681 9466','pending',NULL,NULL,'akademik',1,NULL,NULL,NULL,NULL,'2025-05-29 18:06:17','2025-06-03 08:30:57',NULL),(30,2,'2025-06-09','2025-06-10','Keperluan pribadi yang mendesak','In ullam sit occaecati voluptatem repudiandae id id debitis voluptatem sunt optio nostrum aliquid.',NULL,'(+62) 488 4590 403','pending',NULL,NULL,'akademik',2,NULL,NULL,NULL,NULL,'2025-05-31 16:21:08','2025-06-03 08:30:57',NULL),(31,3,'2025-06-04','2025-06-10','Cuti sakit berkepanjangan','Atque magni veritatis sunt id ut est qui ad iusto tenetur dolore impedit.',NULL,'(+62) 330 4985 2617','pending',NULL,NULL,'akademik',2,NULL,NULL,NULL,NULL,'2025-05-31 17:05:13','2025-06-03 08:30:57',NULL),(32,3,'2025-06-22','2025-06-27','Cuti tahunan untuk liburan keluarga','Autem atque sunt saepe nam autem ipsum.',NULL,'0362 0552 232','pending',NULL,NULL,'akademik',2,NULL,NULL,NULL,NULL,'2025-05-30 18:25:54','2025-06-03 08:30:57',NULL),(33,3,'2025-06-08','2025-06-10','Sakit','Test pending cuti application for approval system',NULL,'08123456789','pending',NULL,NULL,'non-akademik',1,NULL,NULL,NULL,NULL,'2025-06-03 08:43:49','2025-06-03 08:43:49',NULL),(34,4,'2025-06-08','2025-06-10','Sakit','Test pending cuti application for approval system',NULL,'08123456789','pending',NULL,NULL,'non-akademik',1,NULL,NULL,NULL,NULL,'2025-06-03 08:46:43','2025-06-03 08:46:43',NULL);
/*!40000 ALTER TABLE `cutis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `equipment_loans`
--

DROP TABLE IF EXISTS `equipment_loans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `equipment_loans` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `equipment_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `division` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `loan_date` date NOT NULL,
  `return_date` date NOT NULL,
  `purpose` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','approved','rejected') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `current_approval_level` int NOT NULL DEFAULT '1',
  `department_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'non-akademik',
  `final_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approval_history` json DEFAULT NULL,
  `rejected_message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `approved_by` bigint unsigned DEFAULT NULL,
  `approved_at` timestamp NULL DEFAULT NULL,
  `rejected_by` bigint unsigned DEFAULT NULL,
  `rejected_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `equipment_loans_user_id_foreign` (`user_id`),
  KEY `equipment_loans_approved_by_foreign` (`approved_by`),
  KEY `equipment_loans_rejected_by_foreign` (`rejected_by`),
  CONSTRAINT `equipment_loans_approved_by_foreign` FOREIGN KEY (`approved_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `equipment_loans_rejected_by_foreign` FOREIGN KEY (`rejected_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `equipment_loans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipment_loans`
--

LOCK TABLES `equipment_loans` WRITE;
/*!40000 ALTER TABLE `equipment_loans` DISABLE KEYS */;
INSERT INTO `equipment_loans` VALUES (1,1,'Laptop','SMP','Non-Akademik','2025-05-28','2025-05-31','test','pending',1,'non-akademik',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-05-28 00:04:36','2025-05-28 00:04:36');
/*!40000 ALTER TABLE `equipment_loans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fixing_requests`
--

DROP TABLE IF EXISTS `fixing_requests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `fixing_requests` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `device_category` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `division` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `damage_details` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `supporting_document` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('pending','approved','rejected') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `current_approval_level` int NOT NULL DEFAULT '1',
  `department_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'non-akademik',
  `final_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approval_history` json DEFAULT NULL,
  `approved_by` bigint unsigned DEFAULT NULL,
  `approved_at` timestamp NULL DEFAULT NULL,
  `rejected_message` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rejected_by` bigint unsigned DEFAULT NULL,
  `rejected_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fixing_requests_user_id_foreign` (`user_id`),
  KEY `fixing_requests_approved_by_foreign` (`approved_by`),
  KEY `fixing_requests_rejected_by_foreign` (`rejected_by`),
  CONSTRAINT `fixing_requests_approved_by_foreign` FOREIGN KEY (`approved_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `fixing_requests_rejected_by_foreign` FOREIGN KEY (`rejected_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `fixing_requests_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fixing_requests`
--

LOCK TABLES `fixing_requests` WRITE;
/*!40000 ALTER TABLE `fixing_requests` DISABLE KEYS */;
INSERT INTO `fixing_requests` VALUES (1,4,'Laptop','SD','Akademik','Butuh bantuan install windows',NULL,'rejected',1,'non-akademik',NULL,NULL,NULL,NULL,'Contoh',NULL,NULL,'2025-04-16 07:52:38','2025-04-16 07:53:06'),(2,1,'PC','SMP','Non-Akademik','test','fixing_documents/QGt8BRowhQfu0Ql03CUbf3bkO93E0YgcDC3U7e5n.jpg','pending',1,'non-akademik',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-05-27 21:31:56','2025-05-27 21:31:56');
/*!40000 ALTER TABLE `fixing_requests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `izin_briefs`
--

DROP TABLE IF EXISTS `izin_briefs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `izin_briefs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `employee_id` bigint unsigned NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `keperluan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dokumen` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('pending','approved','rejected') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `rejected_message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `rejected_by` bigint unsigned DEFAULT NULL,
  `rejected_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `current_approval_level` int NOT NULL DEFAULT '1',
  `final_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'non-akademik',
  `approval_history` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `approved_by` bigint unsigned DEFAULT NULL,
  `approved_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `izin_briefs_employee_id_foreign` (`employee_id`),
  KEY `izin_briefs_approved_by_foreign` (`approved_by`),
  KEY `izin_briefs_rejected_by_foreign` (`rejected_by`),
  CONSTRAINT `izin_briefs_approved_by_foreign` FOREIGN KEY (`approved_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `izin_briefs_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE,
  CONSTRAINT `izin_briefs_rejected_by_foreign` FOREIGN KEY (`rejected_by`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `izin_briefs`
--

LOCK TABLES `izin_briefs` WRITE;
/*!40000 ALTER TABLE `izin_briefs` DISABLE KEYS */;
INSERT INTO `izin_briefs` VALUES (6,2,'2025-05-17','10.00 - 12.00','Contoh keterangan','private/dokumen_brief/IUgbT7zoZod8xMIUqdcYlgZFlxYSmQ3nBLex3Ebj.pdf','approved',NULL,NULL,NULL,'2025-05-21 19:04:34','2025-05-21 19:05:09',0,NULL,'non-akademik',NULL,NULL,NULL),(7,2,'2025-06-06','22:37 - 24:52','Menghadiri rapat dengan klien',NULL,'pending',NULL,NULL,NULL,'2025-05-29 12:49:14','2025-06-03 08:27:59',2,NULL,'akademik',NULL,NULL,NULL),(8,3,'2025-06-06','15:54 - 17:43','Menghadiri rapat dengan klien',NULL,'pending',NULL,NULL,NULL,'2025-05-31 02:56:29','2025-06-03 08:27:59',2,NULL,'akademik',NULL,NULL,NULL),(9,2,'2025-06-13','14:49 - 17:35','Meeting dengan vendor',NULL,'pending',NULL,NULL,NULL,'2025-06-02 06:21:41','2025-06-03 08:29:34',2,NULL,'akademik',NULL,NULL,NULL),(10,3,'2025-06-09','10:31 - 12:54','Konsultasi dokter',NULL,'pending',NULL,NULL,NULL,'2025-05-30 07:18:06','2025-06-03 08:29:34',1,NULL,'akademik',NULL,NULL,NULL),(11,2,'2025-06-11','07:45 - 11:31','Konsultasi dokter',NULL,'pending',NULL,NULL,NULL,'2025-06-01 02:40:00','2025-06-03 08:30:57',1,NULL,'akademik',NULL,NULL,NULL),(12,3,'2025-06-12','19:18 - 21:52','Meeting dengan vendor',NULL,'pending',NULL,NULL,NULL,'2025-06-01 16:02:56','2025-06-03 08:30:57',1,NULL,'akademik',NULL,NULL,NULL);
/*!40000 ALTER TABLE `izin_briefs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `klaim_berobats`
--

DROP TABLE IF EXISTS `klaim_berobats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `klaim_berobats` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `employee_id` bigint unsigned NOT NULL,
  `tanggal_berobat` date NOT NULL,
  `nama_pasien` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `hubungan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `diagnosa` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_dokter` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_rs` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `biaya` decimal(12,2) NOT NULL,
  `bukti_pembayaran` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','approved','rejected') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `rejected_message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `rejected_by` bigint unsigned DEFAULT NULL,
  `rejected_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `current_approval_level` int NOT NULL DEFAULT '1',
  `final_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'non-akademik',
  `approval_history` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `approved_by` bigint unsigned DEFAULT NULL,
  `approved_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `klaim_berobats_employee_id_foreign` (`employee_id`),
  KEY `klaim_berobats_approved_by_foreign` (`approved_by`),
  KEY `klaim_berobats_rejected_by_foreign` (`rejected_by`),
  CONSTRAINT `klaim_berobats_approved_by_foreign` FOREIGN KEY (`approved_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `klaim_berobats_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE,
  CONSTRAINT `klaim_berobats_rejected_by_foreign` FOREIGN KEY (`rejected_by`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `klaim_berobats`
--

LOCK TABLES `klaim_berobats` WRITE;
/*!40000 ALTER TABLE `klaim_berobats` DISABLE KEYS */;
INSERT INTO `klaim_berobats` VALUES (4,2,'2025-05-17','Asman','Diri Sendiri','Demam Tinggi','Dokter Joko','Rumah Sakit Restu Ibu',1000000.00,'private/klaim_berobat/n9zB6AGnrtDBVVxXsy38WFbQLreHO7wYyhljYaLj.pdf','pending',NULL,NULL,NULL,'2025-05-21 19:13:50','2025-05-21 19:13:50',1,NULL,'non-akademik',NULL,NULL,NULL),(5,2,'2025-05-28','Hamima Widiastuti M.M.','Suami/Istri','Diabetes mellitus','Dr. Hesti Padma Laksmiwati','RS Premier',651920.00,'uploads/klaim/ff6d48af-c3b3-3494-be41-566836ebcf32.pdf','pending',NULL,NULL,NULL,'2025-05-29 22:04:32','2025-06-03 08:30:57',2,NULL,'akademik',NULL,NULL,NULL),(6,3,'2025-05-19','Atma Sihombing','Anak','Gastritis','Dr. Rafi Nashiruddin','RS Hermina',2113503.00,'uploads/klaim/aae801fd-bee2-3648-ad60-b8f2ea5d331f.pdf','pending',NULL,NULL,NULL,'2025-06-03 06:53:35','2025-06-03 08:30:57',1,NULL,'akademik',NULL,NULL,NULL);
/*!40000 ALTER TABLE `klaim_berobats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lembur_honor`
--

DROP TABLE IF EXISTS `lembur_honor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lembur_honor` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `employee_id` bigint unsigned NOT NULL,
  `jenis` enum('lembur','honor') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `waktu_mulai` time DEFAULT NULL,
  `waktu_selesai` time DEFAULT NULL,
  `durasi` int DEFAULT NULL,
  `kegiatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `dokumen_pendukung` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('pending','approved','rejected') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `approved_by` bigint unsigned DEFAULT NULL,
  `approved_at` timestamp NULL DEFAULT NULL,
  `rejected_message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `rejected_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `current_approval_level` int NOT NULL DEFAULT '1',
  `department_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'non-akademik',
  `final_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approval_history` json DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lembur_honor_employee_id_foreign` (`employee_id`),
  KEY `lembur_honor_approved_by_foreign` (`approved_by`),
  CONSTRAINT `lembur_honor_approved_by_foreign` FOREIGN KEY (`approved_by`) REFERENCES `users` (`id`),
  CONSTRAINT `lembur_honor_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lembur_honor`
--

LOCK TABLES `lembur_honor` WRITE;
/*!40000 ALTER TABLE `lembur_honor` DISABLE KEYS */;
INSERT INTO `lembur_honor` VALUES (7,2,'lembur','2025-05-17','2025-05-17',NULL,NULL,3,'Mengerjakan Report','Gedung A','Melanjutkan pengerjaan report bulanan','1747883785_996016739721000-0100042551239100-020672895072000-20250516214340.pdf','approved',7,NULL,NULL,NULL,'2025-05-21 20:16:25','2025-05-21 20:17:19',0,'non-akademik',NULL,NULL),(8,2,'lembur','2025-05-10','2025-05-10','17:00:00','19:00:00',5,'Penyelesaian project urgent','Gedung A','Quibusdam doloremque non sapiente tenetur pariatur voluptate ducimus blanditiis ipsam ex.',NULL,'pending',NULL,NULL,NULL,NULL,'2025-05-31 17:35:11','2025-06-03 08:30:57',1,'akademik',NULL,NULL),(9,3,'honor','2025-05-20','2025-05-20','17:00:00','21:00:00',5,'Laporan keuangan bulanan','Laboratorium','Qui dolorem cumque id possimus odio quod veritatis et sit rerum sapiente aut temporibus sed sit ut.',NULL,'pending',NULL,NULL,NULL,NULL,'2025-05-31 17:07:59','2025-06-03 08:30:57',2,'akademik',NULL,NULL);
/*!40000 ALTER TABLE `lembur_honor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `operational_requests`
--

DROP TABLE IF EXISTS `operational_requests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `operational_requests` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `unit` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `divisi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `request_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` enum('Kurir','Mobil') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `dari_jam` time NOT NULL,
  `sampai_jam` time NOT NULL,
  `tujuan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `keperluan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` enum('pending','approved','rejected') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `current_approval_level` int NOT NULL DEFAULT '1',
  `department_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'non-akademik',
  `final_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approval_history` json DEFAULT NULL,
  `approved_by` bigint unsigned DEFAULT NULL,
  `approved_at` timestamp NULL DEFAULT NULL,
  `rejected_message` text COLLATE utf8mb4_unicode_ci,
  `rejected_by` bigint unsigned DEFAULT NULL,
  `rejected_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `operational_requests_approved_by_foreign` (`approved_by`),
  KEY `operational_requests_rejected_by_foreign` (`rejected_by`),
  CONSTRAINT `operational_requests_approved_by_foreign` FOREIGN KEY (`approved_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `operational_requests_rejected_by_foreign` FOREIGN KEY (`rejected_by`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `operational_requests`
--

LOCK TABLES `operational_requests` WRITE;
/*!40000 ALTER TABLE `operational_requests` DISABLE KEYS */;
INSERT INTO `operational_requests` VALUES (2,'SD','Akademik','Lidya Keisha Halimah S.Sos','Mobil','2025-05-01','12:00:00','17:00:00','Jakarta Pusat, Grand Indonesia Mall','Meeting dengan Vendor Aplikasi','Butuh dengan driver juga','pending',1,'non-akademik',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-04-23 21:42:30','2025-04-23 21:45:18'),(3,'SD','Akademik','Lidya Keisha Halimah S.Sos','Mobil','2025-04-25','12:00:00','17:00:00','Jakarta Selatan','Meeting','-','pending',1,'non-akademik',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-04-23 22:52:55','2025-04-23 22:52:55'),(5,'SMP','Non-Akademik','Yudha','Kurir','2025-05-28','12:30:00','13:00:00','test','test','test','pending',1,'non-akademik',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-05-27 22:29:36','2025-05-27 22:29:36'),(6,'SMP','Non-Akademik','Yudha','Kurir','2025-05-28','10:30:00','13:00:00','test','test','test','pending',1,'non-akademik',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-05-28 00:06:07','2025-05-28 00:06:07');
/*!40000 ALTER TABLE `operational_requests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `peminjaman_ruangan`
--

DROP TABLE IF EXISTS `peminjaman_ruangan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `peminjaman_ruangan` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_karyawan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_pengajuan` date NOT NULL,
  `tanggal_diperlukan` date NOT NULL,
  `waktu_pelaksanaan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `departemen` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kegiatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_kegiatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ruangan` json NOT NULL,
  `jumlah` json NOT NULL,
  `keterangan` json NOT NULL,
  `status` enum('pending','approved','rejected') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `current_approval_level` int NOT NULL DEFAULT '1',
  `department_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'non-akademik',
  `final_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approval_history` json DEFAULT NULL,
  `approved_by` bigint unsigned DEFAULT NULL,
  `approved_at` timestamp NULL DEFAULT NULL,
  `rejected_message` text COLLATE utf8mb4_unicode_ci,
  `rejected_by` bigint unsigned DEFAULT NULL,
  `rejected_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `peminjaman_ruangan_approved_by_foreign` (`approved_by`),
  KEY `peminjaman_ruangan_rejected_by_foreign` (`rejected_by`),
  CONSTRAINT `peminjaman_ruangan_approved_by_foreign` FOREIGN KEY (`approved_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `peminjaman_ruangan_rejected_by_foreign` FOREIGN KEY (`rejected_by`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `peminjaman_ruangan`
--

LOCK TABLES `peminjaman_ruangan` WRITE;
/*!40000 ALTER TABLE `peminjaman_ruangan` DISABLE KEYS */;
INSERT INTO `peminjaman_ruangan` VALUES (1,'Yudha','2025-05-28','2025-05-29','09:00 - 12:00','SMP','test','test','test','\"[\\\"Ruang C\\\"]\"','\"[\\\"1\\\"]\"','\"[\\\"test\\\"]\"','pending',1,'non-akademik',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-05-27 22:00:06','2025-05-27 22:00:06'),(3,'Yudha','2025-05-28','2025-05-28','09:00 - 12:00','SMP','Non-Akademik','test','test','\"[\\\"Ruang B\\\"]\"','\"[\\\"1\\\"]\"','\"[\\\"test\\\"]\"','pending',1,'non-akademik',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-05-28 00:04:56','2025-05-28 00:04:56');
/*!40000 ALTER TABLE `peminjaman_ruangan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pengajuan_fotocopy`
--

DROP TABLE IF EXISTS `pengajuan_fotocopy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pengajuan_fotocopy` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `employee_id` bigint unsigned NOT NULL,
  `nama_lengkap` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomor_induk_karyawan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `divisi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_karyawan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jabatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kegiatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_penggunaan` date NOT NULL,
  `nama_barang` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `jumlah_halaman` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `jumlah_diperlukan` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `keterangan` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `status` enum('pending','approved','rejected') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `approved_by` bigint unsigned DEFAULT NULL,
  `rejected_message` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rejected_at` timestamp NULL DEFAULT NULL,
  `rejected_by` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `current_approval_level` int NOT NULL DEFAULT '1',
  `final_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approval_history` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `approved_at` timestamp NULL DEFAULT NULL,
  `department_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'non-akademik',
  PRIMARY KEY (`id`),
  KEY `pengajuan_fotocopy_approved_by_foreign` (`approved_by`),
  KEY `pengajuan_fotocopy_rejected_by_foreign` (`rejected_by`),
  CONSTRAINT `pengajuan_fotocopy_approved_by_foreign` FOREIGN KEY (`approved_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `pengajuan_fotocopy_rejected_by_foreign` FOREIGN KEY (`rejected_by`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pengajuan_fotocopy`
--

LOCK TABLES `pengajuan_fotocopy` WRITE;
/*!40000 ALTER TABLE `pengajuan_fotocopy` DISABLE KEYS */;
INSERT INTO `pengajuan_fotocopy` VALUES (22,10,'Yudha','1507181901183935','SMP','Non-Akademik','aktif','IT','teest','test','test','2025-05-28','[\"tst\"]','[\"1\"]','[\"1\"]','[\"test\"]','approved',1,NULL,NULL,NULL,'2025-05-27 23:51:36','2025-05-28 00:01:02',0,'approved',NULL,'2025-05-28 00:01:02','non-akademik'),(23,10,'Yudha','1507181901183935','SMP','Non-Akademik','aktif','IT','test','test','test','2025-05-29','[\"test\"]','[\"1\"]','[\"1\"]','[\"test\"]','approved',1,NULL,NULL,NULL,'2025-05-28 00:01:22','2025-05-28 10:14:49',0,'approved',NULL,'2025-05-28 10:14:49','non-akademik'),(24,10,'Yudha','1507181901183935','SMP','Non-Akademik','aktif','IT','test','test','test','2025-05-30','[\"test\"]','[\"1\"]','[\"1\"]','[\"test\"]','pending',NULL,NULL,NULL,NULL,'2025-05-28 10:15:59','2025-05-28 10:15:59',1,NULL,NULL,NULL,'non-akademik'),(25,10,'Yudha','1507181901183935','SMP','Non-Akademik','aktif','IT','test','test','1','2025-05-06','[\"test\"]','[\"1\"]','[\"1\"]','[\"tsess\"]','pending',NULL,NULL,NULL,NULL,'2025-05-28 10:19:48','2025-05-28 10:19:48',1,NULL,NULL,NULL,'non-akademik');
/*!40000 ALTER TABLE `pengajuan_fotocopy` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permintaan_designs`
--

DROP TABLE IF EXISTS `permintaan_designs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permintaan_designs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `divisi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_lainnya` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kegiatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `tanggal_deadline` date NOT NULL,
  `dokumen_pendukung` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('pending','approved','rejected') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `current_approval_level` int NOT NULL DEFAULT '1',
  `department_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'non-akademik',
  `final_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approval_history` json DEFAULT NULL,
  `approved_by` bigint unsigned DEFAULT NULL,
  `approved_at` timestamp NULL DEFAULT NULL,
  `rejected_message` text COLLATE utf8mb4_unicode_ci,
  `rejected_by` bigint unsigned DEFAULT NULL,
  `rejected_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `permintaan_designs_user_id_foreign` (`user_id`),
  KEY `permintaan_designs_approved_by_foreign` (`approved_by`),
  KEY `permintaan_designs_rejected_by_foreign` (`rejected_by`),
  CONSTRAINT `permintaan_designs_approved_by_foreign` FOREIGN KEY (`approved_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `permintaan_designs_rejected_by_foreign` FOREIGN KEY (`rejected_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `permintaan_designs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permintaan_designs`
--

LOCK TABLES `permintaan_designs` WRITE;
/*!40000 ALTER TABLE `permintaan_designs` DISABLE KEYS */;
INSERT INTO `permintaan_designs` VALUES (1,1,'Yudha','yudha@sekolahnoah.sch.id','SMP','Non-Akademik','PDF',NULL,'test','test','2025-05-23','permintaan_design/BZbz8BhaJGnIZwXLUz5qKQYYhztfKKc8UzQ3SzTK.jpg','pending',1,'non-akademik',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-05-28 00:05:26','2025-05-28 00:05:39');
/*!40000 ALTER TABLE `permintaan_designs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `request_atk`
--

DROP TABLE IF EXISTS `request_atk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `request_atk` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `employee_id` bigint unsigned DEFAULT NULL,
  `nama_lengkap` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_induk_karyawan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `divisi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_karyawan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_barang` json NOT NULL,
  `jumlah` json NOT NULL,
  `satuan` json NOT NULL,
  `keterangan` json NOT NULL,
  `status` enum('pending','approved','rejected') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `current_approval_level` int NOT NULL DEFAULT '1',
  `department_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'non-akademik',
  `final_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approval_history` json DEFAULT NULL,
  `rejected_message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `rejected_by` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `approved_by` bigint unsigned DEFAULT NULL,
  `approved_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `request_atk_approved_by_foreign` (`approved_by`),
  KEY `request_atk_rejected_by_foreign` (`rejected_by`),
  CONSTRAINT `request_atk_approved_by_foreign` FOREIGN KEY (`approved_by`) REFERENCES `users` (`id`),
  CONSTRAINT `request_atk_rejected_by_foreign` FOREIGN KEY (`rejected_by`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `request_atk`
--

LOCK TABLES `request_atk` WRITE;
/*!40000 ALTER TABLE `request_atk` DISABLE KEYS */;
INSERT INTO `request_atk` VALUES (2,NULL,'Yudha','EMP-0009','SMP','Non-Akademik','Pegawai Harian','IT','\"[\\\"tes\\\"]\"','\"[\\\"1\\\"]\"','\"[\\\"pcs\\\"]\"','\"[\\\"test\\\"]\"','pending',1,'non-akademik',NULL,NULL,NULL,NULL,'2025-05-27 23:53:53','2025-05-27 23:53:53',NULL,NULL),(3,NULL,'Yudha','EMP-0009','SMP','Non-Akademik','Pegawai Harian','IT','\"[\\\"test\\\"]\"','\"[\\\"1\\\"]\"','\"[\\\"pcs\\\"]\"','\"[\\\"test\\\"]\"','pending',1,'non-akademik',NULL,NULL,NULL,NULL,'2025-05-27 23:54:04','2025-05-27 23:54:04',NULL,NULL),(4,NULL,'Yudha','1507181901183935','SMP','Non-Akademik','aktif','IT','[\"test\"]','[\"1\"]','[\"pcs\"]','[\"test\"]','pending',1,'non-akademik',NULL,NULL,NULL,NULL,'2025-05-28 00:09:02','2025-05-28 00:09:02',NULL,NULL),(5,NULL,'Yudha','1507181901183935','SMP','Non-Akademik','aktif','IT','[\"test\"]','[\"1\"]','[\"box\"]','[\"test\"]','pending',1,'non-akademik',NULL,NULL,NULL,NULL,'2025-05-28 00:09:16','2025-05-28 00:09:16',NULL,NULL),(6,4,'Taswir Hakim','EMP-0003','SD','Non-Akademik','Pegawai Harian','Office Girl','\"Pulpen, Kertas A4, Spidol\"','\"10 pcs, 1 rim, 5 pcs\"','\"pcs, rim, pcs\"','\"Untuk keperluan administrasi harian\"','pending',1,'non-akademik',NULL,NULL,NULL,NULL,'2025-06-03 08:46:43','2025-06-03 08:46:43',NULL,NULL);
/*!40000 ALTER TABLE `request_atk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `slip_gaji_skk`
--

DROP TABLE IF EXISTS `slip_gaji_skk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `slip_gaji_skk` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `employee_id` bigint unsigned NOT NULL,
  `jenis_permintaan` enum('Slip Gaji','Surat Keterangan Kerja') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `bulan_tahun` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dokumen_pendukung` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('pending','approved','rejected') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `rejected_message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `rejected_by` bigint unsigned DEFAULT NULL,
  `rejected_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `current_approval_level` int NOT NULL DEFAULT '1',
  `final_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'non-akademik',
  `approval_history` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `approved_by` bigint unsigned DEFAULT NULL,
  `approved_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `slip_gaji_skk_employee_id_foreign` (`employee_id`),
  KEY `slip_gaji_skk_approved_by_foreign` (`approved_by`),
  KEY `slip_gaji_skk_rejected_by_foreign` (`rejected_by`),
  CONSTRAINT `slip_gaji_skk_approved_by_foreign` FOREIGN KEY (`approved_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `slip_gaji_skk_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE,
  CONSTRAINT `slip_gaji_skk_rejected_by_foreign` FOREIGN KEY (`rejected_by`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `slip_gaji_skk`
--

LOCK TABLES `slip_gaji_skk` WRITE;
/*!40000 ALTER TABLE `slip_gaji_skk` DISABLE KEYS */;
INSERT INTO `slip_gaji_skk` VALUES (4,2,'Slip Gaji','Kebutuhan Slip Gaji','2025-05','private/slip_gaji_skk/HZDxwJjFrmuu7WQz2IHdnUmkMEKW7feAehfj11FH.pdf','approved',NULL,NULL,NULL,'2025-05-21 19:33:13','2025-05-21 19:35:28',0,NULL,'non-akademik',NULL,NULL,NULL);
/*!40000 ALTER TABLE `slip_gaji_skk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `surat_tugas`
--

DROP TABLE IF EXISTS `surat_tugas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `surat_tugas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `employee_id` bigint unsigned NOT NULL,
  `nomor_surat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `judul_tugas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_tugas` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tujuan_tugas` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `lokasi_tugas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `dokumen_pendukung` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('pending','approved','rejected') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `approved_by` bigint unsigned DEFAULT NULL,
  `approved_at` timestamp NULL DEFAULT NULL,
  `rejected_message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `rejected_at` timestamp NULL DEFAULT NULL,
  `rejected_by` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `current_approval_level` int NOT NULL DEFAULT '1',
  `final_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'non-akademik',
  `approval_history` json DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `surat_tugas_employee_id_foreign` (`employee_id`),
  KEY `surat_tugas_approved_by_foreign` (`approved_by`),
  CONSTRAINT `surat_tugas_approved_by_foreign` FOREIGN KEY (`approved_by`) REFERENCES `users` (`id`),
  CONSTRAINT `surat_tugas_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `surat_tugas`
--

LOCK TABLES `surat_tugas` WRITE;
/*!40000 ALTER TABLE `surat_tugas` DISABLE KEYS */;
INSERT INTO `surat_tugas` VALUES (4,2,NULL,'Tugas A','Deskripsi Tugas','Melakukan Tugas','2025-05-17','2025-05-18','Jakarta Pusat','Keterangan Tambahan','1747884753_996016739721000-0100042551239098-020672895072000-20250320193004.pdf','pending',NULL,NULL,NULL,NULL,NULL,'2025-05-21 20:32:33','2025-05-21 20:32:33',1,NULL,'non-akademik',NULL),(5,2,'ST/2025/872','Pelatihan Pengembangan SDM','Ut quo dolor vel qui dolorem nam ex. Consequatur accusamus pariatur tenetur qui et excepturi dolorum ab. Tempora sed quia nihil vel repellat. Ut rem doloremque nihil sed.','Eum sit dolorem ipsam ut quasi aliquid laborum dolor sapiente explicabo minima.','2025-07-02','2025-07-28','Padangpanjang','Perferendis beatae id iste rerum. Atque reiciendis magni ut error.',NULL,'pending',NULL,NULL,NULL,NULL,NULL,'2025-06-01 15:47:05','2025-06-03 08:30:57',2,NULL,'akademik',NULL),(6,3,'ST/2025/950','Kunjungan Kerja ke Cabang','Reiciendis magnam et laboriosam ut incidunt delectus consequatur. Consequatur hic nostrum quia vel voluptatibus. Repellendus velit voluptates laborum et quaerat nesciunt.','Voluptatem ut sit corporis delectus cupiditate alias tenetur.','2025-06-17','2025-07-14','Palopo','Est qui nemo omnis. Impedit sit perferendis sed quasi eos repudiandae nobis ab. Vel explicabo repellat quaerat aperiam.',NULL,'pending',NULL,NULL,NULL,NULL,NULL,'2025-06-01 13:00:55','2025-06-03 08:30:57',2,NULL,'akademik',NULL);
/*!40000 ALTER TABLE `surat_tugas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-06-04  7:59:32
