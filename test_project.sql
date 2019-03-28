-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 28, 2019 at 02:03 PM
-- Server version: 5.7.17-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `attend`
--

CREATE TABLE `attend` (
  `num` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `stu_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `sub_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `section` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `quiz` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `late` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `miss` varchar(2) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `attend`
--

INSERT INTO `attend` (`num`, `stu_id`, `sub_id`, `section`, `quiz`, `late`, `miss`) VALUES
('1', '601208217', 'ITS221', '1', '0', '1', '0');

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
(52, '621ITS2211', '1', 'ITS221', '601106261', '1', '1', '20:53:52'),
(53, '621ITS2211', '2', 'ITS221', '601106261', '2', '1', '20:53:58'),
(54, '621ITS2211', '3', 'ITS221', '601106261', '3', '1', '20:56:35'),
(55, '621ITS2211', '4', 'ITS221', '601106261', '4', '1', '21:00:24'),
(56, '621ITS2211', '4', 'ITS221', '601108857', '1', '1', '21:00:31');

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
(275, '621ITS2211', '1', 'ITS221', '601108857', '1', '1', '20:53:53'),
(276, '621ITS2211', '1', 'ITS221', '601108865', '1', '1', '20:53:53'),
(277, '621ITS2211', '1', 'ITS221', '601108873', '1', '1', '20:53:53'),
(278, '621ITS2211', '1', 'ITS221', '601108881', '1', '1', '20:53:53'),
(279, '621ITS2211', '2', 'ITS221', '601108857', '2', '1', '20:56:13'),
(280, '621ITS2211', '2', 'ITS221', '601108865', '2', '1', '20:56:13'),
(281, '621ITS2211', '2', 'ITS221', '601108873', '2', '1', '20:56:13'),
(282, '621ITS2211', '2', 'ITS221', '601108881', '2', '1', '20:56:13'),
(283, '621ITS2211', '3', 'ITS221', '601108857', '3', '1', '20:59:22'),
(284, '621ITS2211', '3', 'ITS221', '601108865', '3', '1', '20:59:22'),
(285, '621ITS2211', '3', 'ITS221', '601108873', '3', '1', '20:59:22'),
(286, '621ITS2211', '3', 'ITS221', '601108881', '3', '1', '20:59:23'),
(287, '621ITS2211', '4', 'ITS221', '601108865', '4', '1', '21:00:33'),
(288, '621ITS2211', '4', 'ITS221', '601108873', '4', '1', '21:00:33'),
(289, '621ITS2211', '4', 'ITS221', '601108881', '4', '1', '21:00:33');

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
  `date` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attend_tb`
--

INSERT INTO `attend_tb` (`id`, `full_id`, `num`, `new_full_id`, `stu_id`, `sub_id`, `section`, `quiz`, `late`, `miss`, `time`, `date`) VALUES
(326, '621ITS2211', '1', '621ITS22111', '601106261', 'ITS221', '1', '0', '1', 0, '20:53:52', '1 ม.ค. 2513'),
(327, '621ITS2211', '1', '621ITS22111', '601108857', 'ITS221', '1', '0', '0', 1, '20:53:53', '1 ม.ค. 2513'),
(328, '621ITS2211', '1', '621ITS22111', '601108865', 'ITS221', '1', '0', '0', 1, '20:53:53', '1 ม.ค. 2513'),
(329, '621ITS2211', '1', '621ITS22111', '601108873', 'ITS221', '1', '0', '0', 1, '20:53:53', '1 ม.ค. 2513'),
(330, '621ITS2211', '1', '621ITS22111', '601108881', 'ITS221', '1', '0', '0', 1, '20:53:53', '1 ม.ค. 2513'),
(331, '621ITS2211', '2', '621ITS22112', '601106261', 'ITS221', '1', '0', '2', 0, '20:53:58', '1 ม.ค. 2513'),
(332, '621ITS2211', '2', '621ITS22112', '601108857', 'ITS221', '1', '0', '0', 2, '20:56:13', '1 ม.ค. 2513'),
(333, '621ITS2211', '2', '621ITS22112', '601108865', 'ITS221', '1', '0', '0', 2, '20:56:13', '1 ม.ค. 2513'),
(334, '621ITS2211', '2', '621ITS22112', '601108873', 'ITS221', '1', '0', '0', 2, '20:56:13', '1 ม.ค. 2513'),
(335, '621ITS2211', '2', '621ITS22112', '601108881', 'ITS221', '1', '0', '0', 2, '20:56:13', '1 ม.ค. 2513'),
(336, '621ITS2211', '3', '621ITS22113', '601106261', 'ITS221', '1', '0', '3', 0, '20:56:35', '1 ม.ค. 2513'),
(337, '621ITS2211', '3', '621ITS22113', '601108857', 'ITS221', '1', '0', '0', 3, '20:59:22', '1 ม.ค. 2513'),
(338, '621ITS2211', '3', '621ITS22113', '601108865', 'ITS221', '1', '0', '0', 3, '20:59:22', '1 ม.ค. 2513'),
(339, '621ITS2211', '3', '621ITS22113', '601108873', 'ITS221', '1', '0', '0', 3, '20:59:22', '1 ม.ค. 2513'),
(340, '621ITS2211', '3', '621ITS22113', '601108881', 'ITS221', '1', '0', '0', 3, '20:59:23', '1 ม.ค. 2513'),
(341, '621ITS2211', '4', '621ITS22114', '601106261', 'ITS221', '1', '0', '4', 0, '21:00:24', '1 ม.ค. 2513'),
(342, '621ITS2211', '4', '621ITS22114', '601108857', 'ITS221', '1', '0', '1', 3, '21:00:31', '1 ม.ค. 2513'),
(343, '621ITS2211', '4', '621ITS22114', '601108865', 'ITS221', '1', '0', '0', 4, '21:00:33', '1 ม.ค. 2513'),
(344, '621ITS2211', '4', '621ITS22114', '601108873', 'ITS221', '1', '0', '0', 4, '21:00:33', '1 ม.ค. 2513'),
(345, '621ITS2211', '4', '621ITS22114', '601108881', 'ITS221', '1', '0', '0', 4, '21:00:33', '1 ม.ค. 2513');

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
  `miss` varchar(3) COLLATE utf8_unicode_ci NOT NULL
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
  `stu_name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `new_sub`
--

INSERT INTO `new_sub` (`new_sub_id`, `full_id`, `section`, `sub_id`, `stu_id`, `stu_name`) VALUES
(330, '621ITS2211', '1', 'ITS221', '601106261', 'นายศิรวิชญ์ ศิริสุข'),
(331, '621ITS2211', '1', 'ITS221', '601108857', 'นายณุกุลกริช บุญนาค'),
(332, '621ITS2211', '1', 'ITS221', '601108865', 'นายไชยวัฒน์ ปิตุโส'),
(333, '621ITS2211', '1', 'ITS221', '601108873', 'นายวริทนันท์ สาลี'),
(334, '621ITS2211', '1', 'ITS221', '601108881', 'นายศุภวิชญ์ พูลสวัสดิ์');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(10) NOT NULL,
  `sub_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teacher_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `star_time` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fin_time` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `section` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `sub_id`, `full_id`, `teacher_id`, `star_time`, `fin_time`, `date`, `section`) VALUES
(24, 'ITS221', '621ITS2211', '1', '09:00', '12:00', 'Monday', '1'),
(25, 'ITS221', '621ITS22120', '1', '09:00', '12:00', 'Sunday', '20');

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
  `password` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `teac_id`, `name`, `teac_dep`, `user`, `password`) VALUES
(1, '1', 'jirawin', 'its', 'admin', '1234'),
(2, '2', 'parinda', 'edu', 'admin1', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `test_tb`
--

CREATE TABLE `test_tb` (
  `id` int(11) NOT NULL,
  `full_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `stu_id` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `sub_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `section` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `quiz1` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `late1` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `miss1` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `quiz2` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `late2` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `miss2` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `quiz3` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `late3` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `miss3` varchar(3) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(5) NOT NULL,
  `user_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_id`, `username`, `password`) VALUES
(1, 'U001', 'admin', '1234');

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
-- Indexes for table `test_tb`
--
ALTER TABLE `test_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attend_late`
--
ALTER TABLE `attend_late`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `attend_miss`
--
ALTER TABLE `attend_miss`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=290;
--
-- AUTO_INCREMENT for table `attend_quiz`
--
ALTER TABLE `attend_quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `attend_tb`
--
ALTER TABLE `attend_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=346;
--
-- AUTO_INCREMENT for table `attend_temp`
--
ALTER TABLE `attend_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `new_sub`
--
ALTER TABLE `new_sub`
  MODIFY `new_sub_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=335;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `test_tb`
--
ALTER TABLE `test_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
