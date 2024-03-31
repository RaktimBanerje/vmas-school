-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 30, 2024 at 09:30 AM
-- Server version: 10.11.7-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u760018442_school`
--

-- --------------------------------------------------------

--
-- Table structure for table `academy_classes`
--

CREATE TABLE `academy_classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `academy_classes`
--

INSERT INTO `academy_classes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'I', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'II', NULL, NULL),
(3, 'III', NULL, NULL),
(4, 'IV', NULL, NULL),
(5, 'V', NULL, NULL),
(6, 'VI', NULL, NULL),
(7, 'VII', NULL, NULL),
(8, 'VIII', NULL, NULL),
(9, 'IX', NULL, NULL),
(10, 'X', NULL, NULL),
(11, 'XI', NULL, NULL),
(12, 'XII', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `payment_amount` double(11,2) NOT NULL,
  `payment_for` enum('admission','monthly') NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `payment_date` date NOT NULL,
  `from_date` varchar(255) DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`id`, `student_id`, `payment_amount`, `payment_for`, `payment_mode`, `payment_date`, `from_date`, `to_date`, `created_at`, `updated_at`) VALUES
(6, 2, 50.00, 'admission', 'offline', '2024-03-13', NULL, NULL, '2024-03-13 07:17:59', '2024-03-13 07:17:59'),
(7, 2, 2400.00, 'monthly', 'offline', '2024-03-13', '2024-04', '2024-05-13', '2024-03-13 07:17:59', '2024-03-13 07:17:59');

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_02_24_061158_create_stopages_table', 1),
(6, '2024_02_25_131621_create_vehicles_table', 1),
(7, '2024_02_25_231627_create_vehicle_stopages_table', 1),
(8, '2024_02_26_085353_create_academy_classes_table', 1),
(9, '2024_02_26_085418_create_sections_table', 1),
(10, '2024_02_26_085438_create_departments_table', 1),
(11, '2024_02_26_85439_create_students_table', 1),
(13, '2024_03_13_105704_create_fees_table', 2),
(14, '2024_03_13_104453_create_seat_reservations_table', 3),
(15, '2024_03_15_192158_create_user_permissions_table', 4);

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `seat_reservations`
--

CREATE TABLE `seat_reservations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vehicle_id` bigint(20) UNSIGNED NOT NULL,
  `stopage_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `reserve_from` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seat_reservations`
--

INSERT INTO `seat_reservations` (`id`, `vehicle_id`, `stopage_id`, `student_id`, `reserve_from`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2024-03-18', '2024-03-13 11:31:46', '2024-03-13 11:31:46');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stopages`
--

CREATE TABLE `stopages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `fare` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stopages`
--

INSERT INTO `stopages` (`id`, `name`, `fare`, `created_at`, `updated_at`) VALUES
(1, 'Mandirtala', 1200, '2024-03-13 03:47:10', '2024-03-13 03:47:10'),
(2, 'Eco Space', 2000, '2024-03-13 03:47:18', '2024-03-13 03:47:18');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `academy_class_id` bigint(20) UNSIGNED NOT NULL,
  `student_image` varchar(255) DEFAULT NULL,
  `student_id` varchar(255) NOT NULL,
  `roll` varchar(255) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `mother_name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `phone1` varchar(255) NOT NULL,
  `phone2` varchar(255) DEFAULT NULL,
  `gender` enum('male','female') NOT NULL,
  `dob` date NOT NULL,
  `remarks` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `academy_class_id`, `student_image`, `student_id`, `roll`, `student_name`, `father_name`, `mother_name`, `address`, `phone1`, `phone2`, `gender`, `dob`, `remarks`, `created_at`, `updated_at`) VALUES
(1, 1, 'public/images/ua5mqVZzgfwXaArC61N1fwGrgNyrxtbYelDvQDgj.jpg', '1710333952', 'asd', 'Raktim Banerjee', 'asd', 'asdf', 'asd', 'as', 'as', 'male', '2024-03-20', NULL, '2024-03-13 07:15:52', '2024-03-13 07:15:52'),
(2, 2, 'public/images/nfiQHhyDaFvmslnE2ZQTiGfKcdeoXj4syoeuy7h9.jpg', '1710334079', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'male', '2024-03-22', NULL, '2024-03-13 07:17:59', '2024-03-13 07:17:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `photo` text DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `photo`, `email_verified_at`, `password`, `remember_token`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Raktim Banerjee', 'raktimbanerjee9@gmail.com', 'user_photo/man-1.png', NULL, '$2y$12$fN0eeheHXAlDwXfKr5Ra4uRpZkASJ1LAA0VdyJ3DQzAJD27hFr6gq', NULL, 0, '2024-03-13 03:33:24', '2024-03-14 07:14:50'),
(4, 'Sumit Sahoo', 'sumit@gmail.com', 'user_photo/man-2.png', NULL, '$2y$12$xGY37fS6WnLMqTAYF4q0euMMe3oHSTBD.nYnnskmX9vQHuvx6HqdS', NULL, 1, '2024-03-14 06:31:49', '2024-03-14 07:14:47');

-- --------------------------------------------------------

--
-- Table structure for table `user_permissions`
--

CREATE TABLE `user_permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `permission` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `registration_no` varchar(255) NOT NULL,
  `identity_no` varchar(255) NOT NULL,
  `engine_no` varchar(255) NOT NULL,
  `insurance_valid_upto` varchar(255) NOT NULL,
  `tax_valid_upto` varchar(255) NOT NULL,
  `fitness_valid_upto` varchar(255) NOT NULL,
  `pollution_valid_upto` varchar(255) NOT NULL,
  `permit_valid_upto` varchar(255) NOT NULL,
  `driver_name` varchar(255) NOT NULL,
  `driver_phone` varchar(255) NOT NULL,
  `helper_name` varchar(255) NOT NULL,
  `helper_phone` varchar(255) NOT NULL,
  `seats` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `registration_no`, `identity_no`, `engine_no`, `insurance_valid_upto`, `tax_valid_upto`, `fitness_valid_upto`, `pollution_valid_upto`, `permit_valid_upto`, `driver_name`, `driver_phone`, `helper_name`, `helper_phone`, `seats`, `department`, `created_at`, `updated_at`) VALUES
(1, 'WB-12353', 'ID-1', 'ABC', '2024-03-13', '2024-03-13', '2024-03-13', '2024-03-13', '2024-03-13', 'ABC', 'ABC', 'ABC', 'ABC', '50', 'primary', '2024-03-13 03:48:08', '2024-03-13 03:48:08'),
(2, 'WB-235008', 'ID-2', 'ABC', '2024-03-07', '2024-03-20', '2024-03-28', '2024-03-22', '2024-03-29', 'xyz', 'xyz', 'xyz', 'xyz', '40', 'high', '2024-03-13 03:49:58', '2024-03-13 03:49:58');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_stopages`
--

CREATE TABLE `vehicle_stopages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vehicle_id` bigint(20) UNSIGNED NOT NULL,
  `stopage_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicle_stopages`
--

INSERT INTO `vehicle_stopages` (`id`, `vehicle_id`, `stopage_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2024-03-13 03:50:16', '2024-03-13 03:50:16'),
(2, 1, 2, '2024-03-13 03:50:16', '2024-03-13 03:50:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academy_classes`
--
ALTER TABLE `academy_classes`
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
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `seat_reservations`
--
ALTER TABLE `seat_reservations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stopages`
--
ALTER TABLE `stopages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_student_id_unique` (`student_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_permissions`
--
ALTER TABLE `user_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle_stopages`
--
ALTER TABLE `vehicle_stopages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academy_classes`
--
ALTER TABLE `academy_classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seat_reservations`
--
ALTER TABLE `seat_reservations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stopages`
--
ALTER TABLE `stopages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_permissions`
--
ALTER TABLE `user_permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vehicle_stopages`
--
ALTER TABLE `vehicle_stopages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
