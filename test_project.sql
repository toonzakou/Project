-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 08, 2019 at 04:29 PM
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

--
-- Dumping data for table `attend_late`
--

INSERT INTO `attend_late` (`id`, `full_id`, `num`, `sub_id`, `stu_id`, `late`, `section`, `time`) VALUES
(136, '25621ITS2212', '1', 'ITS221', '601114696', '1', '2', '10:04:00'),
(137, '25621ITS2212', '1', 'ITS221', '601114701', '1', '2', '10:04:00');

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
(59, '25621ITS2212', '1', 'ITS221', '601114808', '1', '2', '10:05:00'),
(60, '25621ITS2212', '1', 'ITS221', '601115202', '1', '2', '10:05:00');

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
(7, '25621ITS2212', '1', 'ITS221', '601113836', '1', '2', '09:04:00'),
(8, '25621ITS2212', '1', 'ITS221', '601114167', '1', '2', '09:04:00');

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
  `date` varchar(15) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `attend_subject`
--

INSERT INTO `attend_subject` (`id`, `full_id`, `sub_id`, `section`, `num`, `room`, `total`, `come`, `quiz`, `late`, `miss`, `start_t`, `fin_t`, `late_t`, `date`) VALUES
(14, '25621ITS2212', 'ITS221', '2', '1', '2302', '6', '6', '2', '2', '2', '09:00', '12:00', '09:15', '8 เม.ย. 2562');

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
(749, '25621ITS2212', '1', '25621ITS22121', '601113836', 'ITS221', '2', '1', '0', 0, '09:04:00', '-'),
(750, '25621ITS2212', '1', '25621ITS22121', '601114167', 'ITS221', '2', '1', '0', 0, '09:04:00', '-'),
(751, '25621ITS2212', '1', '25621ITS22121', '601114696', 'ITS221', '2', '0', '1', 0, '10:04:00', 'รถติด'),
(752, '25621ITS2212', '1', '25621ITS22121', '601114701', 'ITS221', '2', '0', '1', 0, '10:04:00', 'ตื่นสาย'),
(753, '25621ITS2212', '1', '25621ITS22121', '601114808', 'ITS221', '2', '0', '0', 1, '10:05:00', 'ขาดเรียน'),
(754, '25621ITS2212', '1', '25621ITS22121', '601115202', 'ITS221', '2', '0', '0', 1, '10:05:00', 'ขาดเรียน');

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
  `stu_name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `new_sub`
--

INSERT INTO `new_sub` (`new_sub_id`, `full_id`, `section`, `sub_id`, `stu_id`, `stu_name`, `tel`) VALUES
(574, '25621ITS2212', '2', 'ITS221', '601113836', 'นางสาวศรัญญา บุญสมบัติ', '0957316401'),
(575, '25621ITS2212', '2', 'ITS221', '601114167', 'นางสาวนิรมล บุญอาจ', '0841446192'),
(576, '25621ITS2212', '2', 'ITS221', '601114696', 'นายศราวุฒิ ชื่นนอก', '0811910064'),
(577, '25621ITS2212', '2', 'ITS221', '601114701', 'นายมณทล ชัยสุวรรณ', '0802644401'),
(578, '25621ITS2212', '2', 'ITS221', '601114808', 'นายเดชาวุฒิ อยู่หน้า', '0952424277'),
(579, '25621ITS2212', '2', 'ITS221', '601115202', 'นางสาววลัยลักษณ์ พูลทรัพย์', '0882578794');

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
(31, '2562', '1', 'ITS221', '25621ITS2212', '1', '09:00', '12:00', 'วันจันทร์', '2');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;
--
-- AUTO_INCREMENT for table `attend_miss`
--
ALTER TABLE `attend_miss`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `attend_quiz`
--
ALTER TABLE `attend_quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `attend_subject`
--
ALTER TABLE `attend_subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `attend_tb`
--
ALTER TABLE `attend_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=755;
--
-- AUTO_INCREMENT for table `attend_temp`
--
ALTER TABLE `attend_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `new_sub`
--
ALTER TABLE `new_sub`
  MODIFY `new_sub_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=580;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
