-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for historychip_new
CREATE DATABASE IF NOT EXISTS `historychip_new` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `historychip_new`;

-- Dumping structure for table historychip_new.blogs
CREATE TABLE IF NOT EXISTS `blogs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `blog_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_date` date NOT NULL,
  `blog_banner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog_banner_alt_text` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `is_draft` tinyint NOT NULL DEFAULT '0',
  `is_featured` tinyint NOT NULL DEFAULT '0',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `blogs_blog_title_unique` (`blog_title`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table historychip_new.blogs: ~2 rows (approximately)
INSERT INTO `blogs` (`id`, `blog_title`, `blog_description`, `blog_date`, `blog_banner`, `blog_banner_alt_text`, `status`, `is_draft`, `is_featured`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
	(2, 'What is Lorem Ipsum???', '<div style="margin: 0px 14.3906px 0px 28.7969px; padding: 0px; width: 436.797px; float: left; font-family: &quot;Open Sans&quot;, Arial, sans-serif; letter-spacing: normal;"><h2 style="margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: DauphinPlain; font-size: 24px; line-height: 24px;">What is Lorem Ipsum?</h2><p style="margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify;"><strong style="margin: 0px; padding: 0px;">Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p></div><div style="margin: 0px 28.7969px 0px 14.3906px; padding: 0px; width: 436.797px; float: right; font-family: &quot;Open Sans&quot;, Arial, sans-serif; letter-spacing: normal;"><h2 style="margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: DauphinPlain; font-size: 24px; line-height: 24px;">Why do we use it?</h2><p style="margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify;">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p></div>', '2023-04-24', '/storage/backend/blogs//1682339572.jpg', 'Lorem Ipsum', 1, 0, 0, NULL, NULL, '2023-04-24 08:38:35', '2023-04-24 12:36:03'),
	(3, 'What is Lorem Ipsum2???', '<div style="margin: 0px 14.3906px 0px 28.7969px; padding: 0px; width: 436.797px; float: left; font-family: &quot;Open Sans&quot;, Arial, sans-serif; letter-spacing: normal;"><h2 style="margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: DauphinPlain; font-size: 24px; line-height: 24px;">What is Lorem Ipsum?</h2><p style="margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify;"><strong style="margin: 0px; padding: 0px;">Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p></div><div style="margin: 0px 28.7969px 0px 14.3906px; padding: 0px; width: 436.797px; float: right; font-family: &quot;Open Sans&quot;, Arial, sans-serif; letter-spacing: normal;"><h2 style="margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: DauphinPlain; font-size: 24px; line-height: 24px;">Why do we use it?</h2><p style="margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify;">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p></div>', '2023-04-24', '/storage/backend/blogs//1682339572.jpg', 'Lorem Ipsum', 1, 0, 0, NULL, NULL, '2023-04-24 08:38:35', '2023-04-24 12:36:03');

-- Dumping structure for table historychip_new.contacts
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_read` tinyint NOT NULL DEFAULT '0',
  `is_replied` tinyint NOT NULL DEFAULT '0',
  `replied_message` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `replied_at` datetime DEFAULT NULL,
  `replied_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table historychip_new.contacts: ~0 rows (approximately)
INSERT INTO `contacts` (`id`, `name`, `email`, `message`, `is_read`, `is_replied`, `replied_message`, `replied_at`, `replied_by`, `created_at`, `updated_at`) VALUES
	(2, 'pro', 'pro@gmail.com', 'testt', 0, 0, NULL, NULL, NULL, '2023-04-09 15:47:24', '2023-04-09 15:47:25');

-- Dumping structure for table historychip_new.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table historychip_new.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table historychip_new.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table historychip_new.migrations: ~18 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(3, '2014_10_12_100000_create_password_resets_table', 1),
	(4, '2019_08_19_000000_create_failed_jobs_table', 1),
	(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(6, '2023_03_31_074423_create_sessions_table', 1),
	(7, '2023_04_01_164012_create_notice_prompts_table', 2),
	(8, '2023_04_08_120256_create_contacts_table', 3),
	(9, '2023_04_09_223502_create_writing_prompts_table', 4),
	(10, '2023_04_14_234824_create_writing_prompts_table', 5),
	(11, '2023_04_15_134237_create_pages_table', 6),
	(12, '2023_04_15_150938_create_blogs_table', 6),
	(13, '2023_05_02_210411_create_user_profiles_table', 7),
	(14, '2023_05_03_171357_create_partner_types_table', 7),
	(15, '2023_05_03_171424_create_partners_table', 8),
	(16, '2023_05_03_174904_create_partner_images_table', 9),
	(17, '2023_05_08_170718_create_story_categories_table', 10),
	(18, '2023_05_08_170810_create_stories_table', 10),
	(19, '2023_05_21_001319_create_story_comments_table', 11);

-- Dumping structure for table historychip_new.notice_prompts
CREATE TABLE IF NOT EXISTS `notice_prompts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `content` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration_from` datetime DEFAULT NULL,
  `duration_to` datetime DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table historychip_new.notice_prompts: ~2 rows (approximately)
INSERT INTO `notice_prompts` (`id`, `name`, `content`, `duration_from`, `duration_to`, `status`, `created_at`, `updated_at`) VALUES
	(13, 'Mental Ηealth Professionals', '<p>adsdfsdfsdf</p>', NULL, NULL, 1, '2023-04-08 14:55:30', '2023-04-08 14:55:30'),
	(14, 'Legal Advisors', 'sdfsdfsdfsdf', NULL, NULL, 1, '2023-04-14 17:43:10', '2023-04-14 17:43:10');

-- Dumping structure for table historychip_new.pages
CREATE TABLE IF NOT EXISTS `pages` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_group` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_group_id` int DEFAULT NULL,
  `meta_title` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `meta_keywords` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `meta_description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `og_image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `og_audio` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `og_video` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `og_author` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pages_name_unique` (`name`),
  UNIQUE KEY `pages_url_unique` (`url`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table historychip_new.pages: ~6 rows (approximately)
INSERT INTO `pages` (`id`, `name`, `url`, `page_title`, `page_group`, `page_group_id`, `meta_title`, `meta_keywords`, `meta_description`, `og_image`, `og_audio`, `og_video`, `og_author`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'blogs.whatIsLoremIpsum???', 'blogs/what-is-lorem-ipsum', 'What is Lorem Ipsum???', 'blog', 2, 'Contrary to popular belief, Lorem Ipsum is not simply random', 'a,b,c,d,e,f,g,h,i,j', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled', NULL, NULL, NULL, NULL, 1, '2023-04-24 08:38:35', '2023-04-24 12:32:52'),
	(3, 'blogs.whatIsLoremIpsum2???', 'blogs/what-is-lorem-ipsum2', 'What is Lorem Ipsum???', 'blog', 3, 'Contrary to popular belief, Lorem Ipsum is not simply random', 'a,b,c,d,e,f,g,h,i,j', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled', NULL, NULL, NULL, NULL, 1, '2023-04-24 08:38:35', '2023-04-24 12:32:52'),
	(4, 'partners.test', 'partners/test', 'What is Lorem Ipsum?', 'partner', 10, 'What is Lorem Ipsum?', 'asd,ddfg,dfg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', NULL, NULL, NULL, NULL, 1, '2023-05-08 15:59:01', '2023-05-08 15:59:01'),
	(7, 'partners.testy', 'partners/testy', 'What is Lorem Ipsum?', 'partner', 3, 'What is Lorem Ipsum?', 'asd,dgdf', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', NULL, NULL, NULL, NULL, 1, '2023-05-08 18:08:32', '2023-05-08 18:08:32'),
	(8, 'stories.1memorialDayMemories', 'stories/1-memorial-day-memories', 'Memorial Day Memories', 'story', 1, 'Memorial Day Memories', 'ters,erte', 'We always called it “Decoration Day” School was dismissed for the year and we looked forward to  . . .', NULL, NULL, NULL, 'Prothom Acharjee', 1, '2023-05-19 06:43:52', '2023-05-19 06:43:52'),
	(9, 'author.prothomAcharjee', 'author/prothom-acharjee', 'Prothom Acharjee', 'author', 6, 'Prothom Acharjee', 'Prothom Acharjee, History Chip, History Chip Author', 'History Chip offers lot of interesting stories to read online. Read short stories, inspirational stories, brand stories, success stories everything. Read a story now written by the author Prothom Acharjee', NULL, NULL, NULL, 'History Chip', 1, '2023-05-19 09:31:55', '2023-05-19 09:31:56');

-- Dumping structure for table historychip_new.partners
CREATE TABLE IF NOT EXISTS `partners` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `partner_type_id` int NOT NULL,
  `uuid` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_alt_text` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `top_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table historychip_new.partners: ~0 rows (approximately)
INSERT INTO `partners` (`id`, `partner_type_id`, `uuid`, `name`, `email`, `banner`, `banner_alt_text`, `title`, `description`, `short_description`, `logo`, `top_image`, `status`, `created_at`, `updated_at`) VALUES
	(3, 1, '2d739f8f-11de-42e4-b823-60af5f438fd0', 'Testy', 'pro@pro.com', '/storage/backend/partner/banner/1683569312.jpg', 'Tes banner', 'What is Lorem Ipsum?', '<p><strong style="margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; letter-spacing: normal; text-align: justify;">Lorem Ipsum</strong><span style="font-family: &quot;Open Sans&quot;, Arial, sans-serif; letter-spacing: normal; text-align: justify;">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s</span><br></p>', 'In these stories you will read about friendships, love, despair, disappointments, successes, crushes, sports, fashion, schoolwork, and teachers.\r\n\r\nThese stories are recollections of Yorktown Public High School as told by alumni (students and teachers) of Yorktown.', '/storage/backend/partner/logo/1683569312.png', '/storage/backend/partner/top-image/1683654913.jpg', 1, '2023-05-08 18:08:32', '2023-05-09 17:55:14');

-- Dumping structure for table historychip_new.partner_images
CREATE TABLE IF NOT EXISTS `partner_images` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `partner_id` bigint unsigned NOT NULL,
  `image_path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_alt_text` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `partner_images_partner_id_foreign` (`partner_id`),
  CONSTRAINT `partner_images_partner_id_foreign` FOREIGN KEY (`partner_id`) REFERENCES `partners` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table historychip_new.partner_images: ~3 rows (approximately)
INSERT INTO `partner_images` (`id`, `partner_id`, `image_path`, `image_alt_text`, `created_at`, `updated_at`) VALUES
	(7, 3, '/storage/backend/partner/images/1683569312_0.jpg', 'img 1', '2023-05-08 18:08:32', '2023-05-08 18:08:32'),
	(8, 3, '/storage/backend/partner/images/1683569312_1.jpg', 'img 1a', '2023-05-08 18:08:32', '2023-05-08 18:08:32'),
	(9, 3, '/storage/backend/partner/images/1683569312_2.jpg', 'img 1s', '2023-05-08 18:08:32', '2023-05-08 18:08:32');

-- Dumping structure for table historychip_new.partner_types
CREATE TABLE IF NOT EXISTS `partner_types` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bill` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bill_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `max_image_count` int NOT NULL,
  `max_content_length` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table historychip_new.partner_types: ~2 rows (approximately)
INSERT INTO `partner_types` (`id`, `name`, `bill`, `bill_type`, `max_image_count`, `max_content_length`, `created_at`, `updated_at`, `status`) VALUES
	(1, 'Basic', '5', 'once', 6, 500, '2023-05-07 16:54:55', '2023-05-07 16:54:55', 1),
	(2, 'Premium', '10', 'once', 10, 1000, '2023-05-07 17:00:23', '2023-05-07 17:00:23', 1);

-- Dumping structure for table historychip_new.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table historychip_new.password_resets: ~0 rows (approximately)

-- Dumping structure for table historychip_new.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table historychip_new.password_reset_tokens: ~0 rows (approximately)

-- Dumping structure for table historychip_new.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table historychip_new.personal_access_tokens: ~0 rows (approximately)

-- Dumping structure for table historychip_new.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table historychip_new.sessions: ~0 rows (approximately)

-- Dumping structure for table historychip_new.stories
CREATE TABLE IF NOT EXISTS `stories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `category_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_category_id_level_1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_category_id_level_2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_category_id_level_3` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_id` bigint unsigned NOT NULL,
  `approved_by` bigint unsigned DEFAULT NULL,
  `approval_date_time` datetime DEFAULT NULL,
  `author_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `context` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `edit_count` int NOT NULL DEFAULT '0',
  `photo_credit` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `audio_video_credit` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_anonymous` tinyint NOT NULL DEFAULT '0',
  `is_draft` tinyint NOT NULL DEFAULT '0',
  `is_approved` tinyint NOT NULL DEFAULT '0',
  `is_featured` tinyint NOT NULL DEFAULT '0',
  `is_audioconvert` tinyint NOT NULL DEFAULT '0',
  `event_dates` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event_detail_dates` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event_location` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `header_image_path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `header_image_alt_text` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `audio_video_path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `stories_author_id_foreign` (`author_id`),
  CONSTRAINT `stories_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table historychip_new.stories: ~1 rows (approximately)
INSERT INTO `stories` (`id`, `category_id`, `sub_category_id_level_1`, `sub_category_id_level_2`, `sub_category_id_level_3`, `title`, `author_id`, `approved_by`, `approval_date_time`, `author_name`, `context`, `edit_count`, `photo_credit`, `audio_video_credit`, `is_anonymous`, `is_draft`, `is_approved`, `is_featured`, `is_audioconvert`, `event_dates`, `event_detail_dates`, `event_location`, `header_image_path`, `header_image_alt_text`, `audio_video_path`, `tags`, `status`, `created_at`, `updated_at`) VALUES
	(1, '["1","2"]', '["3"]', NULL, NULL, 'Memorial Day Memories', 6, NULL, NULL, 'Prothom Acharjee', '<p>We always called it “Decoration Day” School was dismissed for the year and we looked forward to a summer of freedom.\r\n</p><p>Decorating the graves at “Violet Hill” our local cemetery was always special. Most of our relations were buried in Kansas but we had graves of friends of our parents to decorate. We always used flowers from my mother’s garden - mostly peonies and spring flowers.\r\n</p><p>We always went to the local parade first. It was small but meaningful. Sometimes my father would wear his army hat.\r\n</p><p>The parade would end at the entrance of ”Violet Hill” where appointed men in uniform would shoot off their guns in honor of deceased comrades.\r\n</p><p>Young boys would scramble for the empty shells after the gun salute.\r\n</p><p>We would next decorate the graves of those we knew - our parents explaining who they were and why we decorate graves.\r\n</p><p>We now have a [family] area in the cemetery where my parents, brother and sister are buried. There is also a plot where my husband is buried by his request in our family plot.\r\n</p><p>It’s a beautifully kept cemetery next to a field of Iowa corn. The area is so serene and peaceful, I’ll be glad to join my family there someday!</p><p>\r\n</p><p>\r\n</p><p>\r\n</p><p>\r\n</p><p>\r\n</p><p>\r\n</p><p>\r\n</p>', 0, 'Demo', 'Demo Audio', 0, 1, 0, 0, 0, '2000-05-05', '2023', 'Peru', '/storage/frontend/stories/images/64671a5cb2576_19379.jpg', 'test', '/storage/frontend/stories/audio-videos/64671a7e7f602_50579.mp3', 'ters,erte', 1, '2023-05-19 06:43:52', '2023-05-19 06:43:52');

-- Dumping structure for table historychip_new.story_categories
CREATE TABLE IF NOT EXISTS `story_categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `level` tinyint unsigned NOT NULL DEFAULT '0',
  `parent_id` bigint unsigned DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `story_categories_parent_id_foreign` (`parent_id`),
  CONSTRAINT `story_categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `story_categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table historychip_new.story_categories: ~3 rows (approximately)
INSERT INTO `story_categories` (`id`, `name`, `description`, `level`, `parent_id`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'Base Cat 1', NULL, 0, NULL, 1, '2023-05-13 15:24:09', '2023-05-13 15:24:09'),
	(2, 'Base Cat 2', NULL, 0, NULL, 1, '2023-05-13 15:25:01', '2023-05-13 15:25:01'),
	(3, 'level cat1.1', NULL, 1, 2, 1, '2023-05-13 16:00:18', '2023-05-13 16:07:08');

-- Dumping structure for table historychip_new.story_comments
CREATE TABLE IF NOT EXISTS `story_comments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned DEFAULT NULL,
  `story_id` bigint unsigned DEFAULT NULL,
  `comment` longtext COLLATE utf8mb4_unicode_ci,
  `accepted` tinyint NOT NULL DEFAULT '0',
  `accepted_by` int DEFAULT NULL,
  `accepting_date_time` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `story_comments_story_id_foreign` (`story_id`),
  CONSTRAINT `story_comments_story_id_foreign` FOREIGN KEY (`story_id`) REFERENCES `stories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table historychip_new.story_comments: ~4 rows (approximately)
INSERT INTO `story_comments` (`id`, `user_id`, `story_id`, `comment`, `accepted`, `accepted_by`, `accepting_date_time`, `created_at`, `updated_at`) VALUES
	(1, 6, 1, 'hello test', 0, NULL, NULL, '2023-05-20 18:38:42', '2023-05-20 18:38:42'),
	(2, 6, 1, 'test', 0, NULL, NULL, '2023-05-20 19:04:50', '2023-05-20 19:04:50'),
	(3, 6, 1, 'test', 0, NULL, NULL, '2023-05-20 19:07:40', '2023-05-20 19:07:40'),
	(4, 6, 1, 'asdasdasd', 0, NULL, NULL, '2023-05-20 19:08:58', '2023-05-20 19:08:58'),
	(5, 6, 1, 'sdfsdfsdf', 0, NULL, NULL, '2023-05-20 19:12:54', '2023-05-20 19:12:54');

-- Dumping structure for table historychip_new.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table historychip_new.users: ~0 rows (approximately)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(6, 'Prothom Acharjee', 'peculiarprothom@gmail.com', NULL, '$2y$10$beFCxfyNrC.phcFH19loYO2Ow7pv8HTllNtds.hxqRNhsZHm9G2nW', NULL, '2023-05-03 19:01:18', '2023-05-03 19:01:18');

-- Dumping structure for table historychip_new.user_profiles
CREATE TABLE IF NOT EXISTS `user_profiles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `partner_id` int DEFAULT NULL,
  `pen_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `dob` date DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_page_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_page_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin_page_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram_page_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_pic_public` tinyint NOT NULL DEFAULT '0',
  `is_social_media_public` tinyint NOT NULL DEFAULT '0',
  `is_bio_public` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_profiles_user_id_foreign` (`user_id`),
  CONSTRAINT `user_profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table historychip_new.user_profiles: ~0 rows (approximately)
INSERT INTO `user_profiles` (`id`, `user_id`, `partner_id`, `pen_name`, `city`, `state`, `country`, `bio`, `dob`, `phone`, `image`, `facebook_page_link`, `twitter_page_link`, `linkedin_page_link`, `instagram_page_link`, `is_pic_public`, `is_social_media_public`, `is_bio_public`, `created_at`, `updated_at`) VALUES
	(4, 6, NULL, 'prothom', 'ctg', 'ctg', 'bd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, '2023-05-03 19:01:18', '2023-05-03 19:01:18');

-- Dumping structure for table historychip_new.writing_prompts
CREATE TABLE IF NOT EXISTS `writing_prompts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=226 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table historychip_new.writing_prompts: ~224 rows (approximately)
INSERT INTO `writing_prompts` (`id`, `title`, `details`, `icon`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'Primary School', 'Describe your primary school. How many students attended your school? What was your favorite subject and who was your favorite teacher?', '/storage/backend/writingtips/primary.png', 1, NULL, NULL),
	(2, 'Middle School', 'Describe your middle school. How many students attended your school? What was your favorite subject and who was your favorite teacher?', '/storage/backend/writingtips/middle.png', 1, NULL, NULL),
	(3, 'High School', 'Describe your high school. How many students attended your school? What was your favorite subject and who was your favorite teacher?', '/storage/backend/writingtips/high.png', 1, NULL, NULL),
	(4, 'Home', 'Please describe your childhood home. Was it in the city or country? Was it cozy, large, small? What did it smell like?', '/storage/backend/writingtips/home.png', 1, NULL, NULL),
	(5, 'Work Life', 'Please describe your work life. What sort of work do you do or have you done? What sort of challenges have you faced at work and/or what have you enjoyed about your work?', '/storage/backend/writingtips/worklife.png', 1, NULL, NULL),
	(6, 'Medical Care', 'Please describe your experiences with the medical system where you live or where you grew up, including health insurance and availability of doctors. Did you visit a doctor or did the doctor come to your home? Were medical providers mostly men or women?', '/storage/backend/writingtips/medical.png', 1, NULL, NULL),
	(7, 'War', 'Have you been involved in war as a soldier or as a victim of it? Please tell us about your experiences.', NULL, 1, NULL, NULL),
	(8, 'Racism. ', 'Please describe your experiences with racism either as a victim of racism or as a factor in your culture.', NULL, 1, NULL, NULL),
	(9, 'Disaster.', 'Have you experienced a disaster? Please describe your experiences. Did you have to leave your home?', NULL, 1, NULL, NULL),
	(10, 'Environment. ', 'Has your life been affected by climate changes? Please describe those changes. Have you taken action to effect positive change in the environment?', NULL, 1, NULL, NULL),
	(11, 'Opera. ', 'Do you enjoy the opera? What do you enjoy about the opera. What is your favorite opera and why?', NULL, 1, NULL, NULL),
	(12, 'Women’s Lives. ', 'How is life different for women and men where you live?', NULL, 1, NULL, NULL),
	(13, 'Clothing. ', 'What do you typically wear during the day? Have clothing norms changed over your lifetime?', NULL, 1, NULL, NULL),
	(14, 'COVID. ', 'How has COVID affected your work, how you dress, how much you see family or friends? Were there any positives that came out of COVID?', NULL, 1, NULL, NULL),
	(15, 'Food Traditions. ', 'What are traditional foods where you live. Do you have favorite recipes handed down through your family?', NULL, 1, NULL, NULL),
	(16, 'Weather. ', 'How does your local weather impact your clothing, playtime, transportation and work-life.', NULL, 1, NULL, NULL),
	(17, 'Music. ', 'How has music impacted your life. What sort of music do you enjoy? Do you play an instrument? Are you a professional musician?', NULL, 1, NULL, NULL),
	(18, 'Animals. ', 'What role do animals play in your life? Do you work with animals, do you have pets, do you study animals?', NULL, 1, NULL, NULL),
	(19, 'Skiing. ', 'Are you a skier? How often do you ski and where do you go to ski? What do you love about skiing?', NULL, 1, NULL, NULL),
	(20, 'Travel. ', 'Are you an avid traveler? Where did you go? What did you see? Did your travels change your life?', NULL, 1, NULL, NULL),
	(21, 'Party-line Telephones. ', 'Do you remember party-line telephones? Please explain what it was like to use a party-line phone.', NULL, 1, NULL, NULL),
	(22, 'Technology. ', 'How have changes in technology affected your life? Is there one thing in particular that you see as being a game changer in your life?', NULL, 1, NULL, NULL),
	(23, 'Wifi Connection. ', 'Do you live with high speed wifi or are you dialing up? How has high-speed wifi changed your life?', NULL, 1, NULL, NULL),
	(24, 'Smart phone. ', 'How much do smart phones figure into your life? How often do you use your phone during the day? What do you love about your phone? What do you hate about it? When did you get your first smart phone? How old were your kids when you got them their own phones?', NULL, 1, NULL, NULL),
	(25, 'Cars. ', 'Are cars a passion for you? What was your first car? What is your favorite car? Do you drive an electric car?', NULL, 1, NULL, NULL),
	(26, 'Telegrams. ', 'Did you ever send or receive a telegram? What was the message?', NULL, 1, NULL, NULL),
	(27, 'Shoes. ', 'What sorts of shoes you do wear and what sorts of shoes did you wear as a child? Do you wear special shoes for work - ballet shoes, work boots?', NULL, 1, NULL, NULL),
	(28, 'Childbirth.', 'Where were you born or where did you give birth? Was this birth in a hospital? Was there a doctor or a midwife present?', NULL, 1, NULL, NULL),
	(29, 'Home town. ', 'Where did you grow up? What sort of place was that to grow up - city, suburban, rural? What did you remember most about your hometown?', NULL, 1, NULL, NULL),
	(30, 'Heros.', 'Do you have a hero? Someone who inspired you. What about this person spoke to you? Did this person make you laugh, cry, or inspire you?', NULL, 1, NULL, NULL),
	(31, 'Musical Instruments. ', 'Do you play an instrument? What instrument? Have you played a long time and how important is this in your life?', NULL, 1, NULL, NULL),
	(32, 'Newspapers and magazines.', 'What newspapers and magazines have you read through your life? What draws you to your favorite periodicals?', NULL, 1, NULL, NULL),
	(33, 'Feminism. ', 'How have changing roles of women changed your life? Has your community changed due to the rise of feminism?', NULL, 1, NULL, NULL),
	(34, 'Playtime. ', 'Where did you play as a child? Playground, forests, city streets? What were your favorite games?', NULL, 1, NULL, NULL),
	(35, 'Winter celebrations. ', 'Do you celebrate Christmas, Chanukah, New Year’s Eve? How do you celebrate? What are the smells and foods?', NULL, 1, NULL, NULL),
	(36, 'Sleep. ', 'Are you a night owl or an early riser? Do you need to wake up early or stay up late for work? Are naps or siestas common where you live?', NULL, 1, NULL, NULL),
	(37, 'Nature. ', 'How is your life is impacted by nature? Is the natural world a large factor within your community or your culture?', NULL, 1, NULL, NULL),
	(38, 'Hats. ', 'Do you wear hats? Do you wear hats to keep the sun off or the heat in? Do you wear hats as part of your culture or as a fashion statement?', NULL, 1, NULL, NULL),
	(39, 'Winter. ', 'Do you enjoy the snow, the shoveling, the layers of clothes, the early sunsets? Do you see changes to winter from climate change where you live?', NULL, 1, NULL, NULL),
	(40, 'Hiking. ', 'Do you enjoy hiking? How often do you go hiking, what you enjoy about it and if you have a favorite trail.', NULL, 1, NULL, NULL),
	(41, 'Summer. ', 'Do you like the heat and summer? Do you spend your summers in the water? Do you love fireflies and long hot summer days?', NULL, 1, NULL, NULL),
	(42, 'Transportation. ', 'How do you regularly get around? Cars, buses, subways, horses? Electric cars?', NULL, 1, NULL, NULL),
	(43, 'Holidays. ', 'What holidays are the most important where you live? How do you celebrate these holidays? Which are your favorite holidays?', NULL, 1, NULL, NULL),
	(44, 'Water. ', 'Is water something that you think about or do you simply turn on the tap and out comes the water. Do you like to swim or go boating?', NULL, 1, NULL, NULL),
	(45, 'Dogs. ', 'Do you own a dog or have you had a favorite dog or are you afraid of dogs and why? Do you work with dogs?', NULL, 1, NULL, NULL),
	(46, 'Hobbies. ', 'Do you have hobbies — what they are and what is involved in pursuing them? How important are your hobbies in your life?', NULL, 1, NULL, NULL),
	(47, 'Taxes.', 'Do you file taxes where you live? Do you file them yearly and how complicated is it to file your taxes? Do you have to pay someone to do this for you?', NULL, 1, NULL, NULL),
	(48, 'Economy.', 'How do changes in the economy affect your life and the lives of your family members? Have you struggled with an economic downturn?', NULL, 1, NULL, NULL),
	(49, 'Horses. ', 'Do you own a horse or have you had a favorite horse? Tell us about your horse. Do you work with horses?', NULL, 1, NULL, NULL),
	(50, 'Climbing.', 'Do you participate in serious hiking, rock climbing, mountain climbing? What sorts of precautions do you take? What do you like about climbing?', NULL, 1, NULL, NULL),
	(51, 'First Jobs. ', 'Describe your first job. How did this job impact your life?', NULL, 1, NULL, NULL),
	(52, 'Birthdays. ', 'Describe birthday celebrations in your culture. Are there important age markers that are especially important, for instance, sweet 16, Quinceanera, Bar Matzvah and Bat Mitzvah celebrations, or other coming of age celebrations?', NULL, 1, NULL, NULL),
	(53, 'Elderly. ', 'Describe how your culture cares for its elderly. Are you elderly and what is it like to be elderly where you live? If you care for an elderly relative or friend please describe how this impacts your own life?', NULL, 1, NULL, NULL),
	(54, 'Graduations. ', 'Describe how graduations celebrated are celebrated where you live? Are there big parties? Are these celebrations for graduations from college/university or also from high school or primary and middle school?', NULL, 1, NULL, NULL),
	(55, '1960s ', 'Did you live through the sixties? What did that era mean to you? Was it fun, frightening, exhilarating, transformational? Do you have a strong memory from that decade? Were you drafted? Were you involved in the anti-war or racial justice movements?', NULL, 1, NULL, NULL),
	(56, 'Technical Sports. ', 'Do you participate in technical sports like sky diving, cave diving, free climbing? What sorts of precautions do you take? Please explain what about this sport inspires you to take the risks of technical climbing.', NULL, 1, NULL, NULL),
	(57, 'College. ', 'Did you attend college or university? What did you study? What are your strongest memories of college? Were you the first in your family to attend college? What was most important about your college experience? Do you have significant college debt?', NULL, 1, NULL, NULL),
	(58, 'Money', 'Describe your relationship to money. Do you use credit cards? Do you borrow money for cars or a home mortgage? Is this influenced by where you live, by your culture?', NULL, 1, NULL, NULL),
	(59, 'Sports', 'Are you a sports fan and if so, which sport? Do you follow a particular team? Describe the role sports play in your life? Do you love the Olympics? Do you travel to see your favorite teams play?', NULL, 1, NULL, NULL),
	(60, 'Play', 'Do you remember playing in a playground as a child, if so, what did you enjoy most about the playground? What other places did you play, what were they like? What was your favorite place to play and what was your favorite play activity? As an adult, do you find time for play — for innocent running, games, laughter, creativity, make believe?', NULL, 1, NULL, NULL),
	(61, 'Housework', 'Who does the housework in your home? This includes cooking, cleaning, laundry, yard work, bookkeeping, dog walking, etc. Do you share the tasks with others or do the jobs tend to fall to one person? If you share tasks, how are they divided? How much of your day is involved in housework?', NULL, 1, NULL, NULL),
	(62, 'Baseball', 'Are you a baseball fan and if so do you follow a particular team? Describe the role baseball plays in your life? Do you travel to see your favorite teams play, or for the World Series?', NULL, 1, NULL, NULL),
	(63, 'Trains', 'Are you a fan of trains or do you travel frequently by train? Describe your travels or your love of trains. Where you live is train travel convenient, crowded, economical? Do you take sleeper cars?', NULL, 1, NULL, NULL),
	(64, 'Immigration ', 'Are you or your parents immigrants? Where was your home country and where is your new home? When did you emigrate? Please describe the obstacles for an immigrant and the benefits of being an immigrant. Did you leave family behind in your home country?', NULL, 1, NULL, NULL),
	(65, 'Crafts', 'Are you a craftsperson and if so, what do you make? Describe the materials you use and the methods involved in producing your goods. How did you learn your craft and how long have you done this? Do you make your living at your craft or do you do this craft for pleasure?', NULL, 1, NULL, NULL),
	(66, 'Indigenous People.', 'Are you a member of an Indigenous ethnic group? Please describe distinctive features of your culture and your traditions. Do you speak an indigenous language? Do you make efforts to preserve your language and your customs?', NULL, 1, NULL, NULL),
	(67, 'Trades People. ', 'Do you work in a trade, with a specialized skill? Describe your skill, how you learned it and how long you have worked this trade. If not, is there a particular trade person you have admired. Please describe their work.', NULL, 1, NULL, NULL),
	(68, 'Basketball. ', 'Are you a basketball player or fan? What do you love about the game? How much of your life is devoted to basketball and how does basketball enhance your life? Is basketball popular in your country?', NULL, 1, NULL, NULL),
	(69, 'Television. ', 'Please describe your and your family’s relationship with television. Growing up, how important was television in your family, in your culture? What shows did you watch? Do you watch television now or do you catch a show here and there on your computer or other device?', NULL, 1, NULL, NULL),
	(70, 'Teaching. ', 'Are you a teacher and if so, what do you teach? Where do you teach, what sort of school? Has teaching been a life’s passion? How has COVID-19 impacted your role as a teacher?', NULL, 1, NULL, NULL),
	(71, 'Poverty. ', 'What has been your experience with poverty? Have you been personally affected by poverty? What were the circumstances that led to poverty in your life? Have you been able to overcome poverty and if so, how? What can you tell the world about the effect of poverty on your life or the lives of others? What is it like to live with financial uncertainty?', NULL, 1, NULL, NULL),
	(72, 'Art', 'Describe your experience or relationship with art. Are you an artist? Do you play an instrument? Do you enjoy art and if so, what sorts of art - music, painting, writing, sculpture, or something else?', NULL, 1, NULL, NULL),
	(73, '9/11/2001', 'Where were you on 9/11/2001? What impact did the attacks on the World Trade Center have on your life?', NULL, 1, NULL, NULL),
	(74, '1950s', 'Please recount some of your memories from the 1950s. If you lived in Europe or Japan in the 1950s, when people were putting their lives back together, please share those important memories. Please also share your stories from other parts of the world. Were you starting careers and families, buying a home on the GI Bill? Were you leaving Europe for Israel? Were you locked inside the Soviet Union? Locked inside East Berlin? There is much to write about. Please don’t feel confined to these questions, they are only suggestions', NULL, 1, NULL, NULL),
	(75, '1990s', 'What are your memories of the 1990s? If you had to sum up the 1990s in a sentence, what would you say? Was there a pivotal event in your life during the 1990s? What music did you listen to in the 1990s? What movies or other entertainment influenced you in the 1990s?', NULL, 1, NULL, NULL),
	(76, 'Refugees', 'Are you a refugee or is someone in your family a refugee? Please describe your journey. Where did your journey begin and end? Was difficulties did you encounter? What difficult to face in deciding to leave your homeland?', NULL, 1, NULL, NULL),
	(77, 'Christmas', 'Do you celebrate Christmas? Describe your Christmas traditions. How have these changed for you over the years? What is your favorite thing about Christmas?', NULL, 1, NULL, NULL),
	(78, 'Politics', 'How actively are you involved in politics? Do you follow politics on the news. Do you volunteer for political activities? Are you involved in politics professionally? Have you run for office? How has your involvement in politics changed over the years?', NULL, 1, NULL, NULL),
	(79, 'Rock and Roll', ' Was Rock and Roll the sound track to your youth? What were your favorite bands? Did you attend concerts? Did you learn to play an instrument and join a band? How else did Rock and Roll influence your life?', NULL, 1, NULL, NULL),
	(80, '1940s', 'What memories do you have of the 1940s? The decade started with the War and ended with a world recovering. How did this cataclysmic time change your life? How did you persevere during these difficult days?', NULL, 1, NULL, NULL),
	(81, 'Guns', 'Do you own a gun? Are you opposed to private gun ownership? Maybe you feel that guns are ok for hunting but you think that military combat firearms are unnecessary for private citizens. Do you think there should be greater control over gun in your country?', NULL, 1, NULL, NULL),
	(82, 'Poetry', 'Do you love poetry? Do you write poetry? Do you have a favorite poem? Is there a poem that gives you solace? What can you tell others about the role of poetry in your life?', NULL, 1, NULL, NULL),
	(83, 'Aviation', 'Do you like to fly? Do you know how to fly a plane? What about flying do you most enjoy? Perhaps you are afraid of flying or opposed to so much flying due to its contribution to global warming and if so, please explain.', NULL, 1, NULL, NULL),
	(84, 'Mining', 'Are you a miner or has someone in your family been a miner? Has your family been in mining for generations? What things do you mine? Please describe what it is like to do this work. Why did you choose this line of work?', NULL, 1, NULL, NULL),
	(85, 'Domestic Workers', 'Are you a domestic worker? Please describe what it is like to do this work and what your workday entails. Why did you choose this line of work? Do you enjoy your work and if so what about it is satisfying for you?', NULL, 1, NULL, NULL),
	(86, 'World War I', 'Were you or a loved one alive or directly impacted by or involved in World War I? Were you or your father or grandfather a soldier in this war? Were you or your mother a nurse or otherwise involved in the war effort? Do you live where there was fighting? Was someone in your family affected by mustard gas or wounded or killed in the war?', NULL, 1, NULL, NULL),
	(87, '1990s', 'What are your memories of the 1990s? If you had to sum up the 1990s in a sentence, what would you say? Was there a pivotal event in your life during the 1990s? What music did you listen to in the 1990s? What movies or other entertainment influenced you in the 1990s?', NULL, 1, NULL, NULL),
	(88, 'Religious rituals', 'Please describe the importance of religious rituals in your life, from religious services to coming of age rituals.', NULL, 1, NULL, NULL),
	(89, 'Ships', 'Tell us about your experience with ships. Do you work on ships either in the Navy or on commercial ships. Explain what it is like to live at sea. Or perhaps you just love to watch them or know about them.', NULL, 1, NULL, NULL),
	(90, 'Fire', 'Are you a firefighter? Or perhaps you study fires or firefighting. Or perhaps you have been affected by fire. Please explain your experiences.', NULL, 1, NULL, NULL),
	(91, 'Theater', 'Do you work in the theater? In what capacity do you work — as a performer or behind the scenes? What magic is there in the theater that makes you do what you do? Do you have a favorite production or type of production?', NULL, 1, NULL, NULL),
	(92, 'Folk Art', 'According to the International Museum of Folk Art’s website, folk art “is of, by, and for the people; all people, inclusive of class, status, culture, community, ethnicity, gender, and religion”. Are you someone who makes or loves folk art? Please describe what you create and what it is about folk art that you love.', NULL, 1, NULL, NULL),
	(93, 'LGBTQ', 'If you self-identify as LGBTQ, please share your experiences with acceptance or rejection based on your identity. How have social norms affected your life? Also, please describe insights your identity offers you about the world around you. Have recent legal and cultural changes made significant impacts on your life?', NULL, 1, NULL, NULL),
	(94, 'Carpentry', 'Are you an amateur or professional carpenter? How did you learn your craft?What sort of things do you create? How is an increasingly technological world, affecting your life as a craftsman?', NULL, 1, NULL, NULL),
	(95, 'Plumber', 'How did you learn your craft and how long have you worked as a plumber? Please describe for those of us who are clueless around pipes what work life is like for a plumber. What should non-plumbers know about your life as a plumber?', NULL, 1, NULL, NULL),
	(96, 'Trucks', 'Do you drive a truck for a living or do you love trucks? Please describe your life as a trucker, including how long you have driven trucks and what sorts of trucks you drive and/or why you love trucks.', NULL, 1, NULL, NULL),
	(97, 'Soccer', 'Are you a fan or a player? If you play please describe if you play professionally and if so where and for how long. Please describe your participation and what makes Soccer “The Beautiful Game”.', NULL, 1, NULL, NULL),
	(98, 'Costume', 'We love to dress in costume — to put on the trappings of a different persona imagining life as the devil or a ghost or the President of the United States, or just to get spiffed up for a night on the town. Please describe costumes you have worn or seen that knocked your socks off.', NULL, 1, NULL, NULL),
	(99, 'Radio. ', 'Please describe your radio listening routines now and earlier in your life. Some of you remember the prominence of radio prior to the advance of television. Please describe your favorite programs from the golden age of radio. Some of you remember radio as a way to listen to top 40 music and others listen to radio for the news and music.', NULL, 1, NULL, NULL),
	(100, 'Blues. ', 'Do you love the blues? Tell us about your favorite blues artists. Do you play or sing the blues?', NULL, 1, NULL, NULL),
	(101, 'Computers. ', 'What brand was your first computer and what year did you purchase it? How have computers changed your life? How many hours a day do you use a computer?', NULL, 1, NULL, NULL),
	(102, 'Trees.', 'Are you someone who loves trees? Tell us what you love about them. What are your favorites?', NULL, 1, NULL, NULL),
	(103, '1970s. ', 'What are your memories of the 1970s? If you had to sum up the 1970s in a sentence, what would you say? Was there a pivotal event in your life during the 1970s? What music, movies or other entertainment influenced you in the 1970s?', NULL, 1, NULL, NULL),
	(104, '1980s. ', 'What are your memories of the 1980s? If you had to sum up the 1980s in a sentence, what would you say? Was there a pivotal event in your life during the 1980s? What music, movies or other entertainment influenced you in the 1980s?', NULL, 1, NULL, NULL),
	(105, '2000s. ', 'What are your memories of the 1970s? If you had to sum up the 1970s in a sentence, what would you say? Was there a pivotal event in your life during the 1970s? What music, movies or other entertainment influenced you in the 1970s?', NULL, 1, NULL, NULL),
	(106, '2010s. ', 'What are your memories of the 1970s? If you had to sum up the 1970s in a sentence, what would you say? Was there a pivotal event in your life during the 1970s? What music, movies or other entertainment influenced you in the 1970s?', NULL, 1, NULL, NULL),
	(107, 'Terrorism. ', 'Have you been personally affected by terrorism? How did it impact your life?', NULL, 1, NULL, NULL),
	(108, 'Political activism.', 'Have you been politically active? Did you go to rallies, protests, phone banks, sit-ins?', NULL, 1, NULL, NULL),
	(109, '1930s. ', 'What are your memories of the 1970s? If you had to sum up the 1970s in a sentence, what would you say? Was there a pivotal event in your life during the 1970s? What music, movies or other entertainment influenced you in the 1970s?', NULL, 1, NULL, NULL),
	(110, 'Yoga.', '', NULL, 1, NULL, NULL),
	(111, 'Mysticism.', '', NULL, 1, NULL, NULL),
	(112, 'Mindfulness.', '', NULL, 1, NULL, NULL),
	(113, 'Therapy.', '', NULL, 1, NULL, NULL),
	(114, 'Smoking.', '', NULL, 1, NULL, NULL),
	(115, 'Drug abuse.', '', NULL, 1, NULL, NULL),
	(116, 'Death.', '', NULL, 1, NULL, NULL),
	(117, 'motherhood.', '', NULL, 1, NULL, NULL),
	(118, 'fatherhood.', '', NULL, 1, NULL, NULL),
	(119, 'daycare.', '', NULL, 1, NULL, NULL),
	(120, 'insurance.', '', NULL, 1, NULL, NULL),
	(121, 'gardens.', '', NULL, 1, NULL, NULL),
	(122, 'butterflies.', '', NULL, 1, NULL, NULL),
	(123, 'Antartica.', '', NULL, 1, NULL, NULL),
	(124, 'clothing.', '', NULL, 1, NULL, NULL),
	(125, 'shopping.', '', NULL, 1, NULL, NULL),
	(126, 'addiction.', '', NULL, 1, NULL, NULL),
	(127, 'parents.', '', NULL, 1, NULL, NULL),
	(128, 'World War II. ', 'Where were you in the during the war? Were you a soldier? Were you a civilian in an occupied country? Were you home waiting for a soldier to come home? Were you working in a factory for the war effort? How was life in your country affected by the war? Was there rationing? War bonds? Conscription?', NULL, 1, NULL, NULL),
	(129, 'tribal culture', '', NULL, 1, NULL, NULL),
	(130, 'jungles', '', NULL, 1, NULL, NULL),
	(131, 'military', '', NULL, 1, NULL, NULL),
	(132, 'homes', '', NULL, 1, NULL, NULL),
	(133, 'disease', '', NULL, 1, NULL, NULL),
	(134, 'disabilities', '', NULL, 1, NULL, NULL),
	(135, 'religion', '', NULL, 1, NULL, NULL),
	(136, 'church', '', NULL, 1, NULL, NULL),
	(137, ' religious rituals - bar mitzvah', '', NULL, 1, NULL, NULL),
	(138, 'religious rituals - circumcision', '', NULL, 1, NULL, NULL),
	(139, 'religious rituals - conversion', '', NULL, 1, NULL, NULL),
	(140, 'religious rituals - baptism', '', NULL, 1, NULL, NULL),
	(141, 'religious rituals - funerals', '', NULL, 1, NULL, NULL),
	(142, 'religious rituals - clothing', '', NULL, 1, NULL, NULL),
	(143, 'meals', '', NULL, 1, NULL, NULL),
	(144, 'jewelry', '', NULL, 1, NULL, NULL),
	(145, 'fashion', '', NULL, 1, NULL, NULL),
	(146, 'teeth', '', NULL, 1, NULL, NULL),
	(147, 'adoption', '', NULL, 1, NULL, NULL),
	(148, 'children', '', NULL, 1, NULL, NULL),
	(149, 'books', '', NULL, 1, NULL, NULL),
	(150, 'Las Vegas', '', NULL, 1, NULL, NULL),
	(151, 'New York', '', NULL, 1, NULL, NULL),
	(152, 'Washington, DC', '', NULL, 1, NULL, NULL),
	(153, 'Tokyo', '', NULL, 1, NULL, NULL),
	(154, 'Paris', '', NULL, 1, NULL, NULL),
	(155, 'Moscow', '', NULL, 1, NULL, NULL),
	(156, 'New Orleans', '', NULL, 1, NULL, NULL),
	(157, 'Mumbai', '', NULL, 1, NULL, NULL),
	(158, 'Beijing', '', NULL, 1, NULL, NULL),
	(159, 'beaches', '', NULL, 1, NULL, NULL),
	(160, 'amusement parks', '', NULL, 1, NULL, NULL),
	(161, 'niagara falls', '', NULL, 1, NULL, NULL),
	(162, 'pyramids', '', NULL, 1, NULL, NULL),
	(163, 'grand canyon', '', NULL, 1, NULL, NULL),
	(164, 'charity', '', NULL, 1, NULL, NULL),
	(165, 'homelessness', '', NULL, 1, NULL, NULL),
	(166, 'stuff', '', NULL, 1, NULL, NULL),
	(167, 'smells', '', NULL, 1, NULL, NULL),
	(168, 'hearing', '', NULL, 1, NULL, NULL),
	(169, 'museums', '', NULL, 1, NULL, NULL),
	(170, 'money', '', NULL, 1, NULL, NULL),
	(171, 'wine', '', NULL, 1, NULL, NULL),
	(172, 'alcohol', '', NULL, 1, NULL, NULL),
	(173, 'small towns', '', NULL, 1, NULL, NULL),
	(174, 'languages', '', NULL, 1, NULL, NULL),
	(175, 'humor', '', NULL, 1, NULL, NULL),
	(176, 'cartoons', '', NULL, 1, NULL, NULL),
	(177, 'role models', '', NULL, 1, NULL, NULL),
	(178, 'cooking', '', NULL, 1, NULL, NULL),
	(179, 'social mobility', '', NULL, 1, NULL, NULL),
	(180, 'native costumes', '', NULL, 1, NULL, NULL),
	(181, 'Mardi Gras', '', NULL, 1, NULL, NULL),
	(182, 'Festivals', '', NULL, 1, NULL, NULL),
	(183, 'New Year', '', NULL, 1, NULL, NULL),
	(184, 'pilgrimage', '', NULL, 1, NULL, NULL),
	(185, 'space', '', NULL, 1, NULL, NULL),
	(186, 'gambling', '', NULL, 1, NULL, NULL),
	(187, 'drugs', '', NULL, 1, NULL, NULL),
	(188, 'telephones', '', NULL, 1, NULL, NULL),
	(189, 'friendship', '', NULL, 1, NULL, NULL),
	(190, 'Amish', '', NULL, 1, NULL, NULL),
	(191, 'Islam', '', NULL, 1, NULL, NULL),
	(192, 'Orthodoxy - Jewish, Christian, Russian, Greek, Muslim, etc', '', NULL, 1, NULL, NULL),
	(193, 'retirement', '', NULL, 1, NULL, NULL),
	(194, 'aging', '', NULL, 1, NULL, NULL),
	(196, 'being a teenager', '', NULL, 1, NULL, NULL),
	(197, 'parenthood', '', NULL, 1, NULL, NULL),
	(198, 'hunting', '', NULL, 1, NULL, NULL),
	(199, 'fishing', '', NULL, 1, NULL, NULL),
	(200, 'movies', '', NULL, 1, NULL, NULL),
	(201, 'city life', '', NULL, 1, NULL, NULL),
	(202, 'rural life', '', NULL, 1, NULL, NULL),
	(203, 'vacations', '', NULL, 1, NULL, NULL),
	(204, 'school', '', NULL, 1, NULL, NULL),
	(205, 'college', '', NULL, 1, NULL, NULL),
	(206, 'high school', '', NULL, 1, NULL, NULL),
	(207, 'pets', '', NULL, 1, NULL, NULL),
	(208, 'food', '', NULL, 1, NULL, NULL),
	(209, 'police', '', NULL, 1, NULL, NULL),
	(210, 'favorite foods', '', NULL, 1, NULL, NULL),
	(211, 'farming', '', NULL, 1, NULL, NULL),
	(212, 'gardening.', '', NULL, 1, NULL, NULL),
	(213, 'wildlife.', '', NULL, 1, NULL, NULL),
	(214, 'animals.', '', NULL, 1, NULL, NULL),
	(215, 'birds.', '', NULL, 1, NULL, NULL),
	(216, 'newspapers.', '', NULL, 1, NULL, NULL),
	(217, 'candy.', '', NULL, 1, NULL, NULL),
	(218, 'holidays.', '', NULL, 1, NULL, NULL),
	(219, 'halloween.', '', NULL, 1, NULL, NULL),
	(220, 'wine.', '', NULL, 1, NULL, NULL),
	(221, 'books/reading.', '', NULL, 1, NULL, NULL),
	(222, 'Ocean.', '', NULL, 1, NULL, NULL),
	(223, 'Hunting.', '', NULL, 1, NULL, NULL),
	(224, 'Magic.', '', NULL, 1, NULL, NULL),
	(225, 'machine', 'Was there a machine or piece of technology that changed life in your household, growing up or in your adult life? For instance, did a washing machine, clothes dryer, television, dishwasher, vacuum cleaner, refrigerator, automobile, hair dryer, radio, portable radio, typewriter change your life and if so how? Can you describe the machine?', NULL, 1, NULL, NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
