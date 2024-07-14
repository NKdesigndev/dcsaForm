-- phpMyAdmin SQL Dump
-- version 5.2.1deb1ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 18, 2024 at 05:56 PM
-- Server version: 8.0.36-0ubuntu0.23.10.1
-- PHP Version: 8.2.10-2ubuntu1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dcsa`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_qualification`
--

CREATE TABLE `academic_qualification` (
  `id` int NOT NULL,
  `course_id` int NOT NULL,
  `university_id` int NOT NULL,
  `passing_year` varchar(255) NOT NULL,
  `division_cgp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `additional_particulars` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `nominee_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `academic_qualification`
--

INSERT INTO `academic_qualification` (`id`, `course_id`, `university_id`, `passing_year`, `division_cgp`, `additional_particulars`, `type`, `nominee_id`) VALUES
(8, 1, 2, '2020', 'first', 'Deserunt perferendis', 'bachelor', 4),
(9, 2, 2, '2020', 'first', 'Nihil qui minus eum ', 'master', 4),
(10, 1, 1, '2020', 'first', 'Rerum illum et magn', 'mphil', 4),
(13, 1, 1, '2020', 'first', 'Irure labore ut dist', 'bachelor', 7),
(14, 1, 1, '2020', 'first', 'Irure labore ut dist', 'bachelor', 8),
(16, 1, 1, '2020', 'first', 'Irure labore ut dist', 'bachelor', 10),
(17, 1, 1, '2020', 'first', 'Irure labore ut dist', 'bachelor', 11),
(19, 1, 1, '2020', 'first', 'Irure labore ut dist', 'bachelor', 13),
(20, 1, 1, '2020', 'first', 'Irure labore ut dist', 'bachelor', 14),
(21, 1, 1, '2020', 'first', 'Irure labore ut dist', 'bachelor', 15),
(24, 1, 1, '2020', 'first', 'Irure labore ut dist', 'bachelor', 19),
(25, 1, 1, '2020', 'first', 'Irure labore ut dist', 'bachelor', 20),
(26, 1, 1, '2020', 'first', 'Irure labore ut dist', 'bachelor', 21),
(38, 2, 2, '2020', 'second', 'Consequuntur beatae ', 'bachelor', 27),
(39, 2, 1, '2020', 'first', 'Aliquip porro dolore', 'master', 27),
(40, 1, 2, '2020', 'first', 'Accusantium occaecat', 'mphil', 27),
(41, 2, 2, '2020', 'second', 'Consequuntur beatae ', 'bachelor', 28),
(42, 2, 1, '2020', 'first', 'Aliquip porro dolore', 'master', 28),
(43, 1, 2, '2020', 'first', 'Accusantium occaecat', 'mphil', 28);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nominees`
--

CREATE TABLE `nominees` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `age` int DEFAULT NULL,
  `nationality` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `official_address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `residential_address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `field_of_specialization` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phd_thesis_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `joining_date` date DEFAULT NULL,
  `awards_details` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `contributions_to_science` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `contribution_social_imapact` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `technology_sectors` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lectures_delivered` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `foreign_assignments` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `research_summary` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `sci_journals_papers_number` int DEFAULT NULL,
  `citations_number` int DEFAULT NULL,
  `cumulative_impact_factor` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `h_index` int DEFAULT NULL,
  `patients` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `patiens` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `publication_file_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `others` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `confirmation` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `consent` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `place` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nominator_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nominator_designation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nominator_address` text NOT NULL,
  `nominator_email` varchar(255) NOT NULL,
  `annexure_file_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nominees`
--

INSERT INTO `nominees` (`id`, `name`, `dob`, `age`, `nationality`, `gender`, `official_address`, `residential_address`, `field_of_specialization`, `phd_thesis_title`, `joining_date`, `awards_details`, `contributions_to_science`, `contribution_social_imapact`, `technology_sectors`, `lectures_delivered`, `foreign_assignments`, `research_summary`, `sci_journals_papers_number`, `citations_number`, `cumulative_impact_factor`, `h_index`, `patients`, `patiens`, `publication_file_url`, `others`, `confirmation`, `consent`, `date`, `place`, `nominator_name`, `nominator_designation`, `nominator_address`, `nominator_email`, `annexure_file_url`) VALUES
(4, 'Jolene Brewer', '1999-02-17', 44, 'indian', 'female', 'Doloremque mollitia ', 'Quis reprehenderit v', 'Commodo rerum autem ', 'Facere in illum seq', '1992-01-06', 'Consectetur quae min', 'Facilis sit maxime eu repudiandae laboris minus dolor et non deserunt voluptatem quod est accusamus corporis ut', 'Qui ab soluta eaque ', 'A ad duis vel aspern', 'Laudantium illo deb', 'Anim aut unde amet ', 'Consequatur dolore c', 168, 83, 'Unde aut facilis ess', 54, '157', NULL, '661bb71bafc94_1713092379.jpeg', 'Voluptas sit omnis r', 'incorrect', 'Impedit ut rerum ut', '2010-11-14', 'Ex nobis commodo non', 'Hilda Ayala', 'Vel laboriosam quae', 'In cumque sit dolor', 'raxevynep@mailinator.com', NULL),
(7, 'Riley Flowers', '2019-03-20', 71, 'british', 'male', 'Incididunt velit rat', 'Officia est blandit', 'In eiusmod expedita ', 'Nulla optio quaerat', '1988-10-21', 'Id dignissimos non ', 'Accusamus atque quas laborum Perferendis culpa eum veniam', 'Qui quidem ad optio', 'Dolore in duis minus', 'Amet velit natus vo', 'Sed pariatur Quis q', 'Fugit nemo sed dolo', 647, 257, 'Ducimus est aspern', 42, '845', NULL, '661bb99d476ce_1713093021.jpeg', 'Harum et Nam ducimus', 'incorrect', 'Nulla qui voluptatem', '2019-11-12', 'Unde dignissimos vol', 'Kato Smith', 'Aspernatur perspicia', 'Quis iure perferendi', 'jodoco@mailinator.com', NULL),
(8, 'Riley Flowers', '2019-03-20', 71, 'british', 'male', 'Incididunt velit rat', 'Officia est blandit', 'In eiusmod expedita ', 'Nulla optio quaerat', '1988-10-21', 'Id dignissimos non ', 'Accusamus atque quas laborum Perferendis culpa eum veniam', 'Qui quidem ad optio', 'Dolore in duis minus', 'Amet velit natus vo', 'Sed pariatur Quis q', 'Fugit nemo sed dolo', 647, 257, 'Ducimus est aspern', 42, '845', NULL, '661bb9d746704_1713093079.jpeg', 'Harum et Nam ducimus', 'incorrect', 'Nulla qui voluptatem', '2019-11-12', 'Unde dignissimos vol', 'Kato Smith', 'Aspernatur perspicia', 'Quis iure perferendi', 'jodoco@mailinator.com', NULL),
(10, 'Riley Flowers', '2019-03-20', 71, 'british', 'male', 'Incididunt velit rat', 'Officia est blandit', 'In eiusmod expedita ', 'Nulla optio quaerat', '1988-10-21', 'Id dignissimos non ', 'Accusamus atque quas laborum Perferendis culpa eum veniam', 'Qui quidem ad optio', 'Dolore in duis minus', 'Amet velit natus vo', 'Sed pariatur Quis q', 'Fugit nemo sed dolo', 647, 257, 'Ducimus est aspern', 42, '845', NULL, '661bb9e47beff_1713093092.jpeg', 'Harum et Nam ducimus', 'incorrect', 'Nulla qui voluptatem', '2019-11-12', 'Unde dignissimos vol', 'Kato Smith', 'Aspernatur perspicia', 'Quis iure perferendi', 'jodoco@mailinator.com', NULL),
(11, 'Riley Flowers', '2019-03-20', 71, 'british', 'male', 'Incididunt velit rat', 'Officia est blandit', 'In eiusmod expedita ', 'Nulla optio quaerat', '1988-10-21', 'Id dignissimos non ', 'Accusamus atque quas laborum Perferendis culpa eum veniam', 'Qui quidem ad optio', 'Dolore in duis minus', 'Amet velit natus vo', 'Sed pariatur Quis q', 'Fugit nemo sed dolo', 647, 257, 'Ducimus est aspern', 42, '845', NULL, '661bb9e8cd738_1713093096.jpeg', 'Harum et Nam ducimus', 'incorrect', 'Nulla qui voluptatem', '2019-11-12', 'Unde dignissimos vol', 'Kato Smith', 'Aspernatur perspicia', 'Quis iure perferendi', 'jodoco@mailinator.com', NULL),
(13, 'Riley Flowers', '2019-03-20', 71, 'british', 'male', 'Incididunt velit rat', 'Officia est blandit', 'In eiusmod expedita ', 'Nulla optio quaerat', '1988-10-21', 'Id dignissimos non ', 'Accusamus atque quas laborum Perferendis culpa eum veniam', 'Qui quidem ad optio', 'Dolore in duis minus', 'Amet velit natus vo', 'Sed pariatur Quis q', 'Fugit nemo sed dolo', 647, 257, 'Ducimus est aspern', 42, '845', NULL, '661bba3b77ac2_1713093179.jpeg', 'Harum et Nam ducimus', 'incorrect', 'Nulla qui voluptatem', '2019-11-12', 'Unde dignissimos vol', 'Kato Smith', 'Aspernatur perspicia', 'Quis iure perferendi', 'jodoco@mailinator.com', NULL),
(14, 'Riley Flowers', '2019-03-20', 71, 'british', 'male', 'Incididunt velit rat', 'Officia est blandit', 'In eiusmod expedita ', 'Nulla optio quaerat', '1988-10-21', 'Id dignissimos non ', 'Accusamus atque quas laborum Perferendis culpa eum veniam', 'Qui quidem ad optio', 'Dolore in duis minus', 'Amet velit natus vo', 'Sed pariatur Quis q', 'Fugit nemo sed dolo', 647, 257, 'Ducimus est aspern', 42, '845', NULL, '661bba4ae9037_1713093194.jpeg', 'Harum et Nam ducimus', 'incorrect', 'Nulla qui voluptatem', '2019-11-12', 'Unde dignissimos vol', 'Kato Smith', 'Aspernatur perspicia', 'Quis iure perferendi', 'jodoco@mailinator.com', NULL),
(15, 'Riley Flowers', '2019-03-20', 71, 'british', 'male', 'Incididunt velit rat', 'Officia est blandit', 'In eiusmod expedita ', 'Nulla optio quaerat', '1988-10-21', 'Id dignissimos non ', 'Accusamus atque quas laborum Perferendis culpa eum veniam', 'Qui quidem ad optio', 'Dolore in duis minus', 'Amet velit natus vo', 'Sed pariatur Quis q', 'Fugit nemo sed dolo', 647, 257, 'Ducimus est aspern', 42, '845', NULL, '661bba536767c_1713093203.jpeg', 'Harum et Nam ducimus', 'incorrect', 'Nulla qui voluptatem', '2019-11-12', 'Unde dignissimos vol', 'Kato Smith', 'Aspernatur perspicia', 'Quis iure perferendi', 'jodoco@mailinator.com', NULL),
(19, 'Riley Flowers', '2019-03-20', 71, 'british', 'male', 'Incididunt velit rat', 'Officia est blandit', 'In eiusmod expedita ', 'Nulla optio quaerat', '1988-10-21', 'Id dignissimos non ', 'Accusamus atque quas laborum Perferendis culpa eum veniam', 'Qui quidem ad optio', 'Dolore in duis minus', 'Amet velit natus vo', 'Sed pariatur Quis q', 'Fugit nemo sed dolo', 647, 257, 'Ducimus est aspern', 42, '845', NULL, '661bba618c929_1713093217.jpeg', 'Harum et Nam ducimus', 'incorrect', 'Nulla qui voluptatem', '2019-11-12', 'Unde dignissimos vol', 'Kato Smith', 'Aspernatur perspicia', 'Quis iure perferendi', 'jodoco@mailinator.com', NULL),
(20, 'Riley Flowers', '2019-03-20', 71, 'british', 'male', 'Incididunt velit rat', 'Officia est blandit', 'In eiusmod expedita ', 'Nulla optio quaerat', '1988-10-21', 'Id dignissimos non ', 'Accusamus atque quas laborum Perferendis culpa eum veniam', 'Qui quidem ad optio', 'Dolore in duis minus', 'Amet velit natus vo', 'Sed pariatur Quis q', 'Fugit nemo sed dolo', 647, 257, 'Ducimus est aspern', 42, '845', NULL, '661bba655f77b_1713093221.jpeg', 'Harum et Nam ducimus', 'incorrect', 'Nulla qui voluptatem', '2019-11-12', 'Unde dignissimos vol', 'Kato Smith', 'Aspernatur perspicia', 'Quis iure perferendi', 'jodoco@mailinator.com', NULL),
(21, 'Riley Flowers', '2019-03-20', 71, 'british', 'male', 'Incididunt velit rat', 'Officia est blandit', 'In eiusmod expedita ', 'Nulla optio quaerat', '1988-10-21', 'Id dignissimos non ', 'Accusamus atque quas laborum Perferendis culpa eum veniam', 'Qui quidem ad optio', 'Dolore in duis minus', 'Amet velit natus vo', 'Sed pariatur Quis q', 'Fugit nemo sed dolo', 647, 257, 'Ducimus est aspern', 42, '845', NULL, '661bba8569126_1713093253.jpeg', 'Harum et Nam ducimus', 'incorrect', 'Nulla qui voluptatem', '2019-11-12', 'Unde dignissimos vol', 'Kato Smith', 'Aspernatur perspicia', 'Quis iure perferendi', 'jodoco@mailinator.com', NULL),
(27, 'Brianna Wise', '2002-08-19', 62, 'british', 'female', 'Voluptates nisi opti', 'Omnis id aliqua At ', 'Aut dignissimos offi', 'Excepteur praesentiu', '1981-09-11', 'Reprehenderit accusa', 'Et numquam ex consectetur quasi sed earum dolores ut id et quia adipisci sed necessitatibus odio', 'Sed iure dolorem ips', 'Aliquid officiis adi', 'Non occaecat laborum', 'Minim eos tempora an', 'Officia quidem ex do', 50, 842, 'Mollit labore repreh', 18, '777', NULL, '661bbbfbbd4cc_1713093627.jpeg', 'Enim exercitationem ', 'incorrect', 'Sint et omnis corru', '2023-07-01', 'Sit adipisicing simi', 'Carter Whitfield', 'Eligendi excepturi d', 'Minima magni sed ali', 'lovosor@mailinator.com', NULL),
(28, 'Brianna Wise', '2002-08-19', 62, 'british', 'female', 'Voluptates nisi opti', 'Omnis id aliqua At ', 'Aut dignissimos offi', 'Excepteur praesentiu', '1981-09-11', 'Reprehenderit accusa', 'Et numquam ex consectetur quasi sed earum dolores ut id et quia adipisci sed necessitatibus odio', 'Sed iure dolorem ips', 'Aliquid officiis adi', 'Non occaecat laborum', 'Minim eos tempora an', 'Officia quidem ex do', 50, 842, 'Mollit labore repreh', 18, '777', NULL, '661bbc469b9c2_1713093702.jpeg', 'Enim exercitationem ', 'incorrect', 'Sint et omnis corru', '2023-07-01', 'Sit adipisicing simi', 'Carter Whitfield', 'Eligendi excepturi d', 'Minima magni sed ali', 'lovosor@mailinator.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `research_supervision_details`
--

CREATE TABLE `research_supervision_details` (
  `id` int NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `thesis_title` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `current_status` varchar(255) NOT NULL,
  `nominee_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `research_supervision_details`
--

INSERT INTO `research_supervision_details` (`id`, `student_name`, `thesis_title`, `year`, `current_status`, `nominee_id`) VALUES
(3, 'Forrest Medina', 'Non aut quos sit rei', '1993', 'In Progress', 4),
(4, 'Christopher Aguilar', 'Quo explicabo Volup', '2017', 'In Progress', 7),
(5, 'Christopher Aguilar', 'Quo explicabo Volup', '2017', 'In Progress', 8),
(6, 'Christopher Aguilar', 'Quo explicabo Volup', '2017', 'In Progress', 10),
(7, 'Christopher Aguilar', 'Quo explicabo Volup', '2017', 'In Progress', 11),
(8, 'Christopher Aguilar', 'Quo explicabo Volup', '2017', 'In Progress', 13),
(9, 'Christopher Aguilar', 'Quo explicabo Volup', '2017', 'In Progress', 14),
(10, 'Christopher Aguilar', 'Quo explicabo Volup', '2017', 'In Progress', 15),
(12, 'Christopher Aguilar', 'Quo explicabo Volup', '2017', 'In Progress', 19),
(13, 'Christopher Aguilar', 'Quo explicabo Volup', '2017', 'In Progress', 20),
(14, 'Christopher Aguilar', 'Quo explicabo Volup', '2017', 'In Progress', 21),
(20, 'Cassady Bowen', 'Amet ut eligendi pr', '2017', 'Completed', 27),
(21, 'Cassady Bowen', 'Amet ut eligendi pr', '2017', 'Completed', 28);

-- --------------------------------------------------------

--
-- Table structure for table `scientist_details`
--

CREATE TABLE `scientist_details` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `specialization` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `research_supervision_detail_id` int NOT NULL,
  `nominee_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `scientist_details`
--

INSERT INTO `scientist_details` (`id`, `name`, `address`, `specialization`, `email`, `research_supervision_detail_id`, `nominee_id`) VALUES
(7, 'Owen Barr', 'Consectetur est sed', 'Ipsum quam magnam e', 'tizocosy@mailinator.com', 3, 4),
(8, 'Adrian Rush', 'Cumque est iure aliq', 'Quia sunt illum at', 'bipiseguq@mailinator.com', 3, 4),
(9, 'Finn Hooper', 'Omnis quisquam iste ', 'Et eu ex ut quae com', 'lazipoqyw@mailinator.com', 3, 4),
(10, 'Callum Mccullough', 'Cum praesentium vel ', 'In id est fuga Ape', 'byhuv@mailinator.com', 4, 7),
(11, 'Maya Landry', 'Autem ex sit debitis', 'Soluta ut in cupidit', 'rukisivyme@mailinator.com', 4, 7),
(12, 'Isaac Sawyer', 'Vero perspiciatis e', 'Non aut ex pariatur', 'tyqaxyj@mailinator.com', 4, 7),
(13, 'Callum Mccullough', 'Cum praesentium vel ', 'In id est fuga Ape', 'byhuv@mailinator.com', 5, 8),
(14, 'Maya Landry', 'Autem ex sit debitis', 'Soluta ut in cupidit', 'rukisivyme@mailinator.com', 5, 8),
(15, 'Isaac Sawyer', 'Vero perspiciatis e', 'Non aut ex pariatur', 'tyqaxyj@mailinator.com', 5, 8),
(16, 'Callum Mccullough', 'Cum praesentium vel ', 'In id est fuga Ape', 'byhuv@mailinator.com', 6, 10),
(17, 'Maya Landry', 'Autem ex sit debitis', 'Soluta ut in cupidit', 'rukisivyme@mailinator.com', 6, 10),
(18, 'Isaac Sawyer', 'Vero perspiciatis e', 'Non aut ex pariatur', 'tyqaxyj@mailinator.com', 6, 10),
(19, 'Callum Mccullough', 'Cum praesentium vel ', 'In id est fuga Ape', 'byhuv@mailinator.com', 7, 11),
(20, 'Maya Landry', 'Autem ex sit debitis', 'Soluta ut in cupidit', 'rukisivyme@mailinator.com', 7, 11),
(21, 'Isaac Sawyer', 'Vero perspiciatis e', 'Non aut ex pariatur', 'tyqaxyj@mailinator.com', 7, 11),
(22, 'Callum Mccullough', 'Cum praesentium vel ', 'In id est fuga Ape', 'byhuv@mailinator.com', 8, 13),
(23, 'Maya Landry', 'Autem ex sit debitis', 'Soluta ut in cupidit', 'rukisivyme@mailinator.com', 8, 13),
(24, 'Isaac Sawyer', 'Vero perspiciatis e', 'Non aut ex pariatur', 'tyqaxyj@mailinator.com', 8, 13),
(25, 'Callum Mccullough', 'Cum praesentium vel ', 'In id est fuga Ape', 'byhuv@mailinator.com', 9, 14),
(26, 'Maya Landry', 'Autem ex sit debitis', 'Soluta ut in cupidit', 'rukisivyme@mailinator.com', 9, 14),
(27, 'Isaac Sawyer', 'Vero perspiciatis e', 'Non aut ex pariatur', 'tyqaxyj@mailinator.com', 9, 14),
(28, 'Callum Mccullough', 'Cum praesentium vel ', 'In id est fuga Ape', 'byhuv@mailinator.com', 10, 15),
(29, 'Maya Landry', 'Autem ex sit debitis', 'Soluta ut in cupidit', 'rukisivyme@mailinator.com', 10, 15),
(30, 'Isaac Sawyer', 'Vero perspiciatis e', 'Non aut ex pariatur', 'tyqaxyj@mailinator.com', 10, 15),
(34, 'Callum Mccullough', 'Cum praesentium vel ', 'In id est fuga Ape', 'byhuv@mailinator.com', 12, 19),
(35, 'Maya Landry', 'Autem ex sit debitis', 'Soluta ut in cupidit', 'rukisivyme@mailinator.com', 12, 19),
(36, 'Isaac Sawyer', 'Vero perspiciatis e', 'Non aut ex pariatur', 'tyqaxyj@mailinator.com', 12, 19),
(37, 'Callum Mccullough', 'Cum praesentium vel ', 'In id est fuga Ape', 'byhuv@mailinator.com', 13, 20),
(38, 'Maya Landry', 'Autem ex sit debitis', 'Soluta ut in cupidit', 'rukisivyme@mailinator.com', 13, 20),
(39, 'Isaac Sawyer', 'Vero perspiciatis e', 'Non aut ex pariatur', 'tyqaxyj@mailinator.com', 13, 20),
(40, 'Callum Mccullough', 'Cum praesentium vel ', 'In id est fuga Ape', 'byhuv@mailinator.com', 14, 21),
(41, 'Maya Landry', 'Autem ex sit debitis', 'Soluta ut in cupidit', 'rukisivyme@mailinator.com', 14, 21),
(42, 'Isaac Sawyer', 'Vero perspiciatis e', 'Non aut ex pariatur', 'tyqaxyj@mailinator.com', 14, 21),
(58, 'Gisela Pacheco', 'A porro maiores quis', 'Ut laborum Impedit', 'kydanur@mailinator.com', 20, 27),
(59, 'Lesley England', 'Tenetur earum commod', 'Ut quis doloribus di', 'bycitelo@mailinator.com', 20, 27),
(60, 'Alea Chandler', 'Sint ad pariatur N', 'Saepe deserunt ut un', 'vipuk@mailinator.com', 20, 27),
(61, 'Gisela Pacheco', 'A porro maiores quis', 'Ut laborum Impedit', 'kydanur@mailinator.com', 21, 28),
(62, 'Lesley England', 'Tenetur earum commod', 'Ut quis doloribus di', 'bycitelo@mailinator.com', 21, 28),
(63, 'Alea Chandler', 'Sint ad pariatur N', 'Saepe deserunt ut un', 'vipuk@mailinator.com', 21, 28);

-- --------------------------------------------------------

--
-- Table structure for table `universities`
--

CREATE TABLE `universities` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(255) DEFAULT NULL,
  `form_submited` bigint NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password_hash`, `form_submited`) VALUES
(9, 'naveen', 'naveen@gmail.com', '$2y$10$hDri7jLkE6C1rO2HxvCF1uOnMAcNu9l5jRRrg0LcDpBL052R.EBwK', 0),
(12, 'nk', 'nk@gmail.com', '$2y$10$PzeFnHTiOlb7SowmFlZ8zOFDyP4ZviMZ6TKVnLS3CupB5wyar56WS', 0),
(13, 'test 1', 'test@gmail.com', '$2y$10$j1NIlJ7zhmeYFAdVKGRQfeRUkHJEvfH/XBn4zxYA/H1VyD3BDaV/a', 0),
(16, 'test 2', 'test2@gmail.com', '$2y$10$Fah5IKbugXMruOEJ3N//jO.xCg8WhIoBVYhnK6xuEtMxMvYNBWJ1C', 0),
(17, 'test 3', 'test3@gmail.com', '$2y$10$fmN/spmtiBD6wGbhtrIUIuQeLshqR07en/MNHrbkZxqvtnEyF1XNu', 0),
(19, 'test 4', 'test4@gmail.com', '$2y$10$cDcgBZpDvhwbCL6Ho7l72.X.GhJwQfq.v.EjClwSp09N.teiD77Ae', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic_qualification`
--
ALTER TABLE `academic_qualification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nominees`
--
ALTER TABLE `nominees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `research_supervision_details`
--
ALTER TABLE `research_supervision_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scientist_details`
--
ALTER TABLE `scientist_details`
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
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academic_qualification`
--
ALTER TABLE `academic_qualification`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nominees`
--
ALTER TABLE `nominees`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `research_supervision_details`
--
ALTER TABLE `research_supervision_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `scientist_details`
--
ALTER TABLE `scientist_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `universities`
--
ALTER TABLE `universities`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
