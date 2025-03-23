-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2025 at 06:05 PM
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
-- Database: `football_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fixtures`
--

CREATE TABLE `fixtures` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `home_team_id` bigint(20) UNSIGNED NOT NULL,
  `away_team_id` bigint(20) UNSIGNED NOT NULL,
  `home_team` varchar(191) NOT NULL,
  `away_team` varchar(191) NOT NULL,
  `home_team_logo` varchar(191) DEFAULT NULL,
  `away_team_logo` varchar(191) DEFAULT NULL,
  `match_date` datetime NOT NULL,
  `venue` varchar(191) NOT NULL,
  `home_score` int(11) DEFAULT NULL,
  `away_score` int(11) DEFAULT NULL,
  `match_summary` text DEFAULT NULL,
  `match_statistics` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`match_statistics`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fixtures`
--

INSERT INTO `fixtures` (`id`, `home_team_id`, `away_team_id`, `home_team`, `away_team`, `home_team_logo`, `away_team_logo`, `match_date`, `venue`, `home_score`, `away_score`, `match_summary`, `match_statistics`, `created_at`, `updated_at`) VALUES
(13, 1, 2, 'Manchester United', 'Chelsea', 'uploads/manu.png', 'uploads/chelsea.png', '2025-04-10 18:00:00', 'Old Trafford', NULL, NULL, NULL, NULL, '2025-03-21 00:44:57', '2025-03-21 00:44:57'),
(14, 5, 3, 'Liverpool', 'Real Madrid', 'uploads/liverpool.png', 'uploads/realmadrid.png', '2025-04-15 20:30:00', 'Anfield', NULL, NULL, NULL, NULL, '2025-03-21 00:44:57', '2025-03-21 00:44:57'),
(15, 7, 4, 'Bayern Munich', 'Barcelona', 'uploads/bayern.png', 'uploads/barcelona.png', '2025-04-20 19:45:00', 'Allianz Arena', NULL, NULL, NULL, NULL, '2025-03-21 00:44:57', '2025-03-21 00:44:57'),
(16, 8, 11, 'Juventus', 'AC Milan', 'uploads/juventus.png', 'uploads/acmilan.png', '2025-04-25 21:00:00', 'Allianz Stadium', NULL, NULL, NULL, NULL, '2025-03-21 00:44:57', '2025-03-21 00:44:57'),
(17, 12, 13, 'Arsenal', 'Tottenham', 'uploads/arsenal.png', 'uploads/tottenham.png', '2025-04-30 17:30:00', 'Emirates Stadium', NULL, NULL, NULL, NULL, '2025-03-21 00:44:57', '2025-03-21 00:44:57'),
(18, 1, 5, 'Manchester United', 'Liverpool', 'uploads/manu.png', 'uploads/liverpool.png', '2025-03-15 19:10:00', 'Old Trafford', 2, 1, 'Bruno Fernandes scored the winner.', '{\"possession\": \"55% - 45%\", \"shots_on_target\": \"7 - 5\", \"fouls\": \"10 - 8\", \"corners\": \"5 - 3\", \"top_scorer\": \"Bruno Fernandes\", \"yellow_cards\": \"2 - 1\", \"red_cards\": \"0 - 0\"}', '2025-03-21 00:44:57', '2025-03-21 00:44:57'),
(19, 3, 4, 'Real Madrid', 'Barcelona', 'uploads/realmadrid.png', 'uploads/barcelona.png', '2025-03-10 20:00:00', 'Santiago Bernabéu', 1, 1, 'Late equalizer from Barcelona.', '{\"possession\": \"60% - 40%\", \"shots_on_target\": \"8 - 6\", \"fouls\": \"12 - 9\", \"corners\": \"4 - 5\", \"top_scorer\": \"Karim Benzema\", \"yellow_cards\": \"1 - 2\", \"red_cards\": \"0 - 0\"}', '2025-03-21 00:44:57', '2025-03-21 00:44:57'),
(20, 7, 9, 'Bayern Munich', 'PSG', 'uploads/bayern.png', 'uploads/psg.png', '2025-03-08 21:30:00', 'Allianz Arena', 3, 2, 'Lewandowski scored a brace.', '{\"possession\": \"50% - 50%\", \"shots_on_target\": \"9 - 8\", \"fouls\": \"14 - 11\", \"corners\": \"6 - 4\", \"top_scorer\": \"Robert Lewandowski\", \"yellow_cards\": \"3 - 2\", \"red_cards\": \"0 - 1\"}', '2025-03-21 00:44:57', '2025-03-21 00:44:57'),
(21, 8, 10, 'Juventus', 'Inter Milan', 'uploads/juventus.png', 'uploads/inter.png', '2025-03-05 19:45:00', 'Allianz Stadium', 2, 1, 'Dybala scored the winning goal.', '{\"possession\": \"48% - 52%\", \"shots_on_target\": \"5 - 6\", \"fouls\": \"11 - 13\", \"corners\": \"3 - 5\", \"top_scorer\": \"Paulo Dybala\", \"yellow_cards\": \"2 - 2\", \"red_cards\": \"0 - 0\"}', '2025-03-21 00:44:57', '2025-03-21 00:44:57'),
(22, 12, 2, 'Arsenal', 'Chelsea', 'uploads/arsenal.png', 'uploads/chelsea.png', '2025-03-01 18:00:00', 'Emirates Stadium', 1, 2, 'Chelsea secured the win with a late goal.', '{\"possession\": \"53% - 47%\", \"shots_on_target\": \"6 - 7\", \"fouls\": \"9 - 10\", \"corners\": \"4 - 4\", \"top_scorer\": \"Mason Mount\", \"yellow_cards\": \"1 - 2\", \"red_cards\": \"0 - 0\"}', '2025-03-21 00:44:57', '2025-03-21 00:44:57');

-- --------------------------------------------------------

--
-- Table structure for table `fixture_player`
--

CREATE TABLE `fixture_player` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fixture_id` bigint(20) UNSIGNED NOT NULL,
  `player_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `matches`
--

CREATE TABLE `matches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `home_team_id` bigint(20) UNSIGNED NOT NULL,
  `away_team_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `result` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(11, '2014_10_12_000000_create_users_table', 1),
(12, '2014_10_12_100000_create_password_resets_table', 1),
(13, '2025_03_16_030150_create_comments_table', 1),
(14, '2025_03_16_030225_create_teams_table', 1),
(15, '2025_03_16_030246_create_matches_table', 1),
(16, '2025_03_17_013727_add_is_admin_to_users_table', 1),
(17, '2025_03_17_021307_create_categories_table', 1),
(18, '2025_03_18_212830_create_posts_table', 1),
(20, '2025_03_19_145658_add_description_to_posts_table', 2),
(21, '2025_03_19_150006_update_posts_table', 2),
(23, '2025_03_20_184938_add_scores_to_fixtures_table', 4),
(24, '2025_03_19_192803_create_fixtures_table', 5),
(25, '2025_03_20_193228_add_match_statistics_to_fixtures_table', 6),
(26, '2025_03_20_201315_remove_unnecessary_columns_from_fixtures', 7),
(27, '2025_03_21_001052_create_predictions_table', 8),
(28, '2025_03_22_180000_create_players_table', 9),
(29, '2025_03_22_180659_create_trophies_table', 10),
(30, '2025_03_22_191606_create_player_match_votes_table', 11),
(32, '2025_03_22_194009_create_fixture_player_table', 12),
(33, '2025_03_23_145733_add_profile_picture_to_users_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('d00270565@student.dkit.ie', '$2y$10$joeQykgWRZYUX44ndb56R.K/arQnCQiQiGZQ59BJxhZiZSlcZ9ugO', '2025-03-21 10:10:29');

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `position` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`id`, `team_id`, `name`, `position`, `created_at`, `updated_at`) VALUES
(5, 4, 'Marc-André ter Stegen', 'Goalkeeper', '2025-03-23 01:42:53', '2025-03-23 01:42:53'),
(6, 4, 'Ronald Araújo', 'Defender', '2025-03-23 01:42:53', '2025-03-23 01:42:53'),
(7, 4, 'Jules Koundé', 'Defender', '2025-03-23 01:42:53', '2025-03-23 01:42:53'),
(8, 4, 'Alejandro Balde', 'Defender', '2025-03-23 01:42:53', '2025-03-23 01:42:53'),
(9, 4, 'João Cancelo', 'Defender', '2025-03-23 01:42:53', '2025-03-23 01:42:53'),
(10, 4, 'Andreas Christensen', 'Defender', '2025-03-23 01:42:53', '2025-03-23 01:42:53'),
(11, 4, 'Frenkie de Jong', 'Midfielder', '2025-03-23 01:42:53', '2025-03-23 01:42:53'),
(12, 4, 'Ilkay Gündogan', 'Midfielder', '2025-03-23 01:42:53', '2025-03-23 01:42:53'),
(13, 4, 'Gavi', 'Midfielder', '2025-03-23 01:42:53', '2025-03-23 01:42:53'),
(14, 4, 'Pedri', 'Midfielder', '2025-03-23 01:42:53', '2025-03-23 01:42:53'),
(15, 4, 'Robert Lewandowski', 'Forward', '2025-03-23 01:42:53', '2025-03-23 01:42:53'),
(16, 4, 'Raphinha', 'Forward', '2025-03-23 01:42:53', '2025-03-23 01:42:53'),
(17, 4, 'Ferran Torres', 'Forward', '2025-03-23 01:42:53', '2025-03-23 01:42:53'),
(18, 4, 'João Félix', 'Forward', '2025-03-23 01:42:53', '2025-03-23 01:42:53'),
(19, 4, 'Lamine Yamal', 'Forward', '2025-03-23 01:42:53', '2025-03-23 01:42:53'),
(20, 7, 'Manuel Neuer', 'Goalkeeper', '2025-03-23 01:45:27', '2025-03-23 01:45:27'),
(21, 7, 'Sven Ulreich', 'Goalkeeper', '2025-03-23 01:45:27', '2025-03-23 01:45:27'),
(22, 7, 'Dayot Upamecano', 'Defender', '2025-03-23 01:45:27', '2025-03-23 01:45:27'),
(23, 7, 'Matthijs de Ligt', 'Defender', '2025-03-23 01:45:27', '2025-03-23 01:45:27'),
(24, 7, 'Min-jae Kim', 'Defender', '2025-03-23 01:45:27', '2025-03-23 01:45:27'),
(25, 7, 'Noussair Mazraoui', 'Defender', '2025-03-23 01:45:27', '2025-03-23 01:45:27'),
(26, 7, 'Alphonso Davies', 'Defender', '2025-03-23 01:45:27', '2025-03-23 01:45:27'),
(27, 7, 'Joshua Kimmich', 'Midfielder', '2025-03-23 01:45:27', '2025-03-23 01:45:27'),
(28, 7, 'Leon Goretzka', 'Midfielder', '2025-03-23 01:45:27', '2025-03-23 01:45:27'),
(29, 7, 'Jamal Musiala', 'Midfielder', '2025-03-23 01:45:27', '2025-03-23 01:45:27'),
(30, 7, 'Konrad Laimer', 'Midfielder', '2025-03-23 01:45:27', '2025-03-23 01:45:27'),
(31, 7, 'Serge Gnabry', 'Forward', '2025-03-23 01:45:27', '2025-03-23 01:45:27'),
(32, 7, 'Kingsley Coman', 'Forward', '2025-03-23 01:45:27', '2025-03-23 01:45:27'),
(33, 7, 'Leroy Sané', 'Forward', '2025-03-23 01:45:27', '2025-03-23 01:45:27'),
(34, 7, 'Harry Kane', 'Forward', '2025-03-23 01:45:27', '2025-03-23 01:45:27'),
(35, 2, 'Robert Sánchez', 'Goalkeeper', '2025-03-23 01:47:34', '2025-03-23 01:47:34'),
(36, 2, 'Djordje Petrovic', 'Goalkeeper', '2025-03-23 01:47:34', '2025-03-23 01:47:34'),
(37, 2, 'Thiago Silva', 'Defender', '2025-03-23 01:47:34', '2025-03-23 01:47:34'),
(38, 2, 'Axel Disasi', 'Defender', '2025-03-23 01:47:34', '2025-03-23 01:47:34'),
(39, 2, 'Levi Colwill', 'Defender', '2025-03-23 01:47:34', '2025-03-23 01:47:34'),
(40, 2, 'Marc Cucurella', 'Defender', '2025-03-23 01:47:34', '2025-03-23 01:47:34'),
(41, 2, 'Ben Chilwell', 'Defender', '2025-03-23 01:47:34', '2025-03-23 01:47:34'),
(42, 2, 'Enzo Fernández', 'Midfielder', '2025-03-23 01:47:34', '2025-03-23 01:47:34'),
(43, 2, 'Moises Caicedo', 'Midfielder', '2025-03-23 01:47:34', '2025-03-23 01:47:34'),
(44, 2, 'Conor Gallagher', 'Midfielder', '2025-03-23 01:47:34', '2025-03-23 01:47:34'),
(45, 2, 'Cole Palmer', 'Forward', '2025-03-23 01:47:34', '2025-03-23 01:47:34'),
(46, 2, 'Raheem Sterling', 'Forward', '2025-03-23 01:47:34', '2025-03-23 01:47:34'),
(47, 2, 'Mykhailo Mudryk', 'Forward', '2025-03-23 01:47:34', '2025-03-23 01:47:34'),
(48, 2, 'Christopher Nkunku', 'Forward', '2025-03-23 01:47:34', '2025-03-23 01:47:34'),
(49, 2, 'Nicolas Jackson', 'Forward', '2025-03-23 01:47:34', '2025-03-23 01:47:34'),
(50, 10, 'Yann Sommer', 'Goalkeeper', '2025-03-23 01:49:57', '2025-03-23 01:49:57'),
(51, 10, 'Benjamin Pavard', 'Defender', '2025-03-23 01:49:57', '2025-03-23 01:49:57'),
(52, 10, 'Francesco Acerbi', 'Defender', '2025-03-23 01:49:57', '2025-03-23 01:49:57'),
(53, 10, 'Alessandro Bastoni', 'Defender', '2025-03-23 01:49:57', '2025-03-23 01:49:57'),
(54, 10, 'Federico Dimarco', 'Defender', '2025-03-23 01:49:57', '2025-03-23 01:49:57'),
(55, 10, 'Denzel Dumfries', 'Defender', '2025-03-23 01:49:57', '2025-03-23 01:49:57'),
(56, 10, 'Carlos Augusto', 'Defender', '2025-03-23 01:49:57', '2025-03-23 01:49:57'),
(57, 10, 'Hakan Çalhanoğlu', 'Midfielder', '2025-03-23 01:49:57', '2025-03-23 01:49:57'),
(58, 10, 'Nicolo Barella', 'Midfielder', '2025-03-23 01:49:57', '2025-03-23 01:49:57'),
(59, 10, 'Henrikh Mkhitaryan', 'Midfielder', '2025-03-23 01:49:57', '2025-03-23 01:49:57'),
(60, 10, 'Davide Frattesi', 'Midfielder', '2025-03-23 01:49:57', '2025-03-23 01:49:57'),
(61, 10, 'Marcus Thuram', 'Forward', '2025-03-23 01:49:57', '2025-03-23 01:49:57'),
(62, 10, 'Lautaro Martínez', 'Forward', '2025-03-23 01:49:57', '2025-03-23 01:49:57'),
(63, 10, 'Alexis Sánchez', 'Forward', '2025-03-23 01:49:57', '2025-03-23 01:49:57'),
(64, 10, 'Marko Arnautović', 'Forward', '2025-03-23 01:49:57', '2025-03-23 01:49:57'),
(65, 8, 'Wojciech Szczęsny', 'Goalkeeper', '2025-03-23 01:51:42', '2025-03-23 01:51:42'),
(66, 8, 'Mattia Perin', 'Goalkeeper', '2025-03-23 01:51:42', '2025-03-23 01:51:42'),
(67, 8, 'Gleison Bremer', 'Defender', '2025-03-23 01:51:42', '2025-03-23 01:51:42'),
(68, 8, 'Danilo', 'Defender', '2025-03-23 01:51:42', '2025-03-23 01:51:42'),
(69, 8, 'Federico Gatti', 'Defender', '2025-03-23 01:51:42', '2025-03-23 01:51:42'),
(70, 8, 'Alex Sandro', 'Defender', '2025-03-23 01:51:42', '2025-03-23 01:51:42'),
(71, 8, 'Andrea Cambiaso', 'Defender', '2025-03-23 01:51:42', '2025-03-23 01:51:42'),
(72, 8, 'Manuel Locatelli', 'Midfielder', '2025-03-23 01:51:42', '2025-03-23 01:51:42'),
(73, 8, 'Adrien Rabiot', 'Midfielder', '2025-03-23 01:51:42', '2025-03-23 01:51:42'),
(74, 8, 'Weston McKennie', 'Midfielder', '2025-03-23 01:51:42', '2025-03-23 01:51:42'),
(75, 8, 'Fabio Miretti', 'Midfielder', '2025-03-23 01:51:42', '2025-03-23 01:51:42'),
(76, 8, 'Federico Chiesa', 'Forward', '2025-03-23 01:51:42', '2025-03-23 01:51:42'),
(77, 8, 'Dusan Vlahović', 'Forward', '2025-03-23 01:51:42', '2025-03-23 01:51:42'),
(78, 8, 'Arkadiusz Milik', 'Forward', '2025-03-23 01:51:42', '2025-03-23 01:51:42'),
(79, 8, 'Kenan Yıldız', 'Forward', '2025-03-23 01:51:42', '2025-03-23 01:51:42'),
(80, 5, 'Alisson Becker', 'Goalkeeper', '2025-03-23 01:54:50', '2025-03-23 01:54:50'),
(81, 5, 'Trent Alexander-Arnold', 'Defender', '2025-03-23 01:54:50', '2025-03-23 01:54:50'),
(82, 5, 'Virgil van Dijk', 'Defender', '2025-03-23 01:54:50', '2025-03-23 01:54:50'),
(83, 5, 'Ibrahima Konaté', 'Defender', '2025-03-23 01:54:50', '2025-03-23 01:54:50'),
(84, 5, 'Andy Robertson', 'Defender', '2025-03-23 01:54:50', '2025-03-23 01:54:50'),
(85, 5, 'Wataru Endō', 'Midfielder', '2025-03-23 01:54:50', '2025-03-23 01:54:50'),
(86, 5, 'Alexis Mac Allister', 'Midfielder', '2025-03-23 01:54:50', '2025-03-23 01:54:50'),
(87, 5, 'Dominik Szoboszlai', 'Midfielder', '2025-03-23 01:54:50', '2025-03-23 01:54:50'),
(88, 5, 'Luis Díaz', 'Forward', '2025-03-23 01:54:50', '2025-03-23 01:54:50'),
(89, 5, 'Darwin Núñez', 'Forward', '2025-03-23 01:54:50', '2025-03-23 01:54:50'),
(90, 5, 'Mohamed Salah', 'Forward', '2025-03-23 01:54:50', '2025-03-23 01:54:50'),
(91, 5, 'Diogo Jota', 'Forward', '2025-03-23 01:54:50', '2025-03-23 01:54:50'),
(92, 5, 'Curtis Jones', 'Midfielder', '2025-03-23 01:54:50', '2025-03-23 01:54:50'),
(93, 5, 'Cody Gakpo', 'Forward', '2025-03-23 01:54:50', '2025-03-23 01:54:50'),
(94, 5, 'Joe Gomez', 'Defender', '2025-03-23 01:54:50', '2025-03-23 01:54:50'),
(95, 6, 'Ederson', 'Goalkeeper', '2025-03-23 01:54:50', '2025-03-23 01:54:50'),
(96, 6, 'Kyle Walker', 'Defender', '2025-03-23 01:54:50', '2025-03-23 01:54:50'),
(97, 6, 'Rúben Dias', 'Defender', '2025-03-23 01:54:50', '2025-03-23 01:54:50'),
(98, 6, 'John Stones', 'Defender', '2025-03-23 01:54:50', '2025-03-23 01:54:50'),
(99, 6, 'Josko Gvardiol', 'Defender', '2025-03-23 01:54:50', '2025-03-23 01:54:50'),
(100, 6, 'Rodri', 'Midfielder', '2025-03-23 01:54:50', '2025-03-23 01:54:50'),
(101, 6, 'Kevin De Bruyne', 'Midfielder', '2025-03-23 01:54:50', '2025-03-23 01:54:50'),
(102, 6, 'Bernardo Silva', 'Midfielder', '2025-03-23 01:54:50', '2025-03-23 01:54:50'),
(103, 6, 'Phil Foden', 'Forward', '2025-03-23 01:54:50', '2025-03-23 01:54:50'),
(104, 6, 'Erling Haaland', 'Forward', '2025-03-23 01:54:50', '2025-03-23 01:54:50'),
(105, 6, 'Jack Grealish', 'Forward', '2025-03-23 01:54:50', '2025-03-23 01:54:50'),
(106, 6, 'Julián Álvarez', 'Forward', '2025-03-23 01:54:50', '2025-03-23 01:54:50'),
(107, 6, 'Matheus Nunes', 'Midfielder', '2025-03-23 01:54:50', '2025-03-23 01:54:50'),
(108, 6, 'Manuel Akanji', 'Defender', '2025-03-23 01:54:50', '2025-03-23 01:54:50'),
(109, 6, 'Kalvin Phillips', 'Midfielder', '2025-03-23 01:54:50', '2025-03-23 01:54:50'),
(110, 1, 'André Onana', 'Goalkeeper', '2025-03-23 01:54:50', '2025-03-23 01:54:50'),
(111, 1, 'Diogo Dalot', 'Defender', '2025-03-23 01:54:50', '2025-03-23 01:54:50'),
(112, 1, 'Raphaël Varane', 'Defender', '2025-03-23 01:54:50', '2025-03-23 01:54:50'),
(113, 1, 'Lisandro Martínez', 'Defender', '2025-03-23 01:54:50', '2025-03-23 01:54:50'),
(114, 1, 'Luke Shaw', 'Defender', '2025-03-23 01:54:50', '2025-03-23 01:54:50'),
(115, 1, 'Casemiro', 'Midfielder', '2025-03-23 01:54:50', '2025-03-23 01:54:50'),
(116, 1, 'Bruno Fernandes', 'Midfielder', '2025-03-23 01:54:50', '2025-03-23 01:54:50'),
(117, 1, 'Mason Mount', 'Midfielder', '2025-03-23 01:54:50', '2025-03-23 01:54:50'),
(118, 1, 'Marcus Rashford', 'Forward', '2025-03-23 01:54:50', '2025-03-23 01:54:50'),
(119, 1, 'Rasmus Højlund', 'Forward', '2025-03-23 01:54:50', '2025-03-23 01:54:50'),
(120, 1, 'Antony', 'Forward', '2025-03-23 01:54:50', '2025-03-23 01:54:50'),
(121, 1, 'Scott McTominay', 'Midfielder', '2025-03-23 01:54:50', '2025-03-23 01:54:50'),
(122, 1, 'Christian Eriksen', 'Midfielder', '2025-03-23 01:54:50', '2025-03-23 01:54:50'),
(123, 1, 'Aaron Wan-Bissaka', 'Defender', '2025-03-23 01:54:50', '2025-03-23 01:54:50'),
(124, 1, 'Victor Lindelöf', 'Defender', '2025-03-23 01:54:50', '2025-03-23 01:54:50'),
(125, 9, 'Gianluigi Donnarumma', 'Goalkeeper', '2025-03-23 01:54:50', '2025-03-23 01:54:50'),
(126, 9, 'Achraf Hakimi', 'Defender', '2025-03-23 01:54:50', '2025-03-23 01:54:50'),
(127, 9, 'Marquinhos', 'Defender', '2025-03-23 01:54:50', '2025-03-23 01:54:50'),
(128, 9, 'Lucas Hernández', 'Defender', '2025-03-23 01:54:50', '2025-03-23 01:54:50'),
(129, 9, 'Nuno Mendes', 'Defender', '2025-03-23 01:54:50', '2025-03-23 01:54:50'),
(130, 9, 'Manuel Ugarte', 'Midfielder', '2025-03-23 01:54:50', '2025-03-23 01:54:50'),
(131, 9, 'Vitinha', 'Midfielder', '2025-03-23 01:54:50', '2025-03-23 01:54:50'),
(132, 9, 'Fabián Ruiz', 'Midfielder', '2025-03-23 01:54:50', '2025-03-23 01:54:50'),
(133, 9, 'Kylian Mbappé', 'Forward', '2025-03-23 01:54:50', '2025-03-23 01:54:50'),
(134, 9, 'Ousmane Dembélé', 'Forward', '2025-03-23 01:54:50', '2025-03-23 01:54:50'),
(135, 9, 'Marco Asensio', 'Forward', '2025-03-23 01:54:50', '2025-03-23 01:54:50'),
(136, 9, 'Randal Kolo Muani', 'Forward', '2025-03-23 01:54:50', '2025-03-23 01:54:50'),
(137, 9, 'Bradley Barcola', 'Forward', '2025-03-23 01:54:50', '2025-03-23 01:54:50'),
(138, 9, 'Kang-In Lee', 'Midfielder', '2025-03-23 01:54:50', '2025-03-23 01:54:50'),
(139, 9, 'Milan Škriniar', 'Defender', '2025-03-23 01:54:50', '2025-03-23 01:54:50'),
(140, 3, 'Thibaut Courtois', 'Goalkeeper', '2025-03-23 01:54:50', '2025-03-23 01:54:50'),
(141, 3, 'Dani Carvajal', 'Defender', '2025-03-23 01:54:50', '2025-03-23 01:54:50'),
(142, 3, 'Éder Militão', 'Defender', '2025-03-23 01:54:50', '2025-03-23 01:54:50'),
(143, 3, 'David Alaba', 'Defender', '2025-03-23 01:54:50', '2025-03-23 01:54:50'),
(144, 3, 'Ferland Mendy', 'Defender', '2025-03-23 01:54:50', '2025-03-23 01:54:50'),
(145, 3, 'Aurélien Tchouaméni', 'Midfielder', '2025-03-23 01:54:50', '2025-03-23 01:54:50'),
(146, 3, 'Federico Valverde', 'Midfielder', '2025-03-23 01:54:50', '2025-03-23 01:54:50'),
(147, 3, 'Jude Bellingham', 'Midfielder', '2025-03-23 01:54:50', '2025-03-23 01:54:50'),
(148, 3, 'Toni Kroos', 'Midfielder', '2025-03-23 01:54:50', '2025-03-23 01:54:50'),
(149, 3, 'Vinícius Júnior', 'Forward', '2025-03-23 01:54:50', '2025-03-23 01:54:50'),
(150, 3, 'Rodrygo', 'Forward', '2025-03-23 01:54:50', '2025-03-23 01:54:50'),
(151, 3, 'Joselu', 'Forward', '2025-03-23 01:54:50', '2025-03-23 01:54:50'),
(152, 3, 'Eduardo Camavinga', 'Midfielder', '2025-03-23 01:54:50', '2025-03-23 01:54:50'),
(153, 3, 'Antonio Rüdiger', 'Defender', '2025-03-23 01:54:50', '2025-03-23 01:54:50'),
(154, 3, 'Luka Modrić', 'Midfielder', '2025-03-23 01:54:50', '2025-03-23 01:54:50'),
(155, 11, 'Mike Maignan', 'Goalkeeper', '2025-03-23 02:04:23', '2025-03-23 02:04:23'),
(156, 11, 'Davide Calabria', 'Defender', '2025-03-23 02:04:23', '2025-03-23 02:04:23'),
(157, 11, 'Fikayo Tomori', 'Defender', '2025-03-23 02:04:23', '2025-03-23 02:04:23'),
(158, 11, 'Malick Thiaw', 'Defender', '2025-03-23 02:04:23', '2025-03-23 02:04:23'),
(159, 11, 'Theo Hernández', 'Defender', '2025-03-23 02:04:23', '2025-03-23 02:04:23'),
(160, 11, 'Ismaël Bennacer', 'Midfielder', '2025-03-23 02:04:23', '2025-03-23 02:04:23'),
(161, 11, 'Ruben Loftus-Cheek', 'Midfielder', '2025-03-23 02:04:23', '2025-03-23 02:04:23'),
(162, 11, 'Yacine Adli', 'Midfielder', '2025-03-23 02:04:23', '2025-03-23 02:04:23'),
(163, 11, 'Rafael Leão', 'Forward', '2025-03-23 02:04:23', '2025-03-23 02:04:23'),
(164, 11, 'Olivier Giroud', 'Forward', '2025-03-23 02:04:23', '2025-03-23 02:04:23'),
(165, 11, 'Christian Pulisic', 'Forward', '2025-03-23 02:04:23', '2025-03-23 02:04:23'),
(166, 11, 'Noah Okafor', 'Forward', '2025-03-23 02:04:23', '2025-03-23 02:04:23'),
(167, 11, 'Tijjani Reijnders', 'Midfielder', '2025-03-23 02:04:23', '2025-03-23 02:04:23'),
(168, 11, 'Alessandro Florenzi', 'Defender', '2025-03-23 02:04:23', '2025-03-23 02:04:23'),
(169, 11, 'Luka Jović', 'Forward', '2025-03-23 02:04:23', '2025-03-23 02:04:23'),
(170, 12, 'Aaron Ramsdale', 'Goalkeeper', '2025-03-23 02:04:23', '2025-03-23 02:04:23'),
(171, 12, 'Ben White', 'Defender', '2025-03-23 02:04:23', '2025-03-23 02:04:23'),
(172, 12, 'William Saliba', 'Defender', '2025-03-23 02:04:23', '2025-03-23 02:04:23'),
(173, 12, 'Gabriel Magalhães', 'Defender', '2025-03-23 02:04:23', '2025-03-23 02:04:23'),
(174, 12, 'Oleksandr Zinchenko', 'Defender', '2025-03-23 02:04:23', '2025-03-23 02:04:23'),
(175, 12, 'Declan Rice', 'Midfielder', '2025-03-23 02:04:23', '2025-03-23 02:04:23'),
(176, 12, 'Thomas Partey', 'Midfielder', '2025-03-23 02:04:23', '2025-03-23 02:04:23'),
(177, 12, 'Martin Ødegaard', 'Midfielder', '2025-03-23 02:04:23', '2025-03-23 02:04:23'),
(178, 12, 'Bukayo Saka', 'Forward', '2025-03-23 02:04:23', '2025-03-23 02:04:23'),
(179, 12, 'Gabriel Jesus', 'Forward', '2025-03-23 02:04:23', '2025-03-23 02:04:23'),
(180, 12, 'Leandro Trossard', 'Forward', '2025-03-23 02:04:23', '2025-03-23 02:04:23'),
(181, 12, 'Kai Havertz', 'Midfielder', '2025-03-23 02:04:23', '2025-03-23 02:04:23'),
(182, 12, 'Jorginho', 'Midfielder', '2025-03-23 02:04:23', '2025-03-23 02:04:23'),
(183, 12, 'Takehiro Tomiyasu', 'Defender', '2025-03-23 02:04:23', '2025-03-23 02:04:23'),
(184, 12, 'Emile Smith Rowe', 'Midfielder', '2025-03-23 02:04:23', '2025-03-23 02:04:23'),
(185, 13, 'Guglielmo Vicario', 'Goalkeeper', '2025-03-23 02:04:23', '2025-03-23 02:04:23'),
(186, 13, 'Pedro Porro', 'Defender', '2025-03-23 02:04:23', '2025-03-23 02:04:23'),
(187, 13, 'Cristian Romero', 'Defender', '2025-03-23 02:04:23', '2025-03-23 02:04:23'),
(188, 13, 'Micky van de Ven', 'Defender', '2025-03-23 02:04:23', '2025-03-23 02:04:23'),
(189, 13, 'Destiny Udogie', 'Defender', '2025-03-23 02:04:23', '2025-03-23 02:04:23'),
(190, 13, 'Yves Bissouma', 'Midfielder', '2025-03-23 02:04:23', '2025-03-23 02:04:23'),
(191, 13, 'Pape Matar Sarr', 'Midfielder', '2025-03-23 02:04:23', '2025-03-23 02:04:23'),
(192, 13, 'James Maddison', 'Midfielder', '2025-03-23 02:04:23', '2025-03-23 02:04:23'),
(193, 13, 'Dejan Kulusevski', 'Forward', '2025-03-23 02:04:23', '2025-03-23 02:04:23'),
(194, 13, 'Son Heung-min', 'Forward', '2025-03-23 02:04:23', '2025-03-23 02:04:23'),
(195, 13, 'Richarlison', 'Forward', '2025-03-23 02:04:23', '2025-03-23 02:04:23'),
(196, 13, 'Giovani Lo Celso', 'Midfielder', '2025-03-23 02:04:23', '2025-03-23 02:04:23'),
(197, 13, 'Oliver Skipp', 'Midfielder', '2025-03-23 02:04:23', '2025-03-23 02:04:23'),
(198, 13, 'Eric Dier', 'Defender', '2025-03-23 02:04:23', '2025-03-23 02:04:23'),
(199, 13, 'Brennan Johnson', 'Forward', '2025-03-23 02:04:23', '2025-03-23 02:04:23');

-- --------------------------------------------------------

--
-- Table structure for table `player_match_votes`
--

CREATE TABLE `player_match_votes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `match_id` bigint(20) UNSIGNED NOT NULL,
  `player_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `player_match_votes`
--

INSERT INTO `player_match_votes` (`id`, `user_id`, `match_id`, `player_id`, `created_at`, `updated_at`) VALUES
(3, 1, 18, 118, '2025-03-23 02:42:45', '2025-03-23 02:42:45');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `description` text NOT NULL,
  `slug` varchar(191) NOT NULL,
  `image` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `description`, `slug`, `image`, `created_at`, `updated_at`, `category_id`) VALUES
(4, 1, 'From the Irish League to NI - Devlin\'s \'unbelievable\' debut', 'While there was a lot of excitement surrounding Jamie Donley\'s first Northern Ireland cap at Windsor Park on Thursday night, another debutant perhaps flew a little under the radar.\r\n\r\nPortsmouth\'s Terry Devlin came on with and helped a youthful Northern Ireland side see out a 1-1 draw with Euro 2024 quarter-finalists Switzerland.\r\n\r\nThe 21-year-old almost set up Paddy McNair for a winner with his first touch, and that set the tone for a solid display during his 15 minutes on the pitch.\r\n\r\n\"Everyone wants to play for their country when they are a young kid, and to be able to do that was unbelievable,\" Devlin said after his debut at right-back.\r\n\r\n\"It\'s been a tough squad to get into, which is only good for the country. I\'m in the same position as Conor [Bradley] and Trai [Hume] and they are two really good players.\r\n\r\n\"Obviously it\'s going to be tough [to break through] but I just have to keep working hard.\"\r\n\r\nWhile many players look to go over to England or Scotland as quickly as possible, Devlin served his apprenticeship in the Irish Premiership, first coming through the ranks at Dungannon Swifts, where he made his debut as a 15-year-old.\r\n\r\nHe then moved onto to Glentoran, before making the jump to Portsmouth in 2023.\r\n\r\nSomething of a Swiss Army knife of a player with his versatility, Devlin has become a fan favourite at the Championship side, and he is honest enough to say he might not be at Fratton Park if he had rushed his journey into professional football.\r\n\r\n\"Honestly, if I\'d gone over to England when I was younger, maybe 16, I don\'t think I would have made it,\" he admitted.\r\n\r\n\"I\'m glad the way it has all worked out. I think the Irish League made me into the player I am now and I\'m getting joy out of the way I play.\r\n\r\n\"I think the Irish League is underrated and it\'s a really good pathway.\"\r\n\r\nDevlin will be hoping to win his second cap as Northern Ireland travel to Sweden on Tuesday.\r\n\r\nIt will be another tough test for NI, who finished with a side with an average age of 22 against the Swiss.\r\n\r\nThe friendlies are preparation for the start of 2026 World Cup qualifying, where O\'Neill\'s side will face Luxembourg, Slovakia and the winner of the Nations League play-off between Germany and Italy.\r\n\r\n\"Switzerland are a top nation and qualify for most tournaments,\" Devlin added.\r\n\r\n\"For us to go toe-to-toe, and we maybe could have won if we\'d taken a chance or two but getting a good result like that is something we can really build on as we go towards the World Cup qualifiers.\r\n\r\n\"We\'re a really young squad and we\'re not going to be the finished product yet, but if we can keep improving in every international campaign, we will keep getting better.\"', 'wfcvbdns', 'images/TmGcJAg4GOqvGhLvTmIkddxTQOmlZVgPiIa8IvuC.webp', '2025-03-19 16:23:06', '2025-03-23 14:07:16', NULL),
(5, 1, 'No problem with Hojlund mimicking celebration - Ronaldo', 'Cristiano Ronaldo says he has \"no problem\" with Denmark striker Rasmus Hojlund copying his \"siu\" celebration after scoring the winner against Portugal on Thursday.\r\n\r\nManchester United\'s Hojlund said he was not mocking his \"idol\" Ronaldo after the 1-0 victory in the first leg of their Nations League quarter-final.\r\n\r\nFive-time Ballon d\'Or winner Ronaldo said he does not think Hojlund was being disrespectful.\r\n\r\n\"For me, it is not a problem,\" the Portugal captain, 40, said before Sunday\'s second leg in Lisbon.\r\n\r\n\"This is not because he don\'t have respect for me. I\'m smart enough to understand that not only him, but around the world, other sportspeople do it, my celebration.\r\n\r\n\"For me, it\'s an honour. But I hope that tomorrow you can see my celebration, not [that] I still see his celebration.\"\r\n\r\nThe Al-Nassr forward says the \"air is more tense\" around the Portugal team after a poor performance in the first leg and defended coach Roberto Martinez.\r\n\r\n\"I think it\'s unfair to criticise the coach, because we\'re all in the same boat,\" said the former Real Madrid and United player.\r\n\r\n\"We lost the game and played badly, but we have the second leg tomorrow. Calm down. Think positive and think that things will go well.\"', 'trump-wages-trade-war-doge-continues', 'images/rGCpug8KrSzOqP2TFmAW36OSVijmvpJI08DDvwYr.jpg', '2025-03-19 16:42:46', '2025-03-23 14:05:18', NULL),
(6, 2, 'Republic of Ireland midfielder Josh Cullen said that his side are aiming to \"make winning a habit\" before their Nations League promotion/relegation play-off second leg against Bulgaria.', 'Heimir Hallgrimsson\'s side lead 2-1 in the tie after coming from behind to pick up a rare away win in Plovdiv on Thursday.\r\n\r\nBurnley midfielder Cullen believes that another victory in Dublin on Sunday will help the Republic grow in confidence before their World Cup qualifying campaign in September.\r\n\r\n\"If you can make winning a habit it is positive for everyone. It creates a positive environment in the camp if you\'re winning games and it breeds confidence,\" he said.\r\n\r\n\"It was a tough break after the England game [Republic of Ireland were beaten 5-0 at Wembley] and having to wait for a long time to put it right but we did that that the other night.\r\n\r\n\"We\'re looking for another good result tomorrow and pushing forward and keeping the confidence going.\"\r\n\r\nRepublic manager Hallgrimsson echoed Cullen\'s sentiments, believing that his side are showing signs of growth after a difficult start to his tenure.\r\n\r\n\"We\'re improving in certain areas and we are working on others, I smell there is a little change coming,\" he said.\r\n\r\n\"For example, everyone is wanting to play and pushing for their place in the team which is a good sign we have really good competition.\"\r\n\r\n\"I\'ve always been a little bit too emotional, it\'s why I don\'t like to talk to players after games, I like to analyse the game before I speak, it was probably emotion a little bit there,\" he explained.\r\n\r\n\"When I watched the game back on TV, even though we gave them a little bit more of possession, there was never any danger at all that they would create something.\r\n\r\n\"As a coach you always feel uncomfortable going behind in games, but I think the players have shown not only in Bulgaria but in Finland before as well, turning that around, that they are believing more and more in each other and what they are doing.\"', 'he-s-ready-man-united-already-have-a-ready-made-ayden-heaven-replacement-that-ruben-amorim-loves', 'images/qnQqvmQNqkWVJNxq78bcaug76hXMc0311tJjLDs5.webp', '2025-03-19 17:00:55', '2025-03-23 14:09:49', NULL),
(7, 1, 'England: Thomas Tuchel says Marcus Rashford, Phil Foden know what Three Lions coaching staff want from them going forward.', 'Thomas Tuchel says he will not drop players based on performances in the early days of his tenure as England manager, after he highlighted the lack of impact made by Marcus Rashford and Phil Foden in his first game in charge.\r\n\r\nThe pair were replaced by Jarrod Bowen and Anthony Gordon after 74 minutes of Friday\'s 2-0 win over Albania, having both struggled to show their best at Wembley.\r\n\r\n\r\nSpeaking after the Three Lions\' opening World Cup qualifier, Tuchel said: \"I think both of our wingers who started [Foden and Rashford] were not as impactful as they normally can be, or as they normally are in club football.\r\n\r\n\"At the moment, I\'m not too sure why we struggled to bring the ball to them quicker and to bring the ball in more open positions to them. I need to review the match.\"\r\n\r\nIn his press conference ahead of Monday night\'s visit of Latvia to Wembley, the German was asked if he had spoken to Rashford and Foden about what he expects from them going forward.\r\n\r\n\r\nSponsored Links\r\nBone on Bone? This \"Bionic\" Knee Sleeve Will Transform Your Knee!\r\n(Mrjoint)\r\nRead more\r\nNot a typical dating platform\r\n(Charmychronicle.com)\r\nTransform Your Yoga Practice with Beautiful Poses for Women\r\nTransform Your Yoga Practice with Beautiful Poses for Women\r\n(TrustedRespones)\r\nBest of Leinster: This Windbreaker Jacket is Specially Designed for Women on the Go\r\nBest of Leinster: This Windbreaker Jacket is Specially Designed for Women on the Go\r\n(Daily Fashion Magazine)\r\nNeurologist: This Is What Really Causes Numb Feet (And It’s Not Just Diabetes!)\r\nNeurologist: This Is What Really Causes Numb Feet (And It’s Not Just Diabetes!)\r\n(Health-News)\r\nCardiologist Reveal: This Overlooked Habit Triggers Belly Fat!\r\nCardiologist Reveal: This Overlooked Habit Triggers Belly Fat!\r\n(News - Health)\r\nPregnant gorilla won’t give birth, and an ultrasound reveals the unexpected reason\r\nThe vet was puzzled when a pregnant gorilla refused to give birth. What did the ultraso…\r\n(Happy in Shape)\r\nInternet without a subscription? It’s now possible\r\nInternet without a subscription? It’s now possible\r\n(Smart Wifi)\r\nWhat are they doing over 20 years after the final episode of Only Fools and Horses?\r\nWhat are they doing over 20 years after the final episode of Only Fools and Horses?\r\n(Ohmymag)\r\nIf you need to spend time on your computer, this game is a must in 2025!\r\n(Top Strategy Game 2025)\r\n\"I\'ve spoken to both of them, also in front of the group. They know that I appreciate the effort, especially off the ball,\" Tuchel said.\r\n\r\n\r\n\"We can see in the numbers and when we watch the match again how much effort they put into defending high and into the counter-press, also in their sprinting numbers.', 'hello', 'images/3R34o6Pff3mc64NkFA1iTXChfEDaxWZUe92kyDIG.jpg', '2025-03-23 03:19:53', '2025-03-23 14:00:54', NULL),
(8, 2, 'Anthony Gordon out of England squad, Thomas Tuchel prepares for Lativa clash', 'England made a winning start to life under Thomas Tuchel as they beat Albania 2-0 in their first World Cup qualifier at Wembley.\r\n\r\nMeanwhile, Chelsea are waiting to hear back the latest from Cole Palmer\'s scan, while Ryan Gravenberch and Alisson Becker have both withdrawn from the Netherlands and Brazil squads respectively.\r\n\r\nAnthony Gordon has withdrawn from the England squad after sustaining an injury.\r\n\r\nGordon was forced off in the 2-0 win over Albania on Friday.\r\n\r\nStraight after the match, manager Thomas Tuchel admitted it did not look good.\r\n\r\n“He looks injured,\" Tuchel said. \"First of all I thought it\'s his stomach, but it\'s his hip and it does not look good. It\'s a bit worrying, yeah.\"\r\n\r\nNow the forward has returned to Newcastle for further assessment.\r\n\r\nEngland will face Latvia on Monday in their next World Cup qualifier.', 'anthony-gordon-out-of-england-squad-thomas-tuchel-prepares-for-lativa-clash', 'uploads/qJZ1GX9w0kOviIoPLuA69uQVf8aAVPFGoUVlHMbb.jpg', '2025-03-23 14:18:57', '2025-03-23 14:18:57', NULL),
(9, 3, 'Manchester United great Jaap Stam believes Red Devils boss Ruben Amorim may have to start planning ahead without Luke Shaw.', 'The left-back has been crippled by injuries in recent years and has played a total of 98 minutes this season.\r\n\r\nIn fact, his last start for United came in a 2-1 win over Luton Town on February 18 last year.\r\n\r\nWith Shaw unable to remain fit, Stam believes United must contemplate whether it is worth keeping the left-back going forward.\r\n\r\n\"Football clubs need to always look forward,\" Stam told Makthavare.se.\r\n\r\n\"You have to move forward with a team you can trust and players that are going to be available and perform week in and week out.\r\n\r\n\"I like Luke Shaw as a player, he has a lot of ability, but he is injured so often that as a manager you need to make a choice when it comes to recruitment and build a team that are fit the majority of the time and can handle the load that comes with intense football.\r\n\r\n\"I don’t want to be disrespectful to Shaw but the club has to make choices about what is right going forward and that might be to look at a team without him.\"', 'manchester-united-great-jaap-stam-believes-red-devils-boss-ruben-amorim-may-have-to-start-planning-ahead-without-luke-shaw', 'images/HcADU0mggmVWHRumVK2zuuFEPjsuo7IaHxFvATHB.jpg', '2025-03-23 14:24:47', '2025-03-23 14:25:16', NULL),
(10, 3, 'Clarke on Scotland tactics against Greece, Christie, Hirst & Karetsas.', 'Nations League play-off, second leg: Scotland v Greece (agg 1-0)\r\nVenue: Hampden Park, Glasgow Date: Sunday, 23 March Kick-off: 17:00 GMT\r\n\r\nCoverage: Watch on BBC Scotland, BBC Two Scotland & iPlayer; listen on BBC Radio Scotland & Sounds; live text coverage & in-play clips on the BBC Sport website & app\r\n\r\nScotland welcome Greece to Glasgow\'s southside on Sunday knowing a draw or a win will maintain their top-tier status in the Nations League.\r\n\r\nWhile the Scots had to ride their luck at times in Thursday\'s first leg in Piraeus, Scott McTominay\'s penalty was the only goal on the night and leaves Steve Clarke\'s side well placed before Sunday\'s return leg.\r\n\r\nWith two World Cup qualifying matches against Greece to come later this year, it is also an opportunity for Scotland to make a statement of sorts.\r\n\r\nHead coach Clarke sat down for an exclusive chat with BBC Scotland before the second leg at Hampden - here is what he had to say.\r\n\r\nSteve, how is everyone after the exertions of Thursday night?\r\n\r\n\"Yeah, all good. Obviously, it\'s always a big effort for a game away from home. Long travel back, but we had a good recovery session.\r\n\r\n\"Didn\'t do much this morning either, so we\'ll be ready to go.\"\r\n\r\nThe likes of Grant Hanley and Anthony Ralston don\'t get a lot of game time for their clubs. Specifically, how are they? Do they need a little bit of extra care?\r\n\r\n\"No, Grant\'s made of strong stuff, the same as Tony. They\'re fine. They\'ll recover. Obviously, neither are playing regularly at their club, but if you train well and work well, you should always have 90 minutes on your legs.\"\r\n\r\nIt\'s really impressive though for them, isn\'t it? Because you can train, you can be fit, but in terms of being in a match situation, it\'s very different, isn\'t it?\r\n\r\n\"It is, but listen, Tony got a little spell with Celtic where he was in the team quite regularly not too long ago. Grant\'s an experienced player. It\'s not as if he\'s gone into an unknown or something that he\'s not done before. I was pleased with both of them, but I wasn\'t surprised.\"\r\n\r\nThe tie is finely poised - how do you approach it?\r\n\r\n\"We\'re going to try to win the game. I think we want to play well. We want to play as well as we did in the first half. We want to be on the front foot. We want to try to win the game here at Hampden. That\'s the mentality and the mindset that I\'ll try to install in the players and hopefully they take that to the pitch.\"\r\n\r\nI\'m trying to pick your managerial brains in terms of when you\'re preparing for a match, as you are for Greece. When you\'re thinking about approach, does that come first or do you look at the players? Do you look at the shape? How does it all work when you\'re preparing specifically for a game?\r\n\r\n\"You look at the players at your disposal and then you decide the best way to shape up in the game. Obviously, you look at the opposition and how they play.\r\n\r\n\"You identify where they might cause problems and hope to solve them. Then you identify where you can cause them problems and hope that that\'s what happens on the pitch. You have to look at the whole picture. Obviously, it\'s the second game against the same team in a very short space of time. They\'ll know a little bit more about us and we know a little bit more about them.\"\r\n\r\nWhat do you know more about them? What did you learn?\r\n\r\n\"I learned that in the second half, when they were really aggressive in the press, they disrupted our rhythm a little bit. We didn\'t really get into the game, so we have to be braver on the ball. We have to be stronger on the ball and hopefully we see that in the game.\"\r\n\r\nHow do you go about enforcing that kind of element on the game to the players?\r\n\r\n\"Normally, you would do it on a training session. You would do it on the pitch, but with the short turnaround, we don\'t have the time. Everybody\'s on the 72-hour turnaround, but we don\'t even get that. Even after a long flight back from Greece, we don\'t get that. You have to do a little bit more work in the classroom.\"\r\n\r\nThe back four has been working well for you on Thursday night. From what you\'ve seen in Greece, is that the way to go again?\r\n\r\n\"Yes, we can go either way. We finished the game with a back six. If you look at the game, you can identify how we finished the game. We actually finished with a back six. Listen, there are many different ways. I\'ve got to decide the best way for this game at Hampden, which might be different for the game in Greece.\"\r\n\r\nChristie\'s best role & Greece wonderkid Karetsas\r\nWe\'re about to talk to Ryan Christie. Obviously, he\'s a player that\'s been having a brilliant season for his club, where he\'s playing in a deeper role. When clubs change players\' positions a bit, does that give you food for thought as a manager?\r\n\r\n\"It\'s always nice to see them play in different positions. Obviously, Ryan started his career as a winger, if you like. He would disagree with that, but he always played off the wide. For me, by and large, with the national team, he\'s always played off the wide.\r\n\r\n\"We have in certain games played him as one of the number eight to get forward. He\'s playing that role at Bournemouth. He plays the number eight. Everybody says he plays a bit deeper, but if you actually watch him playing for Bournemouth, he\'s very involved in the higher press up the pitch.\r\n\r\n\"He gets after the game, he does everything that Ryan\'s good at. Obviously, if I decide to start with Ryan, he brings a little bit of freshness as well.\"\r\n\r\nWe spoke about your squad and how you\'ve got new players coming in as well. George Hirst made his Scotland debut. What did you make of his debut and what specifically do you like about him?\r\n\r\n\"I think he just brought in a different dimension. In the second half, especially, we were going particularly long. Their two centre-backs seemed to be winning most of the headers. I thought, if I put George on, he actually did win a couple of headers. He did take the ball into the corner for us a couple of times.\r\n\r\n\"He just brings a slightly different dimension to how Che [Adams] plays as a centre-forward, or how Tommy Conway plays as a centre-forward. Maybe a little bit similar to how Lyndon Dykes does it for us. It just gives us more depth in that position.\"\r\n\r\nGreece have also got their young talent, Konstantinos Karetsas. He had a real influence on the game, didn\'t he? Whether he starts or whether he comes on, how do you go about trying to stop him being so influential?\r\n\r\n\"I think when he came to the pitch the other night, the crowd got excited because a young 17-year-old has chosen not to play for Belgium but to go back and play for Greece, which is great for them. His first action in the game was really good. That got the crowd excited.\r\n\r\n\"From there, he sort of built into the game. He controlled them quite well as the game went on. Kieran goes on and sits in front of him. We sort of nullified that threat a little bit. Hopefully, we can do that as well in the game at Hampden.\"\r\n\r\nYou spoke about the fans over there. The fans here at Hampden will have a big part to play, will they?\r\n\r\n\"A crowd\'s a crowd. When you\'re playing at home, you expect the home crowd to be with you. At Hampden, normally, in my time here, the crowd have always been there. They don\'t turn up wanting to see you struggle. They turn up wanting to see you win. Hopefully, we can give them something to shout about.\"\r\n\r\nScotland, obviously, have achieved elite status in the Nations League. Is it more difficult to remain in that place, do you think?\r\n\r\n\"Well, Uefa have made it more difficult because normally third position kept you up.\r\n\r\n\"What it does do now is it gets you a play-off game, which is why we\'re here. To be honest, I\'d rather be playing competitive games in March than having four friendlies before we go into the World Cup qualifier.\r\n\r\n\"So I think it\'s worked out quite well for us.\"\r\n\r\nIs there a feeling, given the developments that Scotland have made, that you actually belong in that top group?\r\n\r\n\"Well, if we stay up then we\'re proving that we belong there. What I would say is, as you develop and you play against top opposition, and I think over the games last autumn, we improved as a team.\r\n\r\n\"Our world ranking dropped. I\'m not sure how that one works, but I felt as though we were improving as a team and then you go down the world rankings. So there\'s a little bit of an anomaly there, but I\'d much rather play against the better teams because that will make your players better.\"', 'clarke-on-scotland-tactics-against-greece-christie-hirst-karetsas', 'uploads/JyuwfIBmY0Yw0FBMHemHB3EvZ5fLbMhkeWRLKJDf.webp', '2025-03-23 14:29:04', '2025-03-23 14:34:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `predictions`
--

CREATE TABLE `predictions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `fixture_id` bigint(20) UNSIGNED NOT NULL,
  `prediction` enum('home_win','draw','away_win') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `predictions`
--

INSERT INTO `predictions` (`id`, `user_id`, `fixture_id`, `prediction`, `created_at`, `updated_at`) VALUES
(2, 1, 13, 'draw', '2025-03-21 10:12:15', '2025-03-23 14:50:10'),
(3, 1, 14, 'home_win', '2025-03-21 10:12:31', '2025-03-21 10:12:31'),
(4, 1, 16, 'home_win', '2025-03-23 02:43:18', '2025-03-23 02:43:18'),
(5, 1, 15, 'home_win', '2025-03-23 16:38:09', '2025-03-23 16:38:09');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `stadium` varchar(191) NOT NULL,
  `coach` varchar(191) NOT NULL,
  `founded` int(11) NOT NULL,
  `logo` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `stadium`, `coach`, `founded`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'Manchester United', 'Old Trafford', 'Erik ten Hag', 1878, 'uploads/manu.png', '2025-03-21 01:47:19', '2025-03-21 01:47:19'),
(2, 'Chelsea', 'Stamford Bridge', 'Mauricio Pochettino', 1905, 'uploads/chelsea.png', '2025-03-21 01:47:19', '2025-03-21 01:47:19'),
(3, 'Real Madrid', 'Santiago Bernabeu', 'Carlo Ancelotti', 1902, 'uploads/realmadrid.png', '2025-03-21 01:47:19', '2025-03-21 01:47:19'),
(4, 'Barcelona', 'Camp Nou', 'Xavi Hernandez', 1899, 'uploads/barcelona.png', '2025-03-21 01:47:19', '2025-03-21 01:47:19'),
(5, 'Liverpool', 'Anfield', 'Jurgen Klopp', 1892, 'uploads/liverpool.png', '2025-03-21 01:47:19', '2025-03-21 01:47:19'),
(6, 'Manchester City', 'Etihad Stadium', 'Pep Guardiola', 1880, 'uploads/mancity.png', '2025-03-21 01:47:19', '2025-03-21 01:47:19'),
(7, 'Bayern Munich', 'Allianz Arena', 'Thomas Tuchel', 1900, 'uploads/bayern.png', '2025-03-21 01:47:19', '2025-03-21 01:47:19'),
(8, 'Juventus', 'Allianz Stadium', 'Massimiliano Allegri', 1897, 'uploads/juventus.png', '2025-03-21 01:47:19', '2025-03-21 01:47:19'),
(9, 'PSG', 'Parc des Princes', 'Luis Enrique', 1970, 'uploads/psg.png', '2025-03-21 01:47:19', '2025-03-21 01:47:19'),
(10, 'Inter Milan', 'San Siro', 'Simone Inzaghi', 1908, 'uploads/inter.png', '2025-03-21 01:47:19', '2025-03-21 01:47:19'),
(11, 'AC Milan', 'San Siro', 'Stefano Pioli', 1899, 'uploads/acmilan.png', '2025-03-23 01:57:18', '2025-03-23 01:57:18'),
(12, 'Arsenal', 'Emirates Stadium', 'Mikel Arteta', 1886, 'uploads/arsenal.png', '2025-03-23 01:57:18', '2025-03-23 01:57:18'),
(13, 'Tottenham', 'Tottenham Hotspur Stadium', 'Ange Postecoglou', 1882, 'uploads/tottenham.png', '2025-03-23 01:57:18', '2025-03-23 01:57:18');

-- --------------------------------------------------------

--
-- Table structure for table `team_user`
--

CREATE TABLE `team_user` (
  `id` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `team_user`
--

INSERT INTO `team_user` (`id`, `user_id`, `team_id`, `created_at`, `updated_at`) VALUES
(2, 1, 1, NULL, NULL),
(3, 1, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `trophies`
--

CREATE TABLE `trophies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `year` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trophies`
--

INSERT INTO `trophies` (`id`, `team_id`, `title`, `year`, `created_at`, `updated_at`) VALUES
(1, 4, 'La Liga', 2023, '2025-03-22 18:27:15', NULL),
(2, 4, 'Champions League', 2015, '2025-03-22 18:27:15', NULL),
(3, 1, 'Premier League', 2023, '2025-03-23 02:48:06', '2025-03-23 02:48:06'),
(4, 2, 'UEFA Champions League', 2021, '2025-03-23 02:48:06', '2025-03-23 02:48:06'),
(5, 3, 'La Liga', 2022, '2025-03-23 02:48:06', '2025-03-23 02:48:06'),
(6, 4, 'Copa del Rey', 2021, '2025-03-23 02:48:06', '2025-03-23 02:48:06'),
(7, 5, 'FA Cup', 2022, '2025-03-23 02:48:06', '2025-03-23 02:48:06'),
(8, 6, 'Carabao Cup', 2023, '2025-03-23 02:48:06', '2025-03-23 02:48:06'),
(9, 7, 'Bundesliga', 2023, '2025-03-23 02:48:06', '2025-03-23 02:48:06'),
(10, 8, 'Coppa Italia', 2022, '2025-03-23 02:48:06', '2025-03-23 02:48:06'),
(11, 9, 'Ligue 1', 2023, '2025-03-23 02:48:06', '2025-03-23 02:48:06'),
(12, 10, 'Supercoppa Italiana', 2022, '2025-03-23 02:48:06', '2025-03-23 02:48:06'),
(13, 11, 'Serie A', 2022, '2025-03-23 02:48:06', '2025-03-23 02:48:06'),
(14, 12, 'Community Shield', 2023, '2025-03-23 02:48:06', '2025-03-23 02:48:06'),
(15, 13, 'Audi Cup', 2021, '2025-03-23 02:48:06', '2025-03-23 02:48:06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `profile_picture` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `is_admin`, `profile_picture`) VALUES
(1, 'Eyob', 'd00270565@student.dkit.ie', NULL, '$2y$10$BD1OxZ7HYNMsSLNVtSipJeo9YZIuqJqvhTupJb.Q8n4MgYGHvx.X.', NULL, '2025-03-19 15:08:40', '2025-03-23 15:23:47', 0, 'profile_pictures/bW66MPnyraTYmGz68UVbquMlXSUXpPv6rnq1HWet.jpg'),
(2, 'Araya', 'admin@example.com', NULL, '$2y$10$CYHjy1B1iU2Isl4WGKnPgu/yoDKpgjW.iVhE29LnoCfJBfjwXIN/i', NULL, '2025-03-19 16:59:09', '2025-03-19 16:59:09', 0, NULL),
(3, 'john', 'jhon@gmail.com', NULL, '$2y$10$mnxt1iP7GdhUNiuWOQAIOuGUu5vMFdSPB7NunJJLp3jitj2iyYgzy', NULL, '2025-03-23 14:23:06', '2025-03-23 15:49:31', 0, 'profile_pictures/lrQnRYo1iroaoBlfsHuMnwgXsYRsX3AJMjM3hihN.jpg');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `fixtures`
--
ALTER TABLE `fixtures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fixture_player`
--
ALTER TABLE `fixture_player`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fixture_player_fixture_id_foreign` (`fixture_id`),
  ADD KEY `fixture_player_player_id_foreign` (`player_id`);

--
-- Indexes for table `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id`),
  ADD KEY `players_team_id_foreign` (`team_id`);

--
-- Indexes for table `player_match_votes`
--
ALTER TABLE `player_match_votes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `player_match_votes_user_id_foreign` (`user_id`),
  ADD KEY `player_match_votes_match_id_foreign` (`match_id`),
  ADD KEY `player_match_votes_player_id_foreign` (`player_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`),
  ADD KEY `posts_user_id_foreign` (`user_id`),
  ADD KEY `posts_category_id_foreign` (`category_id`);

--
-- Indexes for table `predictions`
--
ALTER TABLE `predictions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `predictions_user_id_foreign` (`user_id`),
  ADD KEY `predictions_fixture_id_foreign` (`fixture_id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team_user`
--
ALTER TABLE `team_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `team_id` (`team_id`);

--
-- Indexes for table `trophies`
--
ALTER TABLE `trophies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trophies_team_id_foreign` (`team_id`);

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
-- AUTO_INCREMENT for table `fixtures`
--
ALTER TABLE `fixtures`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `fixture_player`
--
ALTER TABLE `fixture_player`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `matches`
--
ALTER TABLE `matches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200;

--
-- AUTO_INCREMENT for table `player_match_votes`
--
ALTER TABLE `player_match_votes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `predictions`
--
ALTER TABLE `predictions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `team_user`
--
ALTER TABLE `team_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `trophies`
--
ALTER TABLE `trophies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fixture_player`
--
ALTER TABLE `fixture_player`
  ADD CONSTRAINT `fixture_player_fixture_id_foreign` FOREIGN KEY (`fixture_id`) REFERENCES `fixtures` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fixture_player_player_id_foreign` FOREIGN KEY (`player_id`) REFERENCES `players` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `players`
--
ALTER TABLE `players`
  ADD CONSTRAINT `players_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `player_match_votes`
--
ALTER TABLE `player_match_votes`
  ADD CONSTRAINT `player_match_votes_match_id_foreign` FOREIGN KEY (`match_id`) REFERENCES `fixtures` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `player_match_votes_player_id_foreign` FOREIGN KEY (`player_id`) REFERENCES `players` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `player_match_votes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `predictions`
--
ALTER TABLE `predictions`
  ADD CONSTRAINT `predictions_fixture_id_foreign` FOREIGN KEY (`fixture_id`) REFERENCES `fixtures` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `predictions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `team_user`
--
ALTER TABLE `team_user`
  ADD CONSTRAINT `team_user_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `team_user_ibfk_2` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `trophies`
--
ALTER TABLE `trophies`
  ADD CONSTRAINT `trophies_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
