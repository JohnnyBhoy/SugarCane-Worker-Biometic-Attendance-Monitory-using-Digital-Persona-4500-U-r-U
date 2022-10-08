-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2022 at 04:15 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sugar`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_id` int(9) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `userPassword` varchar(30) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `username`, `email`, `userPassword`, `created`) VALUES
(1, 'Admin', 'admin@gmail.com', 'admin', '2022-09-09 08:08:31'),
(2, 'Owner', 'owner@gmail.com', 'owner', '2022-09-09 08:08:31'),
(3, 'Mary Mae', 'marymaevillamero@gmail.com', 'marymae', '2022-09-21 13:04:11'),
(4, 'Ronel', 'RonelDorimon@gmail.com', 'Ronel', '2022-09-21 13:09:09'),
(5, 'Mariel', 'MarielMagsipoc@gmail.com', 'Mariel', '2022-09-21 13:19:15'),
(6, 'Samuel', 'SamuelDiaz@gmail.com', 'Samuel', '2022-09-21 14:41:33'),
(7, 'Pedro', 'PedroDela Cruz@gmail.com', 'Pedro', '2022-09-30 20:21:51'),
(8, 'uoi555', 'uoi555)()()(_56465456@gmail.co', 'uoi555', '2022-10-07 01:52:04'),
(9, 'uuiu', 'uuiuuui@gmail.com', 'uuiu', '2022-10-07 01:54:13'),
(10, '', 's@gmail.com', '', '2022-10-08 09:16:26'),
(11, '', 'w@gmail.com', '', '2022-10-08 09:17:14'),
(12, 's', 'ss@gmail.com', 's', '2022-10-08 09:19:08'),
(13, 'Remia', 'RemiaGubat@gmail.com', 'Remia', '2022-10-08 09:26:07'),
(14, 'Mary Mae', 'Mary MaeVillamero@gmail.com', 'Mary Mae', '2022-10-08 09:28:21'),
(15, 'Mary Mae', 'Mary MaeVillamero@gmail.com', 'Mary Mae', '2022-10-08 09:30:06'),
(16, 'b', 'bA@gmail.com', 'b', '2022-10-08 09:36:32'),
(17, 'b', 'bA@gmail.com', 'b', '2022-10-08 09:37:02'),
(18, 'b', 'bA@gmail.com', 'b', '2022-10-08 09:37:56'),
(19, 'b', 'bA@gmail.com', 'b', '2022-10-08 09:38:46'),
(20, 's', 'sas@gmail.com', 's', '2022-10-08 09:39:30'),
(21, 's', 'sas@gmail.com', 's', '2022-10-08 09:39:49'),
(22, 's', 'sas@gmail.com', 's', '2022-10-08 09:39:59'),
(23, 's', 'sas@gmail.com', 's', '2022-10-08 09:40:19'),
(24, 's', 'sas@gmail.com', 's', '2022-10-08 09:40:45'),
(25, 's', 'sas@gmail.com', 's', '2022-10-08 09:40:59'),
(26, 's', 'sas@gmail.com', 's', '2022-10-08 09:41:12'),
(27, 's', 'sas@gmail.com', 's', '2022-10-08 09:41:24'),
(28, 's', 'sas@gmail.com', 's', '2022-10-08 09:41:39'),
(29, 's', 'sas@gmail.com', 's', '2022-10-08 09:42:18');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `a_id` int(10) NOT NULL,
  `worker` int(7) NOT NULL,
  `Time_In` datetime NOT NULL,
  `Time_out` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`a_id`, `worker`, `Time_In`, `Time_out`) VALUES
(1, 1, '2022-09-21 13:04:20', '2022-10-07 01:20:18'),
(2, 2, '2022-09-21 13:10:04', '2022-09-21 13:12:05'),
(3, 3, '2022-09-21 13:19:21', '2022-09-21 18:20:10'),
(4, 4, '2022-09-21 14:41:40', '0000-00-00 00:00:00'),
(5, 2, '2022-09-30 13:49:03', '0000-00-00 00:00:00'),
(6, 1, '2022-10-07 01:19:36', '2022-10-07 01:20:18');

-- --------------------------------------------------------

--
-- Table structure for table `cash_advance`
--

CREATE TABLE `cash_advance` (
  `c_id` int(11) NOT NULL,
  `worker` int(5) NOT NULL,
  `amount` int(7) NOT NULL,
  `dated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cash_advance`
--

INSERT INTO `cash_advance` (`c_id`, `worker`, `amount`, `dated`) VALUES
(2, 4, 1000, '2022-10-08 08:23:00'),
(3, 2, 1000, '2022-10-08 14:36:00');

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `p_id` int(11) NOT NULL,
  `position` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`p_id`, `position`) VALUES
(3, 'Tapasero'),
(4, 'Manugguna'),
(5, 'Driver'),
(6, 'Helper'),
(7, 'Kabo'),
(8, 'Select Worker');

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `s_id` int(11) NOT NULL,
  `salary` decimal(7,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`s_id`, `salary`) VALUES
(1, '250'),
(2, '200'),
(3, '150');

-- --------------------------------------------------------

--
-- Table structure for table `worker`
--

CREATE TABLE `worker` (
  `w_id` int(11) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `mname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `ext` varchar(4) NOT NULL,
  `dob` date NOT NULL,
  `addres` varchar(60) NOT NULL,
  `finger` text NOT NULL,
  `contact` int(20) NOT NULL,
  `position` varchar(30) NOT NULL,
  `worker_type` varchar(30) NOT NULL,
  `salary` decimal(9,0) NOT NULL,
  `doh` date NOT NULL,
  `added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `worker`
--

INSERT INTO `worker` (`w_id`, `fname`, `mname`, `lname`, `ext`, `dob`, `addres`, `finger`, `contact`, `position`, `worker_type`, `salary`, `doh`, `added`) VALUES
(1, 'Mary Mae', 'Clemenia', 'Villamero', '', '1999-07-04', 'Marcelo', 'Vilamero.fpt', 2147483647, 'Kabo', 'Daily', '250', '2022-09-21', '2022-09-21 13:04:11'),
(2, 'Ronel', 'Sombilon', 'Dorimon', '', '1998-11-01', 'Sagay', 'Dorimon.fpt', 2147483647, 'Driver', 'Daily', '250', '2022-09-18', '2022-09-21 13:09:09'),
(3, 'Mariel', 'Diones', 'Magsipoc', '', '2001-02-20', 'Fabrica', 'Magsipoc.fpt', 2147483647, 'Helper', 'Daily', '200', '2022-09-19', '2022-09-21 13:19:15'),
(4, 'Samuel', 'Francisco', 'Diaz', '', '2000-11-21', 'Manapla', 'Diaz.fpt', 2147483647, 'Manugguna', 'Daily', '150', '2022-09-21', '2022-09-21 14:41:32'),
(5, 'Dela Cruz', 'Pedro', 'Francisco', '', '0000-00-00', 'Sagay City', '', 0, 'Driver', 'Daily', '150', '2022-09-30', '2022-09-30 20:21:50'),
(6, ')()()(_56465456', 'uoi555', 'jhjl', 'Jr.', '2022-03-19', 'San  Isidro,Banquerohan, Cadiz City', '', 2147483647, 'Driver', 'Daily', '150', '2022-10-11', '2022-10-07 01:52:04'),
(7, 'uuiu', 'iuo', 'uui', 'Sr.', '2022-10-10', 'hjgj', 'sample.fpt', 0, 'Kabo', 'Daily', '200', '2022-10-07', '2022-10-07 01:54:13'),
(9, 'w', '', 'w', '', '0000-00-00', 'Cadiz City', '', 0, 'Driver', 'Daily', '150', '2022-10-08', '2022-10-08 09:17:14'),
(11, 'Remia', 'P.', 'Gubat', '', '1998-08-01', 'SagayCity', 'sugar (1).sql', 0, 'Kabo', 'Daily', '150', '2022-10-08', '2022-10-08 09:26:07'),
(12, 'Mary Mae', 'A.', 'Villamero', '', '2004-01-01', 'Sagay City', 'sugar (1).sql', 2147483647, 'Driver', 'Daily', '150', '2022-10-08', '2022-10-08 09:28:21'),
(13, 'Mary Mae', 'A.', 'Villamero', '', '2004-01-01', 'Sagay City', 'sugar (1).sql', 2147483647, 'Driver', 'Daily', '150', '2022-10-08', '2022-10-08 09:30:06');

-- --------------------------------------------------------

--
-- Table structure for table `worker_type`
--

CREATE TABLE `worker_type` (
  `w_id` int(11) NOT NULL,
  `worker_type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `worker_type`
--

INSERT INTO `worker_type` (`w_id`, `worker_type`) VALUES
(1, 'Pakyaw'),
(2, 'Daily'),
(3, 'Freelancer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `cash_advance`
--
ALTER TABLE `cash_advance`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `worker`
--
ALTER TABLE `worker`
  ADD PRIMARY KEY (`w_id`);

--
-- Indexes for table `worker_type`
--
ALTER TABLE `worker_type`
  ADD PRIMARY KEY (`w_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `a_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cash_advance`
--
ALTER TABLE `cash_advance`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `worker`
--
ALTER TABLE `worker`
  MODIFY `w_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `worker_type`
--
ALTER TABLE `worker_type`
  MODIFY `w_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
