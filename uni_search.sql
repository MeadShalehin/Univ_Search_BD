-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2023 at 09:21 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uni_search`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `title`, `content`, `image`, `phone`, `email`, `created_at`, `updated_at`) VALUES
(1, 'About Us Title', 'About Us Content', 'public/logo/univsearchbd_logo.png', 1234567890, 'example@email.com', '2023-09-10 18:53:48', '2023-09-10 18:53:48');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `content` text NOT NULL,
  `tag` varchar(255) DEFAULT NULL,
  `views` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `likes` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `blog_id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `content` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Accounting (B)', NULL, NULL),
(2, 'Anthropology (B)', NULL, NULL),
(3, 'Applied Chemistry (B)', NULL, NULL),
(4, 'Biochemistry (B)', NULL, NULL),
(5, 'Bangla (B)', NULL, NULL),
(6, 'Business (B)', NULL, NULL),
(7, 'Computer Science (B)', NULL, NULL),
(8, 'Economics (B)', NULL, NULL),
(9, 'English (B)', NULL, NULL),
(10, 'History (B)', NULL, NULL),
(11, 'Islamic Studies (B)', NULL, NULL),
(12, 'Law (B)', NULL, NULL),
(13, 'Mathematics (B)', NULL, NULL),
(14, 'Philosophy (B)', NULL, NULL),
(15, 'Physics (B)', NULL, NULL),
(16, 'Political Science (B)', NULL, NULL),
(17, 'Psychology (B)', NULL, NULL),
(18, 'Sociology (B)', NULL, NULL),
(19, 'Accounting (M)', NULL, NULL),
(20, 'Anthropology (M)', NULL, NULL),
(21, 'Applied Chemistry (M)', NULL, NULL),
(22, 'Biochemistry (M)', NULL, NULL),
(23, 'Bangla (M)', NULL, NULL),
(24, 'Business (M)', NULL, NULL),
(25, 'Computer Science (M)', NULL, NULL),
(26, 'Economics (M)', NULL, NULL),
(27, 'English (M)', NULL, NULL),
(28, 'History (M)', NULL, NULL),
(29, 'Islamic Studies (M)', NULL, NULL),
(30, 'Law (M)', NULL, NULL),
(31, 'Mathematics (M)', NULL, NULL),
(32, 'Philosophy (M)', NULL, NULL),
(33, 'Physics (M)', NULL, NULL),
(34, 'Political Science (M)', NULL, NULL),
(35, 'Psychology (M)', NULL, NULL),
(36, 'Sociology (M)', NULL, NULL),
(37, 'Civil Engineering (B)', NULL, NULL),
(38, 'CSE (B)', NULL, NULL),
(39, 'EEE (B)', NULL, NULL),
(40, 'IPE (B)', NULL, NULL),
(41, 'Mech Eng (B)', NULL, NULL),
(42, 'Textile Eng (B)', NULL, NULL),
(43, 'Civil Engineering (M)', NULL, NULL),
(44, 'CSE (M)', NULL, NULL),
(45, 'EEE (M)', NULL, NULL),
(46, 'IPE (M)', NULL, NULL),
(47, 'Mech Eng (M)', NULL, NULL),
(48, 'Textile Eng (M)', NULL, NULL),
(49, 'Agri Economics (B)', NULL, NULL),
(50, 'Agri Extension (B)', NULL, NULL),
(51, 'Agri Education (B)', NULL, NULL),
(52, 'Agri Eng (B)', NULL, NULL),
(53, 'Animal Science (B)', NULL, NULL),
(54, 'Env Science (B)', NULL, NULL),
(55, 'Finance (B)', NULL, NULL),
(56, 'Int Relations (B)', NULL, NULL),
(57, 'Management (B)', NULL, NULL),
(58, 'Marketing (B)', NULL, NULL),
(59, 'Agri Economics (M)', NULL, NULL),
(60, 'Agri Extension (M)', NULL, NULL),
(61, 'Agri Education (M)', NULL, NULL),
(62, 'Agri Eng (M)', NULL, NULL),
(63, 'Animal Science (M)', NULL, NULL),
(64, 'Env Science (M)', NULL, NULL),
(65, 'Finance (M)', NULL, NULL),
(66, 'Int Relations (M)', NULL, NULL),
(67, 'Management (M)', NULL, NULL),
(68, 'Marketing (M)', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `url` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `parentable_type` varchar(255) NOT NULL,
  `parentable_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `url`, `type`, `parentable_type`, `parentable_id`, `created_at`, `updated_at`) VALUES
(1, 'AdminPanelAsset/img/university/uni_images/0-1694413348.jpg', 'jpg', 'App\\Models\\University', 1, '2023-09-11 06:22:28', '2023-09-11 06:22:28'),
(2, 'AdminPanelAsset/img/university/uni_images/1-1694413348.jpg', 'jpg', 'App\\Models\\University', 1, '2023-09-11 06:22:30', '2023-09-11 06:22:30'),
(3, 'AdminPanelAsset/img/university/uni_images/2-1694413350.jpg', 'jpg', 'App\\Models\\University', 1, '2023-09-11 06:22:30', '2023-09-11 06:22:30'),
(4, 'AdminPanelAsset/img/university/uni_images/3-1694413350.jpg', 'jpg', 'App\\Models\\University', 1, '2023-09-11 06:22:30', '2023-09-11 06:22:30'),
(5, 'AdminPanelAsset/img/university/uni_images/0-1694413954.jpg', 'jpg', 'App\\Models\\University', 2, '2023-09-11 06:32:34', '2023-09-11 06:32:34'),
(6, 'AdminPanelAsset/img/university/uni_images/1-1694413954.jpg', 'jpg', 'App\\Models\\University', 2, '2023-09-11 06:32:36', '2023-09-11 06:32:36'),
(7, 'AdminPanelAsset/img/university/uni_images/2-1694413956.jpg', 'jpg', 'App\\Models\\University', 2, '2023-09-11 06:32:36', '2023-09-11 06:32:36'),
(8, 'AdminPanelAsset/img/university/uni_images/0-1694415475.jpg', 'jpg', 'App\\Models\\University', 3, '2023-09-11 06:57:55', '2023-09-11 06:57:55'),
(9, 'AdminPanelAsset/img/university/uni_images/1-1694415475.jpg', 'jpg', 'App\\Models\\University', 3, '2023-09-11 06:57:55', '2023-09-11 06:57:55'),
(10, 'AdminPanelAsset/img/university/uni_images/2-1694415475.jpg', 'jpg', 'App\\Models\\University', 3, '2023-09-11 06:57:55', '2023-09-11 06:57:55'),
(11, 'AdminPanelAsset/img/university/uni_images/3-1694415475.jpg', 'jpg', 'App\\Models\\University', 3, '2023-09-11 06:57:55', '2023-09-11 06:57:55');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_10_30_080802_create_permission_tables', 1),
(6, '2022_12_06_070819_create_images_table', 1),
(7, '2023_07_11_192634_create_universities_table', 1),
(8, '2023_08_05_084218_create_blogs_table', 1),
(9, '2023_08_05_205611_create_news_table', 1),
(10, '2023_08_15_035045_create_subscriptions_table', 1),
(11, '2023_08_20_134845_create_comments_table', 1),
(12, '2023_08_20_204853_create_categories_table', 1),
(13, '2023_09_05_170739_create_about_us_table', 1),
(14, '2023_09_06_145849_create_testimonials_table', 1),
(15, '2023_09_06_204907_create_departments_table', 1),
(18, '2023_09_07_123846_create_user_blog_likes_table', 2),
(20, '2023_09_11_114144_add_latitude_and_longitude_to_universities_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `content` text NOT NULL,
  `categories` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2023-09-10 18:53:13', '2023-09-10 18:53:13');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'daily',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `university_id` bigint(20) UNSIGNED NOT NULL,
  `faculty_image` varchar(255) DEFAULT NULL,
  `faculty_name` varchar(255) NOT NULL,
  `faculty_designation` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `universities`
--

CREATE TABLE `universities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `banner` varchar(255) DEFAULT NULL,
  `gps` text DEFAULT NULL,
  `ranking` varchar(255) DEFAULT NULL,
  `scholarship` text DEFAULT NULL,
  `waiver` text DEFAULT NULL,
  `department_id` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `students` int(11) DEFAULT NULL,
  `award` int(11) DEFAULT NULL,
  `graduate` int(11) DEFAULT NULL,
  `faculties` int(11) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `universities`
--

INSERT INTO `universities` (`id`, `name`, `address`, `website`, `description`, `short_description`, `logo`, `banner`, `gps`, `ranking`, `scholarship`, `waiver`, `department_id`, `contact`, `email`, `facebook`, `linkedin`, `students`, `award`, `graduate`, `faculties`, `user_id`, `status`, `latitude`, `longitude`, `created_at`, `updated_at`) VALUES
(1, 'University of Liberal Arts', 'University of Liberal Arts Bangladesh\r\n688 Beribadh Road, Dhaka 1207', 'https://ulab.edu.bd/', '<p>ULAB offers Bachelor\'s and Master\'s degrees through its four schools and General Education program</p>', 'ULAB offers Bachelor\'s and Master\'s degrees through its four schools and General Education program', 'AdminPanelAsset/img/university/banner/1694413348.jpg', 'AdminPanelAsset/img/university/banner/64feb61e9cd65.jpg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7303.27349473455!2d90.34155943763339!3d23.760329713328165!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755bf4ac8e87751%3A0xb69305423ba5f5ef!2sUniversity%20of%20Liberal%20Arts%20Bangladesh!5e0!3m2!1sen!2sbd!4v1694413038093!5m2!1sen!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'QS-06', '<h3>Undergraduate Scholarships</h3><p><strong>Scholarships Policy for Undergraduate Admission</strong></p><ul><li><i>100% tuition scholarship for students with GPA5.0 both in SSC &amp; HSC without 4th subject</i></li><li><i>100% tuition scholarship for students with GPA5.0 both in SSC &amp; HSC without 4th subject</i></li><li><i>40% tuition scholarship for students with GPA 5.0 both in SSC/O level &amp; HSC/A level or equivalent results;</i></li><li><i>40% tuition scholarship for siblings/spouse;</i></li><li><i>40% tuition scholarship for ULAB /GEMCON employee ward/spouse;</i></li><li><i>Up to 20% tuition scholarship for students with English medium school background;</i></li><li><i>10% tuition scholarship for students with English version background;</i></li><li><i>20% tuition scholarship if average GPA 4.50-4.99 on SSC/O level &amp; HSC/A level or equivalent results;</i></li><li><i>15% tuition scholarship if average GPA 4.00-4.49 on SSC/O level &amp; HSC/A level or equivalent results;</i></li><li><i>10% tuition scholarship for BBA students from Science background with average GPA 3.0 in SSC/O level &amp; HSC/A level or equivalent results;</i></li><li><i><strong>10% tuition scholarship for female students</strong>;</i></li></ul><p>Students with comparable results in the old HSC system or in the GCE / GCSE / IGCSE or from any other international system are also eligible for the above merit scholarships.</p><h4>Note</h4><ul><li>Other than 100% scholarship cases; a cap of 40% scholarships shall be in place for the rest.</li><li>Students taking remedial courses in Mathematics (BBA only) &amp; English based on admission test results are to pay Taka 13,500 for each course<strong>.</strong></li><li>Students will have to pay Tk.1000 as language lab (English Zone) fees in the first two terms.</li><li>Students will have to pay CSO &amp; CCO fees Tk.1000 per terms.</li><li>Students will have to pay Tk. 3000 as Essential Skills fees in the first four terms.&nbsp;(Study Skills, Healthy Life Skills, Social Skills, and Professional Skills)</li></ul><p><strong>Undergraduate Financial Aid and other Scholarship Programs</strong>**</p><ul><li>ULAB offers three named scholarships for its students; the scholarships will cover full tuition and individual students will be given a stipend of Tk. 2,000/- per month during the regular term.</li><li>Tuition scholarships based on term performance and financial needs of the parent/guardian.</li><li>Dean’s Honor List.</li><li>Vice-Chancellor’s Honor List.</li><li>Children of Freedom Fighters Scholarship.</li><li>Students from Remote Areas Scholarship(3%, As per private university Act 2010).</li><li>Sports-persons performing at national or competitive level.</li><li>Artists, performers and musicians with proven abilities.</li></ul><p><i>Students must perform at a high level at ULAB to remain eligible for these scholarships. These rates, like all financial, academic, and other policies of the institution, may be subject to change in the future at the discretion of the authorities. Different criteria for aid do not apply concurrently.</i></p><p>&nbsp;</p><h3>Graduate Scholarships</h3><p><strong>Scholarships Policy for Graduate Admission</strong></p><ul><li><i>40% tuition scholarship for siblings/spouse;</i></li><li><i>40% tuition scholarship for ULAB/GEMCON employee ward/spouse;</i></li><li><i>20% tuition scholarship for ULABian’s;</i></li><li><i>20% tuition scholarship for students with three 1st class/Div. (CGPA 3 out of a 4 point scale &amp; &nbsp;GPA 4 out of a 5 point scale);</i></li><li><i>15% tuition scholarship for students with two 1st class/Div. (CGPA 3 out of a 4 point scale &amp; GPA 4 out of a 5 point scale);</i></li><li><i>10% tuition scholarship for working students (Min. experience 2 Years);</i></li><li><i><strong>10% tuition scholarship for female students</strong>;</i></li><li><i><strong>Corporate Offer:</strong> If a group of three persons from the same organization join the program at the same term each will enjoy 10% tuition scholarship.</i></li></ul><h4>Note</h4><ul><li>A cap of 40% scholarships shall be in place.</li><li>To be eligible for M.A in English (1Year) a candidate must have a Four year Bachelor Degree in English.</li><li>Students taking remedial courses in Mathematics &amp; English based on admission test results are to pay Taka 5000 for each course.</li></ul>', '<figure class=\"table\"><table><thead><tr><th colspan=\"7\"><strong>Undergraduate Programs</strong></th></tr><tr><th><strong>Program</strong></th><th><strong>Credit Hours</strong></th><th><strong>Admission Fees</strong></th><th><strong>Registration Fees</strong></th><th><strong>Per Credit</strong></th><th><strong>Tuition Fees</strong></th><th><strong>Total Fees</strong></th></tr></thead><tbody><tr><td>Bachelor of Business Administration (BBA)</td><td>120</td><td>15,000<br>(one-time)</td><td>2,500 X 12= 30,000</td><td>5,910</td><td>7,09,200</td><td>7,54,700</td></tr><tr><td>BSS in Media Studies &amp; Journalism (MSJ)</td><td>129</td><td>15,000<br>(one-time)</td><td>2,500 X 12 = 30000</td><td>5,500</td><td>7,09,500</td><td>7,55,000</td></tr><tr><td>BA in English &amp; Humanities (DEH)</td><td>120</td><td>15,000<br>(one-time)</td><td>2,500 X 12 = 30000</td><td>4,840</td><td>5,80,800</td><td>6,26,300</td></tr><tr><td>BA in Bangla (BLL)</td><td>141</td><td>15,000<br>(one-time)</td><td>2,500 X 12 = 30000</td><td>1,000</td><td>1,41,000</td><td>1,86,500</td></tr><tr><td>B.Sc. in Computer Science &amp; Engineering (CSE)</td><td>140</td><td>15,000<br>(one-time)</td><td>2,500 X 12 = 30000</td><td>5,000</td><td>7,00,000</td><td>7,45,500</td></tr><tr><td>B.Sc. in Electrical &amp; Electronic Engineering (EEE)</td><td>140</td><td>15,000<br>(one-time)</td><td>2,500 X 12 = 30000</td><td>4,500</td><td>6,30,000</td><td>6,75,500</td></tr></tbody></table></figure>', '[\"1\",\"7\",\"12\",\"26\"]', '022233280016', 'info@ulab.ac.bd', NULL, NULL, 1052, 105, 160000, 250, 1, 1, '23.76122', '90.35060', '2023-09-11 06:22:28', '2023-09-11 06:39:26');
INSERT INTO `universities` (`id`, `name`, `address`, `website`, `description`, `short_description`, `logo`, `banner`, `gps`, `ranking`, `scholarship`, `waiver`, `department_id`, `contact`, `email`, `facebook`, `linkedin`, `students`, `award`, `graduate`, `faculties`, `user_id`, `status`, `latitude`, `longitude`, `created_at`, `updated_at`) VALUES
(2, 'Stamford University', 'Stamford University Bangladesh\r\n744 Satmasjid Road, Dhaka 1209', 'https://www.stamforduniversity.edu.bd/', '<p>\"Nature, ethics, vivid imaginations and pragmatics drive literature that drives creativity and this creativity has exhilaratingly driven me to enroll in the English Department of Stamford University\'s aesthetically green campus which is standing with pride in the mega concrete-city, Dhaka.\"<br><br><strong>Farhana Rahman ( Batch 57 )</strong><br>#humansofSUBangladesh</p><p><a href=\"https://www.stamforduniversity.edu.bd/index.php/stamford/from_student\">Read more from our students</a></p><p><img src=\"data:image/png;base64,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\"></p><figure class=\"image\"><img src=\"data:image/png;base64,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\"></figure><h4><strong>Alumni Stories</strong></h4><p>To be a scholar is a dream of every human being, it has been dream of mine as well. My father was an Army officer; it was his suggestion that inspired me to seek admission in the Department of Law, Stamford University Bangladesh. Now I am working as Junior Lawyer at Md. Zohurul Hoque &amp; Associates in his Corporate&nbsp;<br><br><strong>Judge Court.Md.Jafor Ullah (Rasel)</strong><br><i>Department of Law (Batch-42A)</i></p>', '\"Nature, ethics, vivid imaginations and pragmatics drive literature that drives creativity', 'AdminPanelAsset/img/university/logo/1694413954.png', 'AdminPanelAsset/img/university/banner/1694413954.jpg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1535.4977668424406!2d90.37056585863198!3d23.745605657464825!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755bf4c72580d69%3A0xad2adf77f9618991!2sStamford%20University%20Bangladesh!5e0!3m2!1sen!2sbd!4v1694413664796!5m2!1sen!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '36', '<h2>Scholarships at Stamford International University</h2><p>Stamford International University recognizes students for their academic achievements and special talents. The university provides eligible applicants with financial aid through its scholarship program. Scholarships are awarded on the basis of an applicant’s financial needs, and demonstrated academic excellence and talent. For more information about scholarship for international students, please contact&nbsp;<a href=\"mailto:international@stamford.edu\">international@stamford.edu</a>&nbsp;or +662 769 4000.</p><p>&nbsp;</p><h3>GI Bill® Benefits</h3><p>Stamford International University recognizes students for their academic achievements and special talents. The university provides eligible applicants with financial aid through its scholarship program. Scholarships are awarded on the basis of an applicant’s financial needs, and demonstrated academic excellence and talent.</p><p>For more information about scholarship for international students,<br>please contact <a href=\"mailto:international@stamford.edu\">international@stamford.edu </a>or +662 769 4000.</p><p>Department of Veterans Affairs (VA). More information about education benefits offered by VA is available at the official U.S. government web site at <a href=\"http://www.benefits.va.gov/gibill\">www.benefits.va.gov/gibill</a>.</p><p>The cost of living in Bangkok is very low compared to the U.S. While studying, you will receive a housing allowance of approximately $1,300 (45,000 Baht). This will allow you to maintain and enjoy a fairly high standard of living in Bangkok, whereas your lifestyle would be quite limited in the U.S.&nbsp;</p><p><strong>Recognition</strong></p><p>Our degrees are recognized worldwide.&nbsp;Stamford is devoted to promoting cultural understanding and academic excellence.&nbsp;</p><p>Stamford is the first university in Thailand to receive International Accreditation Council for Business Education (IACBE) accreditation of the business and management programs offered through its Faculty of Business and Technology.</p><p>&nbsp;</p><p><strong>Diverse International Community</strong></p><p>At Stamford International University, we embrace diversity and different view-points. Every day is a truly cross-cultural experience. Our international students come from over 100 countries. Our faculty members come from all corners of the world, including; Spain, USA, Germany, Thailand, Canada, Ireland and many more countries.</p><p><strong>Why Wait?</strong></p><p>Use your GI Bill® at Stamford International University today and get your degree while studying in paradise! For more information feel free to contact&nbsp;<a href=\"mailto:international@stamford.edu\">international@stamford.edu</a></p>', '<h2>Scholarships at Stamford International University</h2><p>Stamford International University recognizes students for their academic achievements and special talents. The university provides eligible applicants with financial aid through its scholarship program. Scholarships are awarded on the basis of an applicant’s financial needs, and demonstrated academic excellence and talent. For more information about scholarship for international students, please contact&nbsp;<a href=\"mailto:international@stamford.edu\">international@stamford.edu</a>&nbsp;or +662 769 4000.</p><p>&nbsp;</p><h3>GI Bill® Benefits</h3><p>Stamford International University recognizes students for their academic achievements and special talents. The university provides eligible applicants with financial aid through its scholarship program. Scholarships are awarded on the basis of an applicant’s financial needs, and demonstrated academic excellence and talent.</p><p>For more information about scholarship for international students,<br>please contact <a href=\"mailto:international@stamford.edu\">international@stamford.edu </a>or +662 769 4000.</p><p>Department of Veterans Affairs (VA). More information about education benefits offered by VA is available at the official U.S. government web site at <a href=\"http://www.benefits.va.gov/gibill\">www.benefits.va.gov/gibill</a>.</p><p>The cost of living in Bangkok is very low compared to the U.S. While studying, you will receive a housing allowance of approximately $1,300 (45,000 Baht). This will allow you to maintain and enjoy a fairly high standard of living in Bangkok, whereas your lifestyle would be quite limited in the U.S.&nbsp;</p><p><strong>Recognition</strong></p><p>Our degrees are recognized worldwide.&nbsp;Stamford is devoted to promoting cultural understanding and academic excellence.&nbsp;</p><p>Stamford is the first university in Thailand to receive International Accreditation Council for Business Education (IACBE) accreditation of the business and management programs offered through its Faculty of Business and Technology.</p><p>&nbsp;</p><p><strong>Diverse International Community</strong></p><p>At Stamford International University, we embrace diversity and different view-points. Every day is a truly cross-cultural experience. Our international students come from over 100 countries. Our faculty members come from all corners of the world, including; Spain, USA, Germany, Thailand, Canada, Ireland and many more countries.</p><p><strong>Why Wait?</strong></p><p>Use your GI Bill® at Stamford International University today and get your degree while studying in paradise! For more information feel free to contact&nbsp;<a href=\"mailto:international@stamford.edu\">international@stamford.edu</a></p>', '[\"1\",\"2\",\"3\",\"5\"]', '0213254654', 'admission@stamford.university', NULL, NULL, 7000, 15, 147800, 500, 1, 1, '23.74559', '90.37157', '2023-09-11 06:32:34', '2023-09-11 06:40:30');
INSERT INTO `universities` (`id`, `name`, `address`, `website`, `description`, `short_description`, `logo`, `banner`, `gps`, `ranking`, `scholarship`, `waiver`, `department_id`, `contact`, `email`, `facebook`, `linkedin`, `students`, `award`, `graduate`, `faculties`, `user_id`, `status`, `latitude`, `longitude`, `created_at`, `updated_at`) VALUES
(3, 'United International University', 'United International University\r\nUnited City, Madani Ave, Dhaka 1212', 'https://www.uiu.ac.bd/', '<p><strong>Vision</strong>: The vision of UIU is to become the center of excellence in teaching, learning and research in the South Asian region.</p><p><strong>Mission</strong>: The mission of UIU is to create excellent human resources with intellectual, creative, technical, moral and practical skills to serve community, industry and region. We do it by developing integrated, interactive, involved and caring relationships among teachers, students, guardians and employers.</p><p><strong>To realize this mission and vision, the goals of UIU are as follows:</strong></p><ul><li>To provide state of the art and standard education as preparation for higher studies or future employment in positions of responsibility across a worldwide range of ICT, Business, Social and Public Organizations.</li><li>To make available internationally recognized education in Bangladesh and to develop our graduates up to international standard through getting accreditation of internationally recognized accreditation bodies.</li><li>To use modern instructional techniques and technology to the best advantage so as to enhance and enrich students’ achievements of their educational and career goals as well as socio-economic development of the country.</li><li>To establish joint degree programs with different renowned universities of USA, UK, Canada and Australia to facilitate quality education and also to make foreign degrees available to the students while staying in Bangladesh at an affordable cost.</li><li>To provide educational opportunities to persons already employed or engaged in business allowing them to pursue undergraduate and graduate programs without interrupting their careers and without any compromise of quality education.</li><li>To create congenial academic environment for the youth that is free from political and other disturbances for their intellectual advancement.</li><li>To use information technology in all phases of academic as well as administrative aspects of the university program to ensure free and transparent flow of information.</li><li>To undertake such additional programs and activities as are essential to the achievement of the above listed objectives.</li></ul>', 'United International University is one of the best private university in Bangladesh and approved by the Ministry of Education, Government of People\'s Republic', 'AdminPanelAsset/img/university/logo/1694415473.png', 'AdminPanelAsset/img/university/banner/1694415473.jpg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3069.7679064023473!2d90.4478511639479!3d23.797615972959697!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c7d8042caf2d%3A0x686fa3e360361ddf!2sUnited%20International%20University!5e0!3m2!1sen!2sbd!4v1694415222717!5m2!1sen!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'QS-200', '<h3><strong>1. Tuition Fee waiver:</strong></h3><p><strong>A)&nbsp; Undergraduate Programs:</strong></p><figure class=\"table\"><table><tbody><tr><td><strong>Percentage of waiver</strong></td><td><strong>Criteria for Tuition Fee Waiver</strong></td></tr><tr><td>100% for English Medium students</td><td>Five (5) A’s in the O-level and 1 A’s and 1 B’s in A-level Exams. However, for students admitted in Engineering Programs, students must have ‘B’ either in Physics or Mathematics in A-Level exams.</td></tr><tr><td>50% for the students of English and Bangla Medium or equivalent public exams.</td><td><p>Five (5) A’s in the O-level and 2 ‘B’ in A-level Exams. *</p><p>Or</p><p>HSC GPA 5.00 (without 4th subject) or equivalent public exams.</p></td></tr><tr><td>25% for the students of English and Bangla Medium or equivalent public exams.</td><td><p>Four (4) A’s in the O-level *</p><p>Or</p><p>HSC GPA 5.00 (with 4th subject) / or equivalent public exams.</p></td></tr></tbody></table></figure><p>Note:</p><p><strong>1.</strong> Admittiees into any of the SoSE programs, in addition to the policy mentioned above, must have passed Physics and Mathematics in the A-level program.</p><p><strong>2.</strong> For continuation of tuition fee waiver undergraduate students have to take 9 credits in each trimester (For BSc in Civil Engg. 13.5 credits, for BSSEDS/BSSMSJ 12 credits in each Semester) and also have to maintain CGPA 3.5 for availing such tuition fee waiver. For admission to BSEEE/CSE/BSc in Civil programs, students must have&nbsp; Physics and Mathematics in HSC/A-Level exams.</p><p><strong>B)&nbsp; Graduate Programs:</strong></p><p><strong>1.</strong> GPA 3.50 on Scale of&nbsp; 4.00&nbsp; &amp; GPA 4.37 on Scale of 5.00 in HSC &amp; above or equivalent level public exams: 25% Tuition Fee Waiver</p><p><strong>2.</strong> For continuation of tuition fee waiver graduate students have to take 6 credits and also have to maintain CGPA 3.5 for availing such tuition fee waiver.</p><h3><strong>2. Scholarship:</strong></h3><p>1. In the undergraduate programs, top 10% students will be eligible to get 25% to 100% scholarship by taking at least 9 credit hours under the trimester system, 13.5 credits for BSc in Civil Engg. and 12 credits for BSSEDS/BSSMSJ under the semester system and must achieve a trimester/semester GPA of 3.50.</p><p>2. In the graduate programs, top 10% students will also be eligible to get 25% to 100% scholarship by taking at least 6 credit hours and achieving trimester GPA of 3.50 as well.&nbsp;</p><p>The following table displays the percentages of scholarship schemes (Effective from Summer 2023 trimester/Fall 2023 semester &amp;&nbsp; onwards).</p><figure class=\"table\"><table><tbody><tr><td>Top 2% of the total students of a particular program (In order of merit)</td><td>100% Scholarship for the corresponding Trimester/Semester</td></tr><tr><td>Next 4% (In order of merit)</td><td>50% Scholarship for the corresponding Trimester/Semester</td></tr><tr><td>Next 4% (In order of merit)</td><td>25% Scholarship for the corresponding Trimester/Semester</td></tr></tbody></table></figure><p>Note: Students who have admitted before Spring 2023 will receive the Scholarship based on previously defined scheme.</p><p><strong>1.</strong> Undergraduate students of SOBE will be entitled for scholarship up to 12 credits (maximum) and those of SOSE (except Civil) up to 13 credits (maximum).&nbsp; For BSc in Civil Engg. and BSSEDS It will be up to 18 credits. Masters students shall get scholarship depending of the course load of previous trimester and will not exceed 9 credits. Students will enjoy either tuition fee waiver or scholarship, the one which benefits him/her most. &nbsp;</p><p><strong>2.&nbsp; </strong>Students will enjoy either tuition fee waiver or scholarship, the one which benefits him/her most.&nbsp;</p><p>&nbsp;</p><p><strong>C) 100% Tuition Fee and Other Fees Waiver for Meritorious and Poor Students of Underdeveloped Regions of Bangladesh:</strong></p><p>Top 3% of the total admitted students in a particular trimester/semester who are meritorious and poor and come from the underdeveloped upazilas of Bangladesh, as determined by the Government of Bangladesh from time to time, will be awarded this scholarship (conditions apply). A student, who receives this scholarship, will be waived from all tuition and other fees except admission fee, ID card fee and retake course(s) fees. Upon selection, he/she will continue to get the waiver till they obtain their degree, subject to the condition that s/he obtains a minimum GPA of 2.5 in a particular trimester/semester for becoming eligible to get 100% Tuition and Other Fees Waiver in the following trimester/semester.</p>', '<p>Note:</p><p>* Admission fee Tk. 20,000/- (non-refundable) as down payment during admission.</p><p>** Caution money for ID Card Tk. 2000/- (refundable) payable at the time of taking Admission.</p><p>*** Per Trimester Fee Taka 6500/- &amp; Per Semester Fee Taka 9750/-</p><figure class=\"table\"><table><tbody><tr><td><p><strong>Eligibility for getting Direct Admission to undergraduate &amp; graduate programs</strong></p><p>&nbsp;</p><p>1.&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; GPA 5.00 holders in HSC/Equivalent exams.</p><p>2. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; An admittee with five (5) A’s in the O-level and 1 A’s &amp; 1 B’s in A-level</p><p>3. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; An admittee with five (5) A’s in the O-level and two (2) B’s in the A-level</p><p>4. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; An admittee with four (4) A’s in the O-level</p><p>5.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; A minimum SAT-1 score of 1000</p><p>7. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Credit-transferred students will be able to get admission to an undergraduate/graduate program of UIU without Admission Test.</p><p>8.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; For admission to BSEEE/CSE/Civil programs, students must have had Physics and Mathematics in HSC/A-Level or equivalent level.</p><p>9.<strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong>For getting admission to any Master’s program for the students graduated from UIU<strong>&nbsp;</strong></p><p>&nbsp;</p><p><strong>*&nbsp;Last date of Direct Admission for all programs (except Civil, BSSEDS &amp; BSSMSJ: 17th September 2023.&nbsp; Last date of Direct Admission for Civil, BSSEDS &amp; BSMSJ: 22nd November 2023. &nbsp;</strong><br>&nbsp;</p><p><strong>**&nbsp; Fall 2023 Trimester: &nbsp;Classes of all undergraduate programs will start from 23rd September (Saturday), 2023, and all graduate programs from 22nd September (Friday) 2023.</strong><br>&nbsp;</p><p><strong>*** Spring 2024 Semester: &nbsp;Classes of all undergraduate programs will start from 23rd January (Tuesday) 2024.</strong></p><p>&nbsp;</p></td></tr></tbody></table></figure><p><strong>The following conditions will however apply:</strong></p><ol><li>*1 Students of undergraduate programs must register a minimum of 9 credits in each trimester (For BSc in Civil Engg. 13.5 credits, BSSEDS &amp; BSSMSJ 12 credits in each Semester) to be eligible for both tuition fee waiver and UIU Scholarship..</li><li>*1 Students availing 25% to 100% tuition fee waiver in the undergraduate programs will have to maintain a minimum CGPA of 3.50 in the trimester/semester examination for continuation of the waiver facility in the following trimester/semester.</li><li>*2&nbsp; Students of graduate programs must register at least 6 credits in each trimester to be eligible for both tuition fee waiver and UIU Scholarship.</li></ol>', '[\"1\",\"6\",\"7\",\"45\"]', '02456849', 'info@uiu.ac.bd', NULL, NULL, 80000, 12, 182000, 200, 1, 1, '23.79907', '90.44951', '2023-09-11 06:57:55', '2023-09-11 06:57:55');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `gender`, `email_verified_at`, `phone`, `address`, `dob`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, NULL, NULL, NULL, NULL, '$2y$10$5OwUlwWK1fGsGsedG1s0dux5BnwdDMm2rzr2xfvDYBQpDfE3mzNhK', 1, NULL, '2023-09-10 18:53:13', '2023-09-10 18:53:13');

-- --------------------------------------------------------

--
-- Table structure for table `user_blog_likes`
--

CREATE TABLE `user_blog_likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `blog_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_parentable_type_parentable_id_index` (`parentable_type`,`parentable_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `universities`
--
ALTER TABLE `universities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_blog_likes`
--
ALTER TABLE `user_blog_likes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_blog_likes_user_id_blog_id_unique` (`user_id`,`blog_id`),
  ADD KEY `user_blog_likes_blog_id_foreign` (`blog_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `universities`
--
ALTER TABLE `universities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_blog_likes`
--
ALTER TABLE `user_blog_likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_blog_likes`
--
ALTER TABLE `user_blog_likes`
  ADD CONSTRAINT `user_blog_likes_blog_id_foreign` FOREIGN KEY (`blog_id`) REFERENCES `blogs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_blog_likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
