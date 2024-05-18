-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2024 at 09:43 AM
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
-- Database: `vital_sign_record`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `Appointment_id` bigint(20) UNSIGNED NOT NULL,
  `Appointment_date` datetime NOT NULL,
  `Purpose` varchar(255) NOT NULL,
  `Doctor_id` bigint(20) UNSIGNED NOT NULL,
  `Patient_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`Appointment_id`, `Appointment_date`, `Purpose`, `Doctor_id`, `Patient_id`, `created_at`, `updated_at`) VALUES
(2, '2024-04-27 00:00:00', 'Follow-up', 2, 2, '2024-04-25 16:32:59', '2024-04-25 17:43:51'),
(3, '2024-04-26 00:00:00', 'Regular checkup', 1, 2, '2024-04-25 16:33:46', '2024-04-25 16:33:46'),
(4, '2024-04-26 00:00:00', 'اشعة مقطعية', 1, 2, '2024-04-25 16:50:25', '2024-04-25 16:50:25'),
(5, '2024-04-26 00:00:00', 'اشعة مقطعية', 1, 2, '2024-04-25 17:35:23', '2024-04-25 17:35:23'),
(6, '2024-04-26 00:00:00', 'اشعة مقطعية', 1, 2, '2024-04-25 17:43:42', '2024-04-25 17:43:42'),
(7, '2024-04-26 00:00:00', 'اشعة مقطعية', 1, 2, '2024-04-25 18:02:29', '2024-04-25 18:02:29');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('cf9b002318423aeb4184a7da4b881950', 'i:1;', 1711459175),
('cf9b002318423aeb4184a7da4b881950:timer', 'i:1711459175;', 1711459175),
('kamelfcis@gmail.com|127.0.0.1', 'i:1;', 1711459175),
('kamelfcis@gmail.com|127.0.0.1:timer', 'i:1711459175;', 1711459175);

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `Doctor_id` bigint(20) UNSIGNED NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `MiddleName` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) NOT NULL,
  `Phone` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Gender` char(1) NOT NULL,
  `Country` varchar(255) NOT NULL,
  `City` varchar(255) NOT NULL,
  `Street` varchar(255) NOT NULL,
  `Speciality` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`Doctor_id`, `FirstName`, `MiddleName`, `LastName`, `Phone`, `Email`, `Password`, `Gender`, `Country`, `City`, `Street`, `Speciality`, `created_at`, `updated_at`) VALUES
(1, 'UpdatedJohn', 'UpdatedRobert', 'UpdatedDoe', '0987654321', 'updated.email@example.com', '$2y$12$gEMWZ7NyAUwoRfX3UVKGcuHerxOay91jjixEFUXhDsevbKrjSag/q', 'M', 'USA', 'New York', '123 Main St', 'Neurologist', '2024-04-25 16:03:18', '2024-04-25 16:04:12'),
(2, 'John', 'Robert', 'Doe', '1234567890', 'john.doe@example.com', '$2y$12$O2zvUvqzjyJhThbI.iclHenO0Lnls6z9yiYukfgkFPuRHDNzI.60a', 'M', 'USA', 'New York', '123 Main St', 'Cardiologist', '2024-04-25 17:14:31', '2024-04-25 17:14:31');

-- --------------------------------------------------------

--
-- Table structure for table `medical_histories`
--

CREATE TABLE `medical_histories` (
  `History_id` bigint(20) UNSIGNED NOT NULL,
  `Patient_id` bigint(20) UNSIGNED NOT NULL,
  `Condition` varchar(255) NOT NULL,
  `Diagnosis_Date` date NOT NULL,
  `Treatment` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medical_histories`
--

INSERT INTO `medical_histories` (`History_id`, `Patient_id`, `Condition`, `Diagnosis_Date`, `Treatment`, `created_at`, `updated_at`) VALUES
(1, 2, 'Updated Fever', '2024-04-26', 'Updated treatment', '2024-04-25 18:14:35', '2024-04-25 18:15:44');

-- --------------------------------------------------------

--
-- Table structure for table `medications`
--

CREATE TABLE `medications` (
  `Medication_id` bigint(20) UNSIGNED NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Dosage` varchar(255) DEFAULT NULL,
  `Frequency` varchar(255) DEFAULT NULL,
  `Patient_id` bigint(20) UNSIGNED DEFAULT NULL,
  `Doctor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medications`
--

INSERT INTO `medications` (`Medication_id`, `Name`, `Dosage`, `Frequency`, `Patient_id`, `Doctor_id`, `created_at`, `updated_at`) VALUES
(1, 'Medicine B', '20mg', 'Once a day', 2, 2, '2024-04-25 18:29:53', '2024-04-25 18:32:21');

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
(4, '2024_04_19_193224_add_two_factor_columns_to_users_table', 1),
(5, '2024_04_19_193318_create_personal_access_tokens_table', 1),
(6, '2024_04_19_194958_create_patients_table', 1);

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
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `Patient_id` bigint(20) UNSIGNED NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `MiddleName` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) NOT NULL,
  `Phone` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Gender` char(1) NOT NULL,
  `Country` varchar(255) NOT NULL,
  `City` varchar(255) NOT NULL,
  `Street` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`Patient_id`, `FirstName`, `MiddleName`, `LastName`, `Phone`, `Email`, `Password`, `Gender`, `Country`, `City`, `Street`, `created_at`, `updated_at`) VALUES
(2, 'UpdatedJohn', 'UpdatedRobert', 'UpdatedDoe', '0987654321', 'updated.email@example.com', '$2y$12$Shkn//hFYZ/iSO/Ta3edoe6sC61jAc55RdLumvR8AMyTqQIEUDjmO', 'M', 'USA', 'New York', '123 Main St', '2024-04-19 19:16:58', '2024-04-25 15:59:46'),
(3, 'John', NULL, 'Doe', '1234567890', 'john.doe@example.com', '$2y$12$cIQhMGiRft.t42qVm1KrAOauMPbfdL3gayRMSb3WdbsfouHaOY1bK', 'M', 'USA', 'New York', '123 Main St', '2024-04-25 15:53:36', '2024-04-25 15:53:36');

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
-- Table structure for table `sensors`
--

CREATE TABLE `sensors` (
  `Sensor_id` bigint(20) UNSIGNED NOT NULL,
  `Type` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sensors`
--

INSERT INTO `sensors` (`Sensor_id`, `Type`, `Status`, `created_at`, `updated_at`) VALUES
(1, 'Humidity', 'Inactive', '2024-04-25 18:39:42', '2024-04-25 18:40:51');

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
('SkPmVYibnnlxz4CUbe49SyOlWQ4mSX5iuqbo8vhP', NULL, '127.0.0.1', 'PostmanRuntime/7.37.3', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNGhkemFySVl1R3pSNWtmUHNUV0o2aVByZEs1TkVhb1BNTUs5ajhTZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1714076943);

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
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vital_signs`
--

CREATE TABLE `vital_signs` (
  `Vital_Sign_id` bigint(20) UNSIGNED NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Unit` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vital_sign_records`
--

CREATE TABLE `vital_sign_records` (
  `Record_id` bigint(20) UNSIGNED NOT NULL,
  `Patient_id` bigint(20) UNSIGNED NOT NULL,
  `Sensor_id` bigint(20) UNSIGNED NOT NULL,
  `Vital_Sign_id` bigint(20) UNSIGNED NOT NULL,
  `Doctor_id` bigint(20) UNSIGNED NOT NULL,
  `Value` varchar(255) NOT NULL,
  `Time_Stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`Appointment_id`),
  ADD KEY `appointments_doctor_id_foreign` (`Doctor_id`),
  ADD KEY `appointments_patient_id_foreign` (`Patient_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`Doctor_id`),
  ADD UNIQUE KEY `doctors_email_unique` (`Email`);

--
-- Indexes for table `medical_histories`
--
ALTER TABLE `medical_histories`
  ADD PRIMARY KEY (`History_id`),
  ADD KEY `medical_histories_patient_id_foreign` (`Patient_id`);

--
-- Indexes for table `medications`
--
ALTER TABLE `medications`
  ADD PRIMARY KEY (`Medication_id`),
  ADD KEY `Patient_id` (`Patient_id`),
  ADD KEY `Doctor_id` (`Doctor_id`);

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
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`Patient_id`),
  ADD UNIQUE KEY `patients_email_unique` (`Email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sensors`
--
ALTER TABLE `sensors`
  ADD PRIMARY KEY (`Sensor_id`);

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
-- Indexes for table `vital_signs`
--
ALTER TABLE `vital_signs`
  ADD PRIMARY KEY (`Vital_Sign_id`);

--
-- Indexes for table `vital_sign_records`
--
ALTER TABLE `vital_sign_records`
  ADD PRIMARY KEY (`Record_id`),
  ADD KEY `vital_sign_records_patient_id_foreign` (`Patient_id`),
  ADD KEY `vital_sign_records_sensor_id_foreign` (`Sensor_id`),
  ADD KEY `vital_sign_records_vital_sign_id_foreign` (`Vital_Sign_id`),
  ADD KEY `vital_sign_records_doctor_id_foreign` (`Doctor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `Appointment_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `Doctor_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `medical_histories`
--
ALTER TABLE `medical_histories`
  MODIFY `History_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `medications`
--
ALTER TABLE `medications`
  MODIFY `Medication_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `Patient_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sensors`
--
ALTER TABLE `sensors`
  MODIFY `Sensor_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vital_signs`
--
ALTER TABLE `vital_signs`
  MODIFY `Vital_Sign_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vital_sign_records`
--
ALTER TABLE `vital_sign_records`
  MODIFY `Record_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_doctor_id_foreign` FOREIGN KEY (`Doctor_id`) REFERENCES `doctors` (`Doctor_id`),
  ADD CONSTRAINT `appointments_patient_id_foreign` FOREIGN KEY (`Patient_id`) REFERENCES `patients` (`Patient_id`);

--
-- Constraints for table `medical_histories`
--
ALTER TABLE `medical_histories`
  ADD CONSTRAINT `medical_histories_patient_id_foreign` FOREIGN KEY (`Patient_id`) REFERENCES `patients` (`Patient_id`);

--
-- Constraints for table `medications`
--
ALTER TABLE `medications`
  ADD CONSTRAINT `medications_ibfk_1` FOREIGN KEY (`Patient_id`) REFERENCES `patients` (`Patient_id`),
  ADD CONSTRAINT `medications_ibfk_2` FOREIGN KEY (`Doctor_id`) REFERENCES `doctors` (`Doctor_id`);

--
-- Constraints for table `vital_sign_records`
--
ALTER TABLE `vital_sign_records`
  ADD CONSTRAINT `vital_sign_records_doctor_id_foreign` FOREIGN KEY (`Doctor_id`) REFERENCES `doctors` (`Doctor_id`),
  ADD CONSTRAINT `vital_sign_records_patient_id_foreign` FOREIGN KEY (`Patient_id`) REFERENCES `patients` (`Patient_id`),
  ADD CONSTRAINT `vital_sign_records_sensor_id_foreign` FOREIGN KEY (`Sensor_id`) REFERENCES `sensors` (`Sensor_id`),
  ADD CONSTRAINT `vital_sign_records_vital_sign_id_foreign` FOREIGN KEY (`Vital_Sign_id`) REFERENCES `vital_signs` (`Vital_Sign_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
