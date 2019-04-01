-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 01, 2019 at 06:34 AM
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
  `quiz` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `late` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `miss` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `start_t` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `fin_t` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `late_t` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(15) COLLATE utf8_unicode_ci NOT NULL
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
  `time` varchar(20) COLLATE utf8_unicode_ci NOT NULL
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
(541, '25621ITS2211', '1', 'ITS221', '601113836', 'นางสาวศรัญญา บุญสมบัติ'),
(542, '25621ITS2211', '1', 'ITS221', '601114167', 'นางสาวนิรมล บุญอาจ'),
(543, '25621ITS2211', '1', 'ITS221', '601114696', 'นายศราวุฒิ ชื่นนอก'),
(544, '25621ITS2211', '1', 'ITS221', '601114701', 'นายมณทล ชัยสุวรรณ'),
(545, '25621ITS2211', '1', 'ITS221', '601114808', 'นายเดชาวุฒิ อยู่หน้า'),
(546, '25621ITS2211', '1', 'ITS221', '601115202', 'นางสาววลัยลักษณ์ พูลทรัพย์'),
(547, '25621ITS4861', '1', 'ITS486', '601113836', 'นางสาวศรัญญา บุญสมบัติ'),
(548, '25621ITS4861', '1', 'ITS486', '601114167', 'นางสาวนิรมล บุญอาจ'),
(549, '25621ITS4861', '1', 'ITS486', '601114696', 'นายศราวุฒิ ชื่นนอก'),
(550, '25621ITS4861', '1', 'ITS486', '601114701', 'นายมณทล ชัยสุวรรณ'),
(551, '25621ITS4861', '1', 'ITS486', '601114808', 'นายเดชาวุฒิ อยู่หน้า'),
(552, '25621ITS4861', '1', 'ITS486', '601115202', 'นางสาววลัยลักษณ์ พูลทรัพย์'),
(553, '25621ITS4861', '1', 'ITS486', '601106261', 'นายศิรวิชญ์ ศิริสุข'),
(554, '25621ITS4861', '1', 'ITS486', '601108857', 'นายณุกุลกริช บุญนาค'),
(555, '25621ITS4861', '1', 'ITS486', '601108865', 'นายไชยวัฒน์ ปิตุโส'),
(556, '25621ITS4861', '1', 'ITS486', '601108873', 'นายวริทนันท์ สาลี'),
(557, '25621ITS4861', '1', 'ITS486', '601108881', 'นายศุภวิชญ์ พูลสวัสดิ์'),
(558, '25621ITS4861', '1', 'ITS486', '601111965', 'นางสาวสุดารัตน์ พสกชาติ'),
(559, '25621ITS4861', '1', 'ITS486', '601113056', 'นางสาวสุลักษ์ขณา คุ้มวงษ์'),
(560, '25621ITS4861', '1', 'ITS486', '601113373', 'นางสาวมณีรัตน์ บุญธรรม'),
(561, '25621ITS4861', '1', 'ITS486', '601113836', 'นางสาวศรัญญา บุญสมบัติ'),
(562, '25621ITS4861', '1', 'ITS486', '601114167', 'นางสาวนิรมล บุญอาจ'),
(563, '25621ITS4861', '1', 'ITS486', '601114696', 'นายศราวุฒิ ชื่นนอก'),
(564, '25621ITS4861', '1', 'ITS486', '601114701', 'นายมณทล ชัยสุวรรณ'),
(565, '25621ITS4861', '1', 'ITS486', '601114808', 'นายเดชาวุฒิ อยู่หน้า'),
(566, '25621ITS4861', '1', 'ITS486', '601115202', 'นางสาววลัยลักษณ์ พูลทรัพย์');

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
  `date` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `section` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `year`, `term`, `sub_id`, `full_id`, `teacher_id`, `star_time`, `fin_time`, `date`, `section`) VALUES
(29, '2562', '1', 'ITS221', '25621ITS2211', '1', '09:00', '00:00', 'วันจันทร์', '1'),
(30, '2562', '1', 'ITS486', '25621ITS4861', '1', '13:00', '17:00', 'วันจันทร์', '1');

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
-- Table structure for table `time_temp`
--

CREATE TABLE `time_temp` (
  `id` int(11) NOT NULL,
  `start_time` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `fin_time` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `full_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL
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
-- Indexes for table `test_tb`
--
ALTER TABLE `test_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `time_temp`
--
ALTER TABLE `time_temp`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;
--
-- AUTO_INCREMENT for table `attend_miss`
--
ALTER TABLE `attend_miss`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `attend_quiz`
--
ALTER TABLE `attend_quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `attend_subject`
--
ALTER TABLE `attend_subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `attend_tb`
--
ALTER TABLE `attend_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=736;
--
-- AUTO_INCREMENT for table `attend_temp`
--
ALTER TABLE `attend_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `new_sub`
--
ALTER TABLE `new_sub`
  MODIFY `new_sub_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=567;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
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
-- AUTO_INCREMENT for table `time_temp`
--
ALTER TABLE `time_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
