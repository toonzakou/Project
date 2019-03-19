-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 19, 2019 at 09:44 AM
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
-- Table structure for table `attend_tb`
--

CREATE TABLE `attend_tb` (
  `no` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `barcode_tb`
--

CREATE TABLE `barcode_tb` (
  `id` int(5) NOT NULL,
  `stu_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stu_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stu_dep` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barcode_tb`
--

INSERT INTO `barcode_tb` (`id`, `stu_id`, `stu_name`, `stu_dep`) VALUES
(4, '601206516', 'ศักดารินท์  ดาวร้าย', 'ITS-C'),
(5, '601207253', 'พูนศักดิ์  เสาเวียง', 'ITS-C'),
(58, '601206516', 'ทรงสิทธิ์  รบศรี', 'ITS-C'),
(59, '12345678', 'นายก', ''),
(60, '13456898', 'นายข', ''),
(61, '601208217', 'นางสาววรรณวิภา เนียมหอม', 'BSC-C-W '),
(62, '601208330', 'นางสาวมนฑ์ปลิดา ธนาภัทร์ศิริสกุล', 'BSC-C-W '),
(63, '601208429', 'นายอนุรักษ์ กฤษดากุล', 'BSC-C-W '),
(64, '601208916', 'นายรัตนชัย สีสุขโข', 'BSC-C-W '),
(65, '601209158', 'นางสาวสุพรรณี แสงสุข', 'BSC-C-W '),
(66, '601209213', 'นายปัณณวัฒน์ ขันติกุล', 'BSC-C-W '),
(67, '601209556', 'นางสาวทิพามณี เจิมนำ', 'BSC-C-W '),
(68, '601209695', 'นางสาวธิดา ศรีคำ', 'BSC-C-W '),
(69, '601208217', 'นางสาววรรณวิภา เนียมหอม', 'BSC-C-W '),
(70, '601208330', 'นางสาวมนฑ์ปลิดา ธนาภัทร์ศิริสกุล', 'BSC-C-W '),
(71, '601208217', 'นางสาววรรณวิภา เนียมหอม', 'BSC-C-W '),
(72, '601208330', 'นางสาวมนฑ์ปลิดา ธนาภัทร์ศิริสกุล', 'BSC-C-W '),
(73, '601208217', 'นางสาววรรณวิภา เนียมหอม', 'BSC-C-W '),
(74, '601208330', 'นางสาวมนฑ์ปลิดา ธนาภัทร์ศิริสกุล', 'BSC-C-W '),
(75, '601208217', 'นางสาววรรณวิภา เนียมหอม', 'BSC-C-W '),
(76, '601208330', 'นางสาวมนฑ์ปลิดา ธนาภัทร์ศิริสกุล', 'BSC-C-W ');

-- --------------------------------------------------------

--
-- Table structure for table `new_sub`
--

CREATE TABLE `new_sub` (
  `new_sub_id` int(10) NOT NULL,
  `section` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stu_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stu_name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `new_sub`
--

INSERT INTO `new_sub` (`new_sub_id`, `section`, `sub_id`, `stu_id`, `stu_name`) VALUES
(76, '1', 'ITS221', '601208217', 'นางสาววรรณวิภา เนียมหอม'),
(77, '1', 'ITS221', '601208330', 'นางสาวมนฑ์ปลิดา ธนาภัทร์ศิริสกุล'),
(78, '1', 'ITS221', '601208429', 'นายอนุรักษ์ กฤษดากุล'),
(79, '1', 'ITS221', '601208916', 'นายรัตนชัย สีสุขโข'),
(80, '1', 'ITS221', '601209158', 'นางสาวสุพรรณี แสงสุข'),
(81, '1', 'ITS221', '601209213', 'นายปัณณวัฒน์ ขันติกุล'),
(82, '1', 'ITS221', '601209556', 'นางสาวทิพามณี เจิมนำ'),
(83, '1', 'ITS221', '601209695', 'นางสาวธิดา ศรีคำ');

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
-- Indexes for table `barcode_tb`
--
ALTER TABLE `barcode_tb`
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
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barcode_tb`
--
ALTER TABLE `barcode_tb`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
--
-- AUTO_INCREMENT for table `new_sub`
--
ALTER TABLE `new_sub`
  MODIFY `new_sub_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;
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
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
