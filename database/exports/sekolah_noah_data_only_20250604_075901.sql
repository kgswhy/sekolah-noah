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
-- Dumping data for table `absences`
--

LOCK TABLES `absences` WRITE;
/*!40000 ALTER TABLE `absences` DISABLE KEYS */;
/*!40000 ALTER TABLE `absences` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `admission_activities`
--

LOCK TABLES `admission_activities` WRITE;
/*!40000 ALTER TABLE `admission_activities` DISABLE KEYS */;
INSERT INTO `admission_activities` VALUES (1,'2025-04-24','Kegiatan Test Tahun Ajaran Baru','Kegiatan ini bertujuan untuk melakukan test kepada calon siswa tahun ajaran baru','dokumen_admission/QYwDbSVFnEZAQMIMxKyXHx2yMxWoNDCRR2NaUtfK.png','Berlangsung','Harap agara setiap team yang bertugas untuk hadir','2025-04-23 20:27:01','2025-04-23 20:30:40'),(4,'2025-05-01','Contoh Kegiatan','Deskripsi Kegiatan','dokumen_admission/bNbRg07vN3X88OBL5x0xjl1NFQBgJUceeiPjyEDD.png','Dijadwalkan','Keterangan','2025-04-23 22:39:19','2025-04-23 22:39:19');
/*!40000 ALTER TABLE `admission_activities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `approval_settings`
--

LOCK TABLES `approval_settings` WRITE;
/*!40000 ALTER TABLE `approval_settings` DISABLE KEYS */;
/*!40000 ALTER TABLE `approval_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `approvals`
--

LOCK TABLES `approvals` WRITE;
/*!40000 ALTER TABLE `approvals` DISABLE KEYS */;
INSERT INTO `approvals` VALUES (1,'Request ATK',2,1,'pending',1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-05-27 23:53:53','2025-05-27 23:53:53'),(2,'Request ATK',3,1,'pending',1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-05-27 23:54:04','2025-05-27 23:54:04');
/*!40000 ALTER TABLE `approvals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `approvers`
--

LOCK TABLES `approvers` WRITE;
/*!40000 ALTER TABLE `approvers` DISABLE KEYS */;
INSERT INTO `approvers` VALUES (18,1,'cuti',NULL,1,1,'non-akademik','2025-05-28 10:09:51','2025-06-03 06:05:34'),(19,1,'cuti',NULL,1,2,'non-akademik','2025-05-28 10:10:07','2025-05-28 10:10:07'),(20,1,'cuti',NULL,1,3,'non-akademik','2025-05-28 10:10:15','2025-05-28 10:10:15'),(21,1,'fotocopy',NULL,1,2,'non-akademik','2025-05-28 10:16:59','2025-05-28 10:16:59'),(22,1,'fotocopy',NULL,1,3,'non-akademik','2025-05-28 10:17:10','2025-05-28 10:17:10'),(24,4,'fotocopy',NULL,1,1,'non-akademik','2025-06-03 13:08:45','2025-06-03 13:08:45'),(25,7,'request-atk',NULL,1,1,'non-akademik','2025-06-03 13:08:59','2025-06-03 13:08:59'),(26,8,'request-atk',NULL,1,2,'non-akademik','2025-06-03 13:09:15','2025-06-03 13:09:15'),(27,1,'request-atk',NULL,1,3,'non-akademik','2025-06-03 13:09:27','2025-06-03 13:09:27'),(29,7,'cuti',NULL,1,1,'akademik','2025-06-03 13:09:55','2025-06-03 13:09:55'),(30,8,'cuti',NULL,1,2,'akademik','2025-06-03 13:12:59','2025-06-03 13:12:59'),(42,4,'brief-absen',NULL,1,1,'non-akademik','2025-06-03 14:01:50','2025-06-03 14:01:50'),(43,7,'brief-absen',NULL,1,2,'non-akademik','2025-06-03 14:02:03','2025-06-03 14:02:03'),(44,8,'brief-absen',NULL,1,3,'non-akademik','2025-06-03 14:02:03','2025-06-03 14:02:03'),(45,4,'klaim-berobat',NULL,1,1,'non-akademik','2025-06-03 14:02:03','2025-06-03 14:02:03'),(46,7,'klaim-berobat',NULL,1,2,'non-akademik','2025-06-03 14:02:03','2025-06-03 14:02:03'),(47,8,'klaim-berobat',NULL,1,3,'non-akademik','2025-06-03 14:02:03','2025-06-03 14:02:03'),(52,4,'slip-gaji-skk',NULL,1,1,'non-akademik','2025-06-03 14:05:13','2025-06-03 14:05:13'),(53,7,'slip-gaji-skk',NULL,1,2,'non-akademik','2025-06-03 14:05:13','2025-06-03 14:05:13'),(54,8,'slip-gaji-skk',NULL,1,3,'non-akademik','2025-06-03 14:05:13','2025-06-03 14:05:13'),(55,4,'pinjaman-cicilan',NULL,1,1,'non-akademik','2025-06-03 14:05:13','2025-06-03 14:05:13'),(56,7,'pinjaman-cicilan',NULL,1,2,'non-akademik','2025-06-03 14:05:13','2025-06-03 14:05:13'),(57,8,'pinjaman-cicilan',NULL,1,3,'non-akademik','2025-06-03 14:05:13','2025-06-03 14:05:13'),(62,4,'lembur-honor',NULL,1,1,'non-akademik','2025-06-03 14:36:06','2025-06-03 14:36:06'),(63,7,'lembur-honor',NULL,1,2,'non-akademik','2025-06-03 14:36:06','2025-06-03 14:36:06'),(64,8,'lembur-honor',NULL,1,3,'non-akademik','2025-06-03 14:36:06','2025-06-03 14:36:06'),(65,4,'surat-tugas',NULL,1,1,'non-akademik','2025-06-03 14:36:06','2025-06-03 14:36:06'),(66,7,'surat-tugas',NULL,1,2,'non-akademik','2025-06-03 14:36:06','2025-06-03 14:36:06'),(67,8,'surat-tugas',NULL,1,3,'non-akademik','2025-06-03 14:36:06','2025-06-03 14:36:06'),(72,4,'fixing-requests',NULL,1,1,'non-akademik','2025-06-03 14:36:25','2025-06-03 14:36:25'),(73,7,'fixing-requests',NULL,1,2,'non-akademik','2025-06-03 14:36:25','2025-06-03 14:36:25'),(74,8,'fixing-requests',NULL,1,3,'non-akademik','2025-06-03 14:36:25','2025-06-03 14:36:25'),(75,4,'equipment-loans',NULL,1,1,'non-akademik','2025-06-03 14:36:25','2025-06-03 14:36:25'),(76,7,'equipment-loans',NULL,1,2,'non-akademik','2025-06-03 14:36:25','2025-06-03 14:36:25'),(77,8,'equipment-loans',NULL,1,3,'non-akademik','2025-06-03 14:36:25','2025-06-03 14:36:25'),(82,4,'peminjaman-ruangan',NULL,1,1,'non-akademik','2025-06-03 14:36:42','2025-06-03 14:36:42'),(83,7,'peminjaman-ruangan',NULL,1,2,'non-akademik','2025-06-03 14:36:42','2025-06-03 14:36:42'),(84,8,'peminjaman-ruangan',NULL,1,3,'non-akademik','2025-06-03 14:36:42','2025-06-03 14:36:42'),(85,4,'permintaan-design',NULL,1,1,'non-akademik','2025-06-03 14:36:42','2025-06-03 14:36:42'),(86,7,'permintaan-design',NULL,1,2,'non-akademik','2025-06-03 14:36:42','2025-06-03 14:36:42'),(87,8,'permintaan-design',NULL,1,3,'non-akademik','2025-06-03 14:36:42','2025-06-03 14:36:42'),(92,4,'kurir-mobil',NULL,1,1,'non-akademik','2025-06-03 14:36:59','2025-06-03 14:36:59'),(93,7,'kurir-mobil',NULL,1,2,'non-akademik','2025-06-03 14:36:59','2025-06-03 14:36:59'),(94,8,'kurir-mobil',NULL,1,3,'non-akademik','2025-06-03 14:36:59','2025-06-03 14:36:59');
/*!40000 ALTER TABLE `approvers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `barangs`
--

LOCK TABLES `barangs` WRITE;
/*!40000 ALTER TABLE `barangs` DISABLE KEYS */;
INSERT INTO `barangs` VALUES (1,'Laptop Macbook Pro 2022',1,'Kelas VII','7A','2025-04-23 20:56:58','2025-04-23 20:58:56'),(3,'Monitor',1,'Kelas VIII','8A','2025-04-23 22:45:23','2025-04-23 22:45:23');
/*!40000 ALTER TABLE `barangs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `cutis`
--

LOCK TABLES `cutis` WRITE;
/*!40000 ALTER TABLE `cutis` DISABLE KEYS */;
INSERT INTO `cutis` VALUES (10,10,'2025-05-02','2025-05-23','Sakit','test','private/dokumen_cuti/c8mMBGLSE4Fehhu6tdSDcVqNMKiOEYGdMgYtDQ28.jpg','2131','approved',NULL,NULL,'non-akademik',0,NULL,NULL,NULL,NULL,'2025-05-21 12:44:04','2025-05-22 10:58:44',NULL),(11,2,'2025-05-16','2025-05-20','Izin','Liburan','private/dokumen_cuti/9uCm6IfOL9CIMHinMfVKzKaRvYv5Gl245Bus1qRK.pdf','081228480149','approved',1,'2025-06-03 06:23:15','non-akademik',3,'approved','-',NULL,NULL,'2025-05-21 18:47:52','2025-06-03 06:23:15',NULL),(12,10,'2025-05-22','2025-05-30','Cuti','test',NULL,'123123','rejected',NULL,NULL,'non-akademik',2,'rejected','yahayu gagal',1,'2025-05-22 11:21:56','2025-05-22 11:19:14','2025-05-22 11:21:56',NULL),(13,10,'2025-05-24','2025-05-24','Cuti','test',NULL,'12312','approved',1,'2025-05-22 11:43:53','non-akademik',2,'approved',NULL,NULL,NULL,'2025-05-22 11:32:11','2025-05-22 11:43:53',NULL),(14,10,'2025-05-22','2025-05-24','Sakit','test',NULL,'1213','approved',1,'2025-05-22 11:43:54','non-akademik',2,'approved',NULL,NULL,NULL,'2025-05-22 11:42:57','2025-05-22 11:43:54',NULL),(15,10,'2025-05-29','2025-05-31','Izin','test','private/dokumen_cuti/cpWD7t9RQdG4uQUfRQKhMWxEwaDkLifhKo86DQaM.jpg','123123','approved',1,'2025-05-28 10:10:23','non-akademik',3,'approved',NULL,NULL,NULL,'2025-05-28 10:08:36','2025-05-28 10:10:23',NULL),(16,10,'2025-06-03','2025-06-08','Cuti',NULL,NULL,'0812321451234','pending',NULL,NULL,'non-akademik',1,NULL,NULL,NULL,NULL,'2025-06-03 06:25:14','2025-06-03 06:25:14',NULL),(17,2,'2025-06-08','2025-06-14','Keperluan pribadi yang mendesak','Consequatur aut animi aut ab aut nulla exercitationem ut illo laboriosam eos saepe.',NULL,'0721 6019 341','pending',NULL,NULL,'akademik',1,NULL,NULL,NULL,NULL,'2025-05-31 22:21:02','2025-06-03 08:23:45',NULL),(18,2,'2025-06-06','2025-06-09','Menghadiri acara keluarga','Sapiente et sapiente labore ipsa necessitatibus alias culpa debitis odio similique autem ut voluptas.',NULL,'(+62) 443 6402 740','pending',NULL,NULL,'akademik',1,NULL,NULL,NULL,NULL,'2025-05-30 20:02:06','2025-06-03 08:23:45',NULL),(19,3,'2025-06-14','2025-06-17','Keperluan pribadi yang mendesak','Et sint accusantium facilis laborum atque saepe officia enim exercitationem praesentium optio dolores.',NULL,'(+62) 403 7550 849','pending',NULL,NULL,'akademik',1,NULL,NULL,NULL,NULL,'2025-05-30 00:40:16','2025-06-03 08:23:45',NULL),(20,3,'2025-06-05','2025-06-11','Menghadiri acara keluarga','Dolorum ipsam est sit quia id repellat vel.',NULL,'(+62) 977 9956 115','pending',NULL,NULL,'akademik',1,NULL,NULL,NULL,NULL,'2025-06-01 13:16:33','2025-06-03 08:23:45',NULL),(21,2,'2025-06-24','2025-06-30','Menghadiri acara keluarga','Dolorum doloribus numquam alias quia natus quisquam aperiam vero numquam at ut mollitia.',NULL,'0269 1555 548','pending',NULL,NULL,'akademik',2,NULL,NULL,NULL,NULL,'2025-05-30 18:17:38','2025-06-03 08:27:59',NULL),(22,2,'2025-06-17','2025-06-22','Umroh bersama keluarga','Ipsum quas quae qui fuga vel mollitia optio et nesciunt atque sit.',NULL,'0888 0701 214','pending',NULL,NULL,'akademik',2,NULL,NULL,NULL,NULL,'2025-06-01 13:54:42','2025-06-03 08:27:59',NULL),(23,3,'2025-06-12','2025-06-16','Cuti sakit berkepanjangan','Rem et culpa nemo qui enim et eaque earum.',NULL,'0845 1915 2723','pending',NULL,NULL,'akademik',1,NULL,NULL,NULL,NULL,'2025-05-31 18:30:57','2025-06-03 08:27:59',NULL),(24,3,'2025-06-08','2025-06-10','Keperluan pribadi yang mendesak','Maiores error enim voluptate ad aut modi dolorem.',NULL,'(+62) 983 9717 596','pending',NULL,NULL,'akademik',2,NULL,NULL,NULL,NULL,'2025-05-30 18:12:45','2025-06-03 08:27:59',NULL),(25,2,'2025-07-01','2025-07-06','Cuti tahunan untuk liburan keluarga','Cupiditate sit et neque est enim voluptas non id.',NULL,'(+62) 514 5984 9393','pending',NULL,NULL,'akademik',2,NULL,NULL,NULL,NULL,'2025-05-28 19:37:47','2025-06-03 08:29:34',NULL),(26,2,'2025-06-16','2025-06-21','Keperluan pribadi yang mendesak','Consequatur est eos velit ex impedit in veniam sit necessitatibus eveniet nulla accusamus quae.',NULL,'026 0007 193','pending',NULL,NULL,'akademik',2,NULL,NULL,NULL,NULL,'2025-05-28 02:45:34','2025-06-03 08:29:34',NULL),(27,3,'2025-06-22','2025-06-25','Menghadiri acara keluarga','Et ea tempore omnis quo aliquam quibusdam quam.',NULL,'0526 4625 0151','pending',NULL,NULL,'akademik',2,NULL,NULL,NULL,NULL,'2025-05-30 10:38:46','2025-06-03 08:29:34',NULL),(28,3,'2025-07-02','2025-07-07','Keperluan pribadi yang mendesak','Quia omnis ut quisquam quam amet eaque quas quo occaecati vel et.',NULL,'0678 5287 5522','pending',NULL,NULL,'akademik',2,NULL,NULL,NULL,NULL,'2025-05-27 22:37:19','2025-06-03 08:29:34',NULL),(29,2,'2025-06-13','2025-06-15','Cuti sakit berkepanjangan','Adipisci nam quis consequatur ratione explicabo exercitationem velit maiores molestiae est.',NULL,'(+62) 791 1681 9466','pending',NULL,NULL,'akademik',1,NULL,NULL,NULL,NULL,'2025-05-29 18:06:17','2025-06-03 08:30:57',NULL),(30,2,'2025-06-09','2025-06-10','Keperluan pribadi yang mendesak','In ullam sit occaecati voluptatem repudiandae id id debitis voluptatem sunt optio nostrum aliquid.',NULL,'(+62) 488 4590 403','pending',NULL,NULL,'akademik',2,NULL,NULL,NULL,NULL,'2025-05-31 16:21:08','2025-06-03 08:30:57',NULL),(31,3,'2025-06-04','2025-06-10','Cuti sakit berkepanjangan','Atque magni veritatis sunt id ut est qui ad iusto tenetur dolore impedit.',NULL,'(+62) 330 4985 2617','pending',NULL,NULL,'akademik',2,NULL,NULL,NULL,NULL,'2025-05-31 17:05:13','2025-06-03 08:30:57',NULL),(32,3,'2025-06-22','2025-06-27','Cuti tahunan untuk liburan keluarga','Autem atque sunt saepe nam autem ipsum.',NULL,'0362 0552 232','pending',NULL,NULL,'akademik',2,NULL,NULL,NULL,NULL,'2025-05-30 18:25:54','2025-06-03 08:30:57',NULL),(33,3,'2025-06-08','2025-06-10','Sakit','Test pending cuti application for approval system',NULL,'08123456789','pending',NULL,NULL,'non-akademik',1,NULL,NULL,NULL,NULL,'2025-06-03 08:43:49','2025-06-03 08:43:49',NULL),(34,4,'2025-06-08','2025-06-10','Sakit','Test pending cuti application for approval system',NULL,'08123456789','pending',NULL,NULL,'non-akademik',1,NULL,NULL,NULL,NULL,'2025-06-03 08:46:43','2025-06-03 08:46:43',NULL);
/*!40000 ALTER TABLE `cutis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `employees`
--

LOCK TABLES `employees` WRITE;
/*!40000 ALTER TABLE `employees` DISABLE KEYS */;
INSERT INTO `employees` VALUES (2,6,'Asman Maryadi','EMP-0001','2025-04-15 18:56:58','2025-05-21 18:37:34','SD','Akademik','Pegawai Harian','Gardener','Laki-laki','AB','Sibolga','1997-02-24','627247035510304','637172350594713','1703556006230344','386702811496675091','Hindu','D3','Dk. Ketandan No. 707, Pariaman 53292, Bengkulu','Jr. Gremet No. 636, Padang 39617, Lampung','0493 7492 429','26.598.758.2-971.568','marpaung.putu@example.com','irsad.purnawati@example.org','Cerai','tidak aktif','2005-02-17',NULL),(3,7,'Samiah Anggraini','EMP-0002','2025-04-15 18:56:58','2025-05-21 18:38:07','SMP','Akademik','Pegawai Tetap','Kurir','Laki-laki','O','Makassar','1981-07-24','627909176993517','637855242200497','5203092009199044','358057155603706352','Konghucu','D3','Psr. Bagonwoto  No. 788, Sorong 18276, Pabar','Jr. Krakatau No. 502, Ambon 94832, Lampung','025 3391 336','15.498.838.7-235.023','kartika.nasyiah@example.org','tania.palastri@example.org','Menikah','tidak aktif','1979-06-30',NULL),(4,8,'Taswir Hakim','EMP-0003','2025-04-15 18:56:58','2025-05-21 18:40:26','SD','Non-Akademik','Pegawai Harian','Office Girl','Laki-laki','AB','Cilegon','1985-03-17','627756289892303','637646978486802','3314901007999600','350877582890518288','Konghucu','SMA','Kpg. Bah Jaya No. 454, Tasikmalaya 98351, Sulbar','Ki. Sudirman No. 639, Makassar 33251, NTB','(+62) 324 8571 849','89.770.876.4-404.378','elvina.safitri@example.net','prabowo29@example.net','Cerai','tidak aktif','2016-02-13',NULL),(5,NULL,'Puti Yuliarti','EMP-0004','2025-04-15 18:56:58','2025-04-15 18:56:58','SD','Non-Akademik','Pegawai Tetap','TIC','Laki-laki','AB','Banjar','1991-10-11','627380019597172','637504160317668','9106635708170464','360962025825800674','Konghucu','S2','Jln. Flora No. 895, Mojokerto 75982, Babel','Ds. Ters. Pasir Koja No. 383, Tegal 40835, Pabar','(+62) 321 2207 6763','08.469.932.8-517.369','sabar08@example.net','kusmawati.okta@example.com','Belum Menikah','aktif','2018-07-03',NULL),(6,9,'Koko Thamrin','EMP-0005','2025-04-15 18:56:58','2025-05-21 18:41:05','PGTK','Akademik','Pegawai Tetap','Principal','Laki-laki','O','Kupang','1976-09-19','627777554999330','637714028593710','7312985008038391','353047610749536863','Islam','D3','Dk. Bakin No. 913, Magelang 62673, NTB','Jln. Cihampelas No. 716, Cilegon 32082, NTB','0808 0219 5534','19.526.420.4-994.059','ynasyidah@example.org','bhasanah@example.com','Cerai','tidak aktif','1971-07-11',NULL),(7,4,'Lidya Keisha Halimah S.Sos','EMP-0006','2025-04-15 18:56:58','2025-04-15 18:58:30','SD','Akademik','Pegawai Kontrak','Staff Finance','Laki-laki','B','Kotamobagu','2001-09-03','627693555368207','637846719829680','3604377110222294','367700144140508462','Katolik','D3','Dk. Abdul Muis No. 621, Blitar 76607, Jabar','Ki. Wahidin Sudirohusodo No. 888, Bandar Lampung 52194, Kalteng','0470 2427 5490','38.344.122.4-370.400','sinaga.kamila@example.com','kasiyah79@example.com','Menikah','aktif','1974-07-02',NULL),(8,NULL,'Pandu Gaiman Ardianto','EMP-0007','2025-04-15 18:56:58','2025-04-15 18:56:58','SD','Akademik','Pegawai Harian','TIC','Laki-laki','O','Bukittinggi','1996-06-27','627587162873631','637604665259900','3319945102983762','308278603602961776','Katolik','SMA','Ki. Nanas No. 928, Bitung 29807, Sulut','Jr. Laswi No. 955, Malang 20503, Gorontalo','0801 7592 4648','18.256.684.7-809.128','mala.putra@example.com','ganda21@example.com','Cerai','tidak aktif','2022-06-10',NULL),(9,NULL,'Bakijan Lembah Lazuardi','EMP-0008','2025-04-15 18:56:58','2025-04-15 18:56:58','SD','Akademik','Pegawai Harian','Principal','Perempuan','B','Palu','1981-05-08','627033856604879','637292094077651','1601766210048674','337687601014673485','Katolik','D3','Jln. Babadan No. 953, Ambon 40402, Jabar','Gg. Nanas No. 892, Palopo 37258, Sulbar','0567 6531 484','96.241.883.8-709.713','restu.firmansyah@example.com','simbolon.aurora@example.net','Cerai','tidak aktif','1978-05-15',NULL),(10,1,'Yudha','EMP-0009','2025-04-15 18:56:58','2025-04-25 03:43:26','SMP','Non-Akademik','Pegawai Harian','IT','Laki-laki','AB','Tual','1994-07-02','627971187921054','637730836036726','1507181901183935','350460927071983480','Muslim','SMA','Jr. Ketandan No. 923, Sorong 46381, Jambi','Ki. Ekonomi No. 870, Bima 48236, Kalbar','0769 8873 360','85.925.030.2-660.504','harjasa.mustofa@example.com','prasetyo.sakti@example.com','Menikah','aktif','1976-12-06',NULL),(11,NULL,'Hamzah Hidayat','EMP-0010','2025-04-15 18:56:58','2025-04-15 18:56:58','SD','Non-Akademik','Pegawai Kontrak','Staff Operasional','Perempuan','A','Gorontalo','1997-06-22','627295141596696','637265760882383','6108560203128096','396601348666985112','Buddha','S1','Jln. Sugiyopranoto No. 701, Tegal 85472, Pabar','Gg. PHH. Mustofa No. 342, Parepare 61753, Kaltim','(+62) 828 2864 349','32.218.531.8-690.387','marpaung.gadang@example.org','sihombing.zaenab@example.net','Belum Menikah','tidak aktif','2004-05-23',NULL);
/*!40000 ALTER TABLE `employees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `equipment_loans`
--

LOCK TABLES `equipment_loans` WRITE;
/*!40000 ALTER TABLE `equipment_loans` DISABLE KEYS */;
INSERT INTO `equipment_loans` VALUES (1,1,'Laptop','SMP','Non-Akademik','2025-05-28','2025-05-31','test','pending',1,'non-akademik',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-05-28 00:04:36','2025-05-28 00:04:36');
/*!40000 ALTER TABLE `equipment_loans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `fixing_requests`
--

LOCK TABLES `fixing_requests` WRITE;
/*!40000 ALTER TABLE `fixing_requests` DISABLE KEYS */;
INSERT INTO `fixing_requests` VALUES (1,4,'Laptop','SD','Akademik','Butuh bantuan install windows',NULL,'rejected',1,'non-akademik',NULL,NULL,NULL,NULL,'Contoh',NULL,NULL,'2025-04-16 07:52:38','2025-04-16 07:53:06'),(2,1,'PC','SMP','Non-Akademik','test','fixing_documents/QGt8BRowhQfu0Ql03CUbf3bkO93E0YgcDC3U7e5n.jpg','pending',1,'non-akademik',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-05-27 21:31:56','2025-05-27 21:31:56');
/*!40000 ALTER TABLE `fixing_requests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `izin_briefs`
--

LOCK TABLES `izin_briefs` WRITE;
/*!40000 ALTER TABLE `izin_briefs` DISABLE KEYS */;
INSERT INTO `izin_briefs` VALUES (6,2,'2025-05-17','10.00 - 12.00','Contoh keterangan','private/dokumen_brief/IUgbT7zoZod8xMIUqdcYlgZFlxYSmQ3nBLex3Ebj.pdf','approved',NULL,NULL,NULL,'2025-05-21 19:04:34','2025-05-21 19:05:09',0,NULL,'non-akademik',NULL,NULL,NULL),(7,2,'2025-06-06','22:37 - 24:52','Menghadiri rapat dengan klien',NULL,'pending',NULL,NULL,NULL,'2025-05-29 12:49:14','2025-06-03 08:27:59',2,NULL,'akademik',NULL,NULL,NULL),(8,3,'2025-06-06','15:54 - 17:43','Menghadiri rapat dengan klien',NULL,'pending',NULL,NULL,NULL,'2025-05-31 02:56:29','2025-06-03 08:27:59',2,NULL,'akademik',NULL,NULL,NULL),(9,2,'2025-06-13','14:49 - 17:35','Meeting dengan vendor',NULL,'pending',NULL,NULL,NULL,'2025-06-02 06:21:41','2025-06-03 08:29:34',2,NULL,'akademik',NULL,NULL,NULL),(10,3,'2025-06-09','10:31 - 12:54','Konsultasi dokter',NULL,'pending',NULL,NULL,NULL,'2025-05-30 07:18:06','2025-06-03 08:29:34',1,NULL,'akademik',NULL,NULL,NULL),(11,2,'2025-06-11','07:45 - 11:31','Konsultasi dokter',NULL,'pending',NULL,NULL,NULL,'2025-06-01 02:40:00','2025-06-03 08:30:57',1,NULL,'akademik',NULL,NULL,NULL),(12,3,'2025-06-12','19:18 - 21:52','Meeting dengan vendor',NULL,'pending',NULL,NULL,NULL,'2025-06-01 16:02:56','2025-06-03 08:30:57',1,NULL,'akademik',NULL,NULL,NULL);
/*!40000 ALTER TABLE `izin_briefs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `klaim_berobats`
--

LOCK TABLES `klaim_berobats` WRITE;
/*!40000 ALTER TABLE `klaim_berobats` DISABLE KEYS */;
INSERT INTO `klaim_berobats` VALUES (4,2,'2025-05-17','Asman','Diri Sendiri','Demam Tinggi','Dokter Joko','Rumah Sakit Restu Ibu',1000000.00,'private/klaim_berobat/n9zB6AGnrtDBVVxXsy38WFbQLreHO7wYyhljYaLj.pdf','pending',NULL,NULL,NULL,'2025-05-21 19:13:50','2025-05-21 19:13:50',1,NULL,'non-akademik',NULL,NULL,NULL),(5,2,'2025-05-28','Hamima Widiastuti M.M.','Suami/Istri','Diabetes mellitus','Dr. Hesti Padma Laksmiwati','RS Premier',651920.00,'uploads/klaim/ff6d48af-c3b3-3494-be41-566836ebcf32.pdf','pending',NULL,NULL,NULL,'2025-05-29 22:04:32','2025-06-03 08:30:57',2,NULL,'akademik',NULL,NULL,NULL),(6,3,'2025-05-19','Atma Sihombing','Anak','Gastritis','Dr. Rafi Nashiruddin','RS Hermina',2113503.00,'uploads/klaim/aae801fd-bee2-3648-ad60-b8f2ea5d331f.pdf','pending',NULL,NULL,NULL,'2025-06-03 06:53:35','2025-06-03 08:30:57',1,NULL,'akademik',NULL,NULL,NULL);
/*!40000 ALTER TABLE `klaim_berobats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `lembur_honor`
--

LOCK TABLES `lembur_honor` WRITE;
/*!40000 ALTER TABLE `lembur_honor` DISABLE KEYS */;
INSERT INTO `lembur_honor` VALUES (7,2,'lembur','2025-05-17','2025-05-17',NULL,NULL,3,'Mengerjakan Report','Gedung A','Melanjutkan pengerjaan report bulanan','1747883785_996016739721000-0100042551239100-020672895072000-20250516214340.pdf','approved',7,NULL,NULL,NULL,'2025-05-21 20:16:25','2025-05-21 20:17:19',0,'non-akademik',NULL,NULL),(8,2,'lembur','2025-05-10','2025-05-10','17:00:00','19:00:00',5,'Penyelesaian project urgent','Gedung A','Quibusdam doloremque non sapiente tenetur pariatur voluptate ducimus blanditiis ipsam ex.',NULL,'pending',NULL,NULL,NULL,NULL,'2025-05-31 17:35:11','2025-06-03 08:30:57',1,'akademik',NULL,NULL),(9,3,'honor','2025-05-20','2025-05-20','17:00:00','21:00:00',5,'Laporan keuangan bulanan','Laboratorium','Qui dolorem cumque id possimus odio quod veritatis et sit rerum sapiente aut temporibus sed sit ut.',NULL,'pending',NULL,NULL,NULL,NULL,'2025-05-31 17:07:59','2025-06-03 08:30:57',2,'akademik',NULL,NULL);
/*!40000 ALTER TABLE `lembur_honor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2025_03_19_172646_create_students_table',2),(5,'2025_03_13_043954_create_employees_table',3),(6,'2025_03_13_054908_create_salary_components_table',3),(7,'2025_03_13_060413_create_shifts_table',3),(8,'2025_03_13_060415_create_schedules_table',3),(9,'2025_03_13_060525_create_absences_table',3),(10,'2025_03_13_062838_create_payrolls_table',3),(11,'2025_03_13_063022_create_payroll_components_table',3),(12,'2025_04_15_170239_create_roles_table',4),(13,'2025_04_15_170313_add_role_id_on_users_table',4),(14,'2025_04_15_173709_update_employees_table',4),(15,'2025_04_15_175559_create_cutis_table',4),(16,'2025_04_15_183058_create_fixing_requests_table',4),(17,'2025_04_24_041326_create_student_registrations_table',5),(18,'2025_04_24_042249_create_admission_activities_table',6),(19,'2025_04_24_043818_create_barangs_table',7),(20,'2025_04_24_043826_create_pengecekan_barangs_table',7),(21,'2025_04_24_053205_create_operational_requests_table',8),(22,'2025_04_30_023741_create_pengajuan_fotocopy_table',9),(23,'2025_04_30_025142_create_peminjaman_ruangans_table',10),(24,'2025_05_01_000001_create_user_permissions_table',11),(25,'2025_05_01_000002_create_approval_workflows_table',12),(26,'2025_05_01_000003_create_approval_requests_table',12),(28,'2025_05_02_000000_update_approval_settings_for_hierarchy',14),(29,'2025_05_02_000000_create_approval_workflows_table',15),(30,'2025_05_03_000000_add_approval_fields_to_cuti_table',15),(32,'2025_05_01_000000_create_approval_settings_table',17),(33,'2025_05_01_000001_add_approval_fields_to_cutis_table',18),(34,'2024_03_21_create_cuti_approvals_table',19),(35,'2024_03_21_update_approval_settings_table',20),(36,'2025_05_02_000000_add_department_type_to_cutis',21),(37,'2025_05_03_000000_create_approval_flows_table',21),(38,'2023_10_01_create_approval_settings_table',22),(39,'2023_10_02_add_role_id_to_approval_settings',22),(40,'2025_05_21_162602_create_approval_settings_table',23),(42,'2025_05_21_163938_create_izin_briefs_table',24),(43,'2025_06_05_113025_create_klaim_berobats_table',25),(44,'2025_07_01_000000_create_slip_gaji_skk_table',26),(45,'2023_08_01_000004_create_pinjaman_cicilan_table',27),(46,'2023_08_01_000005_create_lembur_honor_table',28),(47,'2025_05_21_191230_create_surat_tugas_table',29),(48,'2025_05_22_175751_add_approval_level_to_approvers_table',30),(49,'2025_05_22_182855_add_department_type_to_approvers_table',31),(55,'2024_03_23_000000_add_approval_fields_to_request_fotocopies',32),(56,'2025_05_21_163026_create_approvers_table',32),(57,'2025_05_23_000000_add_approval_tracking_fields',33),(58,'2025_05_28_000000_create_equipment_loans_table',33),(59,'2025_05_28_000000_create_request_atk_table',33),(60,'2025_05_28_035246_add_employee_id_to_pengajuan_fotocopy_table',34),(61,'2025_05_28_035307_modify_pengajuan_fotocopy_table',34),(62,'2025_05_28_051426_create_permintaan_designs_table',34),(63,'2025_05_28_000000_add_approval_fields_to_pengajuan_fotocopy',35),(64,'2024_03_28_create_approvals_table',36),(65,'2025_05_28_000000_add_approval_fields_to_request_atk',37),(66,'2025_06_03_131516_add_approval_fields_to_request_atk_table',37),(67,'2025_06_03_134912_add_missing_approval_fields_to_izin_briefs_table',38),(68,'2025_06_03_135222_add_approval_fields_to_klaim_berobat_table',39),(69,'2025_06_03_140320_add_approval_fields_to_slip_gaji_skk_table',40),(70,'2025_06_03_141849_add_approval_fields_to_equipment_loans_table',41),(71,'2025_06_03_141849_add_approval_fields_to_fixing_requests_table',41),(72,'2025_06_03_141849_add_approval_fields_to_lembur_honor_table',42),(73,'2025_06_03_141849_add_approval_fields_to_peminjaman_ruangan_table',42),(74,'2025_06_03_141849_add_approval_fields_to_permintaan_designs_table',43),(75,'2025_06_03_141849_add_approval_fields_to_surat_tugas_table',44),(76,'2025_06_03_141850_add_approval_fields_to_operational_requests_table',44),(77,'2025_06_04_004732_add_missing_approval_fields_to_cutis_table',45);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `operational_requests`
--

LOCK TABLES `operational_requests` WRITE;
/*!40000 ALTER TABLE `operational_requests` DISABLE KEYS */;
INSERT INTO `operational_requests` VALUES (2,'SD','Akademik','Lidya Keisha Halimah S.Sos','Mobil','2025-05-01','12:00:00','17:00:00','Jakarta Pusat, Grand Indonesia Mall','Meeting dengan Vendor Aplikasi','Butuh dengan driver juga','pending',1,'non-akademik',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-04-23 21:42:30','2025-04-23 21:45:18'),(3,'SD','Akademik','Lidya Keisha Halimah S.Sos','Mobil','2025-04-25','12:00:00','17:00:00','Jakarta Selatan','Meeting','-','pending',1,'non-akademik',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-04-23 22:52:55','2025-04-23 22:52:55'),(5,'SMP','Non-Akademik','Yudha','Kurir','2025-05-28','12:30:00','13:00:00','test','test','test','pending',1,'non-akademik',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-05-27 22:29:36','2025-05-27 22:29:36'),(6,'SMP','Non-Akademik','Yudha','Kurir','2025-05-28','10:30:00','13:00:00','test','test','test','pending',1,'non-akademik',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-05-28 00:06:07','2025-05-28 00:06:07');
/*!40000 ALTER TABLE `operational_requests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `payroll_components`
--

LOCK TABLES `payroll_components` WRITE;
/*!40000 ALTER TABLE `payroll_components` DISABLE KEYS */;
/*!40000 ALTER TABLE `payroll_components` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `payrolls`
--

LOCK TABLES `payrolls` WRITE;
/*!40000 ALTER TABLE `payrolls` DISABLE KEYS */;
/*!40000 ALTER TABLE `payrolls` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `peminjaman_ruangan`
--

LOCK TABLES `peminjaman_ruangan` WRITE;
/*!40000 ALTER TABLE `peminjaman_ruangan` DISABLE KEYS */;
INSERT INTO `peminjaman_ruangan` VALUES (1,'Yudha','2025-05-28','2025-05-29','09:00 - 12:00','SMP','test','test','test','\"[\\\"Ruang C\\\"]\"','\"[\\\"1\\\"]\"','\"[\\\"test\\\"]\"','pending',1,'non-akademik',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-05-27 22:00:06','2025-05-27 22:00:06'),(3,'Yudha','2025-05-28','2025-05-28','09:00 - 12:00','SMP','Non-Akademik','test','test','\"[\\\"Ruang B\\\"]\"','\"[\\\"1\\\"]\"','\"[\\\"test\\\"]\"','pending',1,'non-akademik',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-05-28 00:04:56','2025-05-28 00:04:56');
/*!40000 ALTER TABLE `peminjaman_ruangan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `pengajuan_fotocopy`
--

LOCK TABLES `pengajuan_fotocopy` WRITE;
/*!40000 ALTER TABLE `pengajuan_fotocopy` DISABLE KEYS */;
INSERT INTO `pengajuan_fotocopy` VALUES (22,10,'Yudha','1507181901183935','SMP','Non-Akademik','aktif','IT','teest','test','test','2025-05-28','[\"tst\"]','[\"1\"]','[\"1\"]','[\"test\"]','approved',1,NULL,NULL,NULL,'2025-05-27 23:51:36','2025-05-28 00:01:02',0,'approved',NULL,'2025-05-28 00:01:02','non-akademik'),(23,10,'Yudha','1507181901183935','SMP','Non-Akademik','aktif','IT','test','test','test','2025-05-29','[\"test\"]','[\"1\"]','[\"1\"]','[\"test\"]','approved',1,NULL,NULL,NULL,'2025-05-28 00:01:22','2025-05-28 10:14:49',0,'approved',NULL,'2025-05-28 10:14:49','non-akademik'),(24,10,'Yudha','1507181901183935','SMP','Non-Akademik','aktif','IT','test','test','test','2025-05-30','[\"test\"]','[\"1\"]','[\"1\"]','[\"test\"]','pending',NULL,NULL,NULL,NULL,'2025-05-28 10:15:59','2025-05-28 10:15:59',1,NULL,NULL,NULL,'non-akademik'),(25,10,'Yudha','1507181901183935','SMP','Non-Akademik','aktif','IT','test','test','1','2025-05-06','[\"test\"]','[\"1\"]','[\"1\"]','[\"tsess\"]','pending',NULL,NULL,NULL,NULL,'2025-05-28 10:19:48','2025-05-28 10:19:48',1,NULL,NULL,NULL,'non-akademik');
/*!40000 ALTER TABLE `pengajuan_fotocopy` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `pengecekan_barang`
--

LOCK TABLES `pengecekan_barang` WRITE;
/*!40000 ALTER TABLE `pengecekan_barang` DISABLE KEYS */;
INSERT INTO `pengecekan_barang` VALUES (1,1,'2025-04-24','Sangat Baik','2025-04-23 20:57:43','2025-04-23 20:58:19'),(3,3,'2025-04-25','Baik','2025-04-23 22:46:20','2025-04-23 22:46:20'),(4,3,'2025-04-26','LCD Rusak','2025-04-23 22:46:41','2025-04-23 22:46:41');
/*!40000 ALTER TABLE `pengecekan_barang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `permintaan_designs`
--

LOCK TABLES `permintaan_designs` WRITE;
/*!40000 ALTER TABLE `permintaan_designs` DISABLE KEYS */;
INSERT INTO `permintaan_designs` VALUES (1,1,'Yudha','yudha@sekolahnoah.sch.id','SMP','Non-Akademik','PDF',NULL,'test','test','2025-05-23','permintaan_design/BZbz8BhaJGnIZwXLUz5qKQYYhztfKKc8UzQ3SzTK.jpg','pending',1,'non-akademik',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-05-28 00:05:26','2025-05-28 00:05:39');
/*!40000 ALTER TABLE `permintaan_designs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `pinjaman_cicilan`
--

LOCK TABLES `pinjaman_cicilan` WRITE;
/*!40000 ALTER TABLE `pinjaman_cicilan` DISABLE KEYS */;
INSERT INTO `pinjaman_cicilan` VALUES (3,10,1000000.00,'tes',2,500000.00,'2025-06-03',NULL,'pending',NULL,NULL,NULL,'2025-06-03 08:44:25','2025-06-03 08:44:25',0,NULL,NULL);
/*!40000 ALTER TABLE `pinjaman_cicilan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `request_atk`
--

LOCK TABLES `request_atk` WRITE;
/*!40000 ALTER TABLE `request_atk` DISABLE KEYS */;
INSERT INTO `request_atk` VALUES (2,NULL,'Yudha','EMP-0009','SMP','Non-Akademik','Pegawai Harian','IT','\"[\\\"tes\\\"]\"','\"[\\\"1\\\"]\"','\"[\\\"pcs\\\"]\"','\"[\\\"test\\\"]\"','pending',1,'non-akademik',NULL,NULL,NULL,NULL,'2025-05-27 23:53:53','2025-05-27 23:53:53',NULL,NULL),(3,NULL,'Yudha','EMP-0009','SMP','Non-Akademik','Pegawai Harian','IT','\"[\\\"test\\\"]\"','\"[\\\"1\\\"]\"','\"[\\\"pcs\\\"]\"','\"[\\\"test\\\"]\"','pending',1,'non-akademik',NULL,NULL,NULL,NULL,'2025-05-27 23:54:04','2025-05-27 23:54:04',NULL,NULL),(4,NULL,'Yudha','1507181901183935','SMP','Non-Akademik','aktif','IT','[\"test\"]','[\"1\"]','[\"pcs\"]','[\"test\"]','pending',1,'non-akademik',NULL,NULL,NULL,NULL,'2025-05-28 00:09:02','2025-05-28 00:09:02',NULL,NULL),(5,NULL,'Yudha','1507181901183935','SMP','Non-Akademik','aktif','IT','[\"test\"]','[\"1\"]','[\"box\"]','[\"test\"]','pending',1,'non-akademik',NULL,NULL,NULL,NULL,'2025-05-28 00:09:16','2025-05-28 00:09:16',NULL,NULL),(6,4,'Taswir Hakim','EMP-0003','SD','Non-Akademik','Pegawai Harian','Office Girl','\"Pulpen, Kertas A4, Spidol\"','\"10 pcs, 1 rim, 5 pcs\"','\"pcs, rim, pcs\"','\"Untuk keperluan administrasi harian\"','pending',1,'non-akademik',NULL,NULL,NULL,NULL,'2025-06-03 08:46:43','2025-06-03 08:46:43',NULL,NULL);
/*!40000 ALTER TABLE `request_atk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Admin',NULL,NULL),(2,'User',NULL,NULL);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `salary_components`
--

LOCK TABLES `salary_components` WRITE;
/*!40000 ALTER TABLE `salary_components` DISABLE KEYS */;
/*!40000 ALTER TABLE `salary_components` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `schedules`
--

LOCK TABLES `schedules` WRITE;
/*!40000 ALTER TABLE `schedules` DISABLE KEYS */;
INSERT INTO `schedules` VALUES (1,1,2,'2025-04-16','2025-04-16 07:31:13','2025-04-16 07:31:13'),(2,2,3,'2025-04-17','2025-04-16 07:31:28','2025-04-16 07:31:28');
/*!40000 ALTER TABLE `schedules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('t6inZiKobsLT4tPvMnC5FkLc2Hf20d3BQ5znfUQd',1,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36','YTo1OntzOjY6Il90b2tlbiI7czo0MDoidFRtNDlXSWdYdXZCRVRxNE44dXJWbDVzeDY2VU9rRmVnOFpaM1M1dSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyNzoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL3VzZXJzIjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbmlzdHJhc2kvcmVxdWVzdC1hdGsiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=',1748966890);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `shifts`
--

LOCK TABLES `shifts` WRITE;
/*!40000 ALTER TABLE `shifts` DISABLE KEYS */;
INSERT INTO `shifts` VALUES (1,'Shift Pagi','Shift Pagi Pegawai','21:00:00','17:00:00','2025-04-16 07:29:46','2025-04-16 07:29:46'),(2,'Shift Siang','Shift Siang Pegawai','12:00:00','19:30:00','2025-04-16 07:30:19','2025-04-16 07:30:19');
/*!40000 ALTER TABLE `shifts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `slip_gaji_skk`
--

LOCK TABLES `slip_gaji_skk` WRITE;
/*!40000 ALTER TABLE `slip_gaji_skk` DISABLE KEYS */;
INSERT INTO `slip_gaji_skk` VALUES (4,2,'Slip Gaji','Kebutuhan Slip Gaji','2025-05','private/slip_gaji_skk/HZDxwJjFrmuu7WQz2IHdnUmkMEKW7feAehfj11FH.pdf','approved',NULL,NULL,NULL,'2025-05-21 19:33:13','2025-05-21 19:35:28',0,NULL,'non-akademik',NULL,NULL,NULL);
/*!40000 ALTER TABLE `slip_gaji_skk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `student_registrations`
--

LOCK TABLES `student_registrations` WRITE;
/*!40000 ALTER TABLE `student_registrations` DISABLE KEYS */;
INSERT INTO `student_registrations` VALUES (1,'Kevin Handoko','VII','SD Negeri 01 Jakarta Utara','Diterima',1,1,1,1,'2025-04-23 20:17:38','2025-04-23 20:19:01'),(2,'David','XII','SD Negeri 01 Jakarta utara','Diterima',1,1,1,1,'2025-04-23 22:23:45','2025-04-23 22:24:52');
/*!40000 ALTER TABLE `student_registrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `students`
--

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` VALUES (1,'Andi Pratama','123456789','987654321','Andi','5A','Jakarta','2010-04-15','male','Islam','Indonesian','Jl. Merdeka No. 123, Jakarta','Jakarta','10110','Father and Mother',1,'SD Harapan Bangsa','4B','Jl. Pendidikan No. 45, Jakarta','021-1234567','Budi Pratama','budi@example.com','081234567890','Indonesian','3501234567890001',NULL,'Engineer','PT. ABC','Senior Engineer','021-5678901','Jl. Industri No. 10, Jakarta',15000000.00,'Siti Aisyah','siti@example.com','082345678901','Indonesian','3509876543210002',NULL,'Teacher','SMP Negeri 1','Mathematics Teacher','021-2345678','Jl. Pendidikan No. 5, Jakarta',8000000.00,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-03-19 09:53:40','2025-03-19 09:53:40'),(2,'Rina Sari','987654321','123456789','Rina','4B','Surabaya','2011-06-30','female','Christianity','Indonesian','Jl. Raya No. 456, Surabaya','Surabaya','60123','Mother',0,'SD Pahlawan','3A','Jl. Pahlawan No. 12, Surabaya','031-2345678','Krisna Sari','krisna@example.com','081234567891','Indonesian','3509876543210003',NULL,'Doctor','RSUD Surabaya','Surgeon','031-9876543','Jl. Kesehatan No. 2, Surabaya',20000000.00,'Dewi Lestari','dewi@example.com','082345678902','Indonesian','3501234567890004',NULL,'Nurse','RSUD Surabaya','Senior Nurse','031-8765432','Jl. Kesehatan No. 2, Surabaya',10000000.00,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2025-03-19 09:53:40','2025-03-19 09:53:40');
/*!40000 ALTER TABLE `students` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `surat_tugas`
--

LOCK TABLES `surat_tugas` WRITE;
/*!40000 ALTER TABLE `surat_tugas` DISABLE KEYS */;
INSERT INTO `surat_tugas` VALUES (4,2,NULL,'Tugas A','Deskripsi Tugas','Melakukan Tugas','2025-05-17','2025-05-18','Jakarta Pusat','Keterangan Tambahan','1747884753_996016739721000-0100042551239098-020672895072000-20250320193004.pdf','pending',NULL,NULL,NULL,NULL,NULL,'2025-05-21 20:32:33','2025-05-21 20:32:33',1,NULL,'non-akademik',NULL),(5,2,'ST/2025/872','Pelatihan Pengembangan SDM','Ut quo dolor vel qui dolorem nam ex. Consequatur accusamus pariatur tenetur qui et excepturi dolorum ab. Tempora sed quia nihil vel repellat. Ut rem doloremque nihil sed.','Eum sit dolorem ipsam ut quasi aliquid laborum dolor sapiente explicabo minima.','2025-07-02','2025-07-28','Padangpanjang','Perferendis beatae id iste rerum. Atque reiciendis magni ut error.',NULL,'pending',NULL,NULL,NULL,NULL,NULL,'2025-06-01 15:47:05','2025-06-03 08:30:57',2,NULL,'akademik',NULL),(6,3,'ST/2025/950','Kunjungan Kerja ke Cabang','Reiciendis magnam et laboriosam ut incidunt delectus consequatur. Consequatur hic nostrum quia vel voluptatibus. Repellendus velit voluptates laborum et quaerat nesciunt.','Voluptatem ut sit corporis delectus cupiditate alias tenetur.','2025-06-17','2025-07-14','Palopo','Est qui nemo omnis. Impedit sit perferendis sed quasi eos repudiandae nobis ab. Vel explicabo repellat quaerat aperiam.',NULL,'pending',NULL,NULL,NULL,NULL,NULL,'2025-06-01 13:00:55','2025-06-03 08:30:57',2,NULL,'akademik',NULL);
/*!40000 ALTER TABLE `surat_tugas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `user_permissions`
--

LOCK TABLES `user_permissions` WRITE;
/*!40000 ALTER TABLE `user_permissions` DISABLE KEYS */;
INSERT INTO `user_permissions` VALUES (1,5,'dashboard',1,'2025-05-21 03:04:18','2025-05-21 03:04:18'),(2,5,'students',0,'2025-05-21 03:04:18','2025-05-21 03:04:18'),(3,5,'employee',0,'2025-05-21 03:04:18','2025-05-21 03:04:18'),(4,5,'salary_components',0,'2025-05-21 03:04:18','2025-05-21 03:04:18'),(5,5,'absence',0,'2025-05-21 03:04:18','2025-05-21 03:04:18'),(6,5,'payroll',0,'2025-05-21 03:04:18','2025-05-21 03:04:18'),(7,5,'shifts',0,'2025-05-21 03:04:18','2025-05-21 03:04:18'),(8,5,'schedules',0,'2025-05-21 03:04:18','2025-05-21 03:04:18'),(9,5,'kinerja',0,'2025-05-21 03:04:18','2025-05-21 03:04:18'),(10,5,'cuti',0,'2025-05-21 03:04:18','2025-05-21 03:04:18'),(11,5,'brief_absen',0,'2025-05-21 03:04:18','2025-05-21 03:04:18'),(12,5,'klaim_berobat',0,'2025-05-21 03:04:18','2025-05-21 03:04:18'),(13,5,'slip_gaji_skk',0,'2025-05-21 03:04:18','2025-05-21 03:04:18'),(14,5,'pinjaman_cicilan',0,'2025-05-21 03:04:18','2025-05-21 03:04:18'),(15,5,'lembur_honor',0,'2025-05-21 03:04:18','2025-05-21 03:04:18'),(16,5,'surat_tugas',0,'2025-05-21 03:04:18','2025-05-21 03:04:18'),(17,5,'fixing_request',0,'2025-05-21 03:04:18','2025-05-21 03:04:18'),(18,5,'equipment_loan',0,'2025-05-21 03:04:18','2025-05-21 03:04:18'),(19,5,'barang',0,'2025-05-21 03:04:18','2025-05-21 03:04:18'),(20,5,'pengecekan_barang',0,'2025-05-21 03:04:18','2025-05-21 03:04:18'),(21,5,'kurir_mobil',0,'2025-05-21 03:04:18','2025-05-21 03:04:18'),(22,5,'peminjaman',0,'2025-05-21 03:04:18','2025-05-21 03:04:18'),(23,5,'request_fotocopy',0,'2025-05-21 03:04:18','2025-05-21 03:04:18'),(24,5,'surat_masuk',0,'2025-05-21 03:04:18','2025-05-21 03:04:18'),(25,5,'surat_keluar',0,'2025-05-21 03:04:18','2025-05-21 03:04:18'),(26,5,'pembayaran_siswa',0,'2025-05-21 03:04:18','2025-05-21 03:04:18'),(27,5,'aktiva_tetap',0,'2025-05-21 03:04:18','2025-05-21 03:04:18'),(28,5,'pengajuan_dana_bank',0,'2025-05-21 03:04:18','2025-05-21 03:04:18'),(29,5,'admission_pendaftaran',0,'2025-05-21 03:04:18','2025-05-21 03:04:18'),(30,5,'admission_kegiatan',0,'2025-05-21 03:04:18','2025-05-21 03:04:18'),(31,5,'dms',0,'2025-05-21 03:04:18','2025-05-21 03:04:18'),(32,5,'sop',0,'2025-05-21 03:04:18','2025-05-21 03:04:18'),(33,5,'regulasi',0,'2025-05-21 03:04:18','2025-05-21 03:04:18'),(34,5,'users',0,'2025-05-21 03:04:18','2025-05-21 03:04:18'),(35,5,'calendar',0,'2025-05-21 03:04:18','2025-05-21 03:04:18'),(36,5,'pengumuman',0,'2025-05-21 03:04:18','2025-05-21 03:04:18'),(37,5,'kelas',0,'2025-05-21 03:04:18','2025-05-21 03:04:18'),(38,5,'permintaan_design',0,'2025-05-21 03:04:18','2025-05-21 03:04:18'),(39,5,'settings_approval',0,'2025-05-21 03:04:18','2025-05-21 03:04:18'),(40,5,'settings_general',0,'2025-05-21 03:04:18','2025-05-21 03:04:18');
/*!40000 ALTER TABLE `user_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Yudha','yudha@sekolahnoah.sch.id',NULL,'$2y$12$cXDTERa2E2si6vT9doBfKOq94C/6Qts/kup7kGBtp9u8kMjTo8aUK',NULL,NULL,'2025-04-25 03:43:26',1),(2,'Test User','test@example.com','2025-04-15 18:55:41','$2y$12$Lru2GQFuP9ht/luOU1l3jO6xF.1cM2Wrj/4IgWKLtEFTGph.KpGuK','JsIC44FMsx','2025-04-15 18:55:41','2025-04-15 18:55:41',NULL),(4,'Lidya Keisha Halimah S.Sos','lidya@gmail.com',NULL,'$2y$12$.fMu5sOY4Wr5HUR/xQVz3.ILvmux7ypUCmU2uM9BItPt5ve7TMy5e',NULL,'2025-04-15 18:58:30','2025-04-15 18:58:30',2),(5,'test1','test@gmail.com',NULL,'$2y$12$9Silpa.GlinhPQJeb6FmteeZn.1f77Hbq.Ardc9Wa1GN/.4i7s6Ti',NULL,NULL,'2025-05-21 01:39:21',NULL),(6,'Karyawan 1','karyawan1@gmail.com',NULL,'$2y$12$ad9jBbYY1uLV3AkNtACEheIZswkWtbInlKmUVqc9og0.DjWnNRkOq',NULL,'2025-05-21 18:37:34','2025-05-21 18:37:34',2),(7,'Approval 1','approval1@gmail.com',NULL,'$2y$12$RXFW.gv53s1NI5fXX.ZTReHMC8Qb5P7T5z/lEkSySABzm5qlF.cUS',NULL,'2025-05-21 18:38:07','2025-06-02 03:25:22',2),(8,'Approval 2','approval2@gmail.com',NULL,'$2y$12$OhZOQKrHw8ARreCTXfDM..qxJ5AeDL4jyEuOYAB49SGFAICKjBsAe',NULL,'2025-05-21 18:40:26','2025-06-02 03:25:31',2),(9,'Approval 3','approval3@gmail.com',NULL,'$2y$12$lZbFX7ITsQ9qdWX8gQwsP.L/k2lWCui0OgEy3DwL0XyFIfxOZzTtK',NULL,'2025-05-21 18:41:05','2025-06-02 03:25:43',1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-06-04  7:59:03
