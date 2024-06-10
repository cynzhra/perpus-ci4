/*
SQLyog Ultimate v10.42 
MySQL - 5.5.5-10.4.28-MariaDB : Database - library
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`library` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `library`;

/*Table structure for table `auth_activation_attempts` */

DROP TABLE IF EXISTS `auth_activation_attempts`;

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `auth_activation_attempts` */

/*Table structure for table `auth_groups` */

DROP TABLE IF EXISTS `auth_groups`;

CREATE TABLE `auth_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `auth_groups` */

insert  into `auth_groups`(`id`,`name`,`description`) values (1,'admin','Site Administrator'),(2,'user','Regular User');

/*Table structure for table `auth_groups_permissions` */

DROP TABLE IF EXISTS `auth_groups_permissions`;

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) unsigned NOT NULL DEFAULT 0,
  `permission_id` int(11) unsigned NOT NULL DEFAULT 0,
  KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  KEY `group_id_permission_id` (`group_id`,`permission_id`),
  CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `auth_groups_permissions` */

insert  into `auth_groups_permissions`(`group_id`,`permission_id`) values (1,1),(1,2),(1,3),(2,2),(2,4);

/*Table structure for table `auth_groups_users` */

DROP TABLE IF EXISTS `auth_groups_users`;

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) unsigned NOT NULL DEFAULT 0,
  `user_id` int(11) unsigned NOT NULL DEFAULT 0,
  KEY `auth_groups_users_user_id_foreign` (`user_id`),
  KEY `group_id_user_id` (`group_id`,`user_id`),
  CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `auth_groups_users` */

insert  into `auth_groups_users`(`group_id`,`user_id`) values (1,9),(2,6),(2,7),(2,10);

/*Table structure for table `auth_logins` */

DROP TABLE IF EXISTS `auth_logins`;

CREATE TABLE `auth_logins` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) unsigned DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `email` (`email`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `auth_logins` */

insert  into `auth_logins`(`id`,`ip_address`,`email`,`user_id`,`date`,`success`) values (1,'::1','purple31@gmail.com',6,'2023-12-31 22:16:25',1),(2,'::1','purple31@gmail.com',6,'2023-12-31 22:44:27',1),(3,'::1','purple31@gmail.com',6,'2024-01-01 03:28:21',1),(4,'::1','purple31@gmail.com',6,'2024-01-01 03:30:37',1),(5,'::1','cynthiazahra26@gmail.com',7,'2024-01-01 03:34:19',1),(6,'::1','cynthiazhra',NULL,'2024-01-01 04:18:32',0),(7,'::1','cynthiazhra',NULL,'2024-01-01 04:19:18',0),(8,'::1','cynthiazhra',NULL,'2024-01-01 04:19:41',0),(9,'::1','cynthiazhra',NULL,'2024-01-01 04:21:03',0),(10,'::1','cynthiazhra',NULL,'2024-01-01 04:26:43',0),(11,'::1','cynthiazhra',NULL,'2024-01-01 04:26:54',0),(12,'::1','cynthiazhra',NULL,'2024-01-01 04:27:20',0),(13,'::1','cynthiazhra',NULL,'2024-01-01 04:27:36',0),(14,'::1','cynthiazhra@gmail.com',9,'2024-01-01 04:27:50',1),(15,'::1','purple31@gmail.com',6,'2024-01-01 04:31:33',1),(16,'::1','cynthiazhra@gmail.com',9,'2024-01-01 06:36:20',1),(17,'::1','cynthiazhra@gmail.com',9,'2024-01-01 08:12:49',1),(18,'::1','purple31@gmail.com',6,'2024-01-01 08:13:06',1),(19,'::1','cynthiazhra@gmail.com',9,'2024-01-01 08:37:53',1),(20,'::1','purple31@gmail.com',6,'2024-01-01 08:38:01',1),(21,'::1','cynthiazhra@gmail.com',9,'2024-01-01 10:30:47',1),(22,'::1','cynthiazhra@gmail.com',9,'2024-01-02 00:28:52',1),(23,'::1','cynthiazhra@gmail.com',9,'2024-01-02 14:30:17',1),(24,'::1','cynthiazhra@gmail.com',9,'2024-01-02 18:29:38',1),(25,'::1','cynthiazhra@gmail.com',9,'2024-01-02 20:40:15',1),(26,'::1','purple31@gmail.com',6,'2024-01-02 23:05:43',1),(27,'::1','cynthiazhra@gmail.com',9,'2024-01-02 23:07:31',1),(28,'::1','cynthiazhra@gmail.com',9,'2024-01-03 03:41:56',1),(29,'::1','cynthiazhra@gmail.com',9,'2024-01-03 03:57:12',1),(30,'::1','cynthiazhra@gmail.com',9,'2024-01-03 09:48:42',1),(31,'::1','purple31@gmail.com',6,'2024-01-03 12:00:33',1),(32,'::1','cynthiazhra@gmail.com',9,'2024-01-03 12:02:35',1),(33,'::1','purple31@gmail.com',6,'2024-01-03 12:45:14',1),(34,'::1','cynthiazhra@gmail.com',9,'2024-01-03 13:35:25',1),(35,'::1','purple31@gmail.com',6,'2024-01-03 13:36:48',1),(36,'::1','cynthiazhra@gmail.com',9,'2024-01-03 13:40:37',1),(37,'::1','purple31@gmail.com',6,'2024-01-03 13:48:20',1),(38,'::1','purpleee31@gmail.com',10,'2024-01-03 14:25:21',1);

/*Table structure for table `auth_permissions` */

DROP TABLE IF EXISTS `auth_permissions`;

CREATE TABLE `auth_permissions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `auth_permissions` */

insert  into `auth_permissions`(`id`,`name`,`description`) values (1,'manage-users','Manage All Users'),(2,'manage-profile','Manage user\'s profile'),(3,'manage-books','Manage all books'),(4,'books-user','Managing books entered by the user');

/*Table structure for table `auth_reset_attempts` */

DROP TABLE IF EXISTS `auth_reset_attempts`;

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `auth_reset_attempts` */

/*Table structure for table `auth_tokens` */

DROP TABLE IF EXISTS `auth_tokens`;

CREATE TABLE `auth_tokens` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `expires` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `auth_tokens_user_id_foreign` (`user_id`),
  KEY `selector` (`selector`),
  CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `auth_tokens` */

/*Table structure for table `auth_users_permissions` */

DROP TABLE IF EXISTS `auth_users_permissions`;

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) unsigned NOT NULL DEFAULT 0,
  `permission_id` int(11) unsigned NOT NULL DEFAULT 0,
  KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  KEY `user_id_permission_id` (`user_id`,`permission_id`),
  CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `auth_users_permissions` */

/*Table structure for table `book_access` */

DROP TABLE IF EXISTS `book_access`;

CREATE TABLE `book_access` (
  `access_id` int(3) NOT NULL AUTO_INCREMENT,
  `book_id` int(3) NOT NULL,
  `user_id` int(3) NOT NULL,
  PRIMARY KEY (`access_id`),
  KEY `book_id` (`book_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `book_access_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `book_access` */

/*Table structure for table `book_actions` */

DROP TABLE IF EXISTS `book_actions`;

CREATE TABLE `book_actions` (
  `action_id` int(3) NOT NULL AUTO_INCREMENT,
  `book_id` int(5) NOT NULL,
  `user_id` int(3) NOT NULL,
  `action_type` enum('create','read','update','delete') NOT NULL,
  `action_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`action_id`),
  KEY `book_id` (`book_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `book_actions_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `book_actions` */

/*Table structure for table `books` */

DROP TABLE IF EXISTS `books`;

CREATE TABLE `books` (
  `book_id` int(5) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `category_id` int(3) NOT NULL,
  `desc` text DEFAULT NULL,
  `qty` int(3) NOT NULL,
  `file_path` varchar(225) DEFAULT NULL,
  `cover_path` varchar(225) DEFAULT NULL,
  `user_id` int(3) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`book_id`),
  KEY `category_id` (`category_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `books_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `books` */

insert  into `books`(`book_id`,`title`,`slug`,`category_id`,`desc`,`qty`,`file_path`,`cover_path`,`user_id`,`created_at`,`updated_at`) values (1,'Metode Numerik','metode-numerik',3,'Buku ini membahas mengenai metode numerik yaitu teknik yang digunakan untuk memformulasikan persoalan matematika sehingga dapat dipecahkan dengan operasi perhitungan/ aritmetika biasa. Disertakan juga contoh penggunaan program komputer untuk menyelesaikan persoalan dengan metode numerik.',10,NULL,'1704292900_9f4a212b51623089631c.jpg',9,'2024-01-03 21:41:40','2024-01-03 14:41:40'),(2,'Metode Penelitian Kuantitatif, Kualitatif, dan R&D','metode-penelitian-kuantitatif-kualitatif-dan-rd',10,'',15,'file','metpen.jpg',0,'2024-01-03 02:18:10','2024-01-02 19:18:10'),(9,'Matematika Diskrit','matematika-diskrit',1,'',7,NULL,NULL,9,'2024-01-02 21:27:22','2024-01-02 21:27:22'),(11,'Matematika Kelas 11','matematika-kelas-11',3,'',88,'1704231788_a55ce9895f0d20e195f1.pdf','1704231788_b9ec43c2b87c733f6eea',9,'2024-01-02 21:43:08','2024-01-02 21:43:08'),(12,'Ipa','ipa',2,'',7,'1704231899_42193ea09edc2cb41552.pdf','1704231899_745bd2ec0852edb9f783',9,'2024-01-02 21:44:59','2024-01-02 21:44:59'),(13,'Seni, Tradisi, dan Mernitas Suara Remaja','seni-tradisi-dan-mernitas-suara-remaja',6,'',5,NULL,'1704235792_26256b104d643a84b070.png',9,'2024-01-03 05:49:52','2024-01-02 22:49:52'),(15,'abc','abc',4,'',6,NULL,'1704236355_8b5e6f6d2c939860ee17.png',9,'2024-01-03 05:59:15','2024-01-02 22:59:15'),(16,'Bumi Manusia','bumi-manusia',1,'Roman Tetralogi Buru mengambil latar belakang dan cikal bakal nation Indonesia di awal abad ke-20. Dengan membacanya waktu kita dibalikkan sedemikian rupa dan hidup di era membibitnya pergerakan nasional mula-mula, juga pertautan rasa, kegamangan jiwa, percintaan, dan pertarungan kekuatan anonim para srikandi yang mengawal penyemaian bangunan nasional yang kemudian kelak melahirkan Indonesia modern.',12,'1704286070_9a95f03b6ae707c025d0.pdf','1704286070_7bc2ff302198069c4069.jpg',6,'2024-01-03 12:47:50','2024-01-03 12:47:50'),(17,'Perahu Kertas','perahu-kertas',1,'Namanya Kugy. Mungil, pengkhayal, dan berantakan. Dari benaknya, mengalir untaian dongeng indah. Keenan belum pernah bertemu manusia seaneh itu.\r\n',5,'1704291834_70f89f5149fb47fefa8f.pdf','1704291834_cc118a330de978f1ad9f.jpg',6,'2024-01-03 14:23:54','2024-01-03 14:23:54'),(19,'Aku Ini Binatang Jalang','aku-ini-binatang-jalang',6,'Selama ini kita tidak bisa menemukan sajak-sajak Chairil Anwar dalam satu buku. sebagian kita temukan dalam Deru Campur Debu dan Kerikil Tajam dan Yang Terampas dan Yang Putus, sedangkan sebagian lagi kita jumpai dalam Tiga Menguak Takdir dan Chairil Anwar Pelopor Angkatan 45. Akan tetapi, sajak-sajak yang terdapat dalam pelbagai buku itu sekarang disatukan dalam Aku Ini Binatang Jalang.\r\n',10,'1704292256_351467650a4c538769be.pdf','1704292256_96477e4dc13e76067cc9.jpg',10,'2024-01-03 14:30:56','2024-01-03 14:30:56');

/*Table structure for table `categories` */

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `category_id` int(3) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `categories` */

insert  into `categories`(`category_id`,`category_name`) values (1,'Fiksi'),(2,'Non-Fiksi'),(3,'Sains dan Matematika'),(4,'Teknologi'),(5,'Seni'),(6,'Bahasa dan Sastra'),(7,'Anak-Anak'),(8,'Agama dan Spiritualitas'),(9,'Keuangan dan Bisnis'),(10,'Pendidikan'),(11,'Referensi'),(12,'Travel dan Petualangan');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`version`,`class`,`group`,`namespace`,`time`,`batch`) values (1,'2017-11-20-223112','Myth\\Auth\\Database\\Migrations\\CreateAuthTables','default','Myth\\Auth',1704055529,1);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `user_image` varchar(255) NOT NULL DEFAULT 'default.svg',
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`email`,`username`,`fullname`,`user_image`,`password_hash`,`reset_hash`,`reset_at`,`reset_expires`,`activate_hash`,`status`,`status_message`,`active`,`force_pass_reset`,`created_at`,`updated_at`,`deleted_at`) values (6,'purple31@gmail.com','user12',NULL,'default.svg','$2y$10$KM/trDXz1J3CL0ddIlQfFuMw7oK0WcCzT3pbXjWUAsQrtMyEszPEu',NULL,NULL,NULL,NULL,NULL,NULL,1,0,'2023-12-31 22:12:00','2023-12-31 22:12:00',NULL),(7,'cynthiazahra26@gmail.com','zhracyn26',NULL,'default.svg','$2y$10$K3h6MQJCaC9JLOJT9EH9R.uIid.wOzgJnVcP7/fKrzxlmLeboE7ce',NULL,NULL,NULL,NULL,NULL,NULL,1,0,'2024-01-01 03:34:09','2024-01-01 03:34:09',NULL),(9,'cynthiazhra@gmail.com','cynthiazhra',NULL,'default.svg','$2y$10$45dAzioOfFD5jNggB/DYsui8bOGj6B6mcvPmYbcsW8x/0aBjz29oy',NULL,NULL,NULL,NULL,NULL,NULL,1,0,'2024-01-01 04:22:25','2024-01-01 04:22:25',NULL),(10,'purpleee31@gmail.com','zhracy',NULL,'default.svg','$2y$10$c2237vo1KvU6ZGfLLJmKeeX2d2WlkHnXnJ6B8IfKHUfl0WeFtYOfu',NULL,NULL,NULL,NULL,NULL,NULL,1,0,'2024-01-03 14:25:11','2024-01-03 14:25:11',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
