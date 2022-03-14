-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2022 at 02:06 PM
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
(66, 'Not available*', 'radlet', 'Jane', 'asd', '3', 'Male ', 'Married', 'Catholic', '2018-01-22', 'Manila', '35 Simoun Street Tondo,Manila', 'Araceli Malabad', 'Vendor', '09111111111', 'araceli Malabad', 'Vendor', '09111111111', '5413521', 'Vendor', '', '', 'mhaytuliao06@gmail.com', '', '', '2022-01-21', '1', 'New'),
(68, 'Not available*', 'Doe', 'Jane', 'asd', '0', 'Male ', 'Married', 'Catholic', '2022-01-21', 'Manila', '35 Simoun Street Tondo,Manila', 'Araceli Malabad', 'Vendor', '09111111111', 'araceli Malabad', 'Vendor', '09111111111', 'Araceli Tayag', 'Vendor', '2020', '<br /><b>Warning</b>:  Undefined variable $syRow in <b>C:xampphtdocsTIGstudentadmission_form.php</b> on line <b>214</b><br /><br /><b>Warning</b>:  Trying to access array offset on value of type null ', 'mhaytuliao06@gmail.com', '', '', '2022-01-21', '<br />\r\n<b>Warning</b>:  Trying to access array of', 'New');

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
(68, 'estrella', '09111111111', '');

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
(67, 'raddley', 'a3dcb4d229de6fde0db5686dee47145d', 'Student', 'Accepted'),
(68, 'em420', 'a3dcb4d229de6fde0db5686dee47145d', 'Student', 'Accepted');

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
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

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
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

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
