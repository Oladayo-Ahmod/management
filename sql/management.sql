-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2020 at 04:44 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.0.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `management`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--
-- Error reading structure for table management.admin: #1932 - Table 'management.admin' doesn't exist in engine
-- Error reading data for table management.admin: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `management`.`admin`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `admin_details`
--

CREATE TABLE `admin_details` (
  `id` int(11) NOT NULL,
  `email` varchar(400) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `post` text NOT NULL,
  `regdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `password` text NOT NULL,
  `department` varchar(200) NOT NULL,
  `picture` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_details`
--

INSERT INTO `admin_details` (`id`, `email`, `fullname`, `post`, `regdate`, `password`, `department`, `picture`) VALUES
(1, 'saduadisa@gmail.com', 'sa\'ad Adisa', 'faculty cordinator', '2020-11-24 18:33:10', '9e441a0c92510370dde51ba2547275f3', 'Accounting', '../images/download (2).jpg'),
(3, '', '', '', '2020-11-23 21:27:29', '', '', '../images/Cloud.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `budget`
--
-- Error reading structure for table management.budget: #1932 - Table 'management.budget' doesn't exist in engine
-- Error reading data for table management.budget: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `management`.`budget`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `budgets`
--

CREATE TABLE `budgets` (
  `id` int(11) NOT NULL,
  `item` varchar(200) NOT NULL,
  `item_cost` int(11) NOT NULL,
  `category` varchar(200) NOT NULL,
  `item_desc` text NOT NULL,
  `budget_type` varchar(200) NOT NULL,
  `notedate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `budgets`
--

INSERT INTO `budgets` (`id`, `item`, `item_cost`, `category`, `item_desc`, `budget_type`, `notedate`) VALUES
(1, 'speaker', 15000, 'lecture', 'speaker to be used during lecture and other related programs', 'expenditure', '2020-11-13 16:34:17'),
(2, 'printer', 50000, 'printings', 'printer to for printing documents', 'expenditure', '2020-11-13 08:47:18'),
(3, 'printer', 50000, 'printings', 'printer to for printing documents', 'expenditure', '2020-11-13 08:48:02'),
(5, 'Grant from CEC', 10000, 'donations', 'Grant from CEC for the annual jihad week', 'income', '2020-11-13 16:02:11');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(200) NOT NULL,
  `category_type` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `category_type`) VALUES
(2, 'lecture', 'expenditure'),
(3, 'printings', 'expenditure'),
(4, 'transport', 'expenditure'),
(6, 'donations', 'income'),
(7, 'Annual due', 'income'),
(9, 'subscription', 'income'),
(10, 'others', 'income'),
(11, 'Annual due in arrears', 'expenditure'),
(12, 'excos due in arrears', 'expenditure'),
(13, 'academics', 'expenditure'),
(14, 'food', 'expenditure'),
(15, 'others', 'expenditure'),
(16, 'fines and fees', 'income');

-- --------------------------------------------------------

--
-- Table structure for table `expenditure`
--

CREATE TABLE `expenditure` (
  `id` int(11) NOT NULL,
  `item` varchar(200) NOT NULL,
  `itemdate` date NOT NULL,
  `cost` int(11) NOT NULL,
  `noteDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `itemdesc` text NOT NULL,
  `category` varchar(200) NOT NULL,
  `place` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expenditure`
--

INSERT INTO `expenditure` (`id`, `item`, `itemdate`, `cost`, `noteDate`, `itemdesc`, `category`, `place`) VALUES
(1, 'lecture banner', '2020-11-03', 2020, '2020-11-04 02:39:30', 'lecture banner for the second organized lecture', 'printing', 'Al halal venture'),
(2, 'Mock question papers', '2020-11-02', 2020, '2020-11-04 02:38:50', 'mock question papers bought for to prepare the candidates ahead thier exams', 'printing', 'wallk way'),
(4, 'Visitation to the inmates', '2020-11-03', 5650, '2020-11-03 16:02:05', 'visitation to the inmates at madanla ,ilorin, kwara state', 'transport', 'madanla'),
(5, 'bisquit', '2020-11-02', 3000, '2020-11-09 16:10:53', '2 cartons of bisquit', 'food', 'oke odo'),
(6, 'month', '2020-12-01', 2000, '2020-11-12 11:54:24', 'moth', 'excos', 'madanla'),
(7, 'olamilekan', '2020-11-12', 222, '2020-11-12 11:55:48', 'VR', 'others', 'VV'),
(8, 'micro phone', '2020-11-18', 4000, '2020-11-18 17:22:45', 'micro phone \r\n\r\n', 'lecture', 'post office'),
(9, 'Mock exams printings', '2020-11-19', 4000, '2020-11-19 14:22:03', 'mock exams printings for upcoming examination', 'printings', 'challenge'),
(10, 'micro phone', '2020-01-01', 40000, '2020-12-01 15:43:47', 'micro as phone to ease the learning medium of the learning medium of the students', 'lecture', 'unity junction, ilorin'),
(11, 'micro phone', '2020-02-12', 50000, '2020-12-01 15:44:43', 'micro as phone to ease the learning medium of the learning medium of the students', 'lecture', 'challenge'),
(12, 'printing machine', '2020-03-27', 39500, '2020-12-01 15:47:23', 'printing to ease the printing medium of the students or lecture documents', 'printings', 'general hospitlal bus stop'),
(13, 'photocopying machine', '2020-04-08', 120000, '2020-12-01 15:55:46', 'photocopying machine for printing documents', 'printings', 'challenge bus stop'),
(15, 'Essay competition', '2020-07-13', 120000, '2020-12-01 16:00:14', 'essay competition organized for the students', 'academics', 'LT1 ,university of ilorin'),
(16, 'item 7', '2020-08-12', 45000, '2020-12-01 16:04:10', 'cost incurred in purchase of item 7 food for the attendees and guest', 'food', 'university authorium'),
(17, 'souvenir', '2020-09-14', 49000, '2020-12-01 16:06:27', 'printing of souvenir for distribution during the upcoming gathering', 'printings', 'Al- halal ventures, PS'),
(18, 'annual due in arrears', '2020-10-13', 2000, '2020-12-01 16:09:58', 'annual due paid in advance by oladayo ahmod', 'Annual', 'department of accounting'),
(19, '3 laptops hired', '2020-10-13', 3000, '2020-12-01 16:24:06', '3 laptops hired to facilitate the mock examination conducted for students ahead of examination\r\n', 'others', 'permanent site, university of ilorin'),
(20, 'drinks', '2020-12-05', 4000, '2020-12-05 15:04:01', 'drinks bought for the meeting', 'food', 'oke odo');

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE `income` (
  `id` int(11) NOT NULL,
  `item` varchar(200) NOT NULL,
  `itemdate` text NOT NULL,
  `cost` int(11) NOT NULL,
  `noteDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `itemdesc` text NOT NULL,
  `category` varchar(200) NOT NULL,
  `place` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `income`
--

INSERT INTO `income` (`id`, `item`, `itemdate`, `cost`, `noteDate`, `itemdesc`, `category`, `place`) VALUES
(2, 'money', '2020-11-03', 5000, '2020-11-04 02:53:50', 'money given by professor aremu of marketing department', 'donation', ''),
(3, 'money', '2020-11-01', 4500, '2020-11-10 18:29:03', 'donation given by the faculty dean(professor Ijaya)', 'donations', 'faculty'),
(4, 'subscription', '2020-11-19', 4000, '2020-11-19 08:16:08', 'excos subscription from the brother cord', 'excos', 'faculty of management sciences'),
(6, 'money', '2020-11-19', 400, '2020-11-19 14:00:35', 'olaa', 'subscription', 'oke odo'),
(7, 'money', '2020-11-19', 400, '2020-11-19 14:01:29', 'olaa', 'subscription', 'oke odo'),
(8, '50 packs of A4 papers', '2020-11-19', 50000, '2020-11-19 14:19:07', '50 packs of  A4 papers donated by minister for affairs', 'others', 'government house'),
(10, 'donation', '2020-12-10', 40000, '2020-12-01 19:51:50', 'donation for demo', 'donations', 'faculty'),
(11, 'donation', '2020-10-13', 30000, '2020-12-01 19:52:34', 'donation for demo', 'donations', 'faculty of management sciences'),
(12, 'annual due ', '2020-09-22', 3000, '2020-12-01 19:53:28', 'donation for demo', 'Annual', 'faculty of management sciences'),
(13, 'annual due ', '2020-08-12', 4000, '2020-12-01 19:54:16', 'donation for demo', 'Annual', 'faculty of management sciences'),
(14, 'donations', '2020-07-22', 40000, '2020-12-01 19:55:32', 'donation for demo', 'donations', 'government house'),
(15, 'excos due', '2020-06-17', 3000, '2020-12-01 19:56:33', 'donation for demo', 'Annual', 'faculty of management sciences'),
(16, 'donations', '2020-05-19', 34900, '2020-12-01 19:57:59', 'donation for demo', 'donations', 'centrsl executive council'),
(17, 'donations', '2020-04-20', 56000, '2020-12-01 19:59:21', 'donation for demo', 'donations', 'unity, ilorin'),
(18, 'subvention', '2020-03-25', 99000, '2020-12-01 20:00:39', 'donation for demo', 'donations', 'government house'),
(19, 'development levy', '2020-02-11', 39000, '2020-12-01 20:01:56', 'donation for demo', 'donations', 'central executive council'),
(20, 'donation', '2020-01-05', 34990, '2020-12-01 20:03:00', 'donation for demo', 'donations', 'femtech IT'),
(21, 'gate fee', '2020-12-05', 3000, '2020-12-05 14:55:33', 'gate fee', 'others', 'faculty of management sciences');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset`
--

CREATE TABLE `password_reset` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `token` text NOT NULL,
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `password_reset`
--

INSERT INTO `password_reset` (`id`, `email`, `token`, `admin_id`) VALUES
(1, 'saduadisa@gmail.com', '2671a4f79764d7239fa19529ed187dd35fc00a2f96728', 0),
(2, 'saduadisa@gmail.com', '94b1b9766f8bd6045c7c42b45c7f2b4b5fc00bf84b86a', 0),
(3, 'saduadisa@gmail.com', '398b1ab082b4e928dfe5ce7db5c6066e5fc00c55ebc4f', 0),
(4, 'saduadisa@gmail.com', 'ff9aaf53ae245243c32805a12491ea945fc00c69648af', 0),
(5, 'saduadisa@gmail.com', 'bf04102a8a81ecb06761a60cc23690695fc00ca28840b', 0),
(6, 'saduadisa@gmail.com', '2daf3e05b377fcfb807a78c89469a2bb5fc00d98236f2', 0),
(7, 'saduadisa@gmail.com', 'ba4170f34bf33a6a496c8dc41669a7de5fc00e0128131', 0),
(8, 'saduadisa@gmail.com', '2dc9227c2e5b1976102acc288f7e06755fc010df319de', 0),
(9, 'saduadisa@gmail.com', '3354a3c67cc320e15f62f5f7fff0e08d5fc0119805529', 0),
(10, 'saduadisa@gmail.com', 'b9b6152dd130e308afd0b61a8c60a1425fc15d8873e66', 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `item` varchar(200) NOT NULL,
  `itemdate` date NOT NULL,
  `cost` int(11) NOT NULL,
  `noteDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `itemdesc` text NOT NULL,
  `category` varchar(200) NOT NULL,
  `place` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `item`, `itemdate`, `cost`, `noteDate`, `itemdesc`, `category`, `place`) VALUES
(1, 'olamilekan', '2020-11-19', 44, '2020-11-19 12:26:23', 'hwvwvc', 'lecture', 'oke odo'),
(2, 'Mock exams printings', '2020-11-19', 4000, '2020-11-19 14:22:02', 'mock exams printings for upcoming examination', 'printings', 'challenge');

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `id` int(11) NOT NULL,
  `Item` varchar(200) NOT NULL,
  `itemdate` date NOT NULL,
  `cost` int(11) NOT NULL,
  `noteDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `itemdesc` text NOT NULL,
  `category` varchar(200) NOT NULL,
  `place` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receipt`
--

INSERT INTO `receipt` (`id`, `Item`, `itemdate`, `cost`, `noteDate`, `itemdesc`, `category`, `place`) VALUES
(1, 'money', '2020-11-18', 4000, '2020-11-19 12:32:03', 'money given by professor ijaya for the faculty mosque renovation', '0', 'faculty'),
(2, 'money', '2020-11-18', 4000, '2020-11-19 12:32:43', 'money given by professor ijaya for the faculty mosque renovation', '0', 'faculty'),
(3, 'money', '2020-11-18', 4000, '2020-11-19 13:55:09', 'money given by professor ijaya for the faculty mosque renovation', '0', 'faculty'),
(4, 'money', '2020-11-19', 400, '2020-11-19 14:01:28', 'olaa', '0', 'oke odo'),
(5, '50 packs of A4 papers', '2020-11-19', 50000, '2020-11-19 14:19:07', '50 packs of  A4 papers donated by minister for affairs', 'others', 'government house'),
(6, 'subvention', '2020-11-21', 400000, '2020-11-21 11:13:49', 'subvention from state government', 'donations', 'secretariat ilorin'),
(7, 'gate fee', '2020-12-05', 3000, '2020-12-05 14:55:32', 'gate fee', 'others', 'faculty of management sciences');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_details`
--
ALTER TABLE `admin_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `budgets`
--
ALTER TABLE `budgets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenditure`
--
ALTER TABLE `expenditure`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `income`
--
ALTER TABLE `income`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset`
--
ALTER TABLE `password_reset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_details`
--
ALTER TABLE `admin_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `budgets`
--
ALTER TABLE `budgets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `expenditure`
--
ALTER TABLE `expenditure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `income`
--
ALTER TABLE `income`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `password_reset`
--
ALTER TABLE `password_reset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
