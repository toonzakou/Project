-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 29, 2019 at 12:05 PM
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
  `miss` varchar(3) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `attend_temp`
--

INSERT INTO `attend_temp` (`id`, `full_id`, `num`, `new_full_id`, `stu_id`, `sub_id`, `section`, `quiz`, `late`, `miss`) VALUES
(22, '621ITS2211', '2', '621ITS22112', '601115600', 'ITS221', '1', '0', '1', '1'),
(23, '621ITS2211', '2', '621ITS22112', '601115587', 'ITS221', '1', '', '1', '');

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
(365, '621ITS2211', '1', 'ITS221', '601115529', 'นางสาวนริศรา ตาปราบ'),
(366, '621ITS2211', '1', 'ITS221', '601115587', 'นายฐิติพงษ์ น้อยนนท์'),
(367, '621ITS2211', '1', 'ITS221', '601115600', 'นายธนกร โพธิ์มะณีย์'),
(368, '621ITS2211', '1', 'ITS221', '601115634', 'นางสาวรุจิรา พันเพียรทำ'),
(369, '621ITS2211', '1', 'ITS221', '601115838', 'นายจักรกฤษ คุมโสระ'),
(370, '621ITS2211', '1', 'ITS221', '601116216', 'นางสาวณัฏฐ์นรี ยานะ'),
(371, '621ITS2211', '1', 'ITS221', '601116266', 'นางสาวอารียา หนูขยัน'),
(372, '621ITS2211', '1', 'ITS221', '601116711', 'นางสาวเมษา ศรีหริ่ง'),
(373, '621ITS2211', '1', 'ITS221', '601116729', 'นางสาววรนุช หันตุลา'),
(374, '621ITS2211', '1', 'ITS221', '601116957', 'นายศิรสิทธิ์ สอนดี'),
(375, '621ITS2211', '1', 'ITS221', '601117482', 'นางสาวอนัญญา งามวงศ์'),
(376, '621ITS2211', '1', 'ITS221', '601117555', 'นางสาวเนตรทราย คำเกิด'),
(377, '621ITS2211', '1', 'ITS221', '601117759', 'นางสาวนภาวรรณ พลไทย'),
(378, '621ITS2211', '1', 'ITS221', '601117872', 'นางสาวธัญญารัตน์ แสงประจักษ์'),
(379, '621ITS2211', '1', 'ITS221', '601119028', 'นายณัฐวุฒิ นวลละออ'),
(380, '621ITS2211', '1', 'ITS221', '601119167', 'นายนัฐวิทย์ พวงพุก'),
(381, '621ITS22120', '20', 'ITS221', '601106261', 'นายศิรวิชญ์ ศิริสุข'),
(382, '621ITS22120', '20', 'ITS221', '601108857', 'นายณุกุลกริช บุญนาค'),
(383, '621ITS22120', '20', 'ITS221', '601108865', 'นายไชยวัฒน์ ปิตุโส'),
(384, '621ITS22120', '20', 'ITS221', '601108873', 'นายวริทนันท์ สาลี'),
(385, '621ITS22120', '20', 'ITS221', '601108881', 'นายศุภวิชญ์ พูลสวัสดิ์'),
(386, '621ITS22120', '20', 'ITS221', '601111965', 'นางสาวสุดารัตน์ พสกชาติ'),
(387, '621ITS22120', '20', 'ITS221', '601113056', 'นางสาวสุลักษ์ขณา คุ้มวงษ์'),
(388, '621ITS22120', '20', 'ITS221', '601113373', 'นางสาวมณีรัตน์ บุญธรรม'),
(389, '621ITS22120', '20', 'ITS221', '601113836', 'นางสาวศรัญญา บุญสมบัติ'),
(390, '621ITS22120', '20', 'ITS221', '601114167', 'นางสาวนิรมล บุญอาจ'),
(391, '621ITS22120', '20', 'ITS221', '601114696', 'นายศราวุฒิ ชื่นนอก'),
(392, '621ITS22120', '20', 'ITS221', '601114701', 'นายมณทล ชัยสุวรรณ'),
(393, '621ITS22120', '20', 'ITS221', '601114808', 'นายเดชาวุฒิ อยู่หน้า'),
(394, '621ITS22120', '20', 'ITS221', '601115202', 'นางสาววลัยลักษณ์ พูลทรัพย์');

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
(25, 'ITS221', '621ITS22120', '1', '09:00', '12:00', 'Sunday', '20'),
(26, 'ITS486', '621ITS4861', '1', '13:00', '17:00', 'Thurday', '1');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;
--
-- AUTO_INCREMENT for table `attend_miss`
--
ALTER TABLE `attend_miss`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `attend_quiz`
--
ALTER TABLE `attend_quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `attend_tb`
--
ALTER TABLE `attend_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=557;
--
-- AUTO_INCREMENT for table `attend_temp`
--
ALTER TABLE `attend_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `new_sub`
--
ALTER TABLE `new_sub`
  MODIFY `new_sub_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=395;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
