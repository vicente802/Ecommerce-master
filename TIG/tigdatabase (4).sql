-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2022 at 01:25 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tigdatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `userid` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`userid`, `fullname`, `contact_number`, `image`) VALUES
(5, 'Radley Estrella', '56545677700', 'upload/IMG_20171129_215804_1582390335.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `app_for_admission`
--

CREATE TABLE `app_for_admission` (
  `userid` int(11) NOT NULL,
  `student_id` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `middlename` varchar(200) NOT NULL,
  `age` varchar(200) NOT NULL,
  `sex` varchar(200) NOT NULL,
  `civil_status` varchar(200) NOT NULL,
  `religion` varchar(200) NOT NULL,
  `date_of_birth` date NOT NULL,
  `place_of_birth` varchar(100) NOT NULL,
  `permanent_address` varchar(200) NOT NULL,
  `name_of_parent` varchar(200) NOT NULL,
  `parent_occupation` varchar(200) NOT NULL,
  `parent_contact_no` varchar(200) NOT NULL,
  `name_of_guardian` varchar(100) NOT NULL,
  `guardian_occupation` varchar(200) NOT NULL,
  `guardian_contact_no` varchar(200) NOT NULL,
  `if_married_spouse_name` varchar(200) NOT NULL,
  `spouse_occupation` varchar(200) NOT NULL,
  `school_graduated` varchar(200) NOT NULL,
  `AY` varchar(200) NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `course` varchar(50) NOT NULL,
  `major` varchar(50) NOT NULL,
  `dateapplied` date NOT NULL,
  `sem_id` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `app_for_admission`
--

INSERT INTO `app_for_admission` (`userid`, `student_id`, `lastname`, `firstname`, `middlename`, `age`, `sex`, `civil_status`, `religion`, `date_of_birth`, `place_of_birth`, `permanent_address`, `name_of_parent`, `parent_occupation`, `parent_contact_no`, `name_of_guardian`, `guardian_occupation`, `guardian_contact_no`, `if_married_spouse_name`, `spouse_occupation`, `school_graduated`, `AY`, `email_address`, `course`, `major`, `dateapplied`, `sem_id`, `type`) VALUES
(66, 'Not available*', 'radlet', 'Jane', 'asd', '3', 'Male ', 'Married', 'Catholic', '2018-01-22', 'Manila', '35 Simoun Street Tondo,Manila', 'Araceli Malabad', 'Vendor', '09111111111', 'araceli Malabad', 'Vendor', '09111111111', '5413521', 'Vendor', '2020', '2019-2020', 'mhaytuliao06@gmail.com', '', '', '2022-01-21', '1', 'New');

-- --------------------------------------------------------

--
-- Table structure for table `cashier`
--

CREATE TABLE `cashier` (
  `userid` int(11) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `contact_number` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cashier`
--

INSERT INTO `cashier` (`userid`, `fullname`, `contact_number`, `image`) VALUES
(17, 'Sandy Chris Bayengs', '22222222200', 'upload/sandstorm_1579671344.jpg'),
(47, 'Ytzur Arevot', '00011222333', '');

-- --------------------------------------------------------

--
-- Table structure for table `enrollment`
--

CREATE TABLE `enrollment` (
  `id` int(11) NOT NULL,
  `AY` varchar(20) NOT NULL,
  `program_id` int(100) NOT NULL,
  `major_id` varchar(50) NOT NULL,
  `date_registered` datetime NOT NULL,
  `student_id` int(200) NOT NULL,
  `sem_id` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `amount` double NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`id`, `type`, `amount`, `status`) VALUES
(1, 'registration', 100, 'old'),
(2, 'medical/dental', 100, 'old'),
(3, 'library', 150, 'old'),
(4, 'school_organ/publication', 100, 'old'),
(5, 'miscellaneous_fee', 100, 'old'),
(6, 'gso', 100, 'old'),
(7, 'id_validation', 15, 'old'),
(8, 'insurance', 120, 'old'),
(9, 'student_act_fee', 250, 'old'),
(10, 'internet_fee', 250, 'old'),
(11, 'quality_assurance_fee', 100, 'old'),
(12, 'Entrance Fee', 75, 'new'),
(13, 'Registration Fee', 100, 'new'),
(14, 'Medical/Dental', 100, 'new'),
(15, 'Quality Assurance', 100, 'new'),
(16, 'Miscellaneous Fee', 100, 'new'),
(17, 'Student Dev Fund', 250, 'new'),
(18, 'Internet Fee', 250, 'new'),
(19, 'GSO', 100, 'new'),
(20, 'Organ/Publication Fee', 100, 'new'),
(21, 'ID (New Student)', 100, 'new'),
(22, 'Insurance Fee', 120, 'new'),
(23, 'Late Registration', 100, 'new');

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE `instructor` (
  `instructor_id` int(11) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `contact_number` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instructor`
--

INSERT INTO `instructor` (`instructor_id`, `fullname`, `contact_number`, `address`, `status`) VALUES
(2, 'TBA', '', '', ''),
(3, 'Dr. Ederlina M. Sumail', '00000000000', 'TBA', ''),
(4, 'Dr. Gemma B. Somera', '00000000000', 'TBA', ''),
(5, 'Mrs. Elisa Q. Apelado', '00000000000', 'TBA', ''),
(6, 'Dr. Allan O. Ramos', '00000000011', 'TBA', ''),
(7, 'Dr. Imelda N. Binay-an', '00000000000', 'TBA', ''),
(8, 'Dr. Ernest D. Padiwan', '00000000000', 'TBA', ''),
(9, 'Dr. Agnes G. Torres', '00000000333', 'TBA', ''),
(10, 'Mr. Jaybee C. Galay', '00000000000', 'TBA', ''),
(11, 'Engr. Jacqueline C. Gumallaoi', '00000000000', 'TBA', ''),
(12, 'Ms. Gemalyn Tenoc', '00000000000', 'TBA', ''),
(13, 'Mr. Larry Mostoles', '00000000000', 'TBA', ''),
(14, 'Dr. Esmeralda A. Burton', '00000000000', 'TBA', ''),
(15, 'Dr. Shirley P. Palma', '00000000000', 'TBA', ''),
(16, 'Dr. Sheryl S. Morata', '00000000000', 'TBA', ''),
(17, 'Dr. Joey B. Bolinas', '00000000000', 'TBA', ''),
(18, 'Dr. Tessie L. Dela Cruz', '00000000000', 'TBA', ''),
(19, 'Dr. Reagan Louie C. Funtanilla', '00000000000', 'TBA', ''),
(20, 'Dr. Dominador A. Ayson', '00000000000', 'TBA', ''),
(21, 'Dr. Annie D. Dorada', '00000000000', 'TBA', ''),
(22, 'Dr. Delia R. Casillan', '00000000000', 'TBA', ''),
(23, 'Dr. James O. Oyando', '00000000000', 'TBA', '');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `sem_id` int(11) NOT NULL,
  `semester` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `userid` int(11) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `contact_number` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`userid`, `fullname`, `contact_number`, `image`) VALUES
(66, 'Radley Estrella', '09655329400', ''),
(67, 'testing', '12345678900', '');

-- --------------------------------------------------------

--
-- Table structure for table `students_account`
--

CREATE TABLE `students_account` (
  `account_id` int(11) NOT NULL,
  `userid` varchar(255) NOT NULL,
  `sex` varchar(50) NOT NULL,
  `student_course` varchar(50) NOT NULL,
  `student_major` varchar(50) NOT NULL,
  `semester` varchar(50) NOT NULL,
  `school_year` varchar(50) NOT NULL,
  `day` varchar(50) NOT NULL,
  `fee` decimal(50,0) NOT NULL,
  `balance` decimal(50,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subjects_id` int(11) NOT NULL,
  `course` varchar(50) NOT NULL,
  `program_id` int(50) NOT NULL,
  `course_no` varchar(100) NOT NULL,
  `descriptive_title` varchar(200) NOT NULL,
  `units_lec` varchar(50) NOT NULL,
  `units_lab` varchar(50) NOT NULL,
  `hours` varchar(200) NOT NULL,
  `sem_id` varchar(50) NOT NULL,
  `school_yr_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subjects_id`, `course`, `program_id`, `course_no`, `descriptive_title`, `units_lec`, `units_lab`, `hours`, `sem_id`, `school_yr_id`) VALUES
(80, '1', 31, 'MSEGE 201', 'Statistics', '3', '0', '3', '1', '1'),
(81, '1', 31, 'MSEGE 214', 'Sociology of Education', '3', '0', '3', '1', '1'),
(82, '1', 31, 'MSEGE 200', 'Foundations of Education', '3', '0', '3', '1', '1'),
(83, '1', 31, 'MSEGE 211', 'Curriculum & Courses of Study Preparation', '3', '0', '3', '1', '1'),
(84, '1', 31, 'Adv CE', 'ICT Applications in Research', '3', '0', '3', '1', '1'),
(85, '1', 31, 'MSEGE 220 ', 'Social and Cultural Studies', '3', '0', '3', '1', '1'),
(86, '1', 31, 'MSEGE 202', 'Methods of Research', '3', '0', '3', '1', '1'),
(87, '1', 31, 'Ed 299', 'Graduate Seminar', '1', '0', '3', '1', '1'),
(88, '1', 31, 'MS 300', 'Thesis Writing ', '6', '0', '', '1', '1'),
(89, '1', 33, 'MSEE 201', 'Statistics', '3', '0', '3', '1', '1'),
(90, '1', 33, 'MSEE 222', 'Rheotic', '3', '0', '3', '1', '1'),
(91, '1', 33, 'MSEE 200', 'Foundations of Language Education', '3', '0', '3', '1', '1'),
(92, '1', 33, 'MSEE 210', 'Applied Linguistics', '3', '0', '3', '1', '1'),
(93, '1', 33, 'Adv CE', 'ICT Applications in Research', '3', '0', '3', '1', '1'),
(94, '1', 33, 'MSEE 214', 'Language Assessment and Testing ', '3', '0', '3', '1', '1'),
(95, '1', 33, 'MSEE 202', 'Methods of Language and Literary Research', '3', '0', '3', '1', '1'),
(96, '1', 33, 'Ed 299', 'Graduate Seminar', '1', '0', '3', '1', '1'),
(97, '1', 33, 'MS 300', 'Thesis Writing ', '6', '0', '', '1', '1'),
(98, '1', 34, 'MSEGS 201', 'Statistics', '3', '0', '3', '1', '1'),
(99, '1', 34, 'MSEGS 210', 'Advanced Topic in Biological  Science', '3', '0', '3', '1', '1'),
(100, '1', 34, 'MSEGS 200', 'Foundations of Education', '3', '0', '3', '1', '1'),
(102, '1', 34, 'Adv CE', 'ICT Applications in Research', '3', '0', '3', '1', '1'),
(103, '1', 34, 'MSEGS 216', 'Advanced Topic in Ecology and Disaster Risk Mgmt.', '3', '0', '3', '1', '1'),
(104, '1', 34, 'MSEGS 221', 'Laboratory Techniques', '3', '0', '3', '1', '1'),
(105, '1', 34, 'MSEM 202', 'Methods of Research', '3', '0', '3', '1', '1'),
(106, '1', 34, 'Ed 299', 'Graduate Seminar', '1', '0', '3', '1', '1'),
(107, '1', 34, 'MS 300', 'Thesis Writing ', '6', '0', '', '1', '1'),
(109, '1', 32, 'MSEM 201', 'Statistics', '3', '0', '3', '1', '1'),
(110, '1', 32, 'MSEM 216', 'Modern Geometry', '3', '0', '3', '1', '1'),
(111, '1', 32, 'MSEM 200', 'Foundations of Education', '3', '0', '3', '1', '1'),
(112, '1', 32, 'MSEM 218', 'Abstract Algebra', '3', '0', '3', '1', '1'),
(113, '1', 32, 'Adv CE', 'ICT  Applications in Research', '3', '0', '3', '1', '1'),
(114, '1', 32, 'MSEM 211', 'Number Theory', '3', '0', '3', '1', '1'),
(115, '1', 32, 'Ed 299', 'Graduate Seminar', '1', '0', '3', '1', '1'),
(116, '1', 32, 'MS 300', 'Thesis Writing ', '6', '0', '', '1', '1'),
(117, '1', 35, 'Educ 202 ', 'Child and Adolescent Development', '3', '0', '3', '1', '1'),
(118, '1', 35, 'Educ 103', 'Curriculum Development', '3', '0', '3', '1', '1'),
(119, '1', 35, 'Educ 104', 'Preparation of Curriculum Materials', '3', '0', '3', '1', '1'),
(127, '2', 36, 'MAEd 201', 'Statistics', '3', '0', '3', '1', '1'),
(128, '2', 36, 'MAEd 213', 'Educational Management & Leadership Theories', '3', '0', '3', '1', '1'),
(129, '2', 36, 'MAEd 200', 'Foundations of Education', '3', '0', '3', '1', '1'),
(130, '2', 36, 'MAEd 210', 'Developmental Planning', '3', '0', '3', '1', '1'),
(131, '2', 36, 'Adv CE', 'ICT Applications in Research', '3', '0', '3', '1', '1'),
(132, '2', 36, 'MAEd 220 ', 'Social and Cultural Studies', '3', '0', '3', '1', '1'),
(133, '2', 36, 'MAEd 202', 'Methods of Research', '3', '0', '3', '1', '1'),
(134, '2', 36, 'Ed 299', 'Graduate Seminar', '1', '0', '3', '1', '1'),
(135, '2', 36, 'MS 300', 'Thesis Writing ', '6', '0', '3', '1', '1'),
(137, '1', 31, 'MSEGE 212', 'Evaluating Teaching-Learning Process', '3', '0', '3', '2', '1'),
(138, '1', 31, 'MSEGE 213', 'Current Trends & Techniques in Teaching', '3', '0', '3', '2', '1'),
(139, '1', 31, 'MSEGE 201', 'Statistics', '3', '0', '3', '2', '1'),
(140, '1', 31, 'MSEGE 222', 'Advance Educational Psychology', '3', '0', '3', '2', '1'),
(141, '1', 31, 'Adv CE', 'ICT Applications in Research', '3', '0', '3', '2', '1'),
(142, '1', 31, 'MSEGE 200', 'Foundations of Education', '3', '0', '3', '2', '1'),
(143, '1', 31, 'MSEGE 202', 'Methods of Research', '3', '0', '3', '2', '1'),
(144, '1', 31, 'MSEGE 210', 'Educational Theories & Principles', '3', '0', '3', '2', '1'),
(145, '1', 31, 'Ed 299', 'Graduate Seminar', '1', '0', '3', '2', '1'),
(146, '1', 31, 'MS 300', 'Thesis Writing ', '6', '0', '3', '2', '1'),
(147, '1', 32, 'MSEM 201', 'Statistics', '3', '0', '3', '2', '1'),
(148, '1', 32, 'MSEM 210', 'Advanced Business Math', '3', '0', '3', '2', '1'),
(149, '1', 32, 'MSEM 219', 'Advanced Algebra & Trigonometry', '3', '0', '3', '2', '1'),
(150, '1', 32, 'MSEM 200', 'Foundations of Language Education', '3', '0', '3', '2', '1'),
(151, '1', 32, 'Adv CE', 'ICT Applications in Research', '3', '0', '3', '2', '1'),
(152, '1', 32, 'MSEM 213', 'Math Analysis 1', '3', '0', '3', '2', '1'),
(153, '1', 32, 'MSEM 202', 'Methods of Research', '3', '0', '3', '2', '1'),
(154, '1', 32, 'Ed 299', 'Graduate Seminar', '1', '0', '3', '2', '1'),
(155, '1', 32, 'MS 300', 'Thesis Writing ', '6', '0', '3', '2', '1'),
(156, '1', 33, 'MSEE 201', 'Statistics', '3', '0', '3', '2', '1'),
(157, '1', 33, 'MSEE 211', 'Teaching English as a Second Language', '3', '0', '3', '2', '1'),
(158, '1', 33, 'MSEE 200', 'Foundations of Language Education', '3', '0', '3', '2', '1'),
(159, '1', 33, 'Adv CE', 'ICT Applications in Research', '3', '0', '3', '2', '1'),
(160, '1', 33, 'MSEE 212', 'Contemporary Literary Theories & Critical Approaches', '3', '0', '3', '2', '1'),
(161, '1', 33, 'MSEE 202', 'Methods of Language & Literary Research', '3', '0', '3', '2', '1'),
(162, '1', 33, 'Ed 299', 'Graduate Seminar', '1', '0', '2', '2', '1'),
(163, '1', 33, 'MS 300', 'Thesis Writing ', '6', '0', '3', '2', '1'),
(165, '1', 34, 'MSEGS 201', 'Statistics', '3', '0', '3', '2', '1'),
(166, '1', 34, 'MSEGS 212', 'Advanced Topics in Chemistry ', '3', '0', '3', '2', '1'),
(167, '1', 34, 'MSEGS 211', 'Advanced Topics in Earth Science & Spare Travel', '3', '0', '3', '2', '1'),
(168, '1', 34, 'MSEGS 200', 'Foundation of Science Education', '3', '0', '3', '2', '1'),
(169, '1', 34, 'Adv CE', 'ICT Applications in Research', '3', '0', '3', '2', '1'),
(170, '1', 34, 'MSEGS 202', 'Methods of Scientific Research', '3', '0', '3', '2', '1'),
(171, '1', 34, 'Ed 299', 'Graduate Seminar', '1', '0', '2', '2', '1'),
(172, '1', 34, 'MS 300', 'Thesis Writing ', '6', '0', '3', '2', '1'),
(173, '1', 35, 'n/a', 'The Teaching Profession', '3', '0', '3', '2', '1'),
(174, '1', 35, 'MSEGS 200', 'Foundation of Science Education', '3', '0', '3', '2', '1'),
(175, '1', 35, 'Adv CE', 'ICT Applications in Research', '3', '0', '3', '2', '1'),
(176, '1', 35, 'MSEGE 222', 'Advance Educational Psychology', '3', '0', '3', '2', '1'),
(179, '2', 36, 'MAEd', 'Statistics', '3', '0', '3', '2', '1'),
(180, '2', 36, 'MAEd 211', 'Curriculum Management', '3', '0', '3', '2', '1'),
(181, '2', 36, 'MAEd 210', 'Developmental Planning', '3', '0', '3', '2', '1'),
(182, '2', 36, 'MAEd 200', 'Foundations of Education (Philosophy, Psychology, Anthropology, history and Legal)', '3', '0', '3', '2', '1'),
(183, '2', 36, 'Adv CE', 'ICT Applications in Research', '3', '0', '3', '2', '1'),
(184, '2', 36, 'MAEd 222', 'Advance Educational Psychology', '3', '0', '3', '2', '1'),
(185, '2', 36, 'MAEd 214', 'Administrative Theory', '3', '0', '3', '2', '1'),
(186, '2', 36, 'MAEd 222', 'Methods of Research', '3', '0', '3', '2', '1'),
(187, '2', 36, 'Ed 299', 'Graduate Seminar', '1', '0', '3', '2', '1'),
(188, '2', 36, 'MS 300', 'Thesis Writing ', '6', '0', '3', '2', '1'),
(189, '1', 44, 'MSEGE 201', 'Statistics', '3', '0', '3', '2', '1'),
(190, '1', 44, 'MSEGE 213', 'Current Trends & Techniques in Teaching', '3', '0', '3', '2', '1'),
(191, '1', 44, 'MSEGE 222', 'Advance Educational Psychology', '3', '0', '3', '2', '1'),
(192, '1', 44, 'Adv CE', 'ICT Applications in Research', '3', '0', '3', '2', '1'),
(193, '1', 44, 'MSEGE 200', 'Foundations of Education', '3', '0', '3', '2', '1'),
(194, '1', 44, 'MSEGE 202', 'Methods of Research', '3', '0', '3', '2', '1'),
(195, '1', 44, 'MSEGE 210', 'Educational Theories & Principles', '3', '0', '3', '2', '1'),
(196, '1', 44, 'Ed 299', 'Graduate Seminar', '1', '0', '2', '2', '1'),
(197, '1', 44, 'MS 300', 'Thesis Writing ', '6', '0', '', '2', '1'),
(198, '1', 45, 'MSEM 201', 'Statistics', '3', '0', '3', '2', '1'),
(199, '1', 45, 'MSEM 210', 'Advance Business Math', '3', '0', '3', '2', '1'),
(200, '1', 45, 'MSEM 219', 'Advanced Algebra & Trigonometry', '3', '0', '3', '2', '1'),
(201, '1', 45, 'MSEM 200', 'Foundations of Language Education', '3', '0', '3', '2', '1'),
(202, '1', 45, 'Adv CE', 'ICT Applications in Research', '3', '0', '3', '2', '1'),
(203, '1', 45, 'MSEM 213', 'Math Analysis 1', '3', '0', '3', '2', '1'),
(204, '1', 45, 'MSEE 202', 'Methods of Research', '3', '0', '3', '2', '1'),
(205, '1', 45, 'Ed 299', 'Graduate Seminar', '1', '0', '2', '2', '1'),
(206, '1', 45, 'MS 300', 'Thesis Writing ', '6', '0', '', '2', '1'),
(207, '1', 46, 'MSEE 201', 'Statistics', '3', '0', '3', '2', '1'),
(208, '1', 46, 'MSEE 211', 'Teaching English as a Second Language', '3', '0', '3', '2', '1'),
(209, '1', 46, 'MSEE 200', 'Foundations of Language Education', '3', '0', '3', '2', '1'),
(210, '1', 46, 'Adv CE', 'ICT Applications in Research', '3', '0', '3', '2', '1'),
(211, '1', 46, 'MSEE 212', 'Contemporary Literary Theories & Critical Approaches', '3', '0', '3', '2', '1'),
(212, '1', 46, 'MSEE 202', 'Methods of Language & Literary Research', '3', '0', '3', '2', '1'),
(213, '1', 46, 'Ed 299', 'Graduate Seminar', '1', '0', '2', '2', '1'),
(214, '1', 46, 'MS 300', 'Thesis Writing ', '6', '0', '', '2', '1'),
(215, '1', 47, 'MSEGS 201', 'Statistics', '3', '0', '3', '2', '1'),
(216, '1', 47, 'MSEGS 212', 'Advance Topics in Chemistry', '3', '0', '3', '2', '1'),
(217, '1', 47, 'MSEGS 211', 'Advance Topics in Earth Science & Space Travel', '3', '0', '3', '2', '1'),
(218, '1', 47, 'MSEGS 200', 'Foundations of Science Education', '3', '0', '3', '2', '1'),
(219, '1', 47, 'Adv CE', 'ICT Applications in Research', '3', '0', '3', '2', '1'),
(220, '1', 47, 'MSEGS 220', 'Trends in Teaching Secondary Science', '3', '0', '3', '2', '1'),
(221, '1', 47, 'MSEGS 202', 'Methods of Scientific Research', '3', '0', '3', '2', '1'),
(222, '1', 47, 'Ed 299', 'Graduate Seminar', '1', '0', '2', '2', '1'),
(223, '1', 47, 'MS 300', 'Thesis Writing ', '6', '0', '', '2', '1'),
(224, '1', 48, 'n/a', 'The Teaching Profession', '3', '0', '3', '2', '1'),
(225, '1', 48, 'MSEGS 200', 'Foundations of Science Education', '3', '0', '3', '2', '1'),
(226, '1', 48, 'Adv CE', 'ICT Applications in Research', '3', '0', '3', '2', '1'),
(227, '1', 48, 'MSEGE 222', 'Advance Educational Psychology', '3', '0', '3', '2', '1'),
(228, '1', 48, 'n/a', 'Principles of Teaching', '3', '0', '3', '2', '1'),
(229, '2', 49, 'MAEd 201', 'Statistics', '3', '0', '3', '2', '1'),
(230, '2', 49, 'MAEd 211', 'Curriculum Management', '3', '0', '3', '2', '1'),
(231, '2', 49, 'MAEd 210', 'Developmental Planning', '3', '0', '3', '2', '1'),
(232, '2', 49, 'MAEd 200', 'Foundations of Education (Philosophy, Psychology, Anthropology, history and Legal)', '3', '0', '3', '2', '1'),
(233, '2', 49, 'Adv CE', 'ICT Applications in Research', '3', '0', '3', '2', '1'),
(234, '2', 49, 'MAEd 222', 'Advance Educational Psychology', '3', '0', '3', '2', '1'),
(235, '2', 49, 'MAEd 214', 'Administrative Theory', '3', '0', '3', '2', '1'),
(236, '2', 49, 'MAEd 222', 'Methods of Research', '3', '0', '3', '2', '1'),
(237, '2', 49, 'Ed 299', 'Graduate Seminar', '1', '0', '2', '2', '1'),
(238, '2', 49, 'MS 300', 'Graduate Seminar', '6', '0', '', '2', '1'),
(239, '1', 44, 'MSEGE 212', 'Evaluating Teaching-Learning Process', '3', '0', '3', '2', '1'),
(249, '1', 35, 'n/a', 'Principles of Teaching', '3', '0', '3', '2', '1'),
(250, '1', 34, 'MSEGS 220', 'Trends in Teaching Secondary Science', '3', '0', '3', '2', '1'),
(251, '1', 31, 'test', 'tete', '3', '3', '3', '1', '2'),
(252, '1', 31, 'tes2', 'teset2', '3', '2', '2', '1', '2'),
(253, '1', 32, '3e', 'qead', '3', '3', '3', '1', '2'),
(254, '1', 32, '3', '3', '9', '3', '3', '1', '2');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `username` varchar(22) NOT NULL,
  `password` varchar(50) NOT NULL,
  `position` varchar(22) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `password`, `position`, `status`) VALUES
(5, 'admin', 'a3dcb4d229de6fde0db5686dee47145d', 'Admin', ''),
(66, 'radley', 'a3dcb4d229de6fde0db5686dee47145d', 'Student', 'Accepted'),
(67, 'raddley', 'a3dcb4d229de6fde0db5686dee47145d', 'Student', 'Pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `app_for_admission`
--
ALTER TABLE `app_for_admission`
  ADD PRIMARY KEY (`userid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `cashier`
--
ALTER TABLE `cashier`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`instructor_id`),
  ADD KEY `instructor_id` (`instructor_id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`sem_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `students_account`
--
ALTER TABLE `students_account`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subjects_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `app_for_admission`
--
ALTER TABLE `app_for_admission`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `enrollment`
--
ALTER TABLE `enrollment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `instructor`
--
ALTER TABLE `instructor`
  MODIFY `instructor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `sem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `students_account`
--
ALTER TABLE `students_account`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subjects_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=255;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`);

--
-- Constraints for table `app_for_admission`
--
ALTER TABLE `app_for_admission`
  ADD CONSTRAINT `app_for_admission_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `student` (`userid`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
