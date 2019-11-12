-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2018 at 11:28 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `project_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_type` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_bound` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_budget_currency` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_budget_amount` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `technical_grant_currency` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `technical_grant_amount` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commodity_grant_currency` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commodity_grant_amount` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `finance_grant_currency` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `finance_grant_amount` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `administrative_cost_currency` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `administrative_cost_amount` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `programme_cost_currency` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `programme_cost_amount` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hardware_percentage` int(11) NOT NULL,
  `software_percentage` int(11) NOT NULL,
  `donor_name` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `donor_address` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `donor_contact_no` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `donor_email` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `donor_established_date` date NOT NULL,
  `ingo_name` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ingo_address` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ingo_contact_no` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ingo_email` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ingo_estd_date` date NOT NULL,
  `ingo_inactive` date NOT NULL,
  `sw_reccomendation` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sw_date` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pre_app_letter_date` date NOT NULL,
  `documents` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `evaluation_report` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sectors_mou` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lgu_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` date NOT NULL,
  `thematic_area` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_date` date NOT NULL,
  `project_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `user_id`, `project_code`, `project_name`, `project_type`, `time_bound`, `total_budget_currency`, `total_budget_amount`, `technical_grant_currency`, `technical_grant_amount`, `commodity_grant_currency`, `commodity_grant_amount`, `finance_grant_currency`, `finance_grant_amount`, `administrative_cost_currency`, `administrative_cost_amount`, `programme_cost_currency`, `programme_cost_amount`, `hardware_percentage`, `software_percentage`, `donor_name`, `donor_address`, `donor_contact_no`, `donor_email`, `donor_established_date`, `ingo_name`, `ingo_address`, `ingo_contact_no`, `ingo_email`, `ingo_estd_date`, `ingo_inactive`, `sw_reccomendation`, `sw_date`, `pre_app_letter_date`, `documents`, `evaluation_report`, `sectors_mou`, `province_id`, `lgu_id`, `district_id`, `start_date`, `thematic_area`, `end_date`, `project_status`, `created_at`, `updated_at`) VALUES
(24, 0, 'NEP501', 'Youth Engage: Multi-stakeholders Collaboration in Reducing Youth Engage in Violence', '', '0', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '', '', '', NULL, NULL, '25,26,31,33,39,50,52,54', '2013-12-02', 'other', '2016-03-30', '', '2018-01-17 14:26:09', '2018-01-17 14:26:09'),
(35, 0, 'NEP719', 'Collaborative Leadership', '', '0', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '', '', '', NULL, NULL, '2,3,4,5', '2018-02-01', '2', '2018-02-08', '', '2018-02-09 04:58:19', '2018-02-09 04:58:19'),
(36, 9, 'asdf', 'asdfsdf', '', '0', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', '', '', '', '0000-00-00', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '', '', '', '3,4,5', '5,6', '1,2,7', '2018-03-14', '2', '2018-03-09', '', '2018-03-24 06:32:53', '2018-03-24 06:43:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `projects_project_code_unique` (`project_code`),
  ADD UNIQUE KEY `projects_project_name_unique` (`project_name`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
