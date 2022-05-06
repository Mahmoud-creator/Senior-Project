-- MySQL dump 10.13  Distrib 8.0.27, for Linux (x86_64)
--
-- Host: localhost    Database: test3
-- ------------------------------------------------------
-- Server version	8.0.27

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
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_name_unique` (`name`),
  UNIQUE KEY `categories_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Electronics','electronics','2022-02-18 06:17:44',NULL),(3,'Medicine','medicine','2022-02-18 06:17:44',NULL);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comments_product_id_foreign` (`product_id`),
  KEY `comments_user_id_foreign` (`user_id`),
  CONSTRAINT `comments_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (5,6,1,'yet another shit comment','2022-02-18 16:07:53','2022-02-18 16:07:53'),(6,6,1,'this is wrong','2022-02-18 16:07:58','2022-02-18 16:07:58'),(7,5,2,'this medicine is amazing!! I want to encourage you to buy it','2022-02-19 15:23:02','2022-02-19 15:23:02'),(8,5,2,'I want to comment once more','2022-02-19 15:23:19','2022-02-19 15:23:19'),(9,6,3,'leave a comment','2022-02-21 04:43:03','2022-02-21 04:43:03'),(10,6,4,'new comment\r\nalex here','2022-02-24 08:07:46','2022-02-24 08:07:46');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `confirms`
--

DROP TABLE IF EXISTS `confirms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `confirms` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `product_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `confirms_user_id_foreign` (`user_id`),
  KEY `confirms_product_id_foreign` (`product_id`),
  CONSTRAINT `confirms_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  CONSTRAINT `confirms_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `confirms`
--

LOCK TABLES `confirms` WRITE;
/*!40000 ALTER TABLE `confirms` DISABLE KEYS */;
INSERT INTO `confirms` VALUES (1,1,2,NULL,NULL),(3,1,6,'2022-02-18 14:34:49','2022-02-18 14:34:49'),(4,2,5,'2022-02-19 15:22:15','2022-02-19 15:22:15'),(5,3,6,'2022-02-21 04:42:35','2022-02-21 04:42:35'),(6,4,6,'2022-02-24 08:04:49','2022-02-24 08:04:49'),(7,4,5,'2022-02-24 08:05:50','2022-02-24 08:05:50'),(8,4,6,'2022-02-24 08:04:49','2022-02-24 08:04:49'),(9,4,6,'2022-02-24 08:04:49','2022-02-24 08:04:49');
/*!40000 ALTER TABLE `confirms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `locations`
--

DROP TABLE IF EXISTS `locations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `locations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `shop_id` bigint unsigned NOT NULL,
  `location_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` decimal(8,2) NOT NULL,
  `latitude` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `locations_shop_id_foreign` (`shop_id`),
  CONSTRAINT `locations_shop_id_foreign` FOREIGN KEY (`shop_id`) REFERENCES `shops` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `locations`
--

LOCK TABLES `locations` WRITE;
/*!40000 ALTER TABLE `locations` DISABLE KEYS */;
INSERT INTO `locations` VALUES (3,3,'hamrabeirutlebanon',35.48,33.90,'2022-02-18 03:46:13','2022-02-18 03:46:13'),(4,5,'syriadamascusalmidan',36.48,34.90,'2022-02-18 03:46:13','2022-02-18 03:46:13'),(8,8,'HamraBeirutLebanon',35.74,33.94,'2022-02-23 15:40:45','2022-02-23 15:40:45'),(9,9,'Tarik Al-jadidaBeirutLebanon',35.51,33.86,'2022-02-24 08:10:32','2022-02-24 08:10:32');
/*!40000 ALTER TABLE `locations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2022_01_28_140615_create_categories_table',1),(6,'2022_01_31_210450_create_owners_table',1),(7,'2022_01_31_212529_create_shops_table',1),(8,'2022_01_31_215639_create_products_table',1),(9,'2022_01_31_215756_create_upvotes_table',1),(10,'2022_01_31_215918_create_confirms_table',1),(11,'2022_02_01_061639_create_comments_table',1),(12,'2022_02_17_191713_create_locations_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `owners`
--

DROP TABLE IF EXISTS `owners`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `owners` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `owners_phone_unique` (`phone`),
  UNIQUE KEY `owners_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `owners`
--

LOCK TABLES `owners` WRITE;
/*!40000 ALTER TABLE `owners` DISABLE KEYS */;
INSERT INTO `owners` VALUES (3,'Mahmoud Shawish','70805281','mahmoud@gmail.com','$2y$10$DtPq4p4AsJCotXutzWFgkOX1sYJTdhmH1qLsUl/K/RfI7y6/C7dMq','2022-02-18 03:46:13','2022-02-18 03:46:13'),(4,'Ahmad','3954793','ahmad@gmail.com','$2y$10$4x9kE67nvPR1afwjpR7uk.kIYOSZhLxr9Ugzzejem3bgjKjEaxqDq','2022-02-18 04:15:45','2022-02-18 04:15:45'),(5,'Drunk Man','39584093','bullshit@gmail.com','$2y$10$lHiW3Db8panjB5SvS7JGwemBfBDWVZnATCGy4lHfL/kqXaHFDsuYa','2022-02-18 14:11:21','2022-02-18 14:11:21'),(8,'Jack Sparrow','49392812','jack@gmail.com','$2y$10$opUsjnpJ.VMMYCMpags0D.g0tNxrSt/WaZRjGqr1260ySB1UdEjZy','2022-02-23 15:40:45','2022-02-23 15:40:45'),(9,'Alexandra','383838312','alex@gmail.com','$2y$10$0vS.4YlebKU/qKfJ/q.1OuVgMIvQ1XnnEdmCF56M5QqL.IRYh62.W','2022-02-24 08:10:32','2022-02-24 08:10:32');
/*!40000 ALTER TABLE `owners` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `shop_id` bigint unsigned NOT NULL,
  `category_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `products_slug_unique` (`slug`),
  KEY `products_shop_id_foreign` (`shop_id`),
  CONSTRAINT `products_shop_id_foreign` FOREIGN KEY (`shop_id`) REFERENCES `shops` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (2,3,3,'Morphine','morphine',400,'thumbnails/TumR34W84rTyVhw1HDvMHzK332iUN4Cdwpd6JXKX.webp','Medicine is the field of health and healing. ... It covers diagnosis, treatment, and prevention of disease, medical research, and many other aspects of health. Medicine aims to promote and maintain health and wellbeing. Conventional modern medicine is sometimes called allopathic medicine.',0,NULL,'2022-02-18 04:37:54','2022-02-18 04:38:08'),(3,3,1,'Gaming PC','gaming-pc',1200,'thumbnails/xIN5cVn0sszNPmsFIbmgeRLlbdOeDgTXrkwXW1P9.jpg','A high-end Windows PC that is suited for gaming. Although available ready built, gaming PCs are often custom made for the serious enthusiast. They have as much as 32GB of RAM and the fastest CPU and GPU chips that are generally no more than one generation behind. ... Ready-built gaming laptops are also on the market.',0,NULL,'2022-02-18 06:27:22','2022-02-18 06:27:22'),(4,3,1,'Gaming Asus PC','asus-gaming-pc',1300,'thumbnails/28FRbC7hdRWbaE35nVIanI2PkBkffrAaYqs3Txsv.jpg','A high-end Windows PC that is suited for gaming. Although available ready built, gaming PCs are often custom made for the serious enthusiast. They have as much as 32GB of RAM and the fastest CPU and GPU chips that are generally no more than one generation behind. ... Ready-built gaming laptops are also on the market.',0,NULL,'2022-02-18 06:27:57','2022-02-18 06:27:57'),(5,3,3,'Abacavir','abacavir',200,'thumbnails/3wyVDiiVV5kkojBrWUBxtq4cCiNNjfbMcPE21YUT.jpg','Medicine is the field of health and healing. ... It covers diagnosis, treatment, and prevention of disease, medical research, and many other aspects of health. Medicine aims to promote and maintain health and wellbeing. Conventional modern medicine is sometimes called allopathic medicine.',0,NULL,'2022-02-18 06:42:05','2022-02-18 06:42:05'),(6,5,3,'Example Product','example-product',100,'thumbnails/SsYvPkUAlWz1RS03bsE8lpR28hjMd7U1W1xMxKIi.webp','Eyeglasses are the most common form of eyewear used to correct or improve many types of vision problems. They are a frame that holds two pieces of glass or plastic, which have been ground into lenses to correct refractive errors. ... Eyeglasses work by adding or subtracting focusing power to the eye\'s cornea and lens.refractive errors. ... Eyeglasses work by adding or subtracting focusing power to the eye\'s cornea and lens.\n\n\n\nEyeglasses are the most common form of eyewear used to correct or improve many types of vision problems. They are a frame that holds two pieces of glass or plastic, which have been ground into lenses to correct refractive errors. ... Eyeglasses work by adding or subtracting focusing power to the eye\'s cornea and lens.',0,NULL,'2022-02-18 14:12:26','2022-02-18 14:12:26'),(11,3,1,'Gaming Chair','gaming-chair',450,'thumbnails/786DZ3xq6dajdhyqNH5q263TWrQ6cnucmbbLSKwY.jpg','A gaming chair is a type of chair designed for the comfort of gamers. They differ from most office chairs in having high backrest designed to support the upper back and shoulders. They are also more customizable: the armrests, back, lumbar support and headrest can all be adjusted for comfort and efficiency.',0,NULL,'2022-02-23 15:34:12','2022-02-23 15:34:54'),(12,9,1,'Gaming PC3','gaming-pc-3',400,'thumbnails/dUukT2sd06CMopcMPFrKRVD8Lm9GaKzOsA30Ywoj.jpg','A gaming computer, also known as a gaming PC, is a specialized personal computer designed for playing video games at very high standards. Gaming PCs typically differ from mainstream personal computers by using high-performance video cards and high core-count central processing units with raw performance.',0,NULL,'2022-02-24 08:12:21','2022-02-24 08:12:21');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shops`
--

DROP TABLE IF EXISTS `shops`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `shops` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `owner_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `shops_email_unique` (`email`),
  UNIQUE KEY `shops_phone_unique` (`phone`),
  KEY `shops_owner_id_foreign` (`owner_id`),
  CONSTRAINT `shops_owner_id_foreign` FOREIGN KEY (`owner_id`) REFERENCES `owners` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shops`
--

LOCK TABLES `shops` WRITE;
/*!40000 ALTER TABLE `shops` DISABLE KEYS */;
INSERT INTO `shops` VALUES (3,3,'PRicenator','Pricenator@gmail.com','lebanon','beirut','hamra','70803080','2022-02-18 03:46:13','2022-02-18 03:46:13'),(5,5,'Beauty Center','beauty@gmail.com','Syria','Damascus','Al-Midan','33850428','2022-02-18 14:11:21','2022-02-18 14:11:21'),(8,8,'Flying Dutchman','dutchman@hotmail.com','Lebanon','Beirut','Hamra','48363298','2022-02-23 15:40:45','2022-02-23 15:40:45'),(9,9,'Losh','losh@gmail.com','Lebanon','Beirut','Tarik Al-jadida','38383207','2022-02-24 08:10:32','2022-02-24 08:10:32');
/*!40000 ALTER TABLE `shops` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `upvotes`
--

DROP TABLE IF EXISTS `upvotes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `upvotes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `product_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `upvotes_user_id_foreign` (`user_id`),
  KEY `upvotes_product_id_foreign` (`product_id`),
  CONSTRAINT `upvotes_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  CONSTRAINT `upvotes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `upvotes`
--

LOCK TABLES `upvotes` WRITE;
/*!40000 ALTER TABLE `upvotes` DISABLE KEYS */;
INSERT INTO `upvotes` VALUES (1,1,6,'2022-02-18 14:34:51','2022-02-18 14:34:51'),(2,2,5,'2022-02-19 15:22:09','2022-02-19 15:22:09'),(3,3,6,'2022-02-21 04:42:38','2022-02-21 04:42:38'),(4,4,6,'2022-02-24 08:04:58','2022-02-24 08:04:58'),(5,5,6,'2022-02-28 04:01:03','2022-02-28 04:01:03');
/*!40000 ALTER TABLE `upvotes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'mahmoud','Mahmoud','m@g.com','2022-02-18 08:36:26','$2y$10$Xuj1CZOFcIjdO/cmjgaxy.dU3wjkohxE98f2GIUzrR7pegx4eUW8q',NULL,'2022-02-18 08:36:26','2022-02-18 08:36:26'),(2,'rabie','Rabie Masalkhi','r@g.com',NULL,'$2y$10$z.re0Ba5Psk8bDM2X9PSiOFv0lD9TWs5M8.rmfrrmFUcBTDnXMZAe',NULL,'2022-02-19 15:21:53','2022-02-19 15:21:53'),(3,'ahmad','ahmad','ahmad@g.com',NULL,'$2y$10$kqIQGyWms5wm46EcEbjwrO7S3uMv3dfbOiAzS8yt59IPyLLwHN3Wq',NULL,'2022-02-21 04:42:27','2022-02-21 04:42:27'),(4,'alex','alexandra','al@g.com',NULL,'$2y$10$J80sR4uyuqMQCJRNzfxtae7KstmH2Fd2ngB4H9jC1oZIR8IjIpoiG',NULL,'2022-02-24 08:04:30','2022-02-24 08:04:30'),(5,'mohammad','mohammad','ma@g.com',NULL,'$2y$10$dbKyoHdthVA2AgxygFqdyOK.eF5VaKZHWQ4rZfewDSf1eWXcoylFK',NULL,'2022-02-28 04:00:49','2022-02-28 04:00:49');
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

-- Dump completed on 2022-05-01 16:52:04
