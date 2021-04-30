-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2021 at 08:38 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `uid` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `first_name` varchar(20) DEFAULT NULL,
  `last_name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`uid`, `password`, `first_name`, `last_name`) VALUES
('admin1', 'admin2', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `paper_id` varchar(10) NOT NULL,
  `paper_name` varchar(30) NOT NULL,
  `semester` int(5) NOT NULL,
  `date` date NOT NULL,
  `start_time` time NOT NULL,
  `marks` int(5) NOT NULL,
  `end_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`paper_id`, `paper_name`, `semester`, `date`, `start_time`, `marks`, `end_time`) VALUES
('INFO3201', 'WEB TECHNOLOGY', 5, '2018-04-06', '23:05:00', 100, '00:00:00'),
('INFO5101', 'Software Engineering', 5, '2018-04-17', '21:00:00', 100, '22:00:00'),
('INFO5102', 'DBMS', 5, '2018-03-31', '13:34:34', 100, '00:00:00'),
('INFO5103', 'OPERATING SYSTEM', 5, '2018-04-16', '13:01:00', 100, '13:26:00');

-- --------------------------------------------------------

--
-- Table structure for table `option_choosen`
--

CREATE TABLE `option_choosen` (
  `opt_id` int(20) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `ques_id` varchar(10) NOT NULL,
  `answer` varchar(5) NOT NULL,
  `score` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `option_choosen`
--

INSERT INTO `option_choosen` (`opt_id`, `user_id`, `ques_id`, `answer`, `score`) VALUES
(45, 'Aishik', '1', 'A', 10),
(46, 'Aishik', '2', 'B', 0),
(63, 'raj1', '1', 'D', 10),
(64, 'raj1', '10', 'A', 10),
(65, 'raj1', '2', 'B', 10),
(66, 'raj1', '3', 'D', 10),
(67, 'raj1', '4', 'D', 10),
(68, 'raj1', '5', 'A', 10),
(69, 'raj1', '6', 'D', 10),
(70, 'raj1', '7', 'NULL', 0),
(71, 'raj1', '8', 'C', 0),
(72, 'raj1', '9', 'C', 10);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `ques_id` varchar(10) NOT NULL,
  `paper_id` varchar(10) NOT NULL,
  `question` varchar(500) DEFAULT NULL,
  `opt_a` varchar(50) NOT NULL,
  `opt_b` varchar(50) NOT NULL,
  `opt_c` varchar(50) NOT NULL,
  `opt_d` varchar(50) NOT NULL,
  `answer` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`ques_id`, `paper_id`, `question`, `opt_a`, `opt_b`, `opt_c`, `opt_d`, `answer`) VALUES
('1', 'INFO5101', 'Software is considered to be collection of?', 'programming code', 'associated libraries', 'documentations', 'All of the above', 'D'),
('10', 'INFO5101', 'The spiral model was originally proposed by-', 'Barry Boehm', 'Pressman', 'Royce', 'Pressman', 'A'),
('2', 'INFO5101', 'The process of developing a software product using software engineering principles and methods is referred to as?', 'Software Engineering', 'Software Evolution', 'System Models', 'Software Models', 'B'),
('3', 'INFO5101', 'Which of the following is the Characteristics of good software?', 'Transitional', 'Operational', 'Maintenance', 'All of the above', 'D'),
('4', 'INFO5101', 'Where there is a need of Software Engineering?', 'For Large Software', 'To reduce Cost', 'Software Quality Management', 'All of the above', 'D'),
('5', 'INFO5101', 'Efficiency in a software product does not include?', 'licensing', 'processing time', 'responsiveness', 'memory utilization', 'A'),
('6', 'INFO5101', '“Software engineers should not use their technical skills to misuse other people’s computers.”Here the term misuse refers to?', 'Unauthorized access to computer material', 'Unauthorized modification of computer material', 'Dissemination of viruses or other malware', 'All of the mentioned', 'D'),
('7', 'INFO5101', 'Which of these software engineering activities are not a part of software processes?', 'Software development', 'Software dependence', 'Software validation', 'Software specification', 'B'),
('8', 'INFO5101', 'The fundamental notions of software engineering does not account for?', 'Software Security', 'Software reuse', 'Software processes', 'Software Validation', 'D'),
('9', 'INFO5101', 'SDLC stands for', 'System Development Life cycle', 'Software Design Life Cycle', 'Software Development Life Cycle', 'System Design Life Cycle', 'C');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `rid` int(10) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `paper_id` varchar(10) NOT NULL,
  `total_marks` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`rid`, `user_id`, `paper_id`, `total_marks`) VALUES
(31, 'Aishik', 'INFO5101', 10),
(37, 'raj1', 'INFO5101', 80);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `user_id` varchar(20) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(35) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `semester` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`user_id`, `first_name`, `last_name`, `password`, `email`, `phone`, `semester`) VALUES
('Aishik', 'Aishik', 'Deb', 'Aishik', 'aishik@gmail.com', 9999999999, 5),
('raj1', 'Rajnish', 'Mishra', 'raj1', 'rajnish@gmail.com', 9999999999, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`paper_id`);

--
-- Indexes for table `option_choosen`
--
ALTER TABLE `option_choosen`
  ADD PRIMARY KEY (`opt_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`ques_id`),
  ADD KEY `question_ibfk_1` (`paper_id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `option_choosen`
--
ALTER TABLE `option_choosen`
  MODIFY `opt_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `rid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`paper_id`) REFERENCES `exam` (`paper_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
