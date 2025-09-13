-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2025 at 04:53 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `softvence`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `module_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` text DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`id`, `course_id`, `module_id`, `title`, `text`, `video`, `image`, `created_at`, `updated_at`) VALUES
(98, 13, 1, 'laravel basic', 'laravel basic', 'https://www.youtube.com/watch?v=1FC6p7G3-jA', 'upload/1757730233_68c4d5b91b82c.png', '2025-09-12 20:23:53', '2025-09-12 20:23:53');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `title`, `description`, `category`, `created_at`, `updated_at`) VALUES
(13, 'Laravel Basics', 'Learn the fundamentals of Laravel framework.', 'Web Development', '2025-09-13 02:14:14', '2025-09-13 02:14:14'),
(14, 'Advanced Laravel', 'Deep dive into Laravel features and best practices.', 'Web Development', '2025-09-13 02:14:14', '2025-09-13 02:14:14'),
(15, 'PHP for Beginners', 'Step-by-step guide to learn PHP programming.', 'Programming', '2025-09-13 02:14:14', '2025-09-13 02:14:14'),
(16, 'JavaScript Essentials', 'Understand JS basics and DOM manipulation.', 'Programming', '2025-09-13 02:14:14', '2025-09-13 02:14:14'),
(17, 'Vue.js Fundamentals', 'Learn reactive front-end development with Vue.js.', 'Front-end', '2025-09-13 02:14:14', '2025-09-13 02:14:14'),
(18, 'React.js Crash Course', 'Build modern web apps using React.js.', 'Front-end', '2025-09-13 02:14:14', '2025-09-13 02:14:14'),
(19, 'Database Design', 'Learn relational database design and normalization.', 'Database', '2025-09-13 02:14:14', '2025-09-13 02:14:14'),
(20, 'REST API Development', 'Create APIs using Laravel and PHP.', 'Web Development', '2025-09-13 02:14:14', '2025-09-13 02:14:14'),
(21, 'Authentication in Laravel', 'Implement login, registration, and security.', 'Web Development', '2025-09-13 02:14:14', '2025-09-13 02:14:14'),
(22, 'E-commerce Website with Laravel', 'Build a complete e-commerce site using Laravel.', 'Web Development', '2025-09-13 02:14:14', '2025-09-13 02:14:14');

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_09_12_185532_create_courses_table', 2),
(6, '2025_09_12_190428_create_modules_table', 3),
(7, '2025_09_12_202050_create_contents_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `course_id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 13, 'Laravel Basics', NULL, '2025-09-13 02:23:15', '2025-09-13 02:23:15'),
(2, 13, 'Routing', NULL, '2025-09-13 02:23:15', '2025-09-13 02:23:15'),
(3, 13, 'Blade Templates', NULL, '2025-09-13 02:23:15', '2025-09-13 02:23:15'),
(4, 13, 'Eloquent ORM', NULL, '2025-09-13 02:23:15', '2025-09-13 02:23:15'),
(5, 13, 'Middleware', NULL, '2025-09-13 02:23:15', '2025-09-13 02:23:15'),
(6, 14, 'Advanced Routing', NULL, '2025-09-13 02:23:15', '2025-09-13 02:23:15'),
(7, 14, 'Service Providers', NULL, '2025-09-13 02:23:15', '2025-09-13 02:23:15'),
(8, 14, 'Events & Listeners', NULL, '2025-09-13 02:23:15', '2025-09-13 02:23:15'),
(9, 14, 'Jobs & Queues', NULL, '2025-09-13 02:23:15', '2025-09-13 02:23:15'),
(10, 14, 'Notifications', NULL, '2025-09-13 02:23:15', '2025-09-13 02:23:15'),
(83, 13, 'Introduction to Laravel', 'Basics of Laravel framework and setup.', '2025-09-13 02:17:01', '2025-09-13 02:17:01'),
(84, 13, 'Routing & Controllers', 'Learn routing and controllers basics.', '2025-09-13 02:17:01', '2025-09-13 02:17:01'),
(85, 13, 'Blade Templates', 'Create dynamic views with Blade.', '2025-09-13 02:17:01', '2025-09-13 02:17:01'),
(86, 13, 'Eloquent ORM', 'Database interaction using Eloquent.', '2025-09-13 02:17:01', '2025-09-13 02:17:01'),
(87, 13, 'Middleware', 'Using middleware for request filtering.', '2025-09-13 02:17:01', '2025-09-13 02:17:01'),
(88, 14, 'Advanced Routing', 'Deep dive into advanced routing techniques.', '2025-09-13 02:17:01', '2025-09-13 02:17:01'),
(89, 14, 'Service Providers', 'Understanding Laravel service providers.', '2025-09-13 02:17:01', '2025-09-13 02:17:01'),
(90, 14, 'Events & Listeners', 'Handle events and listeners in Laravel.', '2025-09-13 02:17:01', '2025-09-13 02:17:01'),
(91, 14, 'Jobs & Queues', 'Background jobs and queues in Laravel.', '2025-09-13 02:17:01', '2025-09-13 02:17:01'),
(92, 14, 'Notifications', 'Send notifications in Laravel apps.', '2025-09-13 02:17:01', '2025-09-13 02:17:01'),
(93, 15, 'PHP Basics', 'Variables, loops, and functions in PHP.', '2025-09-13 02:17:01', '2025-09-13 02:17:01'),
(94, 15, 'Arrays & Strings', 'Working with arrays and strings.', '2025-09-13 02:17:01', '2025-09-13 02:17:01'),
(95, 15, 'OOP in PHP', 'Object-oriented programming concepts.', '2025-09-13 02:17:01', '2025-09-13 02:17:01'),
(96, 15, 'Error Handling', 'Handling errors and exceptions in PHP.', '2025-09-13 02:17:01', '2025-09-13 02:17:01'),
(97, 15, 'PHP Forms', 'Create forms and handle input.', '2025-09-13 02:17:01', '2025-09-13 02:17:01'),
(98, 16, 'JavaScript Syntax', 'Understand JS syntax and operators.', '2025-09-13 02:17:01', '2025-09-13 02:17:01'),
(99, 16, 'DOM Manipulation', 'Interact with HTML elements using JS.', '2025-09-13 02:17:01', '2025-09-13 02:17:01'),
(100, 16, 'JS Events', 'Handle events like clicks and forms.', '2025-09-13 02:17:01', '2025-09-13 02:17:01'),
(101, 16, 'AJAX Requests', 'Fetch data asynchronously using JS.', '2025-09-13 02:17:01', '2025-09-13 02:17:01'),
(102, 16, 'ES6 Features', 'Learn modern JS features.', '2025-09-13 02:17:01', '2025-09-13 02:17:01'),
(103, 17, 'Vue Components', 'Building reusable Vue components.', '2025-09-13 02:17:01', '2025-09-13 02:17:01'),
(104, 17, 'Vue Directives', 'Dynamic content with Vue directives.', '2025-09-13 02:17:01', '2025-09-13 02:17:01'),
(105, 17, 'Vue Router', 'Navigation in Vue apps.', '2025-09-13 02:17:01', '2025-09-13 02:17:01'),
(106, 17, 'State Management', 'Manage state with Vuex.', '2025-09-13 02:17:01', '2025-09-13 02:17:01'),
(107, 17, 'Vue Lifecycle', 'Understand Vue component lifecycle.', '2025-09-13 02:17:01', '2025-09-13 02:17:01'),
(108, 18, 'React Components', 'Building React components.', '2025-09-13 02:17:01', '2025-09-13 02:17:01'),
(109, 18, 'State & Props', 'Pass data between components.', '2025-09-13 02:17:01', '2025-09-13 02:17:01'),
(110, 18, 'Hooks', 'Use React hooks effectively.', '2025-09-13 02:17:01', '2025-09-13 02:17:01'),
(111, 18, 'Routing', 'Navigation using React Router.', '2025-09-13 02:17:01', '2025-09-13 02:17:01'),
(112, 18, 'Context API', 'Manage global state with Context API.', '2025-09-13 02:17:01', '2025-09-13 02:17:01'),
(113, 19, 'Database Design Basics', 'ER diagrams and normalization.', '2025-09-13 02:17:01', '2025-09-13 02:17:01'),
(114, 19, 'SQL Queries', 'CRUD queries for relational databases.', '2025-09-13 02:17:01', '2025-09-13 02:17:01'),
(115, 19, 'Indexes & Keys', 'Optimize queries with indexes.', '2025-09-13 02:17:01', '2025-09-13 02:17:01'),
(116, 19, 'Joins & Relations', 'Combine tables using joins.', '2025-09-13 02:17:01', '2025-09-13 02:17:01'),
(117, 19, 'Stored Procedures', 'Use stored procedures in MySQL.', '2025-09-13 02:17:01', '2025-09-13 02:17:01'),
(118, 20, 'REST API Setup', 'Create API endpoints using Laravel.', '2025-09-13 02:17:01', '2025-09-13 02:17:01'),
(119, 20, 'API Authentication', 'Secure API using tokens.', '2025-09-13 02:17:01', '2025-09-13 02:17:01'),
(120, 20, 'API Pagination', 'Paginate API responses.', '2025-09-13 02:17:01', '2025-09-13 02:17:01'),
(121, 20, 'API Error Handling', 'Return proper API error messages.', '2025-09-13 02:17:01', '2025-09-13 02:17:01'),
(122, 20, 'API Testing', 'Test APIs with Postman or PHPUnit.', '2025-09-13 02:17:01', '2025-09-13 02:17:01'),
(123, 21, 'Authentication Basics', 'Login, registration, password reset.', '2025-09-13 02:17:01', '2025-09-13 02:17:01'),
(124, 21, 'Authorization & Roles', 'User roles and permissions.', '2025-09-13 02:17:01', '2025-09-13 02:17:01'),
(125, 21, 'Email Verification', 'Verify user emails after signup.', '2025-09-13 02:17:01', '2025-09-13 02:17:01'),
(126, 21, 'Password Reset', 'Allow users to reset password.', '2025-09-13 02:17:01', '2025-09-13 02:17:01'),
(127, 21, 'Two-Factor Auth', 'Add extra security with 2FA.', '2025-09-13 02:17:01', '2025-09-13 02:17:01'),
(128, 22, 'E-commerce Setup', 'Initial setup for online store.', '2025-09-13 02:17:01', '2025-09-13 02:17:01'),
(129, 22, 'Product Management', 'Manage products and categories.', '2025-09-13 02:17:01', '2025-09-13 02:17:01'),
(130, 22, 'Cart & Checkout', 'Implement shopping cart and checkout.', '2025-09-13 02:17:01', '2025-09-13 02:17:01'),
(131, 22, 'Payment Integration', 'Integrate payment gateways.', '2025-09-13 02:17:01', '2025-09-13 02:17:01'),
(132, 22, 'Order Management', 'Manage customer orders.', '2025-09-13 02:17:01', '2025-09-13 02:17:01'),
(133, 13, 'Introduction to Laravel', 'Basics of Laravel framework and setup.', '2025-09-13 02:20:39', '2025-09-13 02:20:39'),
(134, 13, 'Routing & Controllers', 'Learn routing and controllers basics.', '2025-09-13 02:20:39', '2025-09-13 02:20:39'),
(135, 13, 'Blade Templates', 'Create dynamic views with Blade.', '2025-09-13 02:20:39', '2025-09-13 02:20:39'),
(136, 14, 'Advanced Routing', 'Deep dive into advanced routing techniques.', '2025-09-13 02:20:39', '2025-09-13 02:20:39'),
(137, 14, 'Middleware & Security', 'Secure your app with middleware.', '2025-09-13 02:20:39', '2025-09-13 02:20:39');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('ZUcmSWS3ku2wnUPP6XDK2zO7VcRHtKZYTD6Vlq3g', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoienBSQUhFcVo0TE1wM3lDejRYbWZURmI1Z1hVSUh4WjRvUUtRMDFXSSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9jb250ZW50Ijt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1757731383);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admn', 'admin@gmail.com', NULL, '$2y$12$1G8twZuM6lfcFaj/v.IS1.NEEE3dIMUXKpxQ8nM/uYsbkVg/5Xcuu', NULL, '2025-09-12 12:21:41', '2025-09-12 12:21:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contents_course_id_foreign` (`course_id`),
  ADD KEY `contents_module_id_foreign` (`module_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `modules_course_id_foreign` (`course_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contents`
--
ALTER TABLE `contents`
  ADD CONSTRAINT `contents_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `contents_module_id_foreign` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `modules`
--
ALTER TABLE `modules`
  ADD CONSTRAINT `modules_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
