-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-12-2023 a las 08:39:01
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `room_911`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `departments`
--

INSERT INTO `departments` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Accounting', '2021-01-01 05:00:00', '2021-01-01 05:00:00'),
(2, 'Administration', '2021-01-01 05:00:00', '2021-01-01 05:00:00'),
(3, 'Customer Service', '2021-01-01 05:00:00', '2021-01-01 05:00:00'),
(4, 'Engineering', '2021-01-01 05:00:00', '2021-01-01 05:00:00'),
(5, 'Information Technology', '2021-01-01 05:00:00', '2021-01-01 05:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
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
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_12_02_215915_create_departments_table', 1),
(6, '2023_12_05_034004_create_records_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
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
-- Estructura de tabla para la tabla `records`
--

CREATE TABLE `records` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `records`
--

INSERT INTO `records` (`id`, `status`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'rejected', '2023-12-05 08:47:42', '2023-12-05 08:47:42', 3),
(2, 'rejected', '2023-12-05 08:47:42', '2023-12-05 08:47:42', 30),
(3, 'approve', '2023-12-05 08:47:42', '2023-12-05 08:47:42', 3),
(4, 'rejected', '2023-12-05 08:47:42', '2023-12-05 08:47:42', 29),
(5, 'approve', '2023-12-05 08:47:42', '2023-12-05 08:47:42', 15),
(6, 'approve', '2023-12-05 08:47:42', '2023-12-05 08:47:42', 25),
(7, 'rejected', '2023-12-05 08:47:42', '2023-12-05 08:47:42', 28),
(8, 'approve', '2023-12-05 08:47:42', '2023-12-05 08:47:42', 23),
(9, 'rejected', '2023-12-05 08:47:42', '2023-12-05 08:47:42', 17),
(10, 'rejected', '2023-12-05 08:47:42', '2023-12-05 08:47:42', 10),
(11, 'rejected', '2023-12-05 08:47:42', '2023-12-05 08:47:42', 3),
(12, 'rejected', '2023-12-05 08:47:42', '2023-12-05 08:47:42', 22),
(13, 'rejected', '2023-12-05 08:47:42', '2023-12-05 08:47:42', 30),
(14, 'approve', '2023-12-05 08:47:42', '2023-12-05 08:47:42', 5),
(15, 'rejected', '2023-12-05 08:47:42', '2023-12-05 08:47:42', 13),
(16, 'rejected', '2023-12-05 08:47:42', '2023-12-05 08:47:42', 27),
(17, 'rejected', '2023-12-05 08:47:42', '2023-12-05 08:47:42', 30),
(18, 'approve', '2023-12-05 08:47:42', '2023-12-05 08:47:42', 6),
(19, 'approve', '2023-12-05 08:47:42', '2023-12-05 08:47:42', 6),
(20, 'approve', '2023-12-05 08:47:42', '2023-12-05 08:47:42', 7),
(21, 'approve', '2023-12-05 08:47:42', '2023-12-05 08:47:42', 2),
(22, 'approve', '2023-12-05 08:47:42', '2023-12-05 08:47:42', 24),
(23, 'approve', '2023-12-05 08:47:42', '2023-12-05 08:47:42', 2),
(24, 'rejected', '2023-12-05 08:47:42', '2023-12-05 08:47:42', 11),
(25, 'rejected', '2023-12-05 08:47:42', '2023-12-05 08:47:42', 4),
(26, 'rejected', '2023-12-05 08:47:42', '2023-12-05 08:47:42', 26),
(27, 'rejected', '2023-12-05 08:47:42', '2023-12-05 08:47:42', 15),
(28, 'approve', '2023-12-05 08:47:42', '2023-12-05 08:47:42', 18),
(29, 'rejected', '2023-12-05 08:47:42', '2023-12-05 08:47:42', 9),
(30, 'approve', '2023-12-05 08:47:42', '2023-12-05 08:47:42', 11),
(31, 'approve', '2023-12-05 08:47:42', '2023-12-05 08:47:42', 19),
(32, 'rejected', '2023-12-05 08:47:42', '2023-12-05 08:47:42', 17),
(33, 'rejected', '2023-12-05 08:47:42', '2023-12-05 08:47:42', 22),
(34, 'approve', '2023-12-05 08:47:42', '2023-12-05 08:47:42', 5),
(35, 'approve', '2023-12-05 08:47:42', '2023-12-05 08:47:42', 28),
(36, 'rejected', '2023-12-05 08:47:42', '2023-12-05 08:47:42', 30),
(37, 'rejected', '2023-12-05 08:47:42', '2023-12-05 08:47:42', 16),
(38, 'rejected', '2023-12-05 08:47:42', '2023-12-05 08:47:42', 15),
(39, 'approve', '2023-12-05 08:47:42', '2023-12-05 08:47:42', 4),
(40, 'rejected', '2023-12-05 08:47:42', '2023-12-05 08:47:42', 27),
(41, 'rejected', '2023-12-05 08:47:42', '2023-12-05 08:47:42', 5),
(42, 'approve', '2023-12-05 08:47:42', '2023-12-05 08:47:42', 6),
(43, 'rejected', '2023-12-05 08:47:42', '2023-12-05 08:47:42', 5),
(44, 'rejected', '2023-12-05 08:47:42', '2023-12-05 08:47:42', 28),
(45, 'approve', '2023-12-05 08:47:42', '2023-12-05 08:47:42', 17),
(46, 'approve', '2023-12-05 08:47:42', '2023-12-05 08:47:42', 14),
(47, 'rejected', '2023-12-05 08:47:42', '2023-12-05 08:47:42', 13),
(48, 'rejected', '2023-12-05 08:47:42', '2023-12-05 08:47:42', 5),
(49, 'approve', '2023-12-05 08:47:42', '2023-12-05 08:47:42', 19),
(50, 'approve', '2023-12-05 08:47:42', '2023-12-05 08:47:42', 2),
(51, 'rejected', '2023-12-06 05:42:55', '2023-12-06 05:42:55', 2),
(52, 'approved', '2023-12-06 05:43:59', '2023-12-06 05:43:59', 1),
(53, 'approved', '2023-12-06 05:45:15', '2023-12-06 05:45:15', 2),
(54, 'rejected', '2023-12-06 11:44:25', '2023-12-06 11:44:25', 5),
(55, 'approved', '2023-12-06 11:44:42', '2023-12-06 11:44:42', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `access_room_911` tinyint(1) NOT NULL DEFAULT 0,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `last_login_at` datetime DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `department_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `last_name`, `username`, `access_room_911`, `email`, `email_verified_at`, `last_login_at`, `password`, `remember_token`, `created_at`, `updated_at`, `department_id`) VALUES
(1, 'Jayde Daniel IV', 'Jaskolski', 'ysporer', 1, 'colton59@example.org', '2023-12-05 08:47:42', '2023-06-22 15:21:42', '$2y$12$vUvOKqtFe3w9kIeT1s2RB.eWR/AOKkVuIlRXyeluxYWF7cO.1u1uG', 'NOs1YSbAOBZeWVDfYeTbjiS1FXmZXGFdTR2uBzJiftWzZTRaMOpS9DVBWYPd', '2023-12-05 08:47:42', '2023-12-05 08:47:42', 2),
(2, 'Dock Vandervort Jr.', 'Braun', 'rempel.marco', 1, 'crooks.aiyana@example.net', '2023-12-05 08:47:42', '2023-03-15 21:46:31', '$2y$12$vUvOKqtFe3w9kIeT1s2RB.eWR/AOKkVuIlRXyeluxYWF7cO.1u1uG', 'ummcGk2l0agSkjonDriNzPUJXsUbvMNgrOmuCMILVh44LbVQINnr5Igpo3y5', '2023-12-05 08:47:42', '2023-12-06 05:44:19', 2),
(3, 'Kira Halvorson', 'Collier', 'juston64', 1, 'kunde.louisa@example.com', '2023-12-05 08:47:42', '2023-08-27 16:48:16', '$2y$12$vUvOKqtFe3w9kIeT1s2RB.eWR/AOKkVuIlRXyeluxYWF7cO.1u1uG', '1w6Wc05GKS', '2023-12-05 08:47:42', '2023-12-05 08:47:42', 2),
(4, 'Dr. Nella Metz', 'Volkman', 'zwisoky', 1, 'shanna.robel@example.com', '2023-12-05 08:47:42', '2023-04-06 08:36:17', '$2y$12$vUvOKqtFe3w9kIeT1s2RB.eWR/AOKkVuIlRXyeluxYWF7cO.1u1uG', 'qwFAGbqI0x', '2023-12-05 08:47:42', '2023-12-05 08:47:42', 5),
(5, 'Mr. Alexandre O\'Connell', 'Medhurst', 'aschowalter', 0, 'lula.jenkins@example.net', '2023-12-05 08:47:42', '2023-02-10 07:24:09', '$2y$12$vUvOKqtFe3w9kIeT1s2RB.eWR/AOKkVuIlRXyeluxYWF7cO.1u1uG', 'auWFJQthsD', '2023-12-05 08:47:42', '2023-12-05 08:47:42', 3),
(6, 'Stacy Morar', 'Labadie', 'salvatore87', 1, 'julio92@example.com', '2023-12-05 08:47:42', '2023-09-13 23:04:08', '$2y$12$vUvOKqtFe3w9kIeT1s2RB.eWR/AOKkVuIlRXyeluxYWF7cO.1u1uG', 'd8hck79LOL', '2023-12-05 08:47:42', '2023-12-05 08:47:42', 5),
(7, 'Samantha Sauer', 'Hoeger', 'zcormier', 0, 'carole21@example.net', '2023-12-05 08:47:42', '2023-03-16 13:22:50', '$2y$12$vUvOKqtFe3w9kIeT1s2RB.eWR/AOKkVuIlRXyeluxYWF7cO.1u1uG', 'ZsxDZR4vEC', '2023-12-05 08:47:42', '2023-12-05 08:47:42', 2),
(8, 'Maye Cronin', 'Mante', 'ignacio17', 0, 'kling.kelton@example.com', '2023-12-05 08:47:42', '2023-03-11 08:08:44', '$2y$12$vUvOKqtFe3w9kIeT1s2RB.eWR/AOKkVuIlRXyeluxYWF7cO.1u1uG', 'Vp0IwOWoMw', '2023-12-05 08:47:42', '2023-12-05 08:47:42', 2),
(9, 'Kamryn Stiedemann', 'Welch', 'sven.legros', 0, 'hane.shanna@example.net', '2023-12-05 08:47:42', '2023-03-13 19:37:16', '$2y$12$vUvOKqtFe3w9kIeT1s2RB.eWR/AOKkVuIlRXyeluxYWF7cO.1u1uG', 'YwPp0aTk6W', '2023-12-05 08:47:42', '2023-12-05 08:47:42', 1),
(10, 'Donnell Abshire Jr.', 'Beer', 'hauck.eusebio', 0, 'williamson.joany@example.com', '2023-12-05 08:47:42', '2022-12-19 22:34:35', '$2y$12$vUvOKqtFe3w9kIeT1s2RB.eWR/AOKkVuIlRXyeluxYWF7cO.1u1uG', 'DYEz05srgX', '2023-12-05 08:47:42', '2023-12-05 08:47:42', 5),
(11, 'Prof. Wellington Hagenes', 'Schulist', 'osteuber', 1, 'jacky.schulist@example.net', '2023-12-05 08:47:42', '2023-09-14 22:21:14', '$2y$12$vUvOKqtFe3w9kIeT1s2RB.eWR/AOKkVuIlRXyeluxYWF7cO.1u1uG', 'o6c7jQwsgA', '2023-12-05 08:47:42', '2023-12-05 08:47:42', 1),
(12, 'Prof. Herman Heidenreich Jr.', 'Hammes', 'mittie41', 1, 'rkoepp@example.org', '2023-12-05 08:47:42', '2023-03-31 02:55:30', '$2y$12$vUvOKqtFe3w9kIeT1s2RB.eWR/AOKkVuIlRXyeluxYWF7cO.1u1uG', 'a7hCtXgWDJ', '2023-12-05 08:47:42', '2023-12-05 08:47:42', 4),
(13, 'Mrs. Daniella Bednar', 'Klein', 'gloria16', 0, 'zhessel@example.org', '2023-12-05 08:47:42', '2023-04-25 01:25:22', '$2y$12$vUvOKqtFe3w9kIeT1s2RB.eWR/AOKkVuIlRXyeluxYWF7cO.1u1uG', '8mR18fEXUx', '2023-12-05 08:47:42', '2023-12-05 08:47:42', 5),
(14, 'Breana Dooley PhD', 'Bechtelar', 'esta90', 1, 'paul.baumbach@example.net', '2023-12-05 08:47:42', '2022-12-08 23:28:15', '$2y$12$vUvOKqtFe3w9kIeT1s2RB.eWR/AOKkVuIlRXyeluxYWF7cO.1u1uG', 'S6Py2OM2Fn', '2023-12-05 08:47:42', '2023-12-05 08:47:42', 3),
(15, 'Micah Mills', 'Medhurst', 'kherman', 1, 'dooley.nikko@example.com', '2023-12-05 08:47:42', '2023-01-23 00:32:47', '$2y$12$vUvOKqtFe3w9kIeT1s2RB.eWR/AOKkVuIlRXyeluxYWF7cO.1u1uG', 'PbGKheX5Up', '2023-12-05 08:47:42', '2023-12-05 08:47:42', 1),
(16, 'Marianna Blanda', 'Beahan', 'abbott.gilberto', 1, 'vergie19@example.net', '2023-12-05 08:47:42', '2023-02-06 17:59:01', '$2y$12$vUvOKqtFe3w9kIeT1s2RB.eWR/AOKkVuIlRXyeluxYWF7cO.1u1uG', '7e2p3Jq998', '2023-12-05 08:47:42', '2023-12-05 08:47:42', 4),
(17, 'Sim Emard II', 'Carter', 'hbatz', 1, 'langworth.bradford@example.net', '2023-12-05 08:47:42', '2023-10-10 14:17:07', '$2y$12$vUvOKqtFe3w9kIeT1s2RB.eWR/AOKkVuIlRXyeluxYWF7cO.1u1uG', '5hBMkPA5Zw', '2023-12-05 08:47:42', '2023-12-05 08:47:42', 4),
(18, 'Mr. Anastacio Donnelly I', 'Williamson', 'wgibson', 0, 'hodkiewicz.asha@example.org', '2023-12-05 08:47:42', '2023-04-19 08:24:48', '$2y$12$vUvOKqtFe3w9kIeT1s2RB.eWR/AOKkVuIlRXyeluxYWF7cO.1u1uG', 'tZ3lv75n38', '2023-12-05 08:47:42', '2023-12-05 08:47:42', 1),
(19, 'Mrs. Delia Raynor III', 'Champlin', 'olson.lamont', 0, 'ismitham@example.org', '2023-12-05 08:47:42', '2023-04-03 06:35:57', '$2y$12$vUvOKqtFe3w9kIeT1s2RB.eWR/AOKkVuIlRXyeluxYWF7cO.1u1uG', 'sANzP9dhDt', '2023-12-05 08:47:42', '2023-12-05 08:47:42', 5),
(20, 'Prof. Raphael Effertz', 'Volkman', 'angelica.rohan', 1, 'dallin.crooks@example.org', '2023-12-05 08:47:42', '2023-01-12 22:50:47', '$2y$12$vUvOKqtFe3w9kIeT1s2RB.eWR/AOKkVuIlRXyeluxYWF7cO.1u1uG', '0HzHvWg4pg', '2023-12-05 08:47:42', '2023-12-05 08:47:42', 4),
(21, 'Deanna Towne', 'Batz', 'bernhard.justina', 1, 'wreichel@example.org', '2023-12-05 08:47:42', '2023-11-29 11:01:26', '$2y$12$vUvOKqtFe3w9kIeT1s2RB.eWR/AOKkVuIlRXyeluxYWF7cO.1u1uG', '8EFmyfdHPI', '2023-12-05 08:47:42', '2023-12-05 08:47:42', 4),
(22, 'Ms. Myra Rowe', 'Littel', 'hermiston.rahsaan', 1, 'zcremin@example.net', '2023-12-05 08:47:42', '2023-02-17 12:09:15', '$2y$12$vUvOKqtFe3w9kIeT1s2RB.eWR/AOKkVuIlRXyeluxYWF7cO.1u1uG', 'Edoq0B6lhy', '2023-12-05 08:47:42', '2023-12-05 08:47:42', 1),
(23, 'Laurine Bailey', 'Johnston', 'frances.halvorson', 0, 'cmcglynn@example.net', '2023-12-05 08:47:42', '2023-03-02 21:28:24', '$2y$12$vUvOKqtFe3w9kIeT1s2RB.eWR/AOKkVuIlRXyeluxYWF7cO.1u1uG', 'zOx7lrBmwp', '2023-12-05 08:47:42', '2023-12-05 08:47:42', 4),
(24, 'Miss Bridgette Mosciski', 'Mertz', 'monica66', 0, 'florencio.gorczany@example.net', '2023-12-05 08:47:42', '2023-06-27 23:35:12', '$2y$12$vUvOKqtFe3w9kIeT1s2RB.eWR/AOKkVuIlRXyeluxYWF7cO.1u1uG', 'GY9dfTLNRn', '2023-12-05 08:47:42', '2023-12-05 08:47:42', 5),
(25, 'Yvette Botsford', 'O\'Reilly', 'jpredovic', 0, 'alysa.funk@example.com', '2023-12-05 08:47:42', '2023-08-05 05:07:01', '$2y$12$vUvOKqtFe3w9kIeT1s2RB.eWR/AOKkVuIlRXyeluxYWF7cO.1u1uG', 'ETkHf422zI', '2023-12-05 08:47:42', '2023-12-05 08:47:42', 4),
(26, 'Kurtis Cummings', 'Ward', 'jacky.larson', 1, 'garrick55@example.com', '2023-12-05 08:47:42', '2022-12-31 15:11:02', '$2y$12$vUvOKqtFe3w9kIeT1s2RB.eWR/AOKkVuIlRXyeluxYWF7cO.1u1uG', 'GNJqxhpsHs', '2023-12-05 08:47:42', '2023-12-05 08:47:42', 5),
(27, 'Ignacio Bahringer', 'Gusikowski', 'dheidenreich', 0, 'stremblay@example.org', '2023-12-05 08:47:42', '2023-05-16 14:28:52', '$2y$12$vUvOKqtFe3w9kIeT1s2RB.eWR/AOKkVuIlRXyeluxYWF7cO.1u1uG', '9Dn03hzB4C', '2023-12-05 08:47:42', '2023-12-05 08:47:42', 3),
(28, 'Hal Ferry', 'Mertz', 'kling.alice', 1, 'amara.turcotte@example.net', '2023-12-05 08:47:42', '2023-05-16 14:38:33', '$2y$12$vUvOKqtFe3w9kIeT1s2RB.eWR/AOKkVuIlRXyeluxYWF7cO.1u1uG', 'VSJaFreBkO', '2023-12-05 08:47:42', '2023-12-05 08:47:42', 4),
(29, 'Dr. Tad Armstrong', 'Sipes', 'blick.gerald', 1, 'dhamill@example.net', '2023-12-05 08:47:42', '2023-07-07 10:31:36', '$2y$12$vUvOKqtFe3w9kIeT1s2RB.eWR/AOKkVuIlRXyeluxYWF7cO.1u1uG', 'G7VU7fhjve', '2023-12-05 08:47:42', '2023-12-05 08:47:42', 1),
(30, 'Florian Hackett', 'Durgan', 'daugherty.hubert', 1, 'abeier@example.com', '2023-12-05 08:47:42', '2023-07-09 00:48:23', '$2y$12$vUvOKqtFe3w9kIeT1s2RB.eWR/AOKkVuIlRXyeluxYWF7cO.1u1uG', 'zNObijsHpb', '2023-12-05 08:47:42', '2023-12-05 08:47:42', 4),
(36, 'Robert', 'Ortega', 'Robert.Ortega', 1, 'robert@ortega.com', '2023-12-06 11:45:16', '2023-12-06 06:45:16', '$2y$12$LEbjt27any7a9CmqUCGI2ebyGCFrez2YMtqVuNLsXdB1acbgFG.Oe', 'lPf8iHnJeJ', '2023-12-06 11:45:16', '2023-12-06 11:45:16', 5);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`id`),
  ADD KEY `records_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD KEY `users_department_id_foreign` (`department_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `records`
--
ALTER TABLE `records`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `records`
--
ALTER TABLE `records`
  ADD CONSTRAINT `records_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
