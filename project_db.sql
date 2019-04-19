-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 19, 2019 at 03:11 PM
-- Server version: 5.7.17-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `attend_late`
--

CREATE TABLE `attend_late` (
  `id` int(11) NOT NULL,
  `full_id` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `num` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `sub_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `stu_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `late` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `section` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `attend_late`
--

INSERT INTO `attend_late` (`id`, `full_id`, `num`, `sub_id`, `stu_id`, `late`, `section`, `time`) VALUES
(1, '25621ITS41365', '1', 'ITS413', '611209752', '1', '65', '08:17:00'),
(2, '25621ITS41365', '1', 'ITS413', '611210981', '1', '65', '08:18:00'),
(3, '25621ITS41365', '1', 'ITS413', '611211709', '1', '65', '08:18:00'),
(4, '25621ITS41365', '1', 'ITS413', '611211733', '1', '65', '08:18:00'),
(5, '25621ITS41365', '1', 'ITS413', '612200167', '1', '65', '08:18:00'),
(6, '25621ITS41365', '1', 'ITS413', '612200175', '1', '65', '08:18:00'),
(7, '25621ITS41365', '1', 'ITS413', '612200159', '1', '65', '08:18:00'),
(8, '25621ITS41365', '1', 'ITS413', '612200183', '1', '65', '08:18:00'),
(9, '25621ITS41365', '1', 'ITS413', '611207726', '1', '65', '09:19:00'),
(10, '25621ITS3111', '3', 'ITS311', '611201160', '1', '1', '17:51:00');

-- --------------------------------------------------------

--
-- Table structure for table `attend_miss`
--

CREATE TABLE `attend_miss` (
  `id` int(11) NOT NULL,
  `full_id` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `num` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `sub_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `stu_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `miss` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `section` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `attend_miss`
--

INSERT INTO `attend_miss` (`id`, `full_id`, `num`, `sub_id`, `stu_id`, `miss`, `section`, `time`) VALUES
(1, '25621ITS41365', '1', 'ITS413', '611207441', '1', '65', '12:32:00'),
(2, '25621ITS41365', '1', 'ITS413', '611207700', '1', '65', '12:32:00'),
(3, '25621ITS41365', '1', 'ITS413', '611207718', '1', '65', '12:32:00'),
(4, '25621ITS41365', '1', 'ITS413', '611207742', '1', '65', '12:32:00'),
(5, '25621ITS41365', '1', 'ITS413', '611207954', '1', '65', '12:32:00'),
(6, '25621ITS41365', '1', 'ITS413', '611208316', '1', '65', '12:32:00'),
(7, '25621ITS41365', '1', 'ITS413', '611208578', '1', '65', '12:32:00'),
(8, '25621ITS41365', '1', 'ITS413', '611209079', '1', '65', '12:32:00'),
(9, '25621ITS41365', '1', 'ITS413', '611209639', '1', '65', '12:32:00'),
(10, '25621ITS41365', '1', 'ITS413', '611209697', '1', '65', '12:32:00'),
(11, '25621ITS41365', '1', 'ITS413', '611210834', '1', '65', '12:32:00'),
(12, '25621ITS41365', '1', 'ITS413', '591202585', '1', '65', '12:32:00'),
(13, '25621ITS41365', '1', 'ITS413', '591202577', '1', '65', '12:32:00'),
(14, '25621ITS3111', '3', 'ITS311', '601201948', '1', '1', '17:51:00'),
(15, '25621ITS3111', '3', 'ITS311', '611200889', '1', '1', '17:51:00'),
(16, '25621ITS3111', '3', 'ITS311', '611201178', '1', '1', '17:51:00'),
(17, '25621ITS3111', '3', 'ITS311', '611201225', '1', '1', '17:51:00'),
(18, '25621ITS3111', '3', 'ITS311', '611201631', '1', '1', '17:51:00'),
(19, '25621ITS3111', '3', 'ITS311', '611203277', '1', '1', '17:51:00'),
(20, '25621ITS3111', '4', 'ITS311', '611201178', '2', '1', '17:56:00'),
(21, '25621ITS3111', '4', 'ITS311', '611201225', '2', '1', '17:56:00'),
(22, '25621ITS3111', '4', 'ITS311', '611201631', '2', '1', '17:56:00'),
(23, '25621ITS3111', '4', 'ITS311', '611203277', '2', '1', '17:56:00'),
(24, '25621ITS3111', '5', 'ITS311', '601201948', '2', '1', '18:04:00'),
(25, '25621ITS3111', '5', 'ITS311', '611200889', '2', '1', '18:04:00'),
(26, '25621ITS3111', '5', 'ITS311', '611201160', '1', '1', '18:04:00'),
(27, '25621ITS3111', '5', 'ITS311', '611201178', '3', '1', '18:04:00'),
(28, '25621ITS3111', '5', 'ITS311', '611203277', '3', '1', '18:04:00');

-- --------------------------------------------------------

--
-- Table structure for table `attend_quiz`
--

CREATE TABLE `attend_quiz` (
  `id` int(11) NOT NULL,
  `full_id` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `num` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `sub_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `stu_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `quiz` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `section` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `attend_quiz`
--

INSERT INTO `attend_quiz` (`id`, `full_id`, `num`, `sub_id`, `stu_id`, `quiz`, `section`, `time`) VALUES
(1, '25621ITS41365', '1', 'ITS413', '601201948', '1', '65', '08:02:00'),
(2, '25621ITS41365', '1', 'ITS413', '611200889', '1', '65', '08:02:00'),
(3, '25621ITS41365', '1', 'ITS413', '611201160', '1', '65', '08:02:00'),
(4, '25621ITS41365', '1', 'ITS413', '611201178', '1', '65', '08:02:00'),
(5, '25621ITS41365', '1', 'ITS413', '611201225', '1', '65', '08:02:00'),
(6, '25621ITS41365', '1', 'ITS413', '611201631', '1', '65', '08:02:00'),
(7, '25621ITS41365', '1', 'ITS413', '611203277', '1', '65', '08:06:00'),
(8, '25621ITS41365', '1', 'ITS413', '611203536', '1', '65', '08:07:00'),
(9, '25621ITS41365', '1', 'ITS413', '611203544', '1', '65', '08:07:00'),
(10, '25621ITS41365', '1', 'ITS413', '611203552', '1', '65', '08:07:00'),
(11, '25621ITS41365', '1', 'ITS413', '611203617', '1', '65', '08:07:00'),
(12, '25621ITS41365', '1', 'ITS413', '611204697', '1', '65', '08:07:00'),
(13, '25621ITS41365', '1', 'ITS413', '611204702', '1', '65', '08:07:00'),
(14, '25621ITS41365', '1', 'ITS413', '611205198', '1', '65', '08:07:00'),
(15, '25621ITS41365', '1', 'ITS413', '611205423', '1', '65', '08:07:00'),
(16, '25621ITS41365', '1', 'ITS413', '611205758', '1', '65', '08:08:00'),
(17, '25621ITS41365', '1', 'ITS413', '611206356', '1', '65', '08:12:00'),
(18, '25621ITS41365', '1', 'ITS413', '611206364', '1', '65', '08:12:00'),
(19, '25621ITS41365', '1', 'ITS413', '611207255', '1', '65', '08:12:00'),
(20, '25621ITS41365', '1', 'ITS413', '611210923', '1', '65', '08:12:00'),
(21, '25621ITS41365', '1', 'ITS413', '611210630', '1', '65', '08:12:00'),
(22, '25621ITS3111', '1', 'ITS311', '601201948', '1', '1', '12:28:00'),
(23, '25621ITS3111', '1', 'ITS311', '611200889', '1', '1', '12:28:00'),
(24, '25621ITS3111', '1', 'ITS311', '611201160', '1', '1', '12:28:00'),
(25, '25621ITS3111', '1', 'ITS311', '611201178', '1', '1', '12:28:00'),
(26, '25621ITS3111', '1', 'ITS311', '611201225', '1', '1', '12:29:00'),
(27, '25621ITS3111', '1', 'ITS311', '611201631', '1', '1', '12:29:00'),
(28, '25621ITS3111', '1', 'ITS311', '611203277', '1', '1', '12:31:00'),
(29, '25621ITS3111', '2', 'ITS311', '601201948', '2', '1', '13:00:00'),
(30, '25621ITS3111', '2', 'ITS311', '611200889', '2', '1', '13:00:00'),
(31, '25621ITS3111', '2', 'ITS311', '611201160', '2', '1', '13:00:00'),
(32, '25621ITS3111', '2', 'ITS311', '611201178', '2', '1', '13:00:00'),
(33, '25621ITS3111', '2', 'ITS311', '611201225', '2', '1', '13:00:00'),
(34, '25621ITS3111', '2', 'ITS311', '611201631', '2', '1', '13:00:00'),
(35, '25621ITS3111', '2', 'ITS311', '611203277', '2', '1', '13:00:00'),
(39, '25621ITS3111', '4', 'ITS311', '601201948', '3', '1', '17:56:00'),
(40, '25621ITS3111', '4', 'ITS311', '611200889', '3', '1', '17:56:00'),
(41, '25621ITS3111', '4', 'ITS311', '611201160', '3', '1', '17:56:00'),
(42, '25621ITS3111', '5', 'ITS311', '611201225', '3', '1', '18:03:00'),
(43, '25621ITS3111', '5', 'ITS311', '611201631', '3', '1', '18:04:00');

-- --------------------------------------------------------

--
-- Table structure for table `attend_subject`
--

CREATE TABLE `attend_subject` (
  `id` int(11) NOT NULL,
  `full_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `sub_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `section` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `num` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `room` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `total` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `come` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `quiz` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `late` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `miss` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `start_t` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `fin_t` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `late_t` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `make` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `mark` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `date_thai` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `attend_subject`
--

INSERT INTO `attend_subject` (`id`, `full_id`, `sub_id`, `section`, `num`, `room`, `total`, `come`, `quiz`, `late`, `miss`, `start_t`, `fin_t`, `late_t`, `date`, `make`, `mark`, `date_thai`) VALUES
(1, '25621ITS41365', 'ITS413', '65', '1', 'R1608', '44', '44', '21', '10', '13', '08:00', '12:30', '08:15', '9 เม.ย. 2562', '', '', ''),
(2, '25621ITS3111', 'ITS311', '1', '1', 'S2302', '7', '7', '7', '0', '0', '12:30', '15:30', '12:45', '18 เม.ย. 2562', '', '', 'พุธ'),
(3, '25621ITS3111', 'ITS311', '1', '2', 'S2302', '7', '7', '7', '0', '0', '13:00', '16:00', '13:15', '19 เม.ย. 2562', '', '', 'พฤหัสบดี'),
(4, '25621ITS3111', 'ITS311', '1', '3', 'S2302', '7', '7', '0', '1', '6', '12:30', '15:30', '12:45', '19 เม.ย. 2562', '', '', 'พฤหัสบดี'),
(6, '25621ITS3111', 'ITS311', '1', '4', 'S2401', '7', '7', '3', '0', '4', '18:00', '20:00', '18:15', '19 เม.ย. 2562', 'เมคอัพคลาส 19 เม.ย. 2562', '', 'พฤหัสบดี'),
(7, '25621ITS3111', 'ITS311', '1', '5', 'S2412', '7', '7', '2', '0', '5', '18:00', '20:00', '18:15', '19 เม.ย. 2562', 'เมคอัพคลาส 19 เม.ย. 2562', 'การสอนคาบปฏิบัติ', 'พฤหัสบดี');

-- --------------------------------------------------------

--
-- Table structure for table `attend_tb`
--

CREATE TABLE `attend_tb` (
  `id` int(11) NOT NULL,
  `full_id` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `num` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `new_full_id` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stu_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_id` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `section` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quiz` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `late` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `miss` int(2) NOT NULL,
  `time` time NOT NULL,
  `date` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attend_tb`
--

INSERT INTO `attend_tb` (`id`, `full_id`, `num`, `new_full_id`, `stu_id`, `sub_id`, `section`, `quiz`, `late`, `miss`, `time`, `date`, `first_name`) VALUES
(1, '25621ITS41365', '1', '25621ITS413651', '601201948', 'ITS413', '65', '1', '0', 0, '08:02:00', '-', 'ศุภักษณ์ชัย'),
(2, '25621ITS41365', '1', '25621ITS413651', '611200889', 'ITS413', '65', '1', '0', 0, '08:02:00', '-', 'นิตินัย'),
(3, '25621ITS41365', '1', '25621ITS413651', '611201160', 'ITS413', '65', '1', '0', 0, '08:02:00', '-', 'พัชณาภา'),
(4, '25621ITS41365', '1', '25621ITS413651', '611201178', 'ITS413', '65', '1', '0', 0, '08:02:00', '-', 'สุนิสา'),
(5, '25621ITS41365', '1', '25621ITS413651', '611201225', 'ITS413', '65', '1', '0', 0, '08:02:00', '-', 'ชัยวัฒน์'),
(6, '25621ITS41365', '1', '25621ITS413651', '611201631', 'ITS413', '65', '1', '0', 0, '08:02:00', '-', 'จิราพัชร'),
(7, '25621ITS41365', '1', '25621ITS413651', '611203277', 'ITS413', '65', '1', '0', 0, '08:06:00', '-', 'จักรา'),
(8, '25621ITS41365', '1', '25621ITS413651', '611203536', 'ITS413', '65', '1', '0', 0, '08:07:00', '-', 'ธนัฏฐา'),
(9, '25621ITS41365', '1', '25621ITS413651', '611203544', 'ITS413', '65', '1', '0', 0, '08:07:00', '-', 'ธัญสุดา'),
(10, '25621ITS41365', '1', '25621ITS413651', '611203552', 'ITS413', '65', '1', '0', 0, '08:07:00', '-', 'สมถวิล'),
(11, '25621ITS41365', '1', '25621ITS413651', '611203617', 'ITS413', '65', '1', '0', 0, '08:07:00', '-', 'ปานฑิรา'),
(12, '25621ITS41365', '1', '25621ITS413651', '611204697', 'ITS413', '65', '1', '0', 0, '08:07:00', '-', 'สุภาภรณ์'),
(13, '25621ITS41365', '1', '25621ITS413651', '611204702', 'ITS413', '65', '1', '0', 0, '08:07:00', '-', 'เสาวลักษณ์'),
(14, '25621ITS41365', '1', '25621ITS413651', '611205198', 'ITS413', '65', '1', '0', 0, '08:07:00', '-', 'จุไรรัตน์'),
(15, '25621ITS41365', '1', '25621ITS413651', '611205423', 'ITS413', '65', '1', '0', 0, '08:07:00', '-', 'คุณาธิป'),
(16, '25621ITS41365', '1', '25621ITS413651', '611205758', 'ITS413', '65', '1', '0', 0, '08:08:00', '-', 'สหรัฐ'),
(17, '25621ITS41365', '1', '25621ITS413651', '611206356', 'ITS413', '65', '1', '0', 0, '08:12:00', '-', 'จิรเดช'),
(18, '25621ITS41365', '1', '25621ITS413651', '611206364', 'ITS413', '65', '1', '0', 0, '08:12:00', '-', 'สิทธิชัย'),
(19, '25621ITS41365', '1', '25621ITS413651', '611207255', 'ITS413', '65', '1', '0', 0, '08:12:00', '-', 'ทนงศักดิ์'),
(20, '25621ITS41365', '1', '25621ITS413651', '611210923', 'ITS413', '65', '1', '0', 0, '08:12:00', '-', 'สุรักษ์ชัย'),
(21, '25621ITS41365', '1', '25621ITS413651', '611210630', 'ITS413', '65', '1', '0', 0, '08:12:00', '-', 'อภิสิทธิ์'),
(22, '25621ITS41365', '1', '25621ITS413651', '611209752', 'ITS413', '65', '0', '1', 0, '08:17:00', 'รถติด', 'ธารารัตน์'),
(23, '25621ITS41365', '1', '25621ITS413651', '611210981', 'ITS413', '65', '0', '1', 0, '08:18:00', 'รถติด', 'ศุภลักษณ์'),
(24, '25621ITS41365', '1', '25621ITS413651', '611211709', 'ITS413', '65', '0', '1', 0, '08:18:00', 'รถติด', 'ปัทมา'),
(25, '25621ITS41365', '1', '25621ITS413651', '611211733', 'ITS413', '65', '0', '1', 0, '08:18:00', 'รถติด', 'กัญญาวีร์'),
(26, '25621ITS41365', '1', '25621ITS413651', '612200167', 'ITS413', '65', '0', '1', 0, '08:18:00', 'รถติด', 'ตรีเชาวฤทธิ์'),
(27, '25621ITS41365', '1', '25621ITS413651', '612200175', 'ITS413', '65', '0', '1', 0, '08:18:00', 'รถติด', 'ตรีวรพล'),
(28, '25621ITS41365', '1', '25621ITS413651', '612200159', 'ITS413', '65', '0', '1', 0, '08:18:00', 'รถติด', 'ตรีนันทพงค์'),
(29, '25621ITS41365', '1', '25621ITS413651', '612200183', 'ITS413', '65', '0', '1', 0, '08:18:00', 'รถติด', 'ตรีณัฐพล'),
(30, '25621ITS41365', '1', '25621ITS413651', '611207726', 'ITS413', '65', '0', '1', 0, '09:19:00', 'รถติด', 'ณัฐกานต์'),
(31, '25621ITS41365', '1', '25621ITS413651', '611207734', 'ITS413', '65', '0', '1', 0, '09:19:00', 'รถติด', 'จิรวัฒ'),
(32, '25621ITS41365', '1', '25621ITS413651', '611207441', 'ITS413', '65', '0', '0', 1, '12:32:00', 'ป่วย', ''),
(33, '25621ITS41365', '1', '25621ITS413651', '611207700', 'ITS413', '65', '0', '0', 1, '12:32:00', 'ลากิจ', ''),
(34, '25621ITS41365', '1', '25621ITS413651', '611207718', 'ITS413', '65', '0', '0', 1, '12:32:00', 'ลากิจ', ''),
(35, '25621ITS41365', '1', '25621ITS413651', '611207742', 'ITS413', '65', '0', '0', 1, '12:32:00', 'ขาดเรียน', ''),
(36, '25621ITS41365', '1', '25621ITS413651', '611207954', 'ITS413', '65', '0', '0', 1, '12:32:00', 'ป่วย', ''),
(37, '25621ITS41365', '1', '25621ITS413651', '611208316', 'ITS413', '65', '0', '0', 1, '12:32:00', 'ขาดเรียน', ''),
(38, '25621ITS41365', '1', '25621ITS413651', '611208578', 'ITS413', '65', '0', '0', 1, '12:32:00', 'ขาดเรียน', ''),
(39, '25621ITS41365', '1', '25621ITS413651', '611209079', 'ITS413', '65', '0', '0', 1, '12:32:00', 'ขาดเรียน', ''),
(40, '25621ITS41365', '1', '25621ITS413651', '611209639', 'ITS413', '65', '0', '0', 1, '12:32:00', 'ติดต่อไม่ได้', ''),
(41, '25621ITS41365', '1', '25621ITS413651', '611209697', 'ITS413', '65', '0', '0', 1, '12:32:00', 'ติดต่อไม่ได้', ''),
(42, '25621ITS41365', '1', '25621ITS413651', '611210834', 'ITS413', '65', '0', '0', 1, '12:32:00', 'ขาดเรียน', ''),
(43, '25621ITS41365', '1', '25621ITS413651', '591202585', 'ITS413', '65', '0', '0', 1, '12:32:00', 'ติดต่อไม่ได้', ''),
(44, '25621ITS41365', '1', '25621ITS413651', '591202577', 'ITS413', '65', '0', '0', 1, '12:32:00', 'ขาดเรียน', ''),
(45, '25621ITS3111', '1', '25621ITS31111', '601201948', 'ITS311', '1', '1', '0', 0, '12:28:00', '-', 'ศุภักษณ์ชัย'),
(46, '25621ITS3111', '1', '25621ITS31111', '611200889', 'ITS311', '1', '1', '0', 0, '12:28:00', '-', 'นิตินัย'),
(47, '25621ITS3111', '1', '25621ITS31111', '611201160', 'ITS311', '1', '1', '0', 0, '12:28:00', '-', 'พัชณาภา'),
(48, '25621ITS3111', '1', '25621ITS31111', '611201178', 'ITS311', '1', '1', '0', 0, '12:28:00', '-', 'สุนิสา'),
(49, '25621ITS3111', '1', '25621ITS31111', '611201225', 'ITS311', '1', '1', '0', 0, '12:29:00', '-', 'ชัยวัฒน์'),
(50, '25621ITS3111', '1', '25621ITS31111', '611201631', 'ITS311', '1', '1', '0', 0, '12:29:00', '-', 'จิราพัชร'),
(51, '25621ITS3111', '1', '25621ITS31111', '611203277', 'ITS311', '1', '1', '0', 0, '12:31:00', '-', 'จักรา'),
(52, '25621ITS3111', '2', '25621ITS31112', '601201948', 'ITS311', '1', '2', '0', 0, '13:00:00', '-', 'ศุภักษณ์ชัย'),
(53, '25621ITS3111', '2', '25621ITS31112', '611200889', 'ITS311', '1', '2', '0', 0, '13:00:00', '-', 'นิตินัย'),
(54, '25621ITS3111', '2', '25621ITS31112', '611201160', 'ITS311', '1', '2', '0', 0, '13:00:00', '-', 'พัชณาภา'),
(55, '25621ITS3111', '2', '25621ITS31112', '611201178', 'ITS311', '1', '2', '0', 0, '13:00:00', '-', 'สุนิสา'),
(56, '25621ITS3111', '2', '25621ITS31112', '611201225', 'ITS311', '1', '2', '0', 0, '13:00:00', '-', 'ชัยวัฒน์'),
(57, '25621ITS3111', '2', '25621ITS31112', '611201631', 'ITS311', '1', '2', '0', 0, '13:00:00', '-', 'จิราพัชร'),
(58, '25621ITS3111', '2', '25621ITS31112', '611203277', 'ITS311', '1', '2', '0', 0, '13:00:00', '-', 'จักรา'),
(62, '25621ITS3111', '3', '25621ITS31113', '611201160', 'ITS311', '1', '2', '1', 0, '17:51:00', 'รถติด', 'พัชณาภา'),
(63, '25621ITS3111', '3', '25621ITS31113', '601201948', 'ITS311', '1', '2', '0', 1, '17:51:00', 'ขาดเรียน', ''),
(64, '25621ITS3111', '3', '25621ITS31113', '611200889', 'ITS311', '1', '2', '0', 1, '17:51:00', 'ขาดเรียน', ''),
(65, '25621ITS3111', '3', '25621ITS31113', '611201178', 'ITS311', '1', '2', '0', 1, '17:51:00', 'ขาดเรียน', ''),
(66, '25621ITS3111', '3', '25621ITS31113', '611201225', 'ITS311', '1', '2', '0', 1, '17:51:00', 'ขาดเรียน', ''),
(67, '25621ITS3111', '3', '25621ITS31113', '611201631', 'ITS311', '1', '2', '0', 1, '17:51:00', 'ขาดเรียน', ''),
(68, '25621ITS3111', '3', '25621ITS31113', '611203277', 'ITS311', '1', '2', '0', 1, '17:51:00', 'ขาดเรียน', ''),
(69, '25621ITS3111', '4', '25621ITS31114', '601201948', 'ITS311', '1', '3', '0', 1, '17:56:00', '-', 'ศุภักษณ์ชัย'),
(70, '25621ITS3111', '4', '25621ITS31114', '611200889', 'ITS311', '1', '3', '0', 1, '17:56:00', '-', 'นิตินัย'),
(71, '25621ITS3111', '4', '25621ITS31114', '611201160', 'ITS311', '1', '3', '1', 0, '17:56:00', '-', 'พัชณาภา'),
(72, '25621ITS3111', '4', '25621ITS31114', '611201178', 'ITS311', '1', '2', '0', 2, '17:56:00', 'รอการติดต่อ', ''),
(73, '25621ITS3111', '4', '25621ITS31114', '611201225', 'ITS311', '1', '2', '0', 2, '17:56:00', 'รอการติดต่อ', ''),
(74, '25621ITS3111', '4', '25621ITS31114', '611201631', 'ITS311', '1', '2', '0', 2, '17:56:00', 'รอการติดต่อ', ''),
(75, '25621ITS3111', '4', '25621ITS31114', '611203277', 'ITS311', '1', '2', '0', 2, '17:56:00', 'รอการติดต่อ', ''),
(76, '25621ITS3111', '5', '25621ITS31115', '611201225', 'ITS311', '1', '3', '0', 2, '18:03:00', '-', 'ชัยวัฒน์'),
(77, '25621ITS3111', '5', '25621ITS31115', '611201631', 'ITS311', '1', '3', '0', 2, '18:04:00', '-', 'จิราพัชร'),
(78, '25621ITS3111', '5', '25621ITS31115', '601201948', 'ITS311', '1', '3', '0', 2, '18:04:00', 'รอการติดต่อ', ''),
(79, '25621ITS3111', '5', '25621ITS31115', '611200889', 'ITS311', '1', '3', '0', 2, '18:04:00', 'รอการติดต่อ', ''),
(80, '25621ITS3111', '5', '25621ITS31115', '611201160', 'ITS311', '1', '3', '1', 1, '18:04:00', 'รอการติดต่อ', ''),
(81, '25621ITS3111', '5', '25621ITS31115', '611201178', 'ITS311', '1', '2', '0', 3, '18:04:00', 'รอการติดต่อ', ''),
(82, '25621ITS3111', '5', '25621ITS31115', '611203277', 'ITS311', '1', '2', '0', 3, '18:04:00', 'รอการติดต่อ', '');

-- --------------------------------------------------------

--
-- Table structure for table `attend_temp`
--

CREATE TABLE `attend_temp` (
  `id` int(11) NOT NULL,
  `full_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `num` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `new_full_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `stu_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `sub_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `section` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `quiz` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `late` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `miss` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `time` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `new_sub`
--

CREATE TABLE `new_sub` (
  `new_sub_id` int(10) NOT NULL,
  `full_id` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `section` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stu_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stu_name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ปกติ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `new_sub`
--

INSERT INTO `new_sub` (`new_sub_id`, `full_id`, `section`, `sub_id`, `stu_id`, `stu_name`, `tel`, `status`) VALUES
(1, '25621ITS41365', '65', 'ITS413', '601201948', 'นายศุภักษณ์ชัย เจนวิศวะกิจ', '098-965-3410', 'ปกติ'),
(2, '25621ITS41365', '65', 'ITS413', '611200889', 'นายนิตินัย ช้างโรจน์', '082-0675148', 'ปกติ'),
(3, '25621ITS41365', '65', 'ITS413', '611201160', 'นางสาวพัชณาภา กระแจ่ม', '090-654-9904', 'ปกติ'),
(4, '25621ITS41365', '65', 'ITS413', '611201178', 'นางสาวสุนิสา เพ็ชรชูดี', '095-5311553', 'ปกติ'),
(5, '25621ITS41365', '65', 'ITS413', '611201225', 'นายชัยวัฒน์ จันทินมาธร', '082-3804650', 'ปกติ'),
(6, '25621ITS41365', '65', 'ITS413', '611201631', 'นางสาวจิราพัชร บวรโชคชัย', '061-8671966', 'ปกติ'),
(7, '25621ITS41365', '65', 'ITS413', '611203277', 'นายจักรา จั่นคล้าย', '097-134-0018', 'ปกติ'),
(8, '25621ITS41365', '65', 'ITS413', '611203536', 'นางสาวธนัฏฐา ขวัญมา', '093-930-5348', 'ปกติ'),
(9, '25621ITS41365', '65', 'ITS413', '611203544', 'นางสาวธัญสุดา ขันก้อน', '083-843-3426', 'ปกติ'),
(10, '25621ITS41365', '65', 'ITS413', '611203552', 'นางสาวสมถวิล ฉังลั้น', '095-991-4707', 'ปกติ'),
(11, '25621ITS41365', '65', 'ITS413', '611203617', 'นางสาวปานฑิรา มู่ฮำหมัดอารี', '083-445-3547', 'ปกติ'),
(12, '25621ITS41365', '65', 'ITS413', '611204697', 'นางสาวสุภาภรณ์ ประเสริฐสุข', '091-798-0610', 'ปกติ'),
(13, '25621ITS41365', '65', 'ITS413', '611204702', 'นางสาวเสาวลักษณ์ ขวัญมั่น', '064-334-7599', 'ปกติ'),
(14, '25621ITS41365', '65', 'ITS413', '611205198', 'นางสาวจุไรรัตน์ พอนขุนทด', '098-230-4507', 'ปกติ'),
(15, '25621ITS41365', '65', 'ITS413', '611205423', 'นายคุณาธิป กัณหา', '063-912-4090', 'ปกติ'),
(16, '25621ITS41365', '65', 'ITS413', '611205758', 'นายสหรัฐ เรืองเนตร', '094-010-0767', 'ปกติ'),
(17, '25621ITS41365', '65', 'ITS413', '611206356', 'นายจิรเดช พรมแก้ว', '092-719-2765', 'ปกติ'),
(18, '25621ITS41365', '65', 'ITS413', '611206364', 'นายสิทธิชัย สุดโสม', '092-719-2765', 'ปกติ'),
(19, '25621ITS41365', '65', 'ITS413', '611207255', 'นายทนงศักดิ์ บุญครอง', '092-514-1974', 'ปกติ'),
(20, '25621ITS41365', '65', 'ITS413', '611207441', 'นางสาวชนนิกานต์ สง่างาม', '093-025-8655', 'ปกติ'),
(21, '25621ITS41365', '65', 'ITS413', '611207700', 'นางสาวฐิติมา หิรัญรัตน์', '095-692-9088', 'ปกติ'),
(22, '25621ITS41365', '65', 'ITS413', '611207718', 'นายปัณณวิชญ์ ธนรัตน์โชคสิริ', '095-692-9088', 'ปกติ'),
(23, '25621ITS41365', '65', 'ITS413', '611207726', 'นายณัฐกานต์ วงศ์เสือ', '090-552-3900', 'ปกติ'),
(24, '25621ITS41365', '65', 'ITS413', '611207734', 'นายจิรวัฒ พลานุสนธิ์', '095-929-1927', 'ปกติ'),
(25, '25621ITS41365', '65', 'ITS413', '611207742', 'นายพัฒนพงษ์ ศรีจันทร์', '062-562-4750', 'ปกติ'),
(26, '25621ITS41365', '65', 'ITS413', '611207954', 'นางสาวพรชนัน ทรัพย์เจริญ', '063-804-9390', 'ปกติ'),
(27, '25621ITS41365', '65', 'ITS413', '611208316', 'นางสาวริตา วงษ์เนียม', '092-683-5435', 'ปกติ'),
(28, '25621ITS41365', '65', 'ITS413', '611208578', 'นางสาวศิริบงกช เหมหงษา', '063-624-4153', 'ปกติ'),
(29, '25621ITS41365', '65', 'ITS413', '611209079', 'นายฉัตรชัย พันธุ์อุดม', '063-176-0219', 'ปกติ'),
(30, '25621ITS41365', '65', 'ITS413', '611209639', 'นายพิสิฐ วงศ์ขจร', '083-834-8610', 'ปกติ'),
(31, '25621ITS41365', '65', 'ITS413', '611209697', 'นางสาวพิมพ์ใจ ปกป้อง', '082-310-0947', 'ปกติ'),
(32, '25621ITS41365', '65', 'ITS413', '611209752', 'นางสาวธารารัตน์ แสงรุ่งสว่าง', '092-734-7339', 'ปกติ'),
(33, '25621ITS41365', '65', 'ITS413', '611210630', 'นายอภิสิทธิ์ จันดี', '093-449-6691', 'ปกติ'),
(34, '25621ITS41365', '65', 'ITS413', '611210834', 'นายภานุพงษ์ เลาะหะนะ', '099-9706402', 'ปกติ'),
(35, '25621ITS41365', '65', 'ITS413', '611210923', 'นายสุรักษ์ชัย คำเหลือ', '098-9980879', 'ปกติ'),
(36, '25621ITS41365', '65', 'ITS413', '611210981', 'นางสาวศุภลักษณ์ สุวรรณฤทธิ์', '087-7909549', 'ปกติ'),
(37, '25621ITS41365', '65', 'ITS413', '611211709', 'นางสาวปัทมา บุญอ้น', '086-7125355', 'ปกติ'),
(38, '25621ITS41365', '65', 'ITS413', '611211733', 'นางสาวกัญญาวีร์ ยุทธชมภู', '098-8933417', 'ปกติ'),
(39, '25621ITS41365', '65', 'ITS413', '612200159', 'จ่าอากาศตรีนันทพงค์ อังก์อารยะพงศ์', '098-5417924', 'ปกติ'),
(40, '25621ITS41365', '65', 'ITS413', '612200167', 'จ่าอากาศตรีเชาวฤทธิ์ คำมีรักษ์', '098-5726097', 'ปกติ'),
(41, '25621ITS41365', '65', 'ITS413', '612200175', 'จ่าอากาศตรีวรพล นาสมบูรณ์', '094-5102246', 'ปกติ'),
(42, '25621ITS41365', '65', 'ITS413', '612200183', 'จ่าอากาศตรีณัฐพล พันธ์ไม้สี', '083-424-4122', 'ปกติ'),
(43, '25621ITS41365', '65', 'ITS413', '591202585', 'นางสาวน้ำฝน ศรีมารัตน์', '084-9195367', 'ปกติ'),
(44, '25621ITS41365', '65', 'ITS413', '591202577', 'นางสาวนวลตา ทองเต็ม', '098-4855129', 'ปกติ'),
(45, '25621ITS41365', '65', 'ITS413', '601206516', 'นายทรงสิทธิ์ รบศรี', '095-7316401', 'ปกติ'),
(46, '25621ITS3111', '1', 'ITS311', '601201948', 'นายศุภักษณ์ชัย เจนวิศวะกิจ', '098-965-3410', 'ปกติ'),
(47, '25621ITS3111', '1', 'ITS311', '611200889', 'นายนิตินัย ช้างโรจน์', '082-0675148', 'ปกติ'),
(48, '25621ITS3111', '1', 'ITS311', '611201160', 'นางสาวพัชณาภา กระแจ่ม', '090-654-9904', 'ปกติ'),
(49, '25621ITS3111', '1', 'ITS311', '611201178', 'นางสาวสุนิสา เพ็ชรชูดี', '095-5311553', 'ปกติ'),
(50, '25621ITS3111', '1', 'ITS311', '611201225', 'นายชัยวัฒน์ จันทินมาธร', '082-3804650', 'ปกติ'),
(51, '25621ITS3111', '1', 'ITS311', '611201631', 'นางสาวจิราพัชร บวรโชคชัย', '061-8671966', 'ปกติ'),
(52, '25621ITS3111', '1', 'ITS311', '611203277', 'นายจักรา จั่นคล้าย', '097-134-0018', 'ปกติ');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(10) NOT NULL,
  `year` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `term` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teacher_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `star_time` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fin_time` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_t` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `section` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `year`, `term`, `sub_id`, `full_id`, `teacher_id`, `star_time`, `fin_time`, `date_t`, `section`) VALUES
(2, '2562', '1', 'ITS311', '25621ITS3111', '1', '12:30', '15:30', '', '1'),
(1, '2562', '1', 'ITS413', '25621ITS41365', '1', '08:00', '12:30', 'วันอาทิตย์', '65');

-- --------------------------------------------------------

--
-- Table structure for table `sub_manage`
--

CREATE TABLE `sub_manage` (
  `subject_ID` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_credit` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_manage`
--

INSERT INTO `sub_manage` (`subject_ID`, `subject_name`, `subject_credit`) VALUES
('ITS221', 'Database Systems', '3 (2-2-5)'),
('ITS311', 'Management Information System', '3 (3-0-6)'),
('ITS413', 'Computer Security', '3 (3-0-6)'),
('ITS486', 'Seminar in Information Technology', '3 (3-0-6)'),
('ITS487', 'Information Technology Ethics and Laws', '3 (3-0-6)');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(5) NOT NULL,
  `teac_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teac_dep` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `teac_id`, `name`, `teac_dep`, `user`, `password`, `status`) VALUES
(1, '1', 'อ. สมบูรณ์ สุภัทรกุลชัย', 'its', 'admin', '1234', 'admin'),
(2, '2', 'jirawin', 'its', 'admin2', '1234', 'teacher');

-- --------------------------------------------------------

--
-- Table structure for table `time_temp`
--

CREATE TABLE `time_temp` (
  `id` int(11) NOT NULL,
  `start_time` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `fin_time` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `full_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attend_late`
--
ALTER TABLE `attend_late`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attend_miss`
--
ALTER TABLE `attend_miss`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attend_quiz`
--
ALTER TABLE `attend_quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attend_subject`
--
ALTER TABLE `attend_subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attend_tb`
--
ALTER TABLE `attend_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attend_temp`
--
ALTER TABLE `attend_temp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `new_sub`
--
ALTER TABLE `new_sub`
  ADD PRIMARY KEY (`new_sub_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`full_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `sub_manage`
--
ALTER TABLE `sub_manage`
  ADD PRIMARY KEY (`subject_ID`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`teac_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `time_temp`
--
ALTER TABLE `time_temp`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attend_late`
--
ALTER TABLE `attend_late`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `attend_miss`
--
ALTER TABLE `attend_miss`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `attend_quiz`
--
ALTER TABLE `attend_quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `attend_subject`
--
ALTER TABLE `attend_subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `attend_tb`
--
ALTER TABLE `attend_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
--
-- AUTO_INCREMENT for table `attend_temp`
--
ALTER TABLE `attend_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `new_sub`
--
ALTER TABLE `new_sub`
  MODIFY `new_sub_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `time_temp`
--
ALTER TABLE `time_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
