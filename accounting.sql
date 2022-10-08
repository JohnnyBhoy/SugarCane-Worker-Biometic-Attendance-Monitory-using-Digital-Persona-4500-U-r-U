-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2022 at 05:22 AM
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
-- Database: `accounting`
--

-- --------------------------------------------------------

--
-- Table structure for table `addres`
--

CREATE TABLE `addres` (
  `a_id` int(15) NOT NULL,
  `addres` varchar(50) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addres`
--

INSERT INTO `addres` (`a_id`, `addres`, `created`) VALUES
(14, 'Brgy. San Isidro, Toboso', '2022-08-24 11:13:02'),
(16, 'Brgy. Tabun-ac, Toboso', '2022-08-24 11:14:30'),
(17, 'Brgy. Bandila, Toboso', '2022-08-24 11:15:40'),
(18, 'Brgy. Bug-ang, Toboso', '2022-08-24 11:19:07'),
(19, 'Brgy. Salamanca,Toboso', '2022-08-24 14:52:24'),
(20, 'Brgy. Concepcion, Toboso', '2022-08-25 08:23:40');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_id` int(15) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `userPassword` varchar(20) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `username`, `email`, `userPassword`, `created`) VALUES
(1, 'TOBOSO Accounting', 'admin@gmail.com', 'admin', '2022-08-22 10:24:20'),
(2, 'Johnny Antiojo Jr.', 'jrantiojobhoy@gmail.com', 'antiojo', '2022-08-22 10:24:20');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `c_id` int(15) NOT NULL,
  `course` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`c_id`, `course`) VALUES
(3, 'B.S. Information Technology'),
(4, 'B.S. Business Administration'),
(5, 'B.S. Public Administration');

-- --------------------------------------------------------

--
-- Table structure for table `deductions`
--

CREATE TABLE `deductions` (
  `d_id` int(15) NOT NULL,
  `emp_id` int(15) NOT NULL,
  `gsis_prem` decimal(7,0) NOT NULL,
  `gsis_policy` decimal(7,0) NOT NULL,
  `hdmf_prem` decimal(7,0) NOT NULL,
  `hdmf_policy` decimal(7,0) NOT NULL,
  `philhealth` decimal(7,0) NOT NULL,
  `tax` decimal(7,0) NOT NULL,
  `mp2` decimal(7,0) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `d_id` int(15) NOT NULL,
  `department` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`d_id`, `department`) VALUES
(1, 'Accounting'),
(2, 'Mayors Office'),
(3, 'Audit'),
(4, 'Health'),
(5, 'Budget'),
(6, 'Assessors'),
(7, 'Engineering'),
(8, 'Local Civil Registrar');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `e_id` int(15) NOT NULL,
  `education` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`e_id`, `education`) VALUES
(1, 'Elementary'),
(2, 'High School'),
(3, 'Senior High School'),
(4, 'Vocational Course'),
(5, 'TESDA Course'),
(6, '2-yr College'),
(7, '4-yr Bachelors Degree'),
(8, 'Masteral Degree'),
(9, 'Doctorate / PHD.');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `e_id` int(15) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `middle_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `suffix` varchar(5) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `birth_date` date NOT NULL,
  `addres` varchar(60) NOT NULL,
  `stat` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `contact` int(16) NOT NULL,
  `religion` varchar(30) NOT NULL,
  `educational_attainment` varchar(30) NOT NULL,
  `course` varchar(50) NOT NULL,
  `employee_type` varchar(20) NOT NULL,
  `department` varchar(50) NOT NULL,
  `job_title` varchar(50) NOT NULL,
  `salary` int(12) NOT NULL,
  `cse` varchar(3) NOT NULL,
  `cse_type` varchar(30) NOT NULL,
  `hired` date NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`e_id`, `first_name`, `middle_name`, `last_name`, `suffix`, `gender`, `birth_date`, `addres`, `stat`, `email`, `contact`, `religion`, `educational_attainment`, `course`, `employee_type`, `department`, `job_title`, `salary`, `cse`, `cse_type`, `hired`, `created`) VALUES
(1, 'John Wick', 'D', 'Doe', '', 'Male', '1193-12-10', '16', 'Single', 'jrantiojobhoy@gmai.com', 2147483647, '9', '7', '3', '4', '3', '3', 3500, 'No', 'Not', '2022-12-10', '2022-08-25 04:05:25'),
(2, 'Johnny', 'Peligro', 'Antiojo', '', 'Male', '1993-12-10', '16', 'Single', 'jrantiojobhoy@gmail.com', 2147483647, '1', '7', '2', '4', '2', '3', 3500, 'No', 'Not', '2019-08-19', '2022-08-25 04:06:57'),
(3, 'Romeo', 'D.', 'Lobaton', 'Jr.', 'Male', '1994-01-25', '16', 'Married', 'techzquad@gmail.com', 2147483647, '8', '7', '3', '4', '1', '2', 3500, 'Yes', 'Sub-Professional', '2019-07-19', '2022-08-25 04:08:18'),
(4, 'John', 'D', 'Doe', '', 'Male', '1193-12-10', '16', 'Single', 'jrantiojobhoy@gmai.com', 2147483647, '9', '7', '3', '4', '3', '3', 3500, 'No', 'Not', '2022-12-10', '2022-08-25 04:05:25'),
(5, 'Johnny', 'Peligro', 'Antiojo', '', 'Male', '1993-12-10', '16', 'Single', 'jrantiojobhoy@gmail.com', 2147483647, '1', '7', '2', '4', '2', '3', 3500, 'No', 'Not', '2019-08-19', '2022-08-25 04:06:57'),
(6, 'Romeo', 'D.', 'Lobaton', 'Jr.', 'Male', '1994-01-25', '16', 'Married', 'techzquad@gmail.com', 2147483647, '8', '7', '3', '4', '1', '2', 3500, 'Yes', 'Professional', '2019-07-19', '2022-08-25 04:08:18'),
(7, 'John', 'D', 'Doe', '', 'Male', '1193-12-10', '16', 'Single', 'jrantiojobhoy@gmai.com', 2147483647, '9', '7', '3', '4', '3', '3', 3500, 'No', 'Not', '2022-12-10', '2022-08-25 04:05:25'),
(9, 'Romeo', 'D.', 'Lobaton', 'Jr.', 'Female', '1994-01-25', '16', 'Married', 'techzquad@gmail.com', 2147483647, '8', '7', '3', '4', '1', '2', 3500, 'Yes', 'Sub-Professional', '2019-07-19', '2022-08-25 04:08:18'),
(10, 'John', 'D', 'Doe', '', 'Male', '1193-12-10', '16', 'Single', 'jrantiojobhoy@gmai.com', 2147483647, '9', '7', '3', '4', '3', '3', 3500, 'No', 'Not', '2022-12-10', '2022-08-25 04:05:25'),
(12, 'Romeo', 'D.', 'Lobaton', 'Jr.', 'Male', '1994-01-25', '16', 'Married', 'techzquad@gmail.com', 2147483647, '8', '7', '3', '4', '1', '2', 3500, 'Yes', 'Sub-Professional', '2019-07-19', '2022-08-25 04:08:18'),
(13, 'John', 'D', 'Doe', '', 'Male', '1193-12-10', '16', 'Single', 'jrantiojobhoy@gmai.com', 2147483647, '9', '7', '3', '4', '3', '3', 3500, 'No', 'Not', '2022-12-10', '2022-08-25 04:05:25'),
(15, 'Romeo', 'D.', 'Lobaton', 'Jr.', 'Male', '1994-01-25', '16', 'Married', 'techzquad@gmail.com', 2147483647, '8', '7', '3', '4', '1', '2', 3500, 'Yes', 'Sub-Professional', '2019-07-19', '2022-08-25 04:08:18'),
(16, 'John', 'D', 'Doe', '', 'Male', '1193-12-10', '16', 'Single', 'jrantiojobhoy@gmai.com', 2147483647, '9', '7', '3', '4', '3', '3', 3500, 'No', 'Not', '2022-12-10', '2022-08-25 04:05:25'),
(18, 'Romeo', 'D.', 'Lobaton', 'Jr.', 'Male', '1994-01-25', '16', 'Married', 'techzquad@gmail.com', 2147483647, '8', '7', '3', '4', '1', '2', 3500, 'Yes', 'Sub-Professional', '2019-07-19', '2022-08-25 04:08:18'),
(19, 'John', 'D', 'Doe', '', 'Male', '1193-12-10', '16', 'Single', 'jrantiojobhoy@gmai.com', 2147483647, '9', '7', '3', '4', '3', '3', 3500, 'No', 'Not', '2022-12-10', '2022-08-25 04:05:25'),
(21, 'Romeo', 'D.', 'Lobaton', 'Jr.', 'Male', '1994-01-25', '16', 'Married', 'techzquad@gmail.com', 2147483647, '8', '7', '3', '4', '1', '2', 3500, 'Yes', 'Sub-Professional', '2019-07-19', '2022-08-25 04:08:18'),
(24, 'John Wick', 'D', 'Doe', '', 'Male', '1193-12-10', '16', 'Single', 'jrantiojobhoy@gmai.com', 2147483647, '9', '7', '3', '4', '3', '3', 3500, 'No', 'Not', '2022-12-10', '2022-08-25 04:05:25'),
(26, 'Romeo', 'D.', 'Lobaton', 'Jr.', 'Male', '1994-01-25', '16', 'Married', 'techzquad@gmail.com', 2147483647, '8', '7', '3', '4', '1', '2', 3500, 'Yes', 'Sub-Professional', '2019-07-19', '2022-08-25 04:08:18'),
(27, 'John', 'D', 'Doe', '', 'Male', '1193-12-10', '16', 'Single', 'jrantiojobhoy@gmai.com', 2147483647, '9', '7', '3', '4', '3', '3', 3500, 'No', 'Not', '2022-12-10', '2022-08-25 04:05:25'),
(28, 'Johnny', 'Peligro', 'Antiojo', '', 'Male', '1993-12-10', '16', 'Single', 'jrantiojobhoy@gmail.com', 2147483647, '1', '7', '2', '4', '2', '3', 3500, 'No', 'Not', '2019-08-19', '2022-08-25 04:06:57'),
(29, 'Romeo', 'D.', 'Lobaton', 'Jr.', 'Male', '1994-01-25', '16', 'Married', 'techzquad@gmail.com', 2147483647, '8', '7', '3', '4', '1', '2', 3500, 'Yes', 'Sub-Professional', '2019-07-19', '2022-08-25 04:08:18'),
(30, 'John', 'D', 'Doe', '', 'Male', '1193-12-10', '16', 'Single', 'jrantiojobhoy@gmai.com', 2147483647, '9', '7', '3', '4', '3', '3', 3500, 'No', 'Not', '2022-12-10', '2022-08-25 04:05:25'),
(32, 'Romeo', 'D.', 'Lobaton', 'Jr.', 'Male', '1994-01-25', '16', 'Married', 'techzquad@gmail.com', 2147483647, '8', '7', '3', '4', '1', '2', 3500, 'Yes', 'Sub-Professional', '2019-07-19', '2022-08-25 04:08:18'),
(33, 'John', 'D', 'Doe', '', 'Male', '1193-12-10', '16', 'Single', 'jrantiojobhoy@gmai.com', 2147483647, '9', '7', '3', '4', '3', '3', 3500, 'No', 'Not', '2022-12-10', '2022-08-25 04:05:25'),
(34, 'Romeo', 'D.', 'Lobaton', 'Jr.', 'Male', '1994-01-25', '16', 'Married', 'techzquad@gmail.com', 2147483647, '8', '7', '3', '4', '1', '2', 3500, 'Yes', 'Sub-Professional', '2019-07-19', '2022-08-25 04:08:18');

-- --------------------------------------------------------

--
-- Table structure for table `employee_type`
--

CREATE TABLE `employee_type` (
  `e_id` int(15) NOT NULL,
  `emp_type` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_type`
--

INSERT INTO `employee_type` (`e_id`, `emp_type`) VALUES
(1, 'Regular'),
(2, 'Casual'),
(3, 'Assignment Order'),
(4, 'Job Order');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `j_id` int(15) NOT NULL,
  `job` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`j_id`, `job`) VALUES
(1, 'Driver'),
(2, 'Administrative Assistant'),
(3, 'Clerk');

-- --------------------------------------------------------

--
-- Table structure for table `loan_contribution`
--

CREATE TABLE `loan_contribution` (
  `c_id` int(15) NOT NULL,
  `e_id` int(15) NOT NULL,
  `contribution` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `loan_details`
--

CREATE TABLE `loan_details` (
  `l_id` int(15) NOT NULL,
  `employee_id` int(15) NOT NULL,
  `loan_id` int(15) NOT NULL,
  `loan_term` int(15) NOT NULL,
  `loan_amount` int(15) NOT NULL,
  `loan_interest` int(20) NOT NULL,
  `start_contribution` date NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `loan_interest`
--

CREATE TABLE `loan_interest` (
  `i_id` int(11) NOT NULL,
  `interest` decimal(5,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `loan_term`
--

CREATE TABLE `loan_term` (
  `t_id` int(11) NOT NULL,
  `term` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `loan_type`
--

CREATE TABLE `loan_type` (
  `l_id` int(20) NOT NULL,
  `loan_type` varchar(40) NOT NULL,
  `loan_in` varchar(40) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan_type`
--

INSERT INTO `loan_type` (`l_id`, `loan_type`, `loan_in`, `created`) VALUES
(1, 'Bank Loan', 'Landbank of the Phillipines', '2022-08-27 17:28:12'),
(2, 'Government Loan', 'GSIS', '2022-08-27 17:28:12'),
(3, 'Bank Loan', 'BPI Loan', '2022-08-27 17:28:12'),
(4, 'Government Loan', 'Pag-ibig Loan', '2022-08-27 17:28:12');

-- --------------------------------------------------------

--
-- Table structure for table `payroll`
--

CREATE TABLE `payroll` (
  `p_id` int(20) NOT NULL,
  `e_id` int(11) NOT NULL,
  `basic_pay` decimal(12,0) NOT NULL,
  `less_deduction` decimal(12,0) NOT NULL,
  `pera` decimal(12,0) NOT NULL,
  `rata` decimal(12,0) NOT NULL,
  `month_period` date NOT NULL,
  `first_salary` decimal(12,0) NOT NULL,
  `second_salary` decimal(12,0) NOT NULL,
  `tax` decimal(12,0) NOT NULL,
  `mp2` decimal(12,0) NOT NULL,
  `gsis` decimal(10,0) NOT NULL,
  `philhealth` decimal(10,0) NOT NULL,
  `pagibig` decimal(10,0) NOT NULL,
  `recieved` varchar(50) NOT NULL DEFAULT 'Bedonia, Marilyn C.',
  `certified` varchar(50) NOT NULL DEFAULT 'JUANITO D. MALINAO JR.',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `religion`
--

CREATE TABLE `religion` (
  `r_id` int(15) NOT NULL,
  `religion` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `religion`
--

INSERT INTO `religion` (`r_id`, `religion`) VALUES
(1, 'Roman Catholic'),
(2, 'Iglesia ni Cristo'),
(3, 'Baptist'),
(4, 'Muslim'),
(5, 'Jehovah Witness'),
(6, 'Budhist'),
(7, 'Atheist'),
(8, 'Other'),
(9, '7th Day Adventist'),
(10, 'Islam'),
(11, 'None');

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `s_id` int(15) NOT NULL,
  `salary` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `s_id` int(15) NOT NULL,
  `settings` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`s_id`, `settings`) VALUES
(1, 'Deductions'),
(2, 'Loan'),
(3, 'Additional'),
(4, 'Other');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addres`
--
ALTER TABLE `addres`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `deductions`
--
ALTER TABLE `deductions`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`e_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`e_id`);

--
-- Indexes for table `employee_type`
--
ALTER TABLE `employee_type`
  ADD PRIMARY KEY (`e_id`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`j_id`);

--
-- Indexes for table `loan_contribution`
--
ALTER TABLE `loan_contribution`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `loan_details`
--
ALTER TABLE `loan_details`
  ADD PRIMARY KEY (`l_id`);

--
-- Indexes for table `loan_interest`
--
ALTER TABLE `loan_interest`
  ADD PRIMARY KEY (`i_id`);

--
-- Indexes for table `loan_term`
--
ALTER TABLE `loan_term`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `loan_type`
--
ALTER TABLE `loan_type`
  ADD PRIMARY KEY (`l_id`);

--
-- Indexes for table `payroll`
--
ALTER TABLE `payroll`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `religion`
--
ALTER TABLE `religion`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`s_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addres`
--
ALTER TABLE `addres`
  MODIFY `a_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `c_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `deductions`
--
ALTER TABLE `deductions`
  MODIFY `d_id` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `d_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `e_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `e_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `employee_type`
--
ALTER TABLE `employee_type`
  MODIFY `e_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `j_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `loan_contribution`
--
ALTER TABLE `loan_contribution`
  MODIFY `c_id` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loan_details`
--
ALTER TABLE `loan_details`
  MODIFY `l_id` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loan_interest`
--
ALTER TABLE `loan_interest`
  MODIFY `i_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loan_term`
--
ALTER TABLE `loan_term`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loan_type`
--
ALTER TABLE `loan_type`
  MODIFY `l_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payroll`
--
ALTER TABLE `payroll`
  MODIFY `p_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `religion`
--
ALTER TABLE `religion`
  MODIFY `r_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `s_id` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `s_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
