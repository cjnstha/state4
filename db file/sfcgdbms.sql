-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2017 at 01:20 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sfcgdbms`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Capacity development', '2017-07-25 01:34:40', '2017-07-25 01:34:40'),
(2, 'Planning', '2017-07-25 01:35:48', '2017-07-25 01:35:48'),
(4, 'Meeting/workshop', '2017-07-25 01:35:58', '2017-07-25 01:35:58'),
(5, 'Research/study', '2017-07-25 01:36:17', '2017-07-25 01:36:17'),
(6, 'Dialogue/consultation', '2017-07-25 01:36:27', '2017-07-25 01:36:27'),
(7, 'Awareness', '2017-07-25 01:36:38', '2017-07-25 01:36:38'),
(8, 'Seed-grant', '2017-07-25 01:36:49', '2017-07-25 01:36:49'),
(9, 'Trust Building', '2017-07-25 01:37:02', '2017-07-25 01:37:02'),
(10, 'Outreach', '2017-07-25 01:37:13', '2017-07-25 01:37:13'),
(11, 'Media', '2017-07-25 01:37:24', '2017-07-25 01:37:24'),
(12, 'Mediation', '2017-07-25 01:37:37', '2017-07-25 01:37:37'),
(13, 'Staff orientation', '2017-07-25 01:37:48', '2017-07-25 01:37:48'),
(14, 'Legal aid', '2017-07-25 01:37:58', '2017-07-25 01:37:58');

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(11) NOT NULL,
  `qid` int(11) NOT NULL,
  `answer` varchar(250) CHARACTER SET ucs2 COLLATE ucs2_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `qid`, `answer`, `created_at`, `updated_at`) VALUES
(65, 7, 'खासै केहि थाहा छैन', '2017-08-09 02:25:10', '2017-08-09 02:25:10'),
(66, 7, 'केहि कुरा सुनेको छु तर राम्रो ज्ञान छैन', '2017-08-09 02:25:10', '2017-08-09 02:25:10'),
(67, 7, 'अलि अलि छ', '2017-08-09 02:25:10', '2017-08-09 02:25:10'),
(68, 7, 'राम्रै ज्ञान छ', '2017-08-09 02:25:10', '2017-08-09 02:25:10'),
(69, 7, 'यस विषयमा अरुलाई सहजीकरण गर्न सक्ने सीप छ', '2017-08-09 02:25:10', '2017-08-09 02:25:10'),
(70, 8, 'थाहा छैन/भन्न सक्दिन', '2017-08-09 02:34:57', '2017-08-09 02:34:57'),
(71, 8, 'द्वन्द्वमा संलग्न पक्षहरुका मान्यतालाई बुझेर', '2017-08-09 02:34:57', '2017-08-09 02:34:57'),
(72, 8, 'संलग्न पक्षहरुका अडानलाई बुझेर', '2017-08-09 02:34:58', '2017-08-09 02:34:58'),
(73, 8, 'संलग्न पक्षहरुका ईच्छा स्वार्थ अनि द्वन्द्वसंग सम्बन्धित तथ्यहरुलाई बुझेर', '2017-08-09 02:34:58', '2017-08-09 02:34:58'),
(74, 8, 'संलग्न पक्षहरुका पृष्ठभूमिलाई बुझेर', '2017-08-09 02:34:58', '2017-08-09 02:34:58');

-- --------------------------------------------------------

--
-- Table structure for table `benef`
--

CREATE TABLE `benef` (
  `id` int(11) NOT NULL,
  `district_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `age` varchar(255) DEFAULT NULL,
  `caste` varchar(255) DEFAULT NULL,
  `organization` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `identity` varchar(255) DEFAULT NULL,
  `designation` varchar(255) NOT NULL,
  `benef_type` varchar(50) NOT NULL,
  `c_number` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `vdc` varchar(100) NOT NULL,
  `venue` varchar(100) NOT NULL,
  `imp_org` varchar(100) NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `donor_code` varchar(255) DEFAULT NULL,
  `act_type` varchar(100) NOT NULL,
  `ward_no` varchar(150) NOT NULL,
  `age_below_15` int(11) NOT NULL,
  `age_15_29` int(11) NOT NULL,
  `age_30_45` int(11) NOT NULL,
  `age_45_above` int(11) NOT NULL,
  `gender_male` int(11) NOT NULL,
  `gender_female` int(11) NOT NULL,
  `gender_others` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `benef`
--

INSERT INTO `benef` (`id`, `district_id`, `name`, `age`, `caste`, `organization`, `gender`, `identity`, `designation`, `benef_type`, `c_number`, `email`, `vdc`, `venue`, `imp_org`, `date_from`, `date_to`, `donor_code`, `act_type`, `ward_no`, `age_below_15`, `age_15_29`, `age_30_45`, `age_45_above`, `gender_male`, `gender_female`, `gender_others`, `created_at`, `updated_at`) VALUES
(10, 4, 'John', '', '', 'organization', '', '', 'designation', 'Group', 'c_number', 'example@example.com', 'vdc', 'venue', 'imp_org', '0000-00-00', '0000-00-00', '4', '14', '', 0, 0, 0, 0, 0, 0, 0, '2017-11-03 10:57:17', '2017-11-03 05:12:17'),
(11, 2, 'Yojan', 'Below 15', '3', 'organization', 'Male', '1', 'designation', 'Individual', 'c_number', 'example@example.com', 'vdc', 'venue', 'imp_org', '0000-00-00', '0000-00-00', '12', '2', '', 0, 0, 0, 0, 0, 0, 0, '2017-11-01 07:21:13', '2017-09-12 05:05:47'),
(12, 5, 'Samyak', 'Below 15', '3', 'organization', 'Female', '2', 'designation', 'Individual', 'c_number', 'example@example.com', 'vdc', 'venue', 'imp_org', '0000-00-00', '0000-00-00', '7', '14', '', 0, 0, 0, 0, 0, 0, 0, '2017-11-02 08:47:58', '2017-11-02 03:02:58'),
(18, 3, 'sfsdfsdf', '', '', 'sdfsdf', '', '', 'sdfsdf', 'Group', 'sdfsf', 'sdfsdf', 'sfdsdf', 'sdfsf', 'sfsdf', '0000-00-00', '0000-00-00', '12', '14', 'sdfsdf', 2, 0, 0, 3, 4, 0, 5, '2017-11-02 09:12:01', '2017-11-02 03:27:01'),
(22, 2, 'addsad', '15-29', '2', 'asdasd', 'Female', '2', 'asdasd', 'Individual', '123123', 'asdasd', 'asdsad', 'adadsasd', 'sadsad', '2017-10-11', '2017-10-10', '4', '14', '12', 0, 0, 0, 0, 0, 0, 0, '2017-11-02 08:46:02', '2017-11-02 03:01:02'),
(24, 1, 'asdasd', '15-29', '2', 'asdasd', 'Male', '2', 'asdasd', 'Individual', '124123123123', 'asdasdasd', 'asdasd', 'asdasd', 'asdasdasd', '2017-10-12', '2017-10-05', '3', '14', '3', 0, 0, 0, 0, 0, 0, 0, '2017-11-02 08:46:26', '2017-11-02 03:01:26'),
(27, 2, 'dfdfdsf', '15-29', '3', 'sdfsdf', 'Female', '1', 'sdfsdf', 'Individual', 'sdfsf', 'dsfsdf', 'sdfsdf', 'sdfsdf', 'sdfsdfsdf', '2017-10-19', '2017-10-19', '4', '14', 'sdfsdf', 0, 0, 0, 0, 0, 0, 0, '2017-11-02 08:37:17', '2017-11-02 02:52:17'),
(28, 3, 'aaaaa', '', '', 'hbfcdx', '', '', 'fd', 'Group', 'bvc', 'fds', 'gvfds', 'vcds', 'bvc', '2017-12-01', '2017-11-17', '4', '14', 'gvfd', 1, 2, 3, 4, 2, 3, 4, '2017-11-03 09:21:13', '2017-11-01 23:50:23'),
(30, 2, 'asdasdasd', '15-29', '2', 'asdasd', 'Male', '1', 'asdasd', 'Individual', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 'adasd', '2017-11-11', '2017-11-09', '3', '1', 'asdasd', 0, 0, 0, 0, 0, 0, 0, '2017-11-01 02:33:29', '2017-11-01 02:33:29'),
(31, 2, 'sdfsdf', 'Below 15', '2', 'sdfsdf', 'Male', '2', 'sdfsd', 'Individual', 'sdfsdf', 'fsdfs', 'fsdfsd', 'fsdfsd', 'sdfsdf', '2017-11-22', '2017-11-14', '3', '10', 'sdfsdf', 0, 0, 0, 0, 0, 0, 0, '2017-11-01 02:46:49', '2017-11-01 02:46:49'),
(32, 2, 'hgfddasd', '', '', 'asdasd', '', '', 'sadas', 'Group', 'asdad', 'dasdas', 'dsad', 'asdasd', 'asdasd', '2017-11-10', '2017-10-30', '3', '14', 'asdsasd', 0, 0, 0, 0, 0, 0, 0, '2017-11-02 08:40:16', '2017-11-02 02:55:16'),
(33, 1, 'asdasd', 'Below 15', '3', 'asdasd', 'Male', '2', 'asdasd', 'Individual', 'asdasd', 'asdasdas', 'dada', 'dasdasd', 'asdasd', '2017-11-16', '2017-11-21', '5', '4', 'asdasdsad', 0, 0, 0, 0, 0, 0, 0, '2017-11-01 03:37:59', '2017-11-01 03:37:59'),
(34, 1, 'zxczxc', '', '', 'asdasd', '', '', 'asdad', 'Group', 'asdad', 'asdasd', 'asdasda', 'asdasd', 'adadad', '2017-12-01', '2017-11-28', '4', '2', 'adad', 12, 12, 12, 12, 12, 12, 12, '2017-11-07 03:23:03', '2017-11-07 03:23:03'),
(35, 1, 'zxczxc', '', '', 'asdasd', '', '', 'asdad', 'Group', 'asdad', 'asdasd', 'asdasda', 'asdasd', 'adadad', '2017-12-01', '2017-11-28', '4', '2', 'adad', 12, 12, 12, 12, 12, 12, 12, '2017-11-07 03:26:37', '2017-11-07 03:26:37'),
(36, 1, 'zxczxc', '', '', 'asdasd', '', '', 'asdasdd', 'Group', 'adasd', 'adad', 'asdasda', 'asdad', 'asdasd', '2017-11-23', '2017-11-22', '4', '14', 'zX', 13, 3, 23, 23, 123, 23, 123, '2017-11-07 09:14:15', '2017-11-07 03:29:15'),
(37, 13, 'sdfsdf', 'Below 15', '4', 'sdfsdf', 'Female', '2', 'sfsf', 'Individual', 'sf', 'sfsf', 'sfdsf', 'sdfdsf', 'sfsf', '2017-11-22', '2017-10-12', '17', '8', 'sdfsfsf', 0, 0, 0, 0, 0, 0, 0, '2017-11-13 01:43:32', '2017-11-13 01:43:32'),
(38, 7, 'asdasd', '15-29', '5', 'asd', NULL, '1', 'asd', 'Individual', 'ad', 'ads', 'asdasd', 'ad', 'asd', '2017-11-22', '2017-11-07', '15', '8', 'ad', 0, 0, 0, 0, 0, 0, 0, '2017-11-13 02:02:16', '2017-11-13 02:02:16'),
(39, 4, 'ads', '15-29', '3', 'asd', 'Male', '2', 'asd', 'Individual', 'asds', 'asd', 'ad', 'asd', 'sdfsdf', '2017-11-08', '2017-11-07', '15', '10', 'asd', 0, 0, 0, 0, 0, 0, 0, '2017-11-13 02:03:12', '2017-11-13 02:03:12'),
(40, 4, 'ads', '15-29', '3', 'asd', 'Male', '2', 'asd', 'Individual', 'asds', 'asd', 'ad', 'asd', 'sdfsdf', '2017-11-08', '2017-11-07', '15', '10', 'asd', 0, 0, 0, 0, 0, 0, 0, '2017-11-13 02:04:44', '2017-11-13 02:04:44'),
(41, 4, 'ads', '15-29', '3', 'asd', 'Male', '2', 'asd', 'Individual', 'asds', 'asd', 'ad', 'asd', 'sdfsdf', '2017-11-08', '2017-11-07', '15', '10', 'asd', 0, 0, 0, 0, 0, 0, 0, '2017-11-13 02:05:22', '2017-11-13 02:05:22'),
(42, 11, 'adadasdasd', '15-29', '5', 'asds', 'Female', '1', 'asd', 'Individual', 'asd', 'asd', 'asd', 'asd', 'adad', '2017-11-08', '2017-11-07', '16', '9', 'af', 0, 0, 0, 0, 0, 0, 0, '2017-11-13 02:06:01', '2017-11-13 02:06:01'),
(43, 5, 'asdasd', '15-29', '3', 'sdf', 'Male', '2', 'asdasd', 'Individual', 'asdad', 'asdf', 'asdasda', 'asd', 'asdad', '2017-11-08', '2017-11-14', '6', '6', 'asd', 0, 0, 0, 0, 0, 0, 0, '2017-11-13 02:13:15', '2017-11-13 02:13:15'),
(44, 5, 'asdasd', '15-29', '3', 'sdf', 'Male', '2', 'asdasd', 'Individual', 'asdad', 'asdf', 'asdasda', 'asd', 'asdad', '2017-11-08', '2017-11-14', '6', '6', 'asd', 0, 0, 0, 0, 0, 0, 0, '2017-11-13 02:13:42', '2017-11-13 02:13:42'),
(45, 1, 'name', '', '', 'organization', '', '', 'designation', 'Group', 'c_number', 'example@example.com', 'vdc', 'venue', 'imp_org', '0000-00-00', '0000-00-00', '3', '1', 'ward_no', 0, 0, 0, 0, 0, 0, 0, '2017-11-13 02:38:09', '2017-11-13 02:38:09'),
(46, 4, 'sdfsf', '30-45', '2', 'sfsdfdsf', 'Male', '1', 'sdfsfsfsf', 'Individual', 'sdfsf', 'sfsf', 'sfd', 'assdasdad', 'adsadad', '2017-11-22', '2017-11-22', '5', '4', 'asdadasd', 0, 0, 0, 0, 0, 0, 0, '2017-11-14 00:44:26', '2017-11-14 00:44:26'),
(47, 12, 'sdfs', 'Below 15', '2', 'sfsdf', 'Male', '2', 'sf', 'Individual', 'sfd', 'sfsfsf', 'sdf', 'sdf', 'sf', '2017-11-10', '2017-11-06', '4', '5', 'sf', 0, 0, 0, 0, 0, 0, 0, '2017-11-14 01:07:22', '2017-11-14 01:07:22'),
(48, 13, 'zcxv', '30-45', '4', 'adad', 'Female', '1', 'asdad', 'Individual', 'asdadad', 'dadadad', 'asdaad', 'asdad', 'adad', '2017-11-23', '2017-11-08', '3', '4', 'adsa', 0, 0, 0, 0, 0, 0, 0, '2017-11-14 01:18:38', '2017-11-14 01:18:38'),
(49, 1, 'name', '', '', 'organization', '', '', 'designation', 'Group', 'c_number', 'example@example.com', 'vdc', 'venue', 'imp_org', '0000-00-00', '0000-00-00', '3', '1', 'ward_no', 0, 0, 0, 0, 0, 0, 0, '2017-11-14 01:23:50', '2017-11-14 01:23:50'),
(50, 1, 'name', 'Below 15', '2', 'organization', 'Male', '1', 'designation', 'Individual', 'c_number', 'example@example.com', 'vdc', 'venue', 'imp_org', '0000-00-00', '0000-00-00', '3', '1', 'ward_no', 0, 0, 0, 0, 0, 0, 0, '2017-11-14 01:24:00', '2017-11-14 01:24:00'),
(52, 1, 'name', 'Below 15', '2', 'organization', 'Male', '1', 'designation', 'Individual', 'c_number', 'example@example.com', 'vdc', 'venue', 'imp_org', '0000-00-00', '0000-00-00', '3', '1', 'ward_no', 0, 0, 0, 0, 0, 0, 0, '2017-11-14 01:25:50', '2017-11-14 01:25:50'),
(53, 1, 'name', 'Below 15', '2', 'organization', 'Male', '1', 'designation', 'Individual', 'c_number', 'example@example.com', 'vdc', 'venue', 'imp_org', '0000-00-00', '0000-00-00', '3', '1', 'ward_no', 0, 0, 0, 0, 0, 0, 0, '2017-11-14 01:27:30', '2017-11-14 01:27:30'),
(54, 1, 'name', 'Below 15', '2', 'organization', 'Male', '1', 'designation', 'Individual', 'c_number', 'example@example.com', 'vdc', 'venue', 'imp_org', '0000-00-00', '0000-00-00', '3', '1', 'ward_no', 0, 0, 0, 0, 0, 0, 0, '2017-11-14 01:28:23', '2017-11-14 01:28:23'),
(55, 1, 'name', 'Below 15', '2', 'organization', 'Male', '1', 'designation', 'Individual', 'c_number', 'example@example.com', 'vdc', 'venue', 'imp_org', '0000-00-00', '0000-00-00', '3', '1', 'ward_no', 0, 0, 0, 0, 0, 0, 0, '2017-11-14 01:28:57', '2017-11-14 01:28:57'),
(56, 1, 'name', 'Below 15', '2', 'organization', 'Male', '1', 'designation', 'Individual', 'c_number', 'example@example.com', 'vdc', 'venue', 'imp_org', '0000-00-00', '0000-00-00', '3', '1', 'ward_no', 0, 0, 0, 0, 0, 0, 0, '2017-11-14 01:33:34', '2017-11-14 01:33:34'),
(57, 1, 'name', 'Below 15', '2', 'organization', 'Male', '1', 'designation', 'Individual', 'c_number', 'example@example.com', 'vdc', 'venue', 'imp_org', '2017-10-31', '2017-11-07', '3', '1', 'ward_no', 0, 0, 0, 0, 0, 0, 0, '2017-11-14 01:34:59', '2017-11-14 01:34:59'),
(58, 1, 'name', 'Below 15', '2', 'organization', 'Male', '1', 'designation', 'Individual', 'c_number', 'example@example.com', 'vdc', 'venue', 'imp_org', '2017-11-09', '2017-11-12', '3', '1', 'ward_no', 0, 0, 0, 0, 0, 0, 0, '2017-11-14 01:35:24', '2017-11-14 01:35:24'),
(59, 1, 'name', 'Below 15', '2', 'organization', 'Male', '1', 'designation', 'Individual', 'c_number', 'example@example.com', 'vdc', 'venue', 'imp_org', '2017-11-09', '2017-11-12', '3', '1', 'ward_no', 0, 0, 0, 0, 0, 0, 0, '2017-11-14 01:38:13', '2017-11-14 01:38:13'),
(60, 1, 'aaaaaaaaaa', 'Below 15', '2', 'organization', 'Male', '1', 'designation', 'Individual', 'c_number', 'example@example.com', 'vdc', 'venue', 'imp_org', '0000-00-00', '0000-00-00', '3', '1', 'ward_no', 0, 0, 0, 0, 0, 0, 0, '2017-11-14 01:38:53', '2017-11-14 01:38:53'),
(61, 1, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'Below 15', '2', 'organization', 'Male', '1', 'designation', 'Individual', 'c_number', 'example@example.com', 'vdc', 'venue', 'imp_org', '0000-00-00', '0000-00-00', '3', '1', 'ward_no', 0, 0, 0, 0, 0, 0, 0, '2017-11-14 01:41:08', '2017-11-14 01:41:08'),
(62, 1, 'sdfsdfsdfsdfsf', 'Below 15', '2', 'organization', 'Male', '1', 'designation', 'Individual', 'c_number', 'example@example.com', 'vdc', 'venue', 'imp_org', '0000-00-00', '0000-00-00', '3', '1', 'ward_no', 0, 0, 0, 0, 0, 0, 0, '2017-11-14 01:41:29', '2017-11-14 01:41:29'),
(63, 1, 'sssssssssssssss', 'Below 15', '2', 'organization', 'Male', '1', 'designation', 'Individual', 'c_number', 'example@example.com', 'vdc', 'venue', 'imp_org', '0000-00-00', '0000-00-00', '3', '1', 'ward_no', 0, 0, 0, 0, 0, 0, 0, '2017-11-14 01:43:08', '2017-11-14 01:43:08'),
(64, 1, 'vvvvvvvvvvvvv', 'Below 15', '2', 'organization', 'Male', '1', 'designation', 'Individual', 'c_number', 'example@example.com', 'vdc', 'venue', 'imp_org', '0000-00-00', '0000-00-00', '3', '1', 'ward_no', 0, 0, 0, 0, 0, 0, 0, '2017-11-14 01:43:25', '2017-11-14 01:43:25'),
(65, 1, 'name', 'Below 15', '2', 'organization', 'Male', '1', 'designation', 'Individual', 'c_number', 'example@example.com', 'vdc', 'venue', 'imp_org', '0000-00-00', '0000-00-00', '3', '2', 'ward_no', 0, 0, 0, 0, 0, 0, 0, '2017-11-14 01:46:22', '2017-11-14 01:46:22'),
(66, 1, 'namezxcvbnm', 'Below 15', '2', 'organization', 'Male', '1', 'designation', 'Individual', 'c_number', 'example@example.com', 'vdc', 'venue', 'imp_org', '0000-00-00', '0000-00-00', '3', '1', 'ward_no', 0, 0, 0, 0, 0, 0, 0, '2017-11-14 01:46:41', '2017-11-14 01:46:41'),
(67, 1, 'name', 'Below 15', '2', 'organization', 'Male', '1', 'designation', 'Individual', 'c_number', 'example@example.com', 'vdc', 'venue', 'imp_org', '0000-00-00', '0000-00-00', '3', '1', 'ward_no', 0, 0, 0, 0, 0, 0, 0, '2017-11-14 01:47:47', '2017-11-14 01:47:47'),
(68, 1, 'cvbnm', 'Below 15', '2', 'organization', 'Male', '1', 'designation', 'Individual', 'c_number', 'example@example.com', 'vdc', 'venue', 'imp_org', '0000-00-00', '0000-00-00', '3', '1', 'ward_no', 0, 0, 0, 0, 0, 0, 0, '2017-11-14 01:50:42', '2017-11-14 01:50:42'),
(69, 1, 'name', 'Below 15', '2', 'organization', 'Male', '1', 'designation', 'Individual', 'c_number', 'example@example.com', 'vdc', 'venue', 'imp_org', '0000-00-00', '0000-00-00', '3', '1', 'ward_no', 0, 0, 0, 0, 0, 0, 0, '2017-11-14 01:51:04', '2017-11-14 01:51:04'),
(70, 3, 'Test', NULL, '3', 'Test', 'Male', NULL, 'Test', 'Individual', '1234567889', 'Test@gmail.com', 'Test', 'Test', 'Test', '2017-11-07', '2017-10-31', '3', '2', '22', 0, 0, 0, 0, 0, 0, 0, '2017-11-14 02:12:09', '2017-11-14 02:12:09'),
(71, 1, 'name', 'Below 15', '2', 'organization', 'Male', '1', 'designation', 'Individual', 'c_number', 'example@example.com', 'vdc', 'venue', 'imp_org', '0000-00-00', '0000-00-00', '3', '1', 'ward_no', 0, 0, 0, 0, 0, 0, 0, '2017-11-14 02:40:34', '2017-11-14 02:40:34'),
(72, 1, 'sdfgh', 'Below 15', '2', 'organization', 'Male', '1', 'designation', 'Individual', 'c_number', 'example@example.com', 'vdc', 'venue', 'imp_org', '0000-00-00', '0000-00-00', '3', '1', 'ward_no', 0, 0, 0, 0, 0, 0, 0, '2017-11-14 02:40:54', '2017-11-14 02:40:54'),
(73, 1, 'gfds', 'Below 15', '2', 'organization', 'Male', '1', 'designation', 'Individual', 'c_number', 'example@example.com', 'vdc', 'venue', 'imp_org', '0000-00-00', '0000-00-00', '3', '1', 'ward_no', 0, 0, 0, 0, 0, 0, 0, '2017-11-14 02:44:28', '2017-11-14 02:44:28'),
(74, 1, 'name', 'Below 15', '2', 'organization', 'Male', '1', 'designation', 'Individual', 'c_number', 'example@example.com', 'vdc', 'venue', 'imp_org', '0000-00-00', '0000-00-00', '3', '1', 'ward_no', 0, 0, 0, 0, 0, 0, 0, '2017-11-14 02:44:38', '2017-11-14 02:44:38'),
(75, 1, 'alsdkasdad', 'Below 15', '2', 'organization', 'Male', '1', 'designation', 'Individual', 'c_number', 'example@example.com', 'vdc', 'venue', 'imp_org', '0000-00-00', '0000-00-00', '3', '1', 'ward_no', 0, 0, 0, 0, 0, 0, 0, '2017-11-14 02:48:04', '2017-11-14 02:48:04'),
(76, 1, 'namesssssssss', 'Below 15', '2', 'organization', 'Male', '1', 'designation', 'Individual', 'c_number', 'example@example.com', 'vdc', 'venue', 'imp_org', '0000-00-00', '0000-00-00', '3', '1', 'ward_no', 0, 0, 0, 0, 0, 0, 0, '2017-11-14 02:48:16', '2017-11-14 02:48:16'),
(77, 4, 'test', NULL, '4', 'fsad', 'Male', NULL, 'dsf', 'Individual', 'dfsa', 'test@gmail.com', 'fsd', 'asd', 'fasd', '2017-10-31', '2017-11-07', '6', '2', '1', 0, 0, 0, 0, 0, 0, 0, '2017-11-14 02:50:24', '2017-11-14 02:50:24'),
(78, 1, 'name', 'Below 15', '2', 'organization', 'Male', '1', 'designation', 'Individual', 'c_number', 'example@example.com', 'vdc', 'venue', 'imp_org', '0000-00-00', '0000-00-00', '3', '1', 'ward_no', 0, 0, 0, 0, 0, 0, 0, '2017-11-14 02:55:23', '2017-11-14 02:55:23'),
(79, 1, 'name1', 'Below 15', '2', 'organization', 'Male', '1', 'designation', 'Individual', 'c_number', 'example@example.com', 'vdc', 'venue', 'imp_org', '0000-00-00', '0000-00-00', '3', '1', 'ward_no', 0, 0, 0, 0, 0, 0, 0, '2017-11-14 02:55:41', '2017-11-14 02:55:41'),
(80, 1, 'name', 'Below 15', '2', 'organization', 'Male', '1', 'designation', 'Individual', 'c_number', 'example@example.com', 'vdc', 'venue', 'imp_org', '0000-00-00', '0000-00-00', '3', '1', 'ward_no', 0, 0, 0, 0, 0, 0, 0, '2017-11-14 02:57:16', '2017-11-14 02:57:16'),
(81, 1, 'name', 'Below 15', '2', 'organization', 'Male', '1', 'designation', 'Individual', 'c_number', 'example@example.com', 'vdc', 'venue', 'imp_org', '0000-00-00', '0000-00-00', '3', '1', 'ward_no', 0, 0, 0, 0, 0, 0, 0, '2017-11-14 02:57:26', '2017-11-14 02:57:26'),
(82, 1, 'name', 'Below 15', '2', 'organization', 'Male', '1', 'designation', 'Individual', 'c_number', 'example@example.com', 'vdc', 'venue', 'imp_org', '0000-00-00', '0000-00-00', '3', '1', 'ward_no', 0, 0, 0, 0, 0, 0, 0, '2017-11-14 02:57:46', '2017-11-14 02:57:46'),
(83, 1, 'name', 'Below 15', '2', 'organization', 'Male', '1', 'designation', 'Individual', 'c_number', 'example@example.com', 'vdc', 'venue', 'imp_org', '0000-00-00', '0000-00-00', '3', '1', 'ward_no', 0, 0, 0, 0, 0, 0, 0, '2017-11-14 04:05:28', '2017-11-14 04:05:28'),
(84, 1, 'name', 'Below 15', '2', 'organization', 'Male', '1', 'designation', 'Individual', 'c_number', 'example@example.com', 'vdc', 'venue', 'imp_org', '0000-00-00', '0000-00-00', '3', '1', 'ward_no', 0, 0, 0, 0, 0, 0, 0, '2017-11-14 04:07:08', '2017-11-14 04:07:08'),
(85, 1, 'abcd', 'Below 15', '2', 'organization', 'Male', '1', 'designation', 'Individual', 'c_number', 'example@example.com', 'vdc', 'venue', 'imp_org', '0000-00-00', '0000-00-00', '3', '1', 'ward_no', 0, 0, 0, 0, 0, 0, 0, '2017-11-14 04:07:28', '2017-11-14 04:07:28'),
(86, 12, 'asas', '15-29', '4', 'asas', 'Female', '1', 'sasas', 'Individual', 'asas', 'asas', 'asas', 'asas', 'sasas', '2017-11-01', '2017-10-30', '4', '4', 'asa', 0, 0, 0, 0, 0, 0, 0, '2017-11-14 04:21:17', '2017-11-14 04:21:17'),
(87, 1, 'name', 'Below 15', '2', 'organization', 'Male', '1', 'designation', 'Individual', 'c_number', 'example@example.com', 'vdc', 'venue', 'imp_org', '0000-00-00', '0000-00-00', '3', '1', 'ward_no', 0, 0, 0, 0, 0, 0, 0, '2017-11-14 04:26:16', '2017-11-14 04:26:16'),
(88, 1, 'name', 'Below 15', '2', 'organization', 'Male', '1', 'designation', 'Individual', 'c_number', 'example@example.com', 'vdc', 'venue', 'imp_org', '0000-00-00', '0000-00-00', '3', '1', 'ward_no', 0, 0, 0, 0, 0, 0, 0, '2017-11-14 05:16:18', '2017-11-14 05:16:18'),
(89, 13, 'sdfsdf', 'Below 15', '5', 'sdfsf', 'Male', '1', 'fsddfsdf', 'Individual', 'sfdsfs', 'sddfsd', 'fsfsd', 'fsddfsdf', 'fsfsfsdf', '2017-11-08', '2017-11-15', '6', '5', 'sdsf', 0, 0, 0, 0, 0, 0, 0, '2017-11-14 06:22:43', '2017-11-14 06:22:43'),
(90, 13, 'sdfsf', '15-29', '2', 'sfsf', 'Male', '2', 'sdfdsf', 'Individual', 'sfsd', 'fdsf', 'fsdfdsfsd', 'fsdfsf', 'sdfsd', '2017-11-01', '2017-11-08', '6', '6', 'sfsfsf', 0, 0, 0, 0, 0, 0, 0, '2017-11-14 06:25:12', '2017-11-14 06:25:12'),
(91, 1, 'name', 'Below 15', '2', 'organization', 'Male', '1', 'designation', 'Individual', 'c_number', 'example@example.com', 'vdc', 'venue', 'imp_org', '0000-00-00', '0000-00-00', '3', '1', 'ward_no', 0, 0, 0, 0, 0, 0, 0, '2017-11-14 06:25:51', '2017-11-14 06:25:51'),
(92, 2, 'aaaaaaa', 'Below 15', '3', 'sdfsdf', 'Female', '2', 'sfsd', 'Individual', 'fsdf', 'sdfsd', 'fsdf', 'fsdf', 'sfsdf', '2017-12-06', '2017-12-28', '3', '2', 'sdfs', 0, 0, 0, 0, 0, 0, 0, '2017-12-11 23:36:50', '2017-12-11 23:36:50'),
(93, 1, 'sdfsdf', 'Below 15', '2', 'sdfcs', 'Male', '1', 'acasd', 'Individual', 'asdas', 'dasdas', 'das', 'dasd', 'asdas', '2017-12-15', '2017-12-04', '4', '2', 'da', 0, 0, 0, 0, 0, 0, 0, '2017-12-13 01:04:15', '2017-12-13 01:04:15'),
(94, 3, 'sdfsdfsdfsdf', 'Below 15', '3', 'dsfsd', 'Male', '1', 'fsdfsd', 'Individual', 'fsdfsd', 'fsfs', 'dfsf', 'fdsddf', 'sdfsd', '2017-12-05', '2017-12-12', '4', '1', 'sdfsdfsdf', 0, 0, 0, 0, 0, 0, 0, '2017-12-13 01:08:03', '2017-12-13 01:08:03'),
(95, 3, 'sdfsdf', '15-29', '3', 'sdfsdf', 'Female', '2', 'sdfsdf', 'Individual', 'sdfsdf', 'sfdsdf', 'sdfsdf', 'fsdfsdf', 'sdfsdfsdf', '2017-12-05', '2017-12-17', '4', '2', 'sdfsfsd', 0, 0, 0, 0, 0, 0, 0, '2017-12-13 01:09:02', '2017-12-13 01:09:02'),
(96, 3, 'sfsdf', '15-29', '3', 'sdfsdff', 'Female', '2', 'sfds', 'Individual', 'dfsdfs', 'fsdf', 'sdfs', 'sdfsf', 'sddfsdfsdf', '2017-12-16', '2017-12-22', '6', '5', 'dfsdf', 0, 0, 0, 0, 0, 0, 0, '2017-12-13 01:10:23', '2017-12-13 01:10:23'),
(97, 3, 'aaaaaaaaa', '15-29', '2', 'asdasd', 'Female', '2', 'asdas', 'Individual', 'dasdas', 'dasd', 'dasda', 'asd', 'asdasdasd', '2017-12-27', '2017-12-12', '4', '2', 'sdasd', 0, 0, 0, 0, 0, 0, 0, '2017-12-13 01:19:06', '2017-12-13 01:19:06'),
(98, 2, 'lakshya', 'Below 15', '2', 'sdfsdf', 'Female', '1', 'sfssdf', 'Individual', 'sdfsdf', 'sfdsdfsf', 'sdfsdf', 'fsdsd', 'fsdf', '2017-12-08', '2017-12-14', '4', '2', 'sfsd', 0, 0, 0, 0, 0, 0, 0, '2017-12-13 01:21:57', '2017-12-13 01:21:57');

-- --------------------------------------------------------

--
-- Table structure for table `benef_caste_eth_if_group`
--

CREATE TABLE `benef_caste_eth_if_group` (
  `benef_id` int(11) NOT NULL,
  `caste_eth_id` int(11) NOT NULL,
  `cast_eth_value` int(25) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `benef_caste_eth_if_group`
--

INSERT INTO `benef_caste_eth_if_group` (`benef_id`, `caste_eth_id`, `cast_eth_value`, `created_at`, `updated_at`) VALUES
(10, 2, 2, '2017-11-02 03:42:21', '2017-11-03 05:12:18'),
(10, 7, 4, '2017-11-02 03:42:21', '2017-11-03 05:12:18'),
(10, 3, 6, '2017-11-02 03:43:06', '2017-11-03 05:12:18'),
(10, 6, 2, '2017-11-02 03:43:06', '2017-11-03 05:12:18'),
(35, 2, 12, '2017-11-07 03:26:38', '2017-11-07 03:26:38'),
(35, 4, 12, '2017-11-07 03:26:38', '2017-11-07 03:26:38'),
(35, 5, 12, '2017-11-07 03:26:38', '2017-11-07 03:26:38'),
(36, 4, 12, '2017-11-07 03:28:48', '2017-11-07 03:29:16'),
(36, 5, 1, '2017-11-07 03:28:48', '2017-11-07 03:29:16'),
(36, 6, 2, '2017-11-07 03:28:48', '2017-11-07 03:29:16'),
(36, 7, 2, '2017-11-07 03:28:48', '2017-11-07 03:29:16'),
(36, 8, 2, '2017-11-07 03:28:48', '2017-11-07 03:29:16'),
(45, 2, 0, '2017-11-13 02:38:10', '2017-11-13 02:38:10'),
(45, 3, 0, '2017-11-13 02:38:10', '2017-11-13 02:38:10'),
(45, 4, 0, '2017-11-13 02:38:10', '2017-11-13 02:38:10'),
(45, 5, 0, '2017-11-13 02:38:10', '2017-11-13 02:38:10'),
(45, 6, 0, '2017-11-13 02:38:10', '2017-11-13 02:38:10'),
(45, 7, 0, '2017-11-13 02:38:10', '2017-11-13 02:38:10'),
(45, 8, 0, '2017-11-13 02:38:10', '2017-11-13 02:38:10'),
(49, 2, 0, '2017-11-14 01:23:50', '2017-11-14 01:23:50'),
(49, 3, 0, '2017-11-14 01:23:50', '2017-11-14 01:23:50'),
(49, 4, 0, '2017-11-14 01:23:50', '2017-11-14 01:23:50'),
(49, 5, 0, '2017-11-14 01:23:50', '2017-11-14 01:23:50'),
(49, 6, 0, '2017-11-14 01:23:51', '2017-11-14 01:23:51'),
(49, 7, 0, '2017-11-14 01:23:51', '2017-11-14 01:23:51'),
(49, 8, 0, '2017-11-14 01:23:51', '2017-11-14 01:23:51');

-- --------------------------------------------------------

--
-- Table structure for table `benef_identity_if_group`
--

CREATE TABLE `benef_identity_if_group` (
  `benef_id` int(11) NOT NULL,
  `identity_id` int(11) NOT NULL,
  `identity_value` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `benef_identity_if_group`
--

INSERT INTO `benef_identity_if_group` (`benef_id`, `identity_id`, `identity_value`, `created_at`, `updated_at`) VALUES
(26, 1, 0, '2017-11-01 05:05:23', '0000-00-00 00:00:00'),
(10, 2, 3, '2017-11-02 03:43:06', '2017-11-03 05:12:17'),
(35, 1, 12, '2017-11-07 03:26:37', '2017-11-07 03:26:37'),
(35, 2, 12, '2017-11-07 03:26:37', '2017-11-07 03:26:37'),
(36, 1, 13, '2017-11-07 03:28:48', '2017-11-07 03:29:15'),
(36, 2, 11, '2017-11-07 03:29:15', '2017-11-07 03:29:15'),
(45, 1, 0, '2017-11-13 02:38:09', '2017-11-13 02:38:09'),
(45, 2, 0, '2017-11-13 02:38:09', '2017-11-13 02:38:09'),
(49, 1, 0, '2017-11-14 01:23:50', '2017-11-14 01:23:50'),
(49, 2, 0, '2017-11-14 01:23:50', '2017-11-14 01:23:50');

-- --------------------------------------------------------

--
-- Table structure for table `caste`
--

CREATE TABLE `caste` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `caste`
--

INSERT INTO `caste` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'Dalit', '2017-07-25 01:21:54', '2017-07-25 02:09:50'),
(3, 'Brahman', '2017-07-25 01:22:06', '2017-07-25 01:22:06'),
(4, 'Chhetri', '2017-07-25 01:22:17', '2017-07-25 01:22:35'),
(5, 'Muslim', '2017-07-25 01:22:26', '2017-07-25 01:22:26'),
(6, 'Janajati', '2017-07-25 01:23:09', '2017-07-25 01:23:09'),
(7, 'Madhesi', '2017-07-25 01:23:31', '2017-07-25 01:23:31'),
(8, 'Others', '2017-09-11 04:01:19', '2017-09-11 04:01:19');

-- --------------------------------------------------------

--
-- Table structure for table `community_med`
--

CREATE TABLE `community_med` (
  `id` int(11) NOT NULL,
  `person_name` varchar(250) NOT NULL,
  `case_registered_date` date NOT NULL,
  `nature_of_case` varchar(200) NOT NULL,
  `type_of_case` varchar(100) NOT NULL,
  `resolve` varchar(200) NOT NULL,
  `resolve_date` date NOT NULL,
  `future_action` varchar(150) NOT NULL,
  `benef_id` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `goal_id` varchar(100) NOT NULL,
  `indicator_id` varchar(100) NOT NULL,
  `output_id` varchar(100) NOT NULL,
  `activity_id` varchar(100) NOT NULL,
  `project_id` int(11) NOT NULL,
  `quarter_year` year(4) NOT NULL,
  `quarter` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `community_med`
--

INSERT INTO `community_med` (`id`, `person_name`, `case_registered_date`, `nature_of_case`, `type_of_case`, `resolve`, `resolve_date`, `future_action`, `benef_id`, `status`, `goal_id`, `indicator_id`, `output_id`, `activity_id`, `project_id`, `quarter_year`, `quarter`, `created_at`, `updated_at`) VALUES
(13, 'asdfghj,sdfjsjf,cvbn', '2017-10-03', 'sdfsf', 'gender', 'yes', '2017-10-17', 'sdfsdf', '18', 'sfsfsfs', '106', '10', '67', '7', 3, 2013, 3, '2017-09-26 01:36:10', '2017-09-26 02:08:52'),
(14, 'asdfghj,sdfjsjf,cvbn', '2017-10-12', 'sdfsdf', 'gender', 'yes', '2017-10-07', 'sdfsdf', '18', 'sfdsf', '106', '10', '67,69', '1,7', 3, 2017, 4, '2017-10-05 12:36:33', '2017-10-05 12:36:33'),
(15, 'asdfghj,sdfjsjf,cvbn', '2017-10-18', 'dowry', 'land', 'no', '2017-10-10', 'law enforcement', '10,11,12,18', 'unsolved', '103', '7', '56', '1', 3, 2002, 2, '2017-10-27 04:17:14', '2017-10-27 04:35:45'),
(16, 'asdfghj,aaaaaaaaaaaaaaaaaaaa', '2017-11-14', 'dsfsf', 'land', 'no', '2017-11-17', 'sfsf', '', 'dzdfdasd', '103', '7,8', '57', '1', 15, 2002, 4, '2017-11-15 01:46:22', '2017-11-15 02:37:18');

-- --------------------------------------------------------

--
-- Table structure for table `consultancy_service`
--

CREATE TABLE `consultancy_service` (
  `id` int(11) NOT NULL,
  `type` varchar(250) NOT NULL,
  `hired_date` date NOT NULL,
  `duration` varchar(250) NOT NULL,
  `total_fee` decimal(10,2) NOT NULL COMMENT '00000000',
  `contract_signed_date` date NOT NULL,
  `consultant_id` int(10) DEFAULT NULL,
  `delivery_date` date NOT NULL,
  `contract_document` varchar(250) NOT NULL,
  `tor_text` varchar(250) NOT NULL,
  `tor_document` varchar(250) NOT NULL,
  `completion_review` varchar(250) NOT NULL,
  `remarks` varchar(250) NOT NULL,
  `project_id` varchar(3) DEFAULT NULL,
  `department_name` varchar(100) DEFAULT NULL,
  `product_url` varchar(200) NOT NULL,
  `qow` varchar(10) NOT NULL,
  `timely_delivery` varchar(10) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `scope` varchar(200) NOT NULL,
  `quarter` int(11) NOT NULL,
  `quarter_year` year(4) NOT NULL,
  `goal_id` int(11) NOT NULL,
  `indicator_id` varchar(100) NOT NULL,
  `output_id` varchar(100) NOT NULL,
  `activity_id` varchar(100) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consultancy_service`
--

INSERT INTO `consultancy_service` (`id`, `type`, `hired_date`, `duration`, `total_fee`, `contract_signed_date`, `consultant_id`, `delivery_date`, `contract_document`, `tor_text`, `tor_document`, `completion_review`, `remarks`, `project_id`, `department_name`, `product_url`, `qow`, `timely_delivery`, `staff_id`, `scope`, `quarter`, `quarter_year`, `goal_id`, `indicator_id`, `output_id`, `activity_id`, `created_at`, `updated_at`) VALUES
(22, 'kjhgfdssd', '0000-00-00', '3', '123123.00', '0000-00-00', 10, '0000-00-00', 'Sample-doc-file-200kb.doc', 'wefdgh', 'Sample-doc-file-100kb.doc', 'sdfsdf', 'sdfsdf', '16', NULL, 'sdfsdf', 'poor', 'very_good', 5, 'sdfsdfsd', 2, 2002, 105, '9', '63,65', '2,8', '2017-11-06', '2017-11-06');

-- --------------------------------------------------------

--
-- Table structure for table `dips`
--

CREATE TABLE `dips` (
  `id` int(11) NOT NULL,
  `activity_code` varchar(150) NOT NULL,
  `project_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `act_type` varchar(255) DEFAULT NULL,
  `act_others` varchar(255) DEFAULT NULL,
  `obj` varchar(255) DEFAULT NULL,
  `outcome` varchar(255) DEFAULT NULL,
  `ind_act` varchar(255) DEFAULT NULL,
  `ind_no` varchar(255) DEFAULT NULL,
  `police_str` varchar(255) DEFAULT NULL,
  `imp_date` date DEFAULT NULL,
  `imp_area` varchar(255) DEFAULT NULL,
  `eb_dis` int(15) DEFAULT NULL,
  `eb_female` int(15) DEFAULT NULL,
  `eb_male` int(15) DEFAULT NULL,
  `eb_total` int(15) DEFAULT NULL,
  `eb_dis_grp` int(15) DEFAULT NULL,
  `pb_type` varchar(255) DEFAULT NULL,
  `pb_travel` varchar(255) DEFAULT NULL,
  `pb_accom` varchar(255) DEFAULT NULL,
  `pb_program` varchar(255) DEFAULT NULL,
  `pb_total` varchar(255) DEFAULT NULL,
  `target_grp` varchar(255) DEFAULT NULL,
  `tg_others` varchar(255) DEFAULT NULL,
  `i_partners` varchar(255) DEFAULT NULL,
  `c_partners` varchar(255) DEFAULT NULL,
  `r_persons` varchar(255) DEFAULT NULL,
  `res_p` varchar(255) DEFAULT NULL,
  `ct_name` varchar(255) DEFAULT NULL,
  `ct_pos` varchar(255) DEFAULT NULL,
  `ct_cell` varchar(255) DEFAULT NULL,
  `quarter` int(11) NOT NULL,
  `quarter_year` year(4) NOT NULL,
  `goal_id` int(11) NOT NULL,
  `indicator_id` varchar(100) NOT NULL,
  `output_id` varchar(100) NOT NULL,
  `activity_id` varchar(100) NOT NULL,
  `responsible_staffid` int(11) NOT NULL,
  `accountable_staffid` int(11) NOT NULL,
  `approver_staffid` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dips`
--

INSERT INTO `dips` (`id`, `activity_code`, `project_id`, `name`, `act_type`, `act_others`, `obj`, `outcome`, `ind_act`, `ind_no`, `police_str`, `imp_date`, `imp_area`, `eb_dis`, `eb_female`, `eb_male`, `eb_total`, `eb_dis_grp`, `pb_type`, `pb_travel`, `pb_accom`, `pb_program`, `pb_total`, `target_grp`, `tg_others`, `i_partners`, `c_partners`, `r_persons`, `res_p`, `ct_name`, `ct_pos`, `ct_cell`, `quarter`, `quarter_year`, `goal_id`, `indicator_id`, `output_id`, `activity_id`, `responsible_staffid`, `accountable_staffid`, `approver_staffid`, `created_at`, `updated_at`) VALUES
(22, 'abed/asa/1212/121', 14, 'asdasd', '1,4', NULL, 'asdasdasd', 'asdasd', '1', '123123', 'sdfsdf', '1900-12-14', 'sdfsdf', NULL, 123, 123, 246, NULL, NULL, '123', '123', '123', '369', 'Police/Security institution', NULL, 'asdasd,asdasd', 'asdasdad,asdasd', 'sdfsdf', '1', 'sdfsdf', 'sdf', '123123', 2, 2020, 106, '10', '67,68,69', '1', 0, 0, 0, '2017-12-12 10:50:07', '2017-11-08 05:14:53'),
(23, 'abcd/asa/1211/121', 15, 'sdfsfsd', '2,4,5,13', 'other type', 'sdfsf', 'sdfsdf', '1', 'sfsdf', 'sdfsf', '2017-12-07', 'sfs', NULL, 12, 12, 24, NULL, NULL, '1212', '121', '212', '1545', 'Marginalized Community', NULL, 'sdfsdf,sdfsdf', 'sdfsf', 'sdfsf', '1', 'sfsf', 'sf', 'fsf', 2, 2000, 103, '7,8', '57,58', '1', 0, 0, 0, '2017-12-13 10:11:31', '2017-12-13 04:26:31'),
(24, 'aaaa/bbb/2017/012', 15, 'asdasd', '4,6', NULL, 'adsa', 'dada', '1', 'ada', 'dad', '2017-12-06', 'asdad', NULL, 12, 12, 24, NULL, NULL, '21', '121', '2', '144', 'Women', NULL, 'azczcx', 'asdad', 'adad', '1', 'asda', 'dadad', 'adad', 2, 2002, 103, '7', '56,57', '1', 0, 0, 0, '2017-12-12 10:51:21', '2017-12-12 05:06:21'),
(25, '12a/asd/1321/121', 3, 'zxczxc', '1,6,Other', 'zxczcx', 'zcxzx', 'czxc', '1', 'zcxzc', 'zczc', '2017-11-30', 'zxczxc', NULL, 2123, 123, 2246, NULL, NULL, '123', '123', '123', '369', 'Women', NULL, 'xcvxc,xvxcv', 'xcvxcv,zxczxc', 'zxczxc', '1', 'zxczxc', 'zxc', 'zxczzcxz', 3, 2000, 103, '7,8', '56,57', '1', 0, 0, 0, '2017-12-13 04:27:41', '2017-12-13 04:27:41'),
(26, 'activity_code[]/activity_c/activity/123', 3, 'name', '1,4,5,6,7,8,10,12,14,Other', 'act_others', 'obj', 'outcome', '1', 'ind_no', 'police_str', '2017-12-07', 'imp_area', NULL, 23123, 23, 23146, NULL, NULL, '231', '3', 'pb_program', 'NaN', 'Women', NULL, 'i_partners[],sdfsdf', 'c_partners[],sdfsf', 'r_persons[],sdfsdf', '2,1', 'sdfsfsdf', 'fsdfs', 'sdfsdf', 4, 2001, 103, '7,8', '56,57', '1', 9, 22, 23, '2017-12-18 01:43:58', '2017-12-18 01:43:58'),
(27, 'dfg/dfg/3422/242', 3, 'sdfsdfsdf', '6,7,Other', 'sdfsdf', 'sdf', 'sfsdf', '1', 'sdfs', 'fsdf', '2017-12-06', 'sdfsdfsf', NULL, 123, 123, 246, NULL, NULL, '123', '3', '123', '249', 'Women', NULL, 'xcvxcv,xcvxcvx', 'vxcvxcv,xcvxcvxcv', 'xcvxcvxc', '1', 'xvxvxvxcvxv', 'xcv', 'xcvxcvx', 4, 2001, 103, '7', '57,58', '1', 23, 24, 23, '2017-12-18 05:30:35', '2017-12-18 05:30:35');

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `id` int(11) NOT NULL,
  `zone_id` int(20) DEFAULT NULL,
  `district_id` int(20) DEFAULT NULL,
  `vdc` varchar(255) DEFAULT NULL,
  `population` varchar(255) NOT NULL,
  `hdi` float DEFAULT NULL,
  `poverty_in` float DEFAULT NULL,
  `vdc_detail` varchar(250) NOT NULL,
  `original_vdc_detail` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`id`, `zone_id`, `district_id`, `vdc`, `population`, `hdi`, `poverty_in`, `vdc_detail`, `original_vdc_detail`, `created_at`, `updated_at`) VALUES
(3, 1, 2, 'koteswor', '100000', 0.5, 0.5, 'SampleXLSFile_212kb1092665148.xls', 'SampleXLSFile_212kb.xls', '2017-11-17 11:44:58', '2017-11-17 05:59:58'),
(4, 4, 19, 'wwedwqe', '231', 231, 3213, '', '', '2017-07-23 12:20:50', '2017-07-23 12:20:50'),
(5, 3, 11, 'weqwe', '123123', 231123, 32131, '', '', '2017-07-23 12:21:06', '2017-07-23 12:21:06'),
(6, 3, 14, 'gwarko', '100000', 0.5, 1, '', '', '2017-07-25 10:32:05', '2017-07-25 04:47:04'),
(7, 3, 1, 'sadadasd', 'asdasd', 0, 0, 'SFCG-feedback1625693251.xlsx', 'SFCG-feedback.xlsx', '2017-09-19 18:29:53', '2017-09-19 18:29:53');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(10) UNSIGNED NOT NULL,
  `district_id` int(10) UNSIGNED NOT NULL,
  `district_name` varchar(100) NOT NULL,
  `district_headquarter` varchar(100) NOT NULL,
  `zone_id` int(10) UNSIGNED NOT NULL,
  `latitude` varchar(50) DEFAULT NULL,
  `longitude` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `district_id`, `district_name`, `district_headquarter`, `zone_id`, `latitude`, `longitude`, `created_at`, `updated_at`) VALUES
(1, 1, 'Ilam', 'Ilam', 1, '26.9', '87.9333333', '2017-07-12 05:02:52', '2017-07-12 05:02:52'),
(2, 2, 'Jhapa', 'Chandragadhi', 1, '26.63982', '87.8942451', '2017-07-12 05:02:52', '2017-07-12 05:02:52'),
(3, 3, 'Panchthar', 'Phidim', 1, '27.2036401', '87.8156715', '2017-07-12 05:02:52', '2017-07-12 05:02:52'),
(4, 4, 'Taplejung', 'Taplejung', 1, '27.35', '87.6666667', '2017-07-12 05:02:52', '2017-07-12 05:02:52'),
(5, 5, 'Dang Deukhuri', 'Ghorahi', 2, '28', '82.2666667', '2017-07-12 05:02:52', '2017-07-12 05:02:52'),
(6, 6, 'Pyuthan', 'Pyuthan Khalanga', 2, '28.1', '82.8666667', '2017-07-12 05:02:52', '2017-07-12 05:02:52'),
(7, 7, 'Rolpa', 'Liwang', 2, '28.3815621', '82.6483442', '2017-07-12 05:02:52', '2017-07-12 05:02:52'),
(8, 8, 'Rukum', 'Musikot', 2, '28.7434423', '82.4752757', '2017-07-12 05:02:52', '2017-07-12 05:02:52'),
(9, 9, 'Salyan', 'Salyan Khalanga', 2, '28.28', '83.79', '2017-07-12 05:02:52', '2017-07-12 05:02:52'),
(10, 10, 'Bhaktapur', 'Bhaktapur', 3, '27.673031', '85.427856', '2017-07-12 05:02:52', '2017-07-12 05:02:52'),
(11, 11, 'Dhading', 'Dhading Besi', 3, '27.8666667', '84.9166667', '2017-07-12 05:02:52', '2017-07-12 05:02:52'),
(12, 12, 'Kathmandu', 'Kathmandu', 3, '27.702871', '85.318244', '2017-07-12 05:02:52', '2017-07-12 05:02:52'),
(13, 13, 'Kavrepalanchok', 'Dhulikhel', 3, '27.525942', '85.56121', '2017-07-12 05:02:52', '2017-07-12 05:02:52'),
(14, 14, 'Lalitpur', 'Patan', 3, '27.5419673', '85.3342973', '2017-07-12 05:02:52', '2017-07-12 05:02:52'),
(15, 15, 'Nuwakot', 'Bidur', 3, '27.97', '83.06', '2017-07-12 05:02:52', '2017-07-12 05:02:52'),
(16, 16, 'Rasuwa', 'Dhunche', 3, '27.083333', '86.433333', '2017-07-12 05:02:52', '2017-07-12 05:02:52'),
(17, 17, 'Sindhupalchok', 'Chautara', 3, '27.9512034', '85.684578', '2017-07-12 05:02:52', '2017-07-12 05:02:52'),
(18, 18, 'Dolpa', 'Dolpa', 4, '28.998686', '82.816437', '2017-07-12 05:02:52', '2017-07-12 05:02:52'),
(19, 19, 'Humla', 'Simikot', 4, '29.9666667', '81.8333333', '2017-07-12 05:02:52', '2017-07-12 05:02:52'),
(20, 20, 'Jumla', 'Jumla Khalanga', 4, '29.2752778', '82.1833333', '2017-07-12 05:02:52', '2017-07-12 05:02:52'),
(21, 21, 'Kalikot', 'Kalikot', 4, '29.15', '81.6166667', '2017-07-12 05:02:52', '2017-07-12 05:02:52'),
(22, 22, 'Mugu', 'Gamgadhi', 4, '29.8666667', '82.6166667', '2017-07-12 05:02:52', '2017-07-12 05:02:52'),
(23, 23, 'Khotang', 'Diktel', 5, '27.2317177', '86.8220341', '2017-07-12 05:02:52', '2017-07-12 05:02:52'),
(24, 24, 'Okhaldhunga', 'Okhaldhunga', 5, '27.3166667', '86.5', '2017-07-12 05:02:52', '2017-07-12 05:02:52'),
(25, 25, 'Saptari', 'Rajbiraj', 5, '26.6172621', '86.7013894', '2017-07-12 05:02:52', '2017-07-12 05:02:52'),
(26, 26, 'Siraha', 'Siraha', 5, '26.656031', '86.208847', '2017-07-12 05:02:52', '2017-07-12 05:02:52'),
(27, 27, 'Solukhumbu', 'Salleri', 5, '27.7909733', '86.6611083', '2017-07-12 05:02:52', '2017-07-12 05:02:52'),
(28, 28, 'Udayapur', 'Gaighat', 5, '27.57', '82.9', '2017-07-12 05:02:52', '2017-07-12 05:02:52'),
(29, 29, 'Bhojpur', 'Bhojpur', 6, '27.1666667', '87.05', '2017-07-12 05:02:52', '2017-07-12 05:02:52'),
(30, 30, 'Dhankuta', 'Dhankuta', 6, '26.9833333', '87.3333333', '2017-07-12 05:02:52', '2017-07-12 05:02:52'),
(31, 31, 'Morang', 'Biratnagar', 6, '26.6799002', '87.460397', '2017-07-12 05:02:52', '2017-07-12 05:02:52'),
(32, 32, 'Sankhuwasabha', 'Khandbari', 6, '27.6141916', '87.1422895', '2017-07-12 05:02:52', '2017-07-12 05:02:52'),
(33, 33, 'Sunsari', 'Inaruwa', 6, '26.6275522', '87.1821709', '2017-07-12 05:02:52', '2017-07-12 05:02:52'),
(34, 34, 'Terhathum', 'Manglung', 6, '27.198391', '87.5000082', '2017-07-12 05:02:52', '2017-07-12 05:02:52'),
(35, 35, 'Bara', 'Kalaiya', 7, '27.0333333', '85', '2017-07-12 05:02:52', '2017-07-12 05:02:52'),
(36, 36, 'Chitwan', 'Bharatpur', 7, '27.529131', '84.3542049', '2017-07-12 05:02:52', '2017-07-12 05:02:52'),
(37, 37, 'Makwanpur', 'Hetauda', 7, '27.3730012', '85.1894045', '2017-07-12 05:02:52', '2017-07-12 05:02:52'),
(38, 38, 'Parsa', 'Birgunj', 7, '26.8833333', '85.6333333', '2017-07-12 05:02:52', '2017-07-12 05:02:52'),
(39, 39, 'Rautahat', 'Gaur', 7, '26.57', '86.53', '2017-07-12 05:02:52', '2017-07-12 05:02:52'),
(40, 40, 'Baitadi', 'Baitadi', 8, '29.5185787', '80.4688061', '2017-07-12 05:02:52', '2017-07-12 05:02:52'),
(41, 41, 'Dadeldhura', 'Dadeldhura', 8, '29.2992006', '80.5875862', '2017-07-12 05:02:52', '2017-07-12 05:02:52'),
(42, 42, 'Darchula', 'Darchula', 8, '29.83', '80.55', '2017-07-12 05:02:52', '2017-07-12 05:02:52'),
(43, 43, 'Kanchanpur', 'Mahendara Nagar', 8, '28.2', '82.166667', '2017-07-12 05:02:52', '2017-07-12 05:02:52'),
(44, 44, 'Gorkha', 'Gorkha', 9, '28', '84.6333333', '2017-07-12 05:02:52', '2017-07-12 05:02:52'),
(45, 45, 'Kaski', 'Pokhara', 9, '28.28236', '83.866028', '2017-07-12 05:02:52', '2017-07-12 05:02:52'),
(46, 46, 'Lamjung', 'Bensi Sahar', 9, '28.2765491', '84.3542049', '2017-07-12 05:02:52', '2017-07-12 05:02:52'),
(47, 47, 'Manang', 'Chame', 9, '28.6666667', '84.0166667', '2017-07-12 05:02:52', '2017-07-12 05:02:52'),
(48, 48, 'Syangja', 'Syangja', 9, '28.1046333', '83.8791074', '2017-07-12 05:02:52', '2017-07-12 05:02:52'),
(49, 49, 'Tanahu', 'Damauli', 9, '27.944705', '84.2278796', '2017-07-12 05:02:52', '2017-07-12 05:02:52'),
(50, 50, 'Dhanusa', 'Janakpur', 10, '26.8350474', '86.0121573', '2017-07-12 05:02:52', '2017-07-12 05:02:52'),
(51, 51, 'Dholkha', 'Charikot', 10, '27.7784288', '86.1751759', '2017-07-12 05:02:52', '2017-07-12 05:02:52'),
(52, 52, 'Mahottari', 'Jaleswor', 10, '26.8761922', '85.80766', '2017-07-12 05:02:52', '2017-07-12 05:02:52'),
(53, 53, 'Ramechhap', 'Manthali', 10, '27.3333333', '86.0833333', '2017-07-12 05:02:52', '2017-07-12 05:02:52'),
(54, 54, 'Sarlahi', 'Malangwa', 10, '27.0084093', '85.520024', '2017-07-12 05:02:52', '2017-07-12 05:02:52'),
(55, 55, 'Sindhuli', 'Sindhuli Madhi', 10, '27.2568824', '85.971322', '2017-07-12 05:02:52', '2017-07-12 05:02:52'),
(56, 56, 'Arghakhanchi', 'Sandhikharka', 11, '28.0008333', '83.2466667', '2017-07-12 05:02:52', '2017-07-12 05:02:52'),
(57, 57, 'Gulmi', 'Tamghas', 11, '28.088934', '83.2934086', '2017-07-12 05:02:52', '2017-07-12 05:02:52'),
(58, 58, 'Kapilvastu', 'Taulihawa', 11, '27.5434407', '83.0549312', '2017-07-12 05:02:52', '2017-07-12 05:02:52'),
(59, 59, 'Nawalparasi', 'Parasi', 11, '27.6498409', '83.8897057', '2017-07-12 05:02:52', '2017-07-12 05:02:52'),
(60, 60, 'Palpa', 'Tansen', 11, '27.8666667', '83.55', '2017-07-12 05:02:52', '2017-07-12 05:02:52'),
(61, 61, 'Rupandehi', 'Bhairahawa', 11, '27.6264239', '83.3789389', '2017-07-12 05:02:52', '2017-07-12 05:02:52'),
(62, 62, 'Achham', 'Mangalsen', 12, '29.05', '81.3', '2017-07-12 05:02:52', '2017-07-12 05:02:52'),
(63, 63, 'Bajhang', 'Chainpur', 12, '29.55', '81.2', '2017-07-12 05:02:52', '2017-07-12 05:02:52'),
(64, 64, 'Bajura', 'Martadi', 12, '29.4469444', '81.4866667', '2017-07-12 05:02:52', '2017-07-12 05:02:52'),
(65, 65, 'Doti', 'Dipayal', 12, '29.266667', '80.983333', '2017-07-12 05:02:52', '2017-07-12 05:02:52'),
(66, 66, 'Kailali', 'Dhangadhi', 12, '28.6833333', '80.6', '2017-07-12 05:02:52', '2017-07-12 05:02:52'),
(67, 67, 'Banke', 'Nepalgunj', 13, '28.05', '81.6166667', '2017-07-12 05:02:52', '2017-07-12 05:02:52'),
(68, 68, 'Bardiya', 'Gulariya', 13, '28.8166667', '80.4833333', '2017-07-12 05:02:52', '2017-07-12 05:02:52'),
(69, 69, 'Dailekh', 'Dullu', 13, '28.8375', '81.7077778', '2017-07-12 05:02:52', '2017-07-12 05:02:52'),
(70, 70, 'Jajarkot', 'Khalanga', 13, '28.73', '82.22', '2017-07-12 05:02:52', '2017-07-12 05:02:52'),
(71, 71, 'Surkhet', 'Surkhet', 13, '28.6', '81.6333333', '2017-07-12 05:02:52', '2017-07-12 05:02:52'),
(72, 72, 'Baglung', 'Baglung', 14, '28.2666667', '83.6', '2017-07-12 05:02:52', '2017-07-12 05:02:52'),
(73, 73, 'Mustang', 'Jomsom', 14, '28.9985065', '83.8473015', '2017-07-12 05:02:52', '2017-07-12 05:02:52'),
(74, 74, 'Myagdi', 'Beni', 14, '28.611176', '83.5070203', '2017-07-12 05:02:52', '2017-07-12 05:02:52'),
(75, 75, 'Parbat', 'Kusma', 14, '28.178049', '83.6986568', '2017-07-12 05:02:52', '2017-07-12 05:02:52'),
(77, 77, 'All District Selected', '', 15, NULL, NULL, '2017-09-01 19:45:11', '2017-09-01 19:45:11');

-- --------------------------------------------------------

--
-- Table structure for table `expertise`
--

CREATE TABLE `expertise` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expertise`
--

INSERT INTO `expertise` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Capacity development', '2017-07-25 01:34:40', '2017-07-25 01:34:40'),
(2, 'Planning', '2017-07-25 01:35:48', '2017-07-25 01:35:48'),
(4, 'Meeting/workshop', '2017-07-25 01:35:58', '2017-07-25 01:35:58'),
(5, 'Research/study', '2017-07-25 01:36:17', '2017-07-25 01:36:17'),
(6, 'expertise1', '2017-09-07 04:26:04', '2017-09-07 04:26:11');

-- --------------------------------------------------------

--
-- Table structure for table `final_qna_answer`
--

CREATE TABLE `final_qna_answer` (
  `id` int(11) NOT NULL,
  `ref_id` int(11) NOT NULL,
  `qid` int(11) NOT NULL,
  `answer` varchar(200) CHARACTER SET ucs2 COLLATE ucs2_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `final_qna_answer`
--

INSERT INTO `final_qna_answer` (`id`, `ref_id`, `qid`, `answer`, `created_at`, `updated_at`) VALUES
(1, 4, 72, '', '2017-08-16 01:18:20', '2017-08-16 01:18:20'),
(2, 4, 73, '', '2017-08-16 01:18:20', '2017-08-16 01:18:20'),
(3, 4, 73, '', '2017-08-16 01:18:20', '2017-08-16 01:18:20'),
(4, 4, 74, '', '2017-08-16 01:18:20', '2017-08-16 01:18:20'),
(5, 4, 74, '', '2017-08-16 01:18:20', '2017-08-16 01:18:20'),
(6, 4, 74, '', '2017-08-16 01:18:21', '2017-08-16 01:18:21'),
(7, 4, 74, '', '2017-08-16 01:18:21', '2017-08-16 01:18:21'),
(8, 5, 72, '', '2017-08-16 01:19:56', '2017-08-16 01:19:56'),
(9, 5, 73, '', '2017-08-16 01:19:56', '2017-08-16 01:19:56'),
(10, 5, 74, '', '2017-08-16 01:19:56', '2017-08-16 01:19:56'),
(11, 6, 72, 'sdfkl', '2017-08-16 01:20:37', '2017-08-16 01:20:37'),
(12, 6, 73, 'sdlkf', '2017-08-16 01:20:37', '2017-08-16 01:20:37'),
(13, 6, 74, 'sldkf', '2017-08-16 01:20:37', '2017-08-16 01:20:37'),
(14, 7, 72, 'written_answers[72][]', '2017-08-16 01:21:11', '2017-08-16 01:21:11'),
(15, 7, 73, 'written_answers[73][]', '2017-08-16 01:21:11', '2017-08-16 01:21:11'),
(16, 7, 73, 'written_answers[73][]', '2017-08-16 01:21:11', '2017-08-16 01:21:11'),
(17, 7, 74, 'written_answers[74][]', '2017-08-16 01:21:11', '2017-08-16 01:21:11'),
(18, 7, 74, 'written_answers[74][]', '2017-08-16 01:21:12', '2017-08-16 01:21:12'),
(19, 12, 72, 'खासै केहि थाहा छैन', '2017-08-16 01:33:04', '2017-08-16 01:33:04'),
(20, 12, 73, 'खासै केहि थाहा छैन', '2017-08-16 01:33:04', '2017-08-16 01:33:04'),
(21, 12, 74, 'खासै केहि थाहा छैन', '2017-08-16 01:33:04', '2017-08-16 01:33:04');

-- --------------------------------------------------------

--
-- Table structure for table `final_qna_rel`
--

CREATE TABLE `final_qna_rel` (
  `id` int(11) NOT NULL,
  `ref_id` int(11) NOT NULL,
  `qid` int(11) NOT NULL,
  `aid` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `final_qna_rel`
--

INSERT INTO `final_qna_rel` (`id`, `ref_id`, `qid`, `aid`, `created_at`, `updated_at`) VALUES
(2, 4, 70, 190, '2017-08-16 01:18:20', '2017-08-16 01:18:20'),
(3, 4, 71, 191, '2017-08-16 01:18:20', '2017-08-16 01:18:20'),
(4, 4, 71, 192, '2017-08-16 01:18:20', '2017-08-16 01:18:20'),
(5, 4, 71, 193, '2017-08-16 01:18:20', '2017-08-16 01:18:20'),
(6, 5, 70, 190, '2017-08-16 01:19:56', '2017-08-16 01:19:56'),
(7, 5, 71, 191, '2017-08-16 01:19:56', '2017-08-16 01:19:56'),
(8, 6, 70, 190, '2017-08-16 01:20:37', '2017-08-16 01:20:37'),
(9, 6, 71, 191, '2017-08-16 01:20:37', '2017-08-16 01:20:37'),
(10, 7, 70, 190, '2017-08-16 01:21:11', '2017-08-16 01:21:11'),
(11, 7, 71, 191, '2017-08-16 01:21:11', '2017-08-16 01:21:11'),
(12, 7, 71, 192, '2017-08-16 01:21:11', '2017-08-16 01:21:11'),
(13, 8, 4, 56, '2017-08-16 01:28:25', '2017-08-16 01:28:25'),
(14, 8, 4, 57, '2017-08-16 01:28:25', '2017-08-16 01:28:25'),
(15, 8, 4, 58, '2017-08-16 01:28:25', '2017-08-16 01:28:25'),
(16, 8, 4, 59, '2017-08-16 01:28:25', '2017-08-16 01:28:25'),
(17, 8, 4, 60, '2017-08-16 01:28:25', '2017-08-16 01:28:25'),
(18, 8, 7, 69, '2017-08-16 01:28:25', '2017-08-16 01:28:25'),
(19, 9, 8, 70, '2017-08-16 01:29:26', '2017-08-16 01:29:26'),
(20, 9, 8, 71, '2017-08-16 01:29:26', '2017-08-16 01:29:26'),
(21, 9, 9, 75, '2017-08-16 01:29:26', '2017-08-16 01:29:26'),
(22, 9, 9, 76, '2017-08-16 01:29:26', '2017-08-16 01:29:26'),
(23, 10, 8, 70, '2017-08-16 01:29:26', '2017-08-16 01:29:26'),
(24, 10, 8, 71, '2017-08-16 01:29:26', '2017-08-16 01:29:26'),
(25, 10, 9, 75, '2017-08-16 01:29:26', '2017-08-16 01:29:26'),
(26, 10, 9, 76, '2017-08-16 01:29:27', '2017-08-16 01:29:27'),
(27, 11, 4, 56, '2017-08-16 01:32:01', '2017-08-16 01:32:01'),
(28, 11, 7, 69, '2017-08-16 01:32:01', '2017-08-16 01:32:01'),
(29, 12, 70, 190, '2017-08-16 01:33:04', '2017-08-16 01:33:04'),
(30, 12, 71, 191, '2017-08-16 01:33:04', '2017-08-16 01:33:04'),
(31, 13, 4, 56, '2017-08-24 19:00:06', '2017-08-24 19:00:06'),
(32, 13, 4, 58, '2017-08-24 19:00:06', '2017-08-24 19:00:06'),
(33, 13, 4, 60, '2017-08-24 19:00:06', '2017-08-24 19:00:06'),
(34, 13, 7, 69, '2017-08-24 19:00:06', '2017-08-24 19:00:06');

-- --------------------------------------------------------

--
-- Table structure for table `general_settings`
--

CREATE TABLE `general_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tagline` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_title` varchar(350) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_desc` text COLLATE utf8_unicode_ci,
  `meta_keyword` text COLLATE utf8_unicode_ci,
  `misc_javascript` text COLLATE utf8_unicode_ci,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `favicon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `general_settings`
--

INSERT INTO `general_settings` (`id`, `title`, `tagline`, `meta_title`, `meta_desc`, `meta_keyword`, `misc_javascript`, `email`, `logo`, `favicon`, `created_at`, `updated_at`) VALUES
(10, 'SFCG', NULL, 'SFCG', 'DBMS', 'DBMS', NULL, 'admin@3hammers.com', 'Yh1vq-3hammers.png', '5ptZC-3hammers_footer.png', '2017-07-13 05:13:05', '2017-07-13 05:13:05');

-- --------------------------------------------------------

--
-- Table structure for table `goal`
--

CREATE TABLE `goal` (
  `id` int(11) NOT NULL,
  `goal` text,
  `p_code` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `goal`
--

INSERT INTO `goal` (`id`, `goal`, `p_code`, `created_at`, `updated_at`) VALUES
(103, 'fsdsfsdf', '5', '2017-08-21 19:18:08', '2017-08-25 01:05:12'),
(104, 'sdasdasd', '4', '2017-08-21 19:19:09', '2017-08-25 01:05:31'),
(105, 'New Goal', '4', '2017-08-28 10:19:48', '2017-08-28 10:19:48'),
(106, 'To improve the internal governance of community school', '4', '2017-08-28 12:50:53', '2017-08-28 12:50:53'),
(107, 'goal1', '4', '2017-09-18 13:34:15', '2017-09-18 13:34:15');

-- --------------------------------------------------------

--
-- Table structure for table `identity`
--

CREATE TABLE `identity` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `identity`
--

INSERT INTO `identity` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Madhesi', '2017-07-25 01:27:26', '2017-07-25 01:27:45'),
(2, 'Pahade', '2017-07-25 11:51:47', '2017-07-25 12:55:43');

-- --------------------------------------------------------

--
-- Table structure for table `iecmaterials`
--

CREATE TABLE `iecmaterials` (
  `id` int(11) NOT NULL,
  `theme` varchar(50) NOT NULL,
  `project_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `target_audience` varchar(50) NOT NULL,
  `type` varchar(20) NOT NULL,
  `production_date` date NOT NULL,
  `no_of_copies` varchar(10) NOT NULL,
  `cost` decimal(10,2) NOT NULL,
  `sample` varchar(100) NOT NULL,
  `language` varchar(100) NOT NULL,
  `quarter_year` year(4) NOT NULL,
  `quarter` int(11) NOT NULL,
  `goal_id` int(11) NOT NULL,
  `indicator_id` varchar(100) NOT NULL,
  `output_id` varchar(100) NOT NULL,
  `activity_id` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iecmaterials`
--

INSERT INTO `iecmaterials` (`id`, `theme`, `project_id`, `staff_id`, `target_audience`, `type`, `production_date`, `no_of_copies`, `cost`, `sample`, `language`, `quarter_year`, `quarter`, `goal_id`, `indicator_id`, `output_id`, `activity_id`, `created_at`, `updated_at`) VALUES
(4, 'education', 15, 5, 'sdfsdf', 'Broucher', '2017-11-16', '123', '123.00', 'wefg', 'nepali,english', 2003, 2, 106, '10', '68,69', '1,7', '2017-11-06 01:48:33', '2017-11-16 04:09:28');

-- --------------------------------------------------------

--
-- Table structure for table `logical`
--

CREATE TABLE `logical` (
  `id` int(11) NOT NULL,
  `goal` varchar(100) DEFAULT NULL,
  `sub` varchar(200) DEFAULT NULL,
  `n_sum` text,
  `obj_i` text,
  `ind` text,
  `data_s` varchar(200) DEFAULT NULL,
  `frequency` varchar(200) DEFAULT NULL,
  `baseline` varchar(200) DEFAULT NULL,
  `target` varchar(200) DEFAULT NULL,
  `progress` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logical`
--

INSERT INTO `logical` (`id`, `goal`, `sub`, `n_sum`, `obj_i`, `ind`, `data_s`, `frequency`, `baseline`, `target`, `progress`, `created_at`, `updated_at`) VALUES
(7, '103', 'Output1.1.2 : dadsd', 'dda', 'ddasda', 'ssdsd', 'sdsd', 'rrtrt', 'erwr', 'wewewdwdw', 'wwew', '2017-08-24 11:38:35', '2017-08-25 01:04:08'),
(8, '103', 'Objective2 : sadsad', 'dsafasd', 'dsdasfdfdf', 'dasdsfff', 'yuytutyu', 'xczczczxv', 'dsffasdf', 'cvxcvcv', 'cvcvccvzcxx', '2017-08-24 11:54:24', '2017-08-25 01:03:44'),
(9, '105', 'Objective1 : First Objectibe', 'Summary Info here', 'Test Variable', 'Def 1', 'Test Data', '3 months', 'Tag', '1 year', '60%', '2017-08-24 11:55:33', '2017-08-28 10:42:36'),
(10, '106', 'Objective1 : 1. To enhance capacity of local SHs in education sector', 'Provide training to CSOs mmembers', '% of participants who have increased knowledge and skill on school governance', 'The trained participants who say they learned more about the school governance', 'Pre and Post Test', 'Each traning', '0%', '66%', 'TBD', '2017-08-28 12:58:14', '2017-08-28 12:58:45'),
(11, '107', 'Objective1 : obj1', 'summary test', 'indicator test', 'defition test', 'test', 'test', 'test', 'test', 'test', '2017-09-18 13:35:20', '2017-09-18 13:35:20');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(11) NOT NULL,
  `district_id` varchar(150) DEFAULT NULL,
  `station` varchar(255) DEFAULT NULL,
  `p_type` varchar(255) DEFAULT NULL,
  `p_others` varchar(255) DEFAULT NULL,
  `ep_num` int(15) DEFAULT NULL,
  `b_date` date DEFAULT NULL,
  `p_date` date DEFAULT NULL,
  `in_guest` int(15) DEFAULT NULL,
  `benef` int(15) DEFAULT NULL,
  `p_aff` varchar(255) DEFAULT NULL,
  `theme` varchar(255) DEFAULT NULL,
  `produce_by` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `language` varchar(255) DEFAULT NULL,
  `project_id` int(11) NOT NULL,
  `braodcast` varchar(100) NOT NULL,
  `boardcast_air_date` date NOT NULL,
  `braodcast_by` varchar(100) NOT NULL,
  `objectives` varchar(250) DEFAULT NULL,
  `keywords` varchar(250) DEFAULT NULL,
  `quarter` int(11) NOT NULL,
  `quarter_year` year(4) NOT NULL,
  `goal_id` int(11) NOT NULL,
  `indicator_id` varchar(100) NOT NULL,
  `output_id` varchar(100) NOT NULL,
  `activity_id` varchar(100) NOT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `district_id`, `station`, `p_type`, `p_others`, `ep_num`, `b_date`, `p_date`, `in_guest`, `benef`, `p_aff`, `theme`, `produce_by`, `url`, `language`, `project_id`, `braodcast`, `boardcast_air_date`, `braodcast_by`, `objectives`, `keywords`, `quarter`, `quarter_year`, `goal_id`, `indicator_id`, `output_id`, `activity_id`, `created_at`, `updated_at`) VALUES
(9, '4,5', 'FM', 'Radio Drama', NULL, 0, '2017-11-22', '2017-11-09', 0, 0, 'adad', 'ad', 'asda', 'asdasd', 'dassdasd', 3, 'asads', '2017-11-15', 'asdv', 'asdasd', 'sdasd', 3, 2001, 106, '10', '69,70', '1,7', '2017-11-06 07:55:35', '2017-11-06 08:00:29');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_07_06_070905_create_projects_table', 1),
(4, '2017_08_29_201747_product', 2),
(5, '2017_08_29_201807_product_photo', 3);

-- --------------------------------------------------------

--
-- Table structure for table `mne`
--

CREATE TABLE `mne` (
  `id` int(11) NOT NULL,
  `mne_type` varchar(255) DEFAULT NULL,
  `project_id` varchar(100) NOT NULL,
  `obj` varchar(255) DEFAULT NULL,
  `p_date` date DEFAULT NULL,
  `u_date` date DEFAULT NULL,
  `document` varchar(255) DEFAULT NULL,
  `original_document` varchar(250) NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mne`
--

INSERT INTO `mne` (`id`, `mne_type`, `project_id`, `obj`, `p_date`, `u_date`, `document`, `original_document`, `keywords`, `created_at`, `updated_at`) VALUES
(7, 'Planning review', '3', 'werwer', '2017-10-11', '2017-10-02', 'SampleXLSFile_904kb1491853216.xls', 'SampleXLSFile_904kb.xls', '', '2017-11-17 06:22:44', '2017-11-17 00:37:44'),
(8, 'Follow up', '4', 'asdasda', '2017-10-10', '2017-10-12', 'SampleDOCFile_200kb.doc', '', '', '2017-10-26 07:04:39', '2017-09-01 00:48:09'),
(9, 'Planning review', '3', 'objective', '2017-08-30', '2018-04-04', 'gre_research_validity_data645677820.pdf', 'gre_research_validity_data.pdf', 'keywordsh', '2017-11-17 09:30:32', '2017-11-17 03:45:32'),
(10, 'Planning review', '6', 'sfdsfsfsf', '2017-01-09', '2016-09-12', 'Binaya-bhandari113893648.docx', 'Binaya-bhandari.docx', 'sdfsdfsf', '2017-10-26 07:04:32', '2017-10-05 02:17:40'),
(11, 'Planning review', '17', 'sdfsfsfs', '2017-10-07', '2018-03-13', 'Filters560685923.doc', 'Filters.doc', 'aaaaa', '2017-10-26 07:04:15', '2017-10-05 16:48:44'),
(12, 'Planning review', '15', 'sdfsdfsdf', '2017-10-03', '2017-10-28', 'Binaya-bhandari113893648992119507.docx', 'Binaya-bhandari113893648.docx', 'sdfsdfsdfsdf', '2017-10-26 02:11:47', '2017-10-26 02:11:47');

-- --------------------------------------------------------

--
-- Table structure for table `multipleprogress_doc`
--

CREATE TABLE `multipleprogress_doc` (
  `id` int(11) NOT NULL,
  `file_id` int(11) NOT NULL,
  `progress_doc` varchar(250) NOT NULL,
  `original_progress_doc` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `multipleprogress_doc`
--

INSERT INTO `multipleprogress_doc` (`id`, `file_id`, `progress_doc`, `original_progress_doc`, `created_at`, `updated_at`) VALUES
(26, 58, 'pdf9188.pdf', 'pdf.pdf', '2017-09-01 03:37:04', '2017-09-01 03:37:06'),
(58, 59, 'add-benef-in-training112661082.jpg', 'add-benef-in-training.jpg', '2017-11-16 00:34:58', '2017-11-16 00:42:59'),
(59, 59, 'test736489373.PNG', 'test.PNG', '2017-11-16 00:36:02', '2017-11-16 00:42:59'),
(63, 61, 'Sample-doc-file-200kb1105252896.doc', 'Sample-doc-file-200kb.doc', '2017-11-16 02:03:01', '2017-11-16 02:03:03'),
(64, 61, 'Sample-doc-file-100kb1767866952.doc', 'Sample-doc-file-100kb.doc', '2017-11-16 02:03:53', '2017-11-16 02:04:16'),
(69, 60, 'SampleXLSFile_1736kb1473649542.xls', 'SampleXLSFile_1736kb.xls', '2017-11-16 05:55:28', '2017-11-16 05:55:39'),
(71, 59, 'SFCG1941080464.pdf', 'SFCG.pdf', '2017-11-16 23:58:11', '2017-11-16 23:58:16'),
(72, 58, 'Sample-doc-file-1000kb2064154227.doc', 'Sample-doc-file-1000kb.doc', '2017-11-17 03:33:49', '2017-11-17 03:34:01');

-- --------------------------------------------------------

--
-- Table structure for table `ngo`
--

CREATE TABLE `ngo` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(300) NOT NULL,
  `contact_no` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `established_date` date NOT NULL,
  `primary_project` varchar(255) NOT NULL,
  `funded_by` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ngo`
--

INSERT INTO `ngo` (`id`, `name`, `address`, `contact_no`, `email`, `established_date`, `primary_project`, `funded_by`, `created_at`, `updated_at`) VALUES
(3, 'NGO 1', 'Lagankhel', '9841545445', 'ngo@gmail.com', '1900-12-21', 'Rural Development', 'UNESCO', '2017-07-13 14:58:38', '2017-11-17 00:38:49'),
(4, 'NGO 2', 'Bhaktapur', '9841245151', 'ngo2@gmail.com', '0000-00-00', 'Education', 'UNICEF', '2017-07-13 14:59:50', '2017-07-13 15:00:10'),
(5, 'ssad', 'sdasd', '42343432', 'john@gmail.com', '2010-02-02', 'sdasdasd', 'dasds', '2017-08-25 01:16:27', '2017-11-08 05:37:46');

-- --------------------------------------------------------

--
-- Table structure for table `objective`
--

CREATE TABLE `objective` (
  `id` int(11) NOT NULL,
  `goal_id` int(11) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `objective`
--

INSERT INTO `objective` (`id`, `goal_id`, `content`, `created_at`, `updated_at`) VALUES
(106, 103, 'sdasdasd', '2017-08-21 19:18:08', '2017-08-21 19:18:08'),
(107, 103, 'sadsad', '2017-08-21 19:18:08', '2017-08-21 19:18:08'),
(108, 104, 'sdasdad', '2017-08-21 19:19:09', '2017-08-21 19:19:09'),
(109, 105, 'First Objectibe', '2017-08-28 10:19:48', '2017-08-28 10:19:48'),
(110, 106, '1. To enhance capacity of local SHs in education sector', '2017-08-28 12:50:53', '2017-08-28 12:50:53'),
(111, 107, 'obj1', '2017-09-18 13:34:15', '2017-09-18 13:34:15');

-- --------------------------------------------------------

--
-- Table structure for table `outcome`
--

CREATE TABLE `outcome` (
  `id` int(11) NOT NULL,
  `obj_id` int(11) DEFAULT NULL,
  `content` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `outcome`
--

INSERT INTO `outcome` (`id`, `obj_id`, `content`, `created_at`, `updated_at`) VALUES
(82, 106, 'sdasda', '2017-08-21 19:18:08', '2017-08-21 19:18:08'),
(83, 107, 'dada', '2017-08-21 19:18:08', '2017-08-21 19:18:08'),
(84, 107, 'sadasd', '2017-08-21 19:18:08', '2017-08-21 19:18:08'),
(85, 108, 'sadasd', '2017-08-21 19:19:09', '2017-08-21 19:19:09'),
(86, 108, 'sdasda', '2017-08-21 19:19:09', '2017-08-21 19:19:09'),
(87, 109, 'A', '2017-08-28 10:19:48', '2017-08-28 10:19:48'),
(88, 109, 'New Outcomr Second', '2017-08-28 10:19:48', '2017-08-28 10:19:48'),
(89, 110, '1.1 Enhanced capacity of CSOs in basic rights and policy of education sector', '2017-08-28 12:50:53', '2017-08-28 12:50:53'),
(90, 110, '1..2 Increased enrollment of child', '2017-08-28 12:50:53', '2017-08-28 12:50:53'),
(91, 111, 'outcome1', '2017-09-18 13:34:15', '2017-09-18 13:34:15');

-- --------------------------------------------------------

--
-- Table structure for table `output`
--

CREATE TABLE `output` (
  `id` int(11) NOT NULL,
  `outcome_id` int(11) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `activity` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `output`
--

INSERT INTO `output` (`id`, `outcome_id`, `content`, `activity`, `created_at`, `updated_at`) VALUES
(32, 65, '0', 'Capacity development', '2017-08-17 04:23:48', '2017-08-17 04:23:48'),
(33, 65, '1', 'Planning', '2017-08-17 04:23:49', '2017-08-17 04:23:49'),
(56, 82, 'dsdasd', '1', '2017-08-21 19:18:08', '2017-08-25 01:05:12'),
(57, 82, 'dadsd', '1', '2017-08-21 19:18:08', '2017-08-25 01:05:12'),
(58, 83, 'dasda', '1', '2017-08-21 19:18:08', '2017-08-25 01:05:12'),
(59, 84, 'dafasff', '1', '2017-08-21 19:18:08', '2017-08-25 01:05:12'),
(60, 85, 'sdasd', '1', '2017-08-21 19:19:09', '2017-08-25 01:05:31'),
(61, 86, 'sdasdas', '1', '2017-08-21 19:19:09', '2017-08-25 01:05:31'),
(62, 86, 'sadsad', '1', '2017-08-21 19:19:09', '2017-08-25 01:05:31'),
(63, 87, 'A', '2', '2017-08-28 10:19:48', '2017-08-28 10:19:48'),
(64, 87, 'A', '8', '2017-08-28 10:19:48', '2017-08-28 10:19:48'),
(65, 87, 'B', '7', '2017-08-28 10:19:48', '2017-08-28 10:19:48'),
(66, 88, 'Second', '4', '2017-08-28 10:19:48', '2017-08-28 10:19:48'),
(67, 89, '1.1.1 Trained CSOs on education governance and policies', '1', '2017-08-28 12:50:53', '2017-08-28 12:50:53'),
(68, 89, '1.1.2 Intitiated local initiativives by youth at local level', '7', '2017-08-28 12:50:53', '2017-08-28 12:50:53'),
(69, 90, '1..2.1 Awareneness on available policies', '7', '2017-08-28 12:50:53', '2017-08-28 12:50:53'),
(70, 90, '1.2.2 Increased quality of education', '1', '2017-08-28 12:50:53', '2017-08-28 12:50:53'),
(71, 91, 'outpur1', '6', '2017-09-18 13:34:15', '2017-09-18 13:34:15');

-- --------------------------------------------------------

--
-- Table structure for table `partnerpros`
--

CREATE TABLE `partnerpros` (
  `id` int(11) NOT NULL,
  `ngo_id` int(100) NOT NULL,
  `partnerlogo` varchar(255) NOT NULL,
  `address` varchar(250) NOT NULL,
  `po_box` varchar(150) NOT NULL,
  `office_phone` varchar(250) NOT NULL,
  `office_email` varchar(150) NOT NULL,
  `office_website` varchar(150) NOT NULL,
  `person_name` varchar(150) NOT NULL,
  `person_detail` varchar(250) NOT NULL,
  `project_name` varchar(150) NOT NULL,
  `period_of_partnership` varchar(150) NOT NULL,
  `budget_of_partnership` varchar(150) NOT NULL,
  `la_registration_no` varchar(150) NOT NULL,
  `la_place` varchar(150) NOT NULL,
  `la_date` date NOT NULL,
  `la_panvat` varchar(150) NOT NULL,
  `tax_clearance` varchar(150) NOT NULL,
  `last_audited_year` varchar(150) NOT NULL,
  `affiliations_with` varchar(150) NOT NULL,
  `affiliation_date` date NOT NULL,
  `affiliation_no` varchar(150) NOT NULL,
  `social_welfare_council` varchar(150) NOT NULL,
  `networks` varchar(250) NOT NULL,
  `ex_n_endors_policy` varchar(250) NOT NULL,
  `organization_expertise` varchar(250) NOT NULL,
  `geo_coverage` varchar(250) NOT NULL,
  `district_id` varchar(250) NOT NULL,
  `projectinfo` varchar(250) NOT NULL,
  `fuding_agency` varchar(250) NOT NULL,
  `thematic_area` varchar(250) NOT NULL,
  `info_project_district` varchar(250) NOT NULL,
  `publications` varchar(250) NOT NULL,
  `narrative_description_of_ngo` varchar(250) NOT NULL,
  `staff` text NOT NULL,
  `exe_member_composition` text NOT NULL,
  `member_ethnicity` text NOT NULL,
  `employee_detail` text NOT NULL,
  `ethnicity_description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `partnerpros`
--

INSERT INTO `partnerpros` (`id`, `ngo_id`, `partnerlogo`, `address`, `po_box`, `office_phone`, `office_email`, `office_website`, `person_name`, `person_detail`, `project_name`, `period_of_partnership`, `budget_of_partnership`, `la_registration_no`, `la_place`, `la_date`, `la_panvat`, `tax_clearance`, `last_audited_year`, `affiliations_with`, `affiliation_date`, `affiliation_no`, `social_welfare_council`, `networks`, `ex_n_endors_policy`, `organization_expertise`, `geo_coverage`, `district_id`, `projectinfo`, `fuding_agency`, `thematic_area`, `info_project_district`, `publications`, `narrative_description_of_ngo`, `staff`, `exe_member_composition`, `member_ethnicity`, `employee_detail`, `ethnicity_description`, `created_at`, `updated_at`) VALUES
(6, 4, '', 'sdfs', 'fsf', 'dsdf', 'sdf', 'sd', 'asd', 'asd', '3', 'asdas', 'dassd', 'asda', 'dasdad', '2017-11-30', 'asdasd', 'asdasd', 'asd', 'adad', '2017-12-15', 'asdasd', 'asdad', 'adasd', 'asdad', 'asdasd', 'asdasd,adasdad,asdadadad', '1,15,2', 'ad', 'asdasd', 'asda', '11', 'asda', 'dadad', '', '', '', '', '', '2017-12-12 01:32:05', '2017-12-13 01:56:06'),
(7, 4, 'SamplePNGImage_100kbmb1162552077.png', 'dfgdfg', 'sdfsdfsdf', 'sdfsd', 'fsdf', 'sdfsdf', 'sdfsdfsd', 'fsdfsd', '3', 'sdfsdf', 'sdfsdf', 'sdfs', 'fsdfsd', '2017-12-07', 'sdfsd', 'fsdfsdfs', 'sddf', 'sdfsdfsf', '2017-12-14', 'sdfsfs', 'fsdf', 'sdfsdf,sfsdf', 'sfsdfsf', 'adasd,asdasd', 'asdasd', '2', 'adadad', 'asdas', 'dasdas', '2', 'asdasd,sdasdasd', 'asdad', 'a:3:{i:1;a:2:{s:4:\"name\";s:5:\"Name1\";s:11:\"designation\";s:12:\"Designation1\";}i:2;a:2:{s:4:\"name\";s:5:\"Name2\";s:11:\"designation\";s:12:\"Designation2\";}i:3;a:2:{s:4:\"name\";s:5:\"Name3\";s:11:\"designation\";s:12:\"Designation3\";}}', 'a:2:{i:1;a:3:{s:4:\"male\";s:1:\"1\";s:6:\"female\";s:1:\"2\";s:5:\"other\";s:1:\"3\";}i:2;a:3:{s:4:\"male\";s:1:\"3\";s:6:\"female\";s:1:\"2\";s:5:\"other\";s:1:\"1\";}}', 'a:8:{i:2;a:2:{s:5:\"board\";s:6:\"Dalit1\";s:7:\"general\";s:6:\"Dalit2\";}i:3;a:2:{s:5:\"board\";s:8:\"Brahman1\";s:7:\"general\";s:8:\"Brahman2\";}i:4;a:2:{s:5:\"board\";s:8:\"Chhetri1\";s:7:\"general\";s:8:\"Chhetri2\";}i:5;a:2:{s:5:\"board\";s:5:\"12121\";s:7:\"general\";s:4:\"1212\";}i:6;a:2:{s:5:\"board\";s:2:\"12\";s:7:\"general\";s:2:\"12\";}i:7;a:2:{s:5:\"board\";s:2:\"12\";s:7:\"general\";N;}i:8;a:2:{s:5:\"board\";N;s:7:\"general\";s:2:\"12\";}s:5:\"total\";a:2:{s:5:\"board\";s:6:\"121212\";s:7:\"general\";s:4:\"1212\";}}', 'a:4:{s:9:\"low_level\";a:4:{s:6:\"female\";s:4:\"1212\";s:4:\"male\";s:3:\"212\";s:5:\"other\";s:2:\"12\";s:5:\"total\";s:1:\"2\";}s:9:\"mid_level\";a:4:{s:6:\"female\";N;s:4:\"male\";N;s:5:\"other\";N;s:5:\"total\";s:5:\"12121\";}s:6:\"senior\";a:4:{s:6:\"female\";s:4:\"2121\";s:4:\"male\";s:2:\"21\";s:5:\"other\";s:3:\"212\";s:5:\"total\";s:3:\"121\";}s:5:\"total\";a:4:{s:6:\"female\";s:4:\"1212\";s:4:\"male\";s:1:\"2\";s:5:\"other\";s:3:\"212\";s:5:\"total\";s:1:\"2\";}}', 'a:8:{i:2;a:4:{s:6:\"female\";s:2:\"12\";s:4:\"male\";s:2:\"12\";s:5:\"other\";s:2:\"12\";s:5:\"total\";s:2:\"12\";}i:3;a:4:{s:6:\"female\";N;s:4:\"male\";N;s:5:\"other\";N;s:5:\"total\";N;}i:4;a:4:{s:6:\"female\";s:3:\"121\";s:4:\"male\";s:1:\"2\";s:5:\"other\";s:2:\"12\";s:5:\"total\";s:2:\"12\";}i:5;a:4:{s:6:\"female\";N;s:4:\"male\";N;s:5:\"other\";N;s:5:\"total\";N;}i:6;a:4:{s:6:\"female\";N;s:4:\"male\";s:2:\"12\";s:5:\"other\";s:2:\"12\";s:5:\"total\";s:2:\"12\";}i:7;a:4:{s:6:\"female\";N;s:4:\"male\";N;s:5:\"other\";N;s:5:\"total\";N;}i:8;a:4:{s:6:\"female\";s:1:\"2\";s:4:\"male\";N;s:5:\"other\";N;s:5:\"total\";s:2:\"12\";}s:5:\"total\";a:4:{s:6:\"female\";s:1:\"2\";s:4:\"male\";s:3:\"121\";s:5:\"other\";s:2:\"12\";s:5:\"total\";s:2:\"12\";}}', '2017-12-19 03:53:37', '2017-12-19 03:53:37');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plan`
--

CREATE TABLE `plan` (
  `id` int(11) NOT NULL,
  `project_id` int(10) DEFAULT NULL,
  `activity` varchar(100) DEFAULT NULL,
  `goal_id` int(10) DEFAULT NULL,
  `output_id` varchar(100) DEFAULT NULL,
  `indicator_id` varchar(150) NOT NULL,
  `activity_id` varchar(150) NOT NULL,
  `p_date` varchar(100) DEFAULT NULL,
  `quarter` int(10) DEFAULT NULL,
  `quarter_year` varchar(10) DEFAULT NULL,
  `imp` varchar(200) DEFAULT NULL,
  `f_person` varchar(200) DEFAULT NULL,
  `district_id` varchar(100) DEFAULT NULL,
  `vdc` varchar(100) DEFAULT NULL,
  `r_date` varchar(100) DEFAULT NULL,
  `r_revision` text,
  `implemented` varchar(100) DEFAULT NULL,
  `imp_date` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plan`
--

INSERT INTO `plan` (`id`, `project_id`, `activity`, `goal_id`, `output_id`, `indicator_id`, `activity_id`, `p_date`, `quarter`, `quarter_year`, `imp`, `f_person`, `district_id`, `vdc`, `r_date`, `r_revision`, `implemented`, `imp_date`, `created_at`, `updated_at`) VALUES
(3, 4, '4', 103, '57', '', '', '2017-11-15', 2, '2001', '4', '2342', '1,5', NULL, '2017-10-31', '234', 'Yes', '2017-11-20', '2017-11-24 04:11:24', '2017-11-24 04:11:24'),
(4, 4, '1', 103, '57', '', '', '2017-11-23', 3, '2001', '5', 'xv bnm', '2,5,6', 'vghnjm,', '2017-11-30', 'vgbnm', 'Yes', '2017-11-22', '2017-11-26 22:30:59', '2017-11-26 22:30:59'),
(5, 4, '1', 103, '57', '7', '1', '2017-11-23', 3, '2001', '3', 'xv bnm', '2,5,6', 'vghnjm,', '2017-11-30', 'vgbnm', 'Yes', '2017-11-22', '2017-11-26 22:32:28', '2017-12-13 00:44:11'),
(6, 5, '1', 107, '71', '11', '6', '2017-12-20', 4, '2002', '3', 'sdfsdf', '3,5', 'sdf', '2017-11-29', 'sdfsdf', 'Yes', '2017-12-27', '2017-12-13 00:31:35', '2017-12-13 00:43:41');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `donor_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `partners` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zone_id` int(10) UNSIGNED NOT NULL,
  `district_id` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `signed_date` date NOT NULL,
  `theme` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `theme_others` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_date` date NOT NULL,
  `d_mailing` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `d_contact` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_budget` int(11) NOT NULL,
  `quarter` int(11) NOT NULL,
  `quarter_year` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `project_code`, `project_name`, `donor_code`, `partners`, `zone_id`, `district_id`, `start_date`, `signed_date`, `theme`, `theme_others`, `end_date`, `d_mailing`, `d_contact`, `total_budget`, `quarter`, `quarter_year`, `created_at`, `updated_at`) VALUES
(3, 'pro_code_1', 'Test Purpose Project 1', 'rer3434', '4,5', 15, '7,8,10,11,36,37,39', '2015-12-09', '2015-12-10', '1', NULL, '2015-09-03', 'aaaaaaaaaa', '2222222222222', 342423434, 1, '2017', '2017-08-21 18:05:40', '2017-10-28 00:28:08'),
(4, 'pro_code_2', 'Test Purpose Project', 'DFID', '4,5', 4, '1,36,37', '1900-12-09', '2017-11-09', '3', NULL, '1900-12-13', '', '', 23232323, 4, '2017', '2017-08-21 18:06:04', '2017-10-30 00:55:15'),
(5, 'pro_code_3', 'sdssd', 'sds2323', '4,5', 7, '2,36,37', '0000-00-00', '0000-00-00', '1', NULL, '0000-00-00', 'lskjdflsdfsdfsdfasf', 'fsdfsdf', 34343434, 4, '2021', '2017-08-21 18:06:30', '2017-10-28 00:28:46'),
(6, 'pro_code_4', 'Test Purpose Projec 3', 'DFID', '4,5', 1, '1,2', '0000-00-00', '2017-10-18', '3', NULL, '0000-00-00', '', '', 123123, 1, '2015', '2017-09-02 05:15:26', '2017-10-28 00:29:35'),
(7, 'pro_code_5', 'Test Project 4', 'sdfsfd', '4', 1, '2,3', '0000-00-00', '2016-11-16', '3', NULL, '0000-00-00', '', '', 234234234, 2, '2015', '2017-09-07 04:02:35', '2017-10-28 00:29:50'),
(9, 'pro_code_6', 'Test Purpose Project 5', 'DFID', '4', 1, '2,3', '0000-00-00', '2016-08-09', '1', NULL, '0000-00-00', 'sdfsdfsdfsd', '1234234234', 123123123, 2, '2019', '2017-10-11 04:22:57', '2017-10-28 00:30:02'),
(10, 'pro_code_7', 'Test Purpose Project 7', 'DFID', '3,4', 2, '7,8', '0000-00-00', '2017-10-03', '1', NULL, '0000-00-00', 'sssssssssss', '2222222222222', 2147483647, 4, '2016', '2017-10-11 04:23:31', '2017-10-28 00:30:29'),
(11, 'pro_code_8', 'Test Purpose Project 8', 'dfdfdf', '4,5', 2, '7,8,9', '0000-00-00', '2014-12-09', '2', NULL, '0000-00-00', 'sfsfsd', '234234234', 234234234, 1, '2021', '2017-10-11 04:24:00', '2017-10-28 00:30:43'),
(12, 'pro_code_9', 'Test Purpose Project 9', 'fssd', '5', 4, '20,21', '0000-00-00', '2018-07-19', '2', NULL, '0000-00-00', 'sssssssssssdfsdf', '234234', 234234, 2, '2019', '2017-10-11 04:24:35', '2017-10-28 00:30:56'),
(15, 'pro_code_11', 'Test Purpose Project 11', 'fsdf', '4', 3, '10,11,12,13', '1900-12-22', '2017-10-10', '1', NULL, '1900-12-28', 'sfsdf', 'sfsf', 234234, 1, '2000', '2017-10-11 04:38:52', '2017-10-28 00:32:45'),
(16, 'sdfsdfsdf', 'sdfs', 'sdfsdf', '4', 1, '2,3', '2017-09-28', '2017-09-29', '2', NULL, '2017-10-02', 'sdfsdf', 'sdfsdfsdf', 34234234, 2, '2000', '2017-10-25 06:27:25', '2017-10-28 00:31:53'),
(17, 'project_code', 'project_name', 'donor_code', '3,4', 1, '3', '1900-12-22', '1900-12-29', '3', NULL, '2017-10-09', 'd_mailing', 'd_contact', 234, 4, '2000', '2017-10-25 06:28:35', '2017-10-28 00:32:19'),
(19, 'sdfsdf', 'sdfsdf', 'sdfsdf', '4', 2, '7', '2017-10-05', '2017-10-12', '3', NULL, '2017-09-26', 'sdfsdf', 'sdfsdfsdf', 23423424, 3, '2005', '2017-10-25 06:30:51', '2017-10-28 00:31:23'),
(21, 'sdfsdfsdfsdfsdfsdf', 'sdfsdfs', 'dfsdfsdf', '4', 1, '2,3', '2017-10-04', '2017-10-04', '2', NULL, '2017-10-08', 'sdfsdf', 'sdfsdfsdf', 234234234, 3, '2001', '2017-10-27 03:44:39', '2017-10-27 03:44:39');

-- --------------------------------------------------------

--
-- Table structure for table `projectstatus`
--

CREATE TABLE `projectstatus` (
  `id` int(11) NOT NULL,
  `project_code` varchar(50) NOT NULL,
  `act_type` varchar(255) DEFAULT NULL,
  `act_others` varchar(255) DEFAULT NULL,
  `out_put` varchar(255) DEFAULT NULL,
  `planned_date` date DEFAULT NULL,
  `pb_total` varchar(255) DEFAULT NULL,
  `district_id` varchar(100) NOT NULL,
  `unitQ` varchar(255) DEFAULT NULL,
  `t_target` varchar(255) DEFAULT NULL,
  `comp_before` varchar(255) DEFAULT NULL,
  `target_yr` varchar(255) DEFAULT NULL,
  `remaining` varchar(255) DEFAULT NULL,
  `p_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projectstatus`
--

INSERT INTO `projectstatus` (`id`, `project_code`, `act_type`, `act_others`, `out_put`, `planned_date`, `pb_total`, `district_id`, `unitQ`, `t_target`, `comp_before`, `target_yr`, `remaining`, `p_date`, `created_at`, `updated_at`) VALUES
(4, '13', '2,4,5', NULL, 'weqwe', '0000-00-00', '232323', '3,4', '232', '323', '3 months', '3 months', '3233', '0000-00-00', '2017-10-16 21:09:43', '2017-09-23 23:42:17'),
(5, '13', '5', NULL, 'cgfgsdf', '0000-00-00', '3231231', '2,3', '2313', '23123', '2 months', '2 months', '232', '0000-00-00', '2017-10-16 21:09:49', '2017-09-24 13:07:11'),
(6, '4', '5', NULL, 'wewe', '2017-11-08', '323', '2,4', '2323', '2323', 'eq123', 'eq123', '323', '1900-12-14', '2017-11-16 10:00:26', '2017-11-16 04:15:26'),
(7, '14', '1', NULL, 'Bsnsn', '0000-00-00', '2828', '1', '32', '33', 'Ndnd', 'Nsns', 'Ndnd', '0000-00-00', '2017-09-24 13:29:43', '2017-09-24 13:29:43');

-- --------------------------------------------------------

--
-- Table structure for table `project_documents`
--

CREATE TABLE `project_documents` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `log_frame` varchar(100) NOT NULL,
  `original_log_frame` varchar(250) NOT NULL,
  `keywords` varchar(150) NOT NULL,
  `contact_person` varchar(55) NOT NULL,
  `proposal_doc` varchar(100) NOT NULL,
  `original_proposal_doc` varchar(250) NOT NULL,
  `contract_doc` varchar(50) NOT NULL,
  `original_contract_doc` varchar(250) NOT NULL,
  `budget_doc` varchar(150) NOT NULL,
  `original_budget_doc` varchar(250) NOT NULL,
  `quarter` int(11) NOT NULL,
  `quarter_year` year(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_documents`
--

INSERT INTO `project_documents` (`id`, `project_id`, `log_frame`, `original_log_frame`, `keywords`, `contact_person`, `proposal_doc`, `original_proposal_doc`, `contract_doc`, `original_contract_doc`, `budget_doc`, `original_budget_doc`, `quarter`, `quarter_year`, `created_at`, `updated_at`) VALUES
(58, 3, 'D:\\xampp\\tmp\\phpDB06.tmp', '', 'asdad', 'asdadad', 'Sample-doc-file-200kb2079169170.doc', 'Sample-doc-file-200kb.doc', 'Sample-doc-file-2000kb1990175133.doc', 'Sample-doc-file-2000kb.doc', 'SampleXLSFile_19kb1523057648.xls', 'SampleXLSFile_19kb.xls', 3, 2018, '2017-08-31 05:18:07', '2017-11-17 03:34:18'),
(59, 7, 'D:\\xampp\\tmp\\phpE721.tmp', '', 'sdfsdfasdasd', 'sdfsdf', 'gre_research_validity_data1932501731.pdf', 'gre_research_validity_data.pdf', 'SampleXLSFile_19kb351525851.xls', 'SampleXLSFile_19kb.xls', 'SampleXLSFile_212kb360611437.xls', 'SampleXLSFile_212kb.xls', 3, 2029, '2017-09-14 05:39:05', '2017-11-16 23:59:11'),
(60, 6, 'log_frame', '', 'keywords', 'contact_person', 'SampleDOCFile---Copy23392.doc', 'SampleDOCFile---Copy.doc', 'SampleDOCFile22553.doc', 'SampleDOCFile.doc', 'SampleXLSFile_212kb26336.xls', 'SampleXLSFile_212kb.xls', 1, 2001, '2017-09-14 23:13:27', '2017-12-15 00:50:48'),
(61, 6, 'SampleDOCFile_500kb26847.doc', 'SampleDOCFile_500kb.doc', 'sdfsdfsfsdfdfg', 'sdfsdfsdfs', 'SampleXLSFile_19kb581874952.xls', 'SampleXLSFile_19kb.xls', 'SampleDOCFile_200kb19144.doc', 'SampleDOCFile_200kb.doc', 'SFCG-feedback30561.xlsx', 'SFCG-feedback.xlsx', 2, 2021, '2017-09-19 02:13:37', '2017-11-16 02:16:28');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `question_set_id` int(11) NOT NULL,
  `question_set_name` varchar(100) NOT NULL,
  `answer_type` varchar(50) NOT NULL,
  `answer_option` varchar(25) NOT NULL,
  `question` varchar(250) CHARACTER SET ucs2 COLLATE ucs2_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question_set_id`, `question_set_name`, `answer_type`, `answer_option`, `question`, `created_at`, `updated_at`) VALUES
(4, 1, 'Pre Test', 'text', 'multiple', 'द्वन्द व्यवस्थापन तथा शान्ति निर्माणका विषयमा तपाईमा कतिको सीप दक्षता कस्तो रहेको छ?', '2017-08-08 23:44:17', '2017-11-17 04:24:27'),
(7, 1, 'Pre Test', 'tick', 'single', 'यो तालिमलाई निम्न कुराहरुमा कसरी मुल्याकंन गर्नु हुन्छ (१-एकदमै कम, २-कम, ३-ठीकै, ४- धेरै, ५-एकदमै धेरै)', '2017-08-09 06:28:03', '2017-08-09 02:25:10'),
(8, 2, 'Post Test', 'tick', 'multiple', 'द्वन्द्वको प्रभावकारी समाधान निम्न तरिकाबाट गर्न सकिन्छ :', '2017-08-09 02:34:57', '2017-08-09 02:34:57');

-- --------------------------------------------------------

--
-- Table structure for table `questionset_benef`
--

CREATE TABLE `questionset_benef` (
  `id` int(11) NOT NULL,
  `question_set_id` int(11) NOT NULL,
  `question_set_name` varchar(50) NOT NULL,
  `benef_name` varchar(150) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questionset_benef`
--

INSERT INTO `questionset_benef` (`id`, `question_set_id`, `question_set_name`, `benef_name`, `created_at`, `updated_at`) VALUES
(4, 3, 'third test', 'Ram', '2017-08-16 01:18:20', '2017-08-16 01:18:20'),
(5, 3, 'third test', 'John', '2017-08-16 01:19:56', '2017-08-16 01:19:56'),
(6, 3, 'third test', 'Yojan', '2017-08-16 01:20:37', '2017-08-16 01:20:37'),
(7, 3, 'third test', 'Yojan', '2017-08-16 01:21:11', '2017-08-16 01:21:11'),
(8, 1, 'Pre Test', 'Ram', '2017-08-16 01:28:25', '2017-08-16 01:28:25'),
(9, 2, 'Post Test', 'Ram', '2017-08-16 01:29:26', '2017-08-16 01:29:26'),
(10, 2, 'Post Test', 'Ram', '2017-08-16 01:29:26', '2017-08-16 01:29:26'),
(11, 1, 'Pre Test', 'Ram', '2017-08-16 01:32:01', '2017-08-16 01:32:01'),
(12, 3, 'third test', 'Yojan', '2017-08-16 01:33:04', '2017-08-16 01:33:04'),
(13, 1, 'Pre Test', 'Ram', '2017-08-24 19:00:06', '2017-08-24 19:00:06');

-- --------------------------------------------------------

--
-- Table structure for table `quotelab`
--

CREATE TABLE `quotelab` (
  `id` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `activity` int(11) NOT NULL,
  `project_code` varchar(50) NOT NULL,
  `theme` varchar(100) NOT NULL,
  `beneficiar` varchar(50) NOT NULL,
  `location` varchar(150) NOT NULL,
  `occupation` varchar(50) NOT NULL,
  `education` varchar(50) NOT NULL,
  `group_individual` varchar(20) NOT NULL,
  `main_quote` varchar(200) NOT NULL,
  `quarter` int(11) NOT NULL,
  `quarter_year` year(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quotelab`
--

INSERT INTO `quotelab` (`id`, `type`, `activity`, `project_code`, `theme`, `beneficiar`, `location`, `occupation`, `education`, `group_individual`, `main_quote`, `quarter`, `quarter_year`, `created_at`, `updated_at`) VALUES
(1, 'Case Studies', 1, '5', 'Gender Base', '12', 'sdf', 'prog', 'sfsdf', 'Group', 'quote', 2, 2020, '2017-07-25 02:01:07', '2017-12-14 04:41:33'),
(2, 'Quotes', 1, '3', 'Violence', '10', 'sf', 'sdf', 'sdf', 'Group', 'quote', 4, 2018, '2017-07-25 02:30:34', '2017-12-14 04:41:04'),
(3, 'Quotes', 1, '4', 'Education', '10', 'zxfsdf', 'sdfsdf', 'sdfsdf', 'Individual', 'voilence based', 3, 2018, '2017-07-25 06:28:05', '2017-12-14 04:40:58'),
(4, 'Quotes', 1, '3', 'Violence', '10', 'location', 'occupation', 'education', 'Group', 'lsdkjfldf', 4, 2021, '2017-08-17 05:06:17', '2017-12-14 04:40:54'),
(5, 'Case Studies', 2, '4', 'Education', '10', 'slkdj', 'ljgslkj', 'lgjsl', 'Individual', 'lsdkjfsdlf', 1, 2006, '2017-08-21 19:24:21', '2017-12-14 04:40:45'),
(6, 'Quotes', 4, '5', 'Gender Base', '10', 'lsdkj', 'lkjl', 'jlfdsjl', 'Group', 'main quote', 2, 2000, '2017-08-22 13:10:34', '2017-12-14 04:40:37');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `type` varchar(25) NOT NULL,
  `draft_date` date NOT NULL,
  `draft_by` varchar(60) NOT NULL,
  `project_code` varchar(25) NOT NULL,
  `comment` text NOT NULL,
  `web_link` varchar(200) NOT NULL,
  `final_date` date NOT NULL,
  `approve_by` varchar(60) NOT NULL,
  `major_finding` text NOT NULL,
  `keywords` varchar(200) NOT NULL,
  `methodology` varchar(200) NOT NULL,
  `recommendation` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `title`, `type`, `draft_date`, `draft_by`, `project_code`, `comment`, `web_link`, `final_date`, `approve_by`, `major_finding`, `keywords`, `methodology`, `recommendation`, `created_at`, `updated_at`) VALUES
(3, 'ksdjfhk', 'Project Completion Report', '2017-11-28', 'sldkfjl', '4', 's,dfsldkfjl', 'jlksdjfslkjl', '2017-12-06', 'sdlkfjslfkj', 'jfldsjlslkdfjdsf', 'llfdsjflsdjf', 'sdlkjfsdlfjl', 'jfldsfdsf', '2017-08-21 19:13:46', '2017-11-09 03:34:14');

-- --------------------------------------------------------

--
-- Table structure for table `research`
--

CREATE TABLE `research` (
  `id` int(11) NOT NULL,
  `research_name` varchar(200) NOT NULL,
  `re_type` varchar(255) DEFAULT NULL,
  `project_id` int(11) NOT NULL,
  `document` varchar(255) DEFAULT NULL,
  `original_document` varchar(250) NOT NULL,
  `m_findings` varchar(255) DEFAULT NULL,
  `recom` varchar(255) DEFAULT NULL,
  `others` varchar(255) DEFAULT NULL,
  `obj` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `publish_date` date DEFAULT NULL,
  `c_type` varchar(255) DEFAULT NULL,
  `c_date` varchar(200) DEFAULT NULL,
  `target_aud` varchar(255) DEFAULT NULL,
  `sh_intro` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `research`
--

INSERT INTO `research` (`id`, `research_name`, `re_type`, `project_id`, `document`, `original_document`, `m_findings`, `recom`, `others`, `obj`, `location`, `publish_date`, `c_type`, `c_date`, `target_aud`, `sh_intro`, `created_at`, `updated_at`) VALUES
(5, 'xcvbnm,', 'Baseline', 3, 'chapter2104219263.pdf', 'chapter2.pdf', 'bnm', 'bnm', 'adas', 'dasdas', 'dasdas', '2017-11-14', 'sdfsdf', '2017-11-08', 'sdfsdf', 'sdfsdfsf', '2017-11-17 04:03:34', '2017-11-17 04:03:34');

-- --------------------------------------------------------

--
-- Table structure for table `roster`
--

CREATE TABLE `roster` (
  `id` int(11) NOT NULL,
  `fullname` varchar(150) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `p_work` varchar(255) DEFAULT NULL,
  `p_perf` varchar(255) DEFAULT NULL,
  `expertise_id` varchar(255) DEFAULT NULL,
  `resume` varchar(255) DEFAULT NULL,
  `panvat` varchar(250) NOT NULL,
  `otherdoc` varchar(250) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roster`
--

INSERT INTO `roster` (`id`, `fullname`, `email`, `p_work`, `p_perf`, `expertise_id`, `resume`, `panvat`, `otherdoc`, `contact`, `created_at`, `updated_at`) VALUES
(10, 'Samyak Shrestha', 'dsdsd@gmail.com', 'Yes', 'Average', '2', 'test.doc', '19417538_1065595510207945_2882812554869678798_o.jpg', '19620163_1073987752702054_4229994609815444016_o (1).jpg', '434234234', '2017-11-16 11:55:41', '2017-11-16 06:10:41');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('ICDovg71pvWIiVW5IVYJLj79YGHlL6yvaDSlnkxU', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiSjdhRGZPMkFMemNSOU45NW9rV1p0UEF4ZVJ5aExSSFMzamNmV0x3aiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly9sb2NhbGhvc3Qvc3VzYW4vcHVibGljL2hvbWUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1499749691),
('Q0tApVowE5hfFMMc3ywCuU6kAxCqnOESF6Q9KiJ3', 1, '192.168.0.23', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0', 'ZXlKcGRpSTZJbmxyZWxCek9VcDRSRFExYVdSS1RsbzFTV052YzJjOVBTSXNJblpoYkhWbElqb2lNVTlDVG5VMWFtRkNkVkJNV1ZZcllVUkZZV2RaZVU5SVUxZExVamxQU25wUGIzRXJXazk0WVROb2FqSjJSWGhGV0RFeU5VNTZkV2RWYjFWUE1Gd3ZLemRrVURsamNXVjBNM1E1UkU0MlIwOVBhMlprV25ZNVJXMVhOV1EwUWxKQ09XcG1Ra05zUzJSRk5VdFZhbTAxWkhkTWFFUnRaRlF6YzBJMVVFVjFSMk5VVmpKMFRrRjNVa3NyVkVKRE1sZHFSWGcyVVdKbVJqUndNMnd6TUVKNlJFUjNOWHBSZDJkalJXeHRLMlF3VFhoeU1UWXhjRGx4VDJwSFVqZEtXR2xUY25rNE5YSnJTVTUwVGxSWlZWcEdWak00WWxWWWEwdzBNelJZWTBZNVZrZzVVek5PV0RnM1hDOXNTWEpFTVZ3dmVISlNhWGx3Y25sTWFFbHNkWHByUkhSelVIRjBUelozWTBaQ04zSTJRVWxXTUUxTE1XMVNWMlpaYjNkRk9IRnpkSGxRYmtSYUsxbExjM1JDV2xrck9VMXdiMFZFUzJSaVRGd3ZjMmhQWkVWSVhDOTBkbVJDWVU0MVUxTTRkRUZVWkZkV1RsTjVWRzltZDFKamNGVlRlVzByTWxGbVJEVm9iVlE0TlVWM1FrVlJjRkZWYzNkd2VuQjRZemhyYjNCS2QySklNM1JHWjBKa1YwaG9hMUZZYlZwTmJqaG1NRU1yVkhNeWVVMHJkMFExYUVacWRHOVVPRU56U0hWWGFESmtORWRXZGxVeVNEaEphak4yYlV0cGJEaG9hbk41UkRaSlZGTktaVEpUZVRBd1hDOUdSWG8wUTBsUGEyWTFURU01ZFdOeVZFWldOazQyWTNCY0wxZDVhMlJuT1V0bVlsSk1aM1p5YnpoeVYyZE5aMnREYnpabUlpd2liV0ZqSWpvaU9HWmtNbUppTkRoallUaG1aalU1WTJVMU1EQmhPRGsxTkRNMU1XWmtaalUxTWpOaU5qUXlNamMwT1RJM1pEYzNNakl6TnpRME5XWTFNelF4T1RJM1pTSjk=', 1499747864);

-- --------------------------------------------------------

--
-- Table structure for table `sgrant`
--

CREATE TABLE `sgrant` (
  `id` int(11) NOT NULL,
  `group_in` varchar(255) DEFAULT NULL,
  `benef_id` varchar(50) NOT NULL,
  `amount` int(35) DEFAULT NULL,
  `n_benef` int(35) DEFAULT NULL,
  `n_project` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `g_date` date DEFAULT NULL,
  `i_benef` int(35) DEFAULT NULL,
  `project_id` int(11) NOT NULL,
  `district_id` int(11) DEFAULT NULL,
  `vdc_or_munciplity` varchar(100) DEFAULT NULL,
  `ward_no` varchar(50) DEFAULT NULL,
  `quarter_year` year(4) NOT NULL,
  `quarter` int(11) NOT NULL,
  `goal_id` int(11) NOT NULL,
  `indicator_id` varchar(100) NOT NULL,
  `output_id` varchar(100) NOT NULL,
  `activity_id` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sgrant`
--

INSERT INTO `sgrant` (`id`, `group_in`, `benef_id`, `amount`, `n_benef`, `n_project`, `status`, `g_date`, `i_benef`, `project_id`, `district_id`, `vdc_or_munciplity`, `ward_no`, `quarter_year`, `quarter`, `goal_id`, `indicator_id`, `output_id`, `activity_id`, `created_at`, `updated_at`) VALUES
(6, 'Group', '10,18', 123123, 123, 'sdfsdf', 'sdfsdf', '2017-11-15', 23, 6, NULL, NULL, NULL, 2002, 2, 105, '9', '65,66', '8,4', '2017-11-17 09:51:36', '2017-11-17 04:06:36'),
(7, 'Group', '18,28', 213123123, 123, 'vbnm', 'xcvbnm', '2017-11-08', 12313, 3, NULL, NULL, NULL, 2018, 4, 103, '7,8', '56,57', '1', '2017-11-17 04:06:21', '2017-11-17 04:06:21'),
(8, 'Individual', '11,12', 23123123, 123123, 'sdfsdfsdf', 'sdfsdf', '2017-12-07', 234234, 4, 4, 'sdfsdf', 'sdfsdf', 2002, 2, 103, '7,8', '57,58', '1', '2017-12-13 07:19:59', '2017-12-13 01:34:59'),
(9, 'Individual', '11,12,22,97', 2313123, 12313, 'sdfsdf', 'sfdsdf', '2017-12-08', 123123, 3, 2, 'sdfs', 'dfsfsd', 2001, 4, 103, '7,8', '56', '1', '2017-12-13 07:04:11', '2017-12-13 01:19:11');

-- --------------------------------------------------------

--
-- Table structure for table `sip`
--

CREATE TABLE `sip` (
  `id` int(11) NOT NULL,
  `project_code` varchar(50) NOT NULL,
  `act_code` int(20) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `act_type` varchar(255) DEFAULT NULL,
  `act_others` varchar(255) DEFAULT NULL,
  `out_put` varchar(255) DEFAULT NULL,
  `planned_date` date DEFAULT NULL,
  `pb_type` varchar(255) DEFAULT NULL,
  `pb_travel` varchar(255) DEFAULT NULL,
  `pb_accom` varchar(255) DEFAULT NULL,
  `pb_program` varchar(255) DEFAULT NULL,
  `pb_total` varchar(255) DEFAULT NULL,
  `i_partners` varchar(255) DEFAULT NULL,
  `unitQ` varchar(255) DEFAULT NULL,
  `t_target` varchar(255) DEFAULT NULL,
  `comp_before` varchar(255) DEFAULT NULL,
  `target_yr` varchar(255) DEFAULT NULL,
  `remaining` varchar(255) DEFAULT NULL,
  `p_date` date DEFAULT NULL,
  `n_act` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sip`
--

INSERT INTO `sip` (`id`, `project_code`, `act_code`, `name`, `act_type`, `act_others`, `out_put`, `planned_date`, `pb_type`, `pb_travel`, `pb_accom`, `pb_program`, `pb_total`, `i_partners`, `unitQ`, `t_target`, `comp_before`, `target_yr`, `remaining`, `p_date`, `n_act`, `created_at`, `updated_at`) VALUES
(3, '3', 0, 'Dasdad', '2,8', NULL, 'dsadasd', '2017-11-22', NULL, '232', '32', '3232', '3496', 'dasd,dsadada', 'sdasd', 'sdad', 'sdad', 'sdad', 'dsada', NULL, 'dasdasd', '2017-11-08 10:59:40', '2017-11-08 05:14:40');

-- --------------------------------------------------------

--
-- Table structure for table `sips`
--

CREATE TABLE `sips` (
  `id` int(11) NOT NULL,
  `activity_code` int(11) NOT NULL,
  `name_of_activity` varchar(100) NOT NULL,
  `activity_id` varchar(50) NOT NULL,
  `activity_other` varchar(50) DEFAULT NULL,
  `main_objective` varchar(200) NOT NULL,
  `major_content_act` varchar(200) NOT NULL,
  `indicator_activity` varchar(250) NOT NULL,
  `indicator` varchar(50) DEFAULT NULL,
  `major_result_outcome` varchar(250) NOT NULL,
  `pb_travel` varchar(100) NOT NULL,
  `pb_accom` varchar(100) NOT NULL,
  `pb_program` varchar(100) NOT NULL,
  `pb_total` varchar(100) NOT NULL,
  `implemented_date` date NOT NULL,
  `implemented_area` varchar(250) NOT NULL,
  `caste` text NOT NULL,
  `professional` text NOT NULL,
  `age_group` text NOT NULL,
  `quote_part_name` varchar(50) NOT NULL,
  `quote_part_profession` varchar(250) NOT NULL,
  `quote_part_organization` varchar(250) NOT NULL,
  `quote_part_address` varchar(250) NOT NULL,
  `part_quotes` varchar(250) NOT NULL,
  `major_learn_act` varchar(100) NOT NULL,
  `followup_action_plan_what` varchar(150) NOT NULL,
  `followup_action_plan_when` varchar(200) NOT NULL,
  `followup_action_plan_where` varchar(200) NOT NULL,
  `followup_action_plan_who` varchar(200) NOT NULL,
  `mne_tools` varchar(250) NOT NULL,
  `yn_survey` varchar(250) NOT NULL,
  `fut_mon_outcome_put_indi` varchar(250) NOT NULL,
  `fut_mon_outcome_put_indi_other` varchar(100) DEFAULT NULL,
  `participant_exp_planned` text NOT NULL,
  `participant_exp_actual` text NOT NULL,
  `challenges` varchar(100) NOT NULL,
  `lesson_learned` varchar(100) NOT NULL,
  `others` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sips`
--

INSERT INTO `sips` (`id`, `activity_code`, `name_of_activity`, `activity_id`, `activity_other`, `main_objective`, `major_content_act`, `indicator_activity`, `indicator`, `major_result_outcome`, `pb_travel`, `pb_accom`, `pb_program`, `pb_total`, `implemented_date`, `implemented_area`, `caste`, `professional`, `age_group`, `quote_part_name`, `quote_part_profession`, `quote_part_organization`, `quote_part_address`, `part_quotes`, `major_learn_act`, `followup_action_plan_what`, `followup_action_plan_when`, `followup_action_plan_where`, `followup_action_plan_who`, `mne_tools`, `yn_survey`, `fut_mon_outcome_put_indi`, `fut_mon_outcome_put_indi_other`, `participant_exp_planned`, `participant_exp_actual`, `challenges`, `lesson_learned`, `others`, `created_at`, `updated_at`) VALUES
(12, 24, 'sd11212asdasd', '6,9,11', NULL, 'asd', 'asdasd', 'outcome', 'asdasdas', 'asd,asdasdasdasd', '', '', '', '', '2017-11-28', 'asd', 'a:9:{s:13:\"Madhesi/Terai\";a:3:{s:6:\"female\";s:3:\"sad\";s:4:\"male\";s:6:\"asdasd\";s:8:\"mf_total\";s:3:\"asd\";}s:5:\"Dalit\";a:3:{s:6:\"female\";s:3:\"asd\";s:4:\"male\";N;s:8:\"mf_total\";N;}s:6:\"Muslim\";a:3:{s:6:\"female\";s:3:\"asd\";s:4:\"male\";N;s:8:\"mf_total\";N;}s:5:\"Tharu\";a:3:{s:6:\"female\";N;s:4:\"male\";N;s:8:\"mf_total\";N;}s:12:\"Disadvantage\";a:3:{s:6:\"female\";N;s:4:\"male\";s:2:\"sd\";s:8:\"mf_total\";N;}s:15:\"Brahmin/Chhetri\";a:3:{s:6:\"female\";N;s:4:\"male\";N;s:8:\"mf_total\";N;}s:10:\"Discussion\";a:3:{s:6:\"female\";s:4:\"dasd\";s:4:\"male\";N;s:8:\"mf_total\";N;}s:6:\"Others\";a:3:{s:6:\"female\";N;s:4:\"male\";N;s:8:\"mf_total\";N;}s:5:\"Total\";a:3:{s:6:\"female\";s:3:\"asd\";s:4:\"male\";s:5:\"asdas\";s:8:\"mf_total\";s:1:\"d\";}}', 'a:11:{s:13:\"Madhesi/Terai\";a:3:{s:6:\"female\";s:4:\"asda\";s:4:\"male\";s:4:\"sdas\";s:8:\"mf_total\";s:4:\"dasd\";}s:13:\"Govt official\";a:3:{s:6:\"female\";s:2:\"12\";s:4:\"male\";s:3:\"121\";s:8:\"mf_total\";s:3:\"212\";}s:13:\"Local leaders\";a:3:{s:6:\"female\";N;s:4:\"male\";N;s:8:\"mf_total\";N;}s:13:\"Youth leaders\";a:3:{s:6:\"female\";N;s:4:\"male\";N;s:8:\"mf_total\";N;}s:13:\"Media persons\";a:3:{s:6:\"female\";N;s:4:\"male\";N;s:8:\"mf_total\";N;}s:17:\"Civil society/NGO\";a:3:{s:6:\"female\";N;s:4:\"male\";N;s:8:\"mf_total\";N;}s:8:\"Security\";a:3:{s:6:\"female\";N;s:4:\"male\";N;s:8:\"mf_total\";N;}s:13:\"Court/Lawyers\";a:3:{s:6:\"female\";s:6:\"asdasd\";s:4:\"male\";N;s:8:\"mf_total\";N;}s:22:\"Activists/human rights\";a:3:{s:6:\"female\";N;s:4:\"male\";N;s:8:\"mf_total\";N;}s:6:\"Others\";a:3:{s:6:\"female\";N;s:4:\"male\";N;s:8:\"mf_total\";N;}s:5:\"Total\";a:3:{s:6:\"female\";s:3:\"asd\";s:4:\"male\";s:5:\"asdas\";s:8:\"mf_total\";s:4:\"dasd\";}}', 'a:5:{s:8:\"Below 15\";a:3:{s:6:\"female\";s:6:\"asdasd\";s:4:\"male\";N;s:8:\"mf_total\";s:8:\"adasdass\";}s:5:\"15-29\";a:3:{s:6:\"female\";s:2:\"12\";s:4:\"male\";s:4:\"1212\";s:8:\"mf_total\";s:2:\"12\";}s:5:\"30-45\";a:3:{s:6:\"female\";N;s:4:\"male\";N;s:8:\"mf_total\";N;}s:8:\"45-Above\";a:3:{s:6:\"female\";N;s:4:\"male\";N;s:8:\"mf_total\";N;}s:5:\"Total\";a:3:{s:6:\"female\";s:7:\"dasdasd\";s:4:\"male\";N;s:8:\"mf_total\";s:3:\"das\";}}', 'asdas,asdas', 'das,dasdads', 'asdasdd,asd', 'dasd,asd', 'dasd,asd', 'asd,asdasdasdad,asdasdasd', 'asd,asdas', 'asdasd,das', 'sdasd,dasdasd', 'dsad,dasdasd', 'feedback_form,distribution_list,discussion,Others', 'no', 'follow_up_survey,Success_change_story,participatory_mapping_survey,final_evaluation', NULL, 'a:5:{s:6:\"Travel\";s:2:\"12\";s:13:\"Acco/Per-diem\";s:2:\"21\";s:20:\"Program Exppenditure\";s:2:\"12\";s:6:\"Others\";s:2:\"12\";s:5:\"Total\";s:4:\"1212\";}', 'a:5:{s:6:\"Travel\";s:1:\"2\";s:13:\"Acco/Per-diem\";s:4:\"1212\";s:20:\"Program Exppenditure\";N;s:6:\"Others\";s:4:\"2121\";s:5:\"Total\";s:4:\"1212\";}', 'asdas', 'dasd', 'asd', '2017-11-28 06:00:00', '2017-12-12 05:44:03'),
(13, 23, 'sdfsdf', '1,2,7,Other', 'adadad', 'sfsdf', 'sdf', 'outcome', 'adsasd', 'asdasd', '1212', '1212', '12', '2436', '2017-12-08', 'sdfsdf', 'a:9:{s:13:\"Madhesi/Terai\";a:3:{s:6:\"female\";s:4:\"1212\";s:4:\"male\";s:3:\"121\";s:8:\"mf_total\";s:4:\"1224\";}s:5:\"Dalit\";a:3:{s:6:\"female\";s:1:\"2\";s:4:\"male\";s:2:\"12\";s:8:\"mf_total\";s:2:\"14\";}s:6:\"Muslim\";a:3:{s:6:\"female\";s:2:\"12\";s:4:\"male\";s:2:\"12\";s:8:\"mf_total\";s:2:\"24\";}s:5:\"Tharu\";a:3:{s:6:\"female\";s:3:\"122\";s:4:\"male\";N;s:8:\"mf_total\";s:3:\"122\";}s:12:\"Disadvantage\";a:3:{s:6:\"female\";s:2:\"11\";s:4:\"male\";s:1:\"1\";s:8:\"mf_total\";s:1:\"2\";}s:15:\"Brahmin/Chhetri\";a:3:{s:6:\"female\";s:2:\"12\";s:4:\"male\";s:3:\"212\";s:8:\"mf_total\";s:3:\"224\";}s:10:\"Discussion\";a:3:{s:6:\"female\";s:2:\"21\";s:4:\"male\";s:3:\"121\";s:8:\"mf_total\";s:3:\"123\";}s:6:\"Others\";a:3:{s:6:\"female\";s:1:\"2\";s:4:\"male\";s:2:\"12\";s:8:\"mf_total\";s:2:\"14\";}s:5:\"Total\";a:3:{s:6:\"female\";s:4:\"1394\";s:4:\"male\";s:3:\"491\";s:8:\"mf_total\";s:4:\"1747\";}}', 'a:11:{s:13:\"Madhesi/Terai\";a:3:{s:6:\"female\";s:4:\"1212\";s:4:\"male\";s:3:\"121\";s:8:\"mf_total\";s:4:\"1224\";}s:13:\"Govt official\";a:3:{s:6:\"female\";s:3:\"212\";s:4:\"male\";N;s:8:\"mf_total\";s:3:\"212\";}s:13:\"Local leaders\";a:3:{s:6:\"female\";s:2:\"21\";s:4:\"male\";N;s:8:\"mf_total\";s:2:\"21\";}s:13:\"Youth leaders\";a:3:{s:6:\"female\";N;s:4:\"male\";s:3:\"121\";s:8:\"mf_total\";s:2:\"12\";}s:13:\"Media persons\";a:3:{s:6:\"female\";N;s:4:\"male\";s:2:\"12\";s:8:\"mf_total\";s:2:\"12\";}s:17:\"Civil society/NGO\";a:3:{s:6:\"female\";N;s:4:\"male\";s:2:\"12\";s:8:\"mf_total\";s:2:\"12\";}s:8:\"Security\";a:3:{s:6:\"female\";N;s:4:\"male\";s:2:\"12\";s:8:\"mf_total\";s:2:\"12\";}s:13:\"Court/Lawyers\";a:3:{s:6:\"female\";N;s:4:\"male\";N;s:8:\"mf_total\";N;}s:22:\"Activists/human rights\";a:3:{s:6:\"female\";s:2:\"12\";s:4:\"male\";s:3:\"212\";s:8:\"mf_total\";s:3:\"224\";}s:6:\"Others\";a:3:{s:6:\"female\";N;s:4:\"male\";N;s:8:\"mf_total\";N;}s:5:\"Total\";a:3:{s:6:\"female\";s:4:\"1457\";s:4:\"male\";s:3:\"490\";s:8:\"mf_total\";s:4:\"1729\";}}', 'a:5:{s:8:\"Below 15\";a:3:{s:6:\"female\";s:4:\"1212\";s:4:\"male\";s:4:\"1212\";s:8:\"mf_total\";s:4:\"2424\";}s:5:\"15-29\";a:3:{s:6:\"female\";s:4:\"1212\";s:4:\"male\";s:1:\"2\";s:8:\"mf_total\";s:4:\"2424\";}s:5:\"30-45\";a:3:{s:6:\"female\";s:2:\"12\";s:4:\"male\";s:3:\"121\";s:8:\"mf_total\";s:4:\"2424\";}s:8:\"45-Above\";a:3:{s:6:\"female\";s:2:\"21\";s:4:\"male\";s:3:\"212\";s:8:\"mf_total\";s:4:\"2424\";}s:5:\"Total\";a:3:{s:6:\"female\";s:3:\"121\";s:4:\"male\";s:3:\"212\";s:8:\"mf_total\";s:4:\"2424\";}}', 'dczcz', 'cz', 'xzcxz', 'czxcc', 'czxcc', 'zxczxc', 'xzczx', 'czxc', 'zxc', 'zxc', 'pre_pro_test,feedback_form', 'yes', 'follow_up_survey,mini_survey', NULL, 'a:5:{s:6:\"Travel\";s:6:\"121212\";s:13:\"Acco/Per-diem\";s:6:\"212121\";s:20:\"Program Exppenditure\";s:5:\"21212\";s:6:\"Others\";s:7:\"2121212\";s:5:\"Total\";s:7:\"1211212\";}', 'a:5:{s:6:\"Travel\";s:3:\"121\";s:13:\"Acco/Per-diem\";s:4:\"1212\";s:20:\"Program Exppenditure\";s:4:\"2121\";s:6:\"Others\";s:3:\"122\";s:5:\"Total\";s:7:\"1212121\";}', 'sc', 'dsdasda', 'sdasdasd', '2017-12-12 06:05:13', '2017-12-12 06:05:57');

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

CREATE TABLE `staffs` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(300) NOT NULL,
  `contact_no` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `joined_date` date NOT NULL,
  `designation` varchar(100) NOT NULL,
  `designation_level` varchar(100) NOT NULL,
  `member_type` varchar(100) NOT NULL,
  `project_id` int(10) UNSIGNED NOT NULL,
  `gender` varchar(50) NOT NULL,
  `base` varchar(50) NOT NULL,
  `caste_id` varchar(10) NOT NULL,
  `staff_photo` varchar(250) NOT NULL,
  `original_staff_photo` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staffs`
--

INSERT INTO `staffs` (`id`, `name`, `address`, `contact_no`, `email`, `joined_date`, `designation`, `designation_level`, `member_type`, `project_id`, `gender`, `base`, `caste_id`, `staff_photo`, `original_staff_photo`, `created_at`, `updated_at`) VALUES
(5, 'Hari', 'dfdsfsdf', '232434234', 'dfsdfs@gmail.com', '2017-11-09', 'Assitant', 'mid_level_positions', 'board_member', 4, 'Female', 'Kathmandu', '2', '', '', '2017-08-21 18:07:12', '2017-11-09 03:28:51'),
(6, 'Ram', 'asd', '123123', 'asdasd@lidf.com', '0000-00-00', 'Trainee', 'senior_level_positions', 'general_member', 5, 'Male', 'Kathmandu', '4', '', '', '2017-08-31 07:24:21', '2017-09-11 06:11:54'),
(7, 'Shyam', 'aadrresssss', 'sdfsdf', 'sdfdslk@Klsdf.com', '0000-00-00', 'Manager', 'low_level_positions', 'general_member', 4, 'Female', 'Regional Office', '5', '', '', '2017-09-11 02:04:13', '2017-09-11 06:12:42'),
(8, 'Sita', 'sfsdfsdf', '243234234', 'sfsd@kdf.acom', '0000-00-00', 'President', 'senior_level_positions', 'board_member', 6, 'Male', 'Kathmandu', '3', '', '', '2017-09-11 02:35:33', '2017-09-11 06:13:11'),
(9, 'Gita', 'sdfsfsdf', 'sdfsdf', 'sdkfsdlj@lkdf.acom', '0000-00-00', 'Vice President', 'senior_level_positions', 'board_member', 7, 'Male', 'Regional Office', '6', '', '', '2017-09-11 02:36:09', '2017-09-11 06:13:43'),
(10, 'sdfsdfsdfsdfsdfsfsf', 'dsfsdf', '234234', 'sdfsdfs@sldkf.com', '0000-00-00', 'sdfsfs', 'low_level_positions', 'general_member', 6, 'Male', 'Regional Office', '2', 'eddecf64fc375b7329715b73599583e976c991a6cde4f4eee2f11aa28f7f55d11000596912.jpg', 'eddecf64fc375b7329715b73599583e976c991a6cde4f4eee2f11aa28f7f55d1.jpg', '2017-10-05 01:37:05', '2017-10-05 01:53:40'),
(22, 'Accountable Name', '', '', '', '0000-00-00', 'Accountable Designation', '', '', 0, '', '', '', '', '', '2017-12-18 01:43:58', '2017-12-18 01:43:58'),
(23, 'Approver Name', '', '', '', '0000-00-00', 'ApproverDesignation', '', '', 0, '', '', '', '', '', '2017-12-18 01:43:58', '2017-12-18 01:43:58'),
(24, 'sdfsdfs', '', '', '', '0000-00-00', 'fsfsfsfsf', '', '', 3, '', '', '', '', '', '2017-12-18 05:30:35', '2017-12-18 05:30:35');

-- --------------------------------------------------------

--
-- Table structure for table `theme`
--

CREATE TABLE `theme` (
  `id` int(11) NOT NULL,
  `name` varchar(150) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `theme`
--

INSERT INTO `theme` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Women', '2017-09-24 02:58:33', '2017-09-24 09:58:33'),
(2, 'Children', '2017-09-24 02:59:11', '2017-09-24 09:59:11'),
(3, 'Senior Citizens', '2017-09-24 02:59:25', '2017-09-24 09:59:25'),
(5, 'Disabled People', '2017-09-24 10:00:23', '2017-09-24 10:00:23'),
(6, 'Education', '2017-09-24 10:00:36', '2017-09-24 10:00:36'),
(7, 'Environment', '2017-09-24 10:01:53', '2017-09-24 10:01:53'),
(8, 'Health', '2017-09-24 10:02:02', '2017-09-24 10:02:02');

-- --------------------------------------------------------

--
-- Table structure for table `trainings`
--

CREATE TABLE `trainings` (
  `id` int(10) UNSIGNED NOT NULL,
  `training_name` varchar(100) NOT NULL,
  `district_id` varchar(150) NOT NULL,
  `project_id` varchar(100) NOT NULL,
  `benef_id` varchar(100) NOT NULL,
  `quarter` int(11) NOT NULL,
  `quarter_year` year(4) NOT NULL,
  `goal_id` int(11) NOT NULL,
  `indicator_id` varchar(100) NOT NULL,
  `output_id` varchar(100) NOT NULL,
  `activity_id` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trainings`
--

INSERT INTO `trainings` (`id`, `training_name`, `district_id`, `project_id`, `benef_id`, `quarter`, `quarter_year`, `goal_id`, `indicator_id`, `output_id`, `activity_id`, `created_at`, `updated_at`) VALUES
(8, 'asdasdsdc', '3,4,6', '15', '10,11,12,18,22,89,90', 3, 2015, 106, '10', '68,69', '1,7', '2017-11-06 04:18:59', '2017-11-14 06:25:24'),
(9, 'training_name', '1,2,4', '15', '12,24,84,85', 3, 2001, 103, '7', '56,57', '1', '2017-11-14 04:12:20', '2017-11-14 04:12:20'),
(10, 'asdadsasd', '2,3', '3', '10,11,86', 2, 2000, 103, '7', '56,57', '1', '2017-11-14 04:21:36', '2017-11-14 04:21:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Three Hammers', 'admin@3hammers.com', '$2y$10$NEYa6a.UqW0Fqt.m5CjJ9e5zBf0C0NEVfyc2JiueEs4wYCAQAmQ4.', 'aZrXhlp40yJFdIsva7pm4gjIB1cdhuVa3uhH5tUaxXGf3VVhiDXTc9GRGmbp', NULL, NULL),
(2, 'john shrestha', 'john@gmail.com', '$2y$10$1Hab/hCfKIc1dS6T61KGmueC4G07cEQeHWOfnSvXA84MwnmpAVYJK', 'dh5ili6YNKFDHcrkXCA0udvd7QSU5EIWLmKjwL8zDr0fiayyFxwhjNTFxJrK', '2017-07-18 00:14:25', '2017-07-18 00:14:25');

-- --------------------------------------------------------

--
-- Table structure for table `zones`
--

CREATE TABLE `zones` (
  `id` int(10) UNSIGNED NOT NULL,
  `zone_id` int(10) UNSIGNED NOT NULL,
  `zone_name` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `zones`
--

INSERT INTO `zones` (`id`, `zone_id`, `zone_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Mechi', '2017-07-12 04:59:25', '2017-07-12 04:59:25'),
(2, 2, 'Rapti', '2017-07-12 04:59:25', '2017-07-12 04:59:25'),
(3, 3, 'Bagmati', '2017-07-12 04:59:25', '2017-07-12 04:59:25'),
(4, 4, 'Karnali', '2017-07-12 04:59:25', '2017-07-12 04:59:25'),
(5, 5, 'Sagarmatha', '2017-07-12 04:59:25', '2017-07-12 04:59:25'),
(6, 6, 'Koshi', '2017-07-12 04:59:25', '2017-07-12 04:59:25'),
(7, 7, 'Narayani', '2017-07-12 04:59:25', '2017-07-12 04:59:25'),
(8, 8, 'Mahakali', '2017-07-12 04:59:25', '2017-07-12 04:59:25'),
(9, 9, 'Gandaki', '2017-07-12 04:59:25', '2017-07-12 04:59:25'),
(10, 10, 'Janakpur', '2017-07-12 04:59:25', '2017-07-12 04:59:25'),
(11, 11, 'Lumbini', '2017-07-12 04:59:25', '2017-07-12 04:59:25'),
(12, 12, 'Seti', '2017-07-12 04:59:25', '2017-07-12 04:59:25'),
(13, 13, 'Bheri', '2017-07-12 04:59:25', '2017-07-12 04:59:25'),
(14, 14, 'Dhawalagiri', '2017-07-12 04:59:25', '2017-07-12 04:59:25'),
(15, 15, 'National', '2017-09-01 19:32:49', '2017-09-01 19:32:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `benef`
--
ALTER TABLE `benef`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `caste`
--
ALTER TABLE `caste`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `community_med`
--
ALTER TABLE `community_med`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `consultancy_service`
--
ALTER TABLE `consultancy_service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dips`
--
ALTER TABLE `dips`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `zone_id` (`zone_id`);

--
-- Indexes for table `expertise`
--
ALTER TABLE `expertise`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `final_qna_answer`
--
ALTER TABLE `final_qna_answer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `final_qna_rel`
--
ALTER TABLE `final_qna_rel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_settings`
--
ALTER TABLE `general_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `goal`
--
ALTER TABLE `goal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `identity`
--
ALTER TABLE `identity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `iecmaterials`
--
ALTER TABLE `iecmaterials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logical`
--
ALTER TABLE `logical`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mne`
--
ALTER TABLE `mne`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `multipleprogress_doc`
--
ALTER TABLE `multipleprogress_doc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ngo`
--
ALTER TABLE `ngo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `objective`
--
ALTER TABLE `objective`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `outcome`
--
ALTER TABLE `outcome`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `output`
--
ALTER TABLE `output`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partnerpros`
--
ALTER TABLE `partnerpros`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `projects_project_code_unique` (`project_code`),
  ADD UNIQUE KEY `projects_project_name_unique` (`project_name`),
  ADD KEY `zone_id` (`zone_id`);

--
-- Indexes for table `projectstatus`
--
ALTER TABLE `projectstatus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_documents`
--
ALTER TABLE `project_documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questionset_benef`
--
ALTER TABLE `questionset_benef`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quotelab`
--
ALTER TABLE `quotelab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `research`
--
ALTER TABLE `research`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roster`
--
ALTER TABLE `roster`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD UNIQUE KEY `sessions_id_unique` (`id`);

--
-- Indexes for table `sgrant`
--
ALTER TABLE `sgrant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sip`
--
ALTER TABLE `sip`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sips`
--
ALTER TABLE `sips`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staffs`
--
ALTER TABLE `staffs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `theme`
--
ALTER TABLE `theme`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trainings`
--
ALTER TABLE `trainings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `zones`
--
ALTER TABLE `zones`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `benef`
--
ALTER TABLE `benef`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `caste`
--
ALTER TABLE `caste`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `community_med`
--
ALTER TABLE `community_med`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `consultancy_service`
--
ALTER TABLE `consultancy_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `dips`
--
ALTER TABLE `dips`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `expertise`
--
ALTER TABLE `expertise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `final_qna_answer`
--
ALTER TABLE `final_qna_answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `final_qna_rel`
--
ALTER TABLE `final_qna_rel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `general_settings`
--
ALTER TABLE `general_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `goal`
--
ALTER TABLE `goal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `identity`
--
ALTER TABLE `identity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `iecmaterials`
--
ALTER TABLE `iecmaterials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `logical`
--
ALTER TABLE `logical`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mne`
--
ALTER TABLE `mne`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `multipleprogress_doc`
--
ALTER TABLE `multipleprogress_doc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `ngo`
--
ALTER TABLE `ngo`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `objective`
--
ALTER TABLE `objective`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `outcome`
--
ALTER TABLE `outcome`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `output`
--
ALTER TABLE `output`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `partnerpros`
--
ALTER TABLE `partnerpros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `plan`
--
ALTER TABLE `plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `projectstatus`
--
ALTER TABLE `projectstatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `project_documents`
--
ALTER TABLE `project_documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `questionset_benef`
--
ALTER TABLE `questionset_benef`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `quotelab`
--
ALTER TABLE `quotelab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `research`
--
ALTER TABLE `research`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roster`
--
ALTER TABLE `roster`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sgrant`
--
ALTER TABLE `sgrant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sip`
--
ALTER TABLE `sip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sips`
--
ALTER TABLE `sips`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `staffs`
--
ALTER TABLE `staffs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `theme`
--
ALTER TABLE `theme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `trainings`
--
ALTER TABLE `trainings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `zones`
--
ALTER TABLE `zones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `districts`
--
ALTER TABLE `districts`
  ADD CONSTRAINT `districts_ibfk_1` FOREIGN KEY (`zone_id`) REFERENCES `zones` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
