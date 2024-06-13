-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2020 at 07:23 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agency`
--

-- --------------------------------------------------------

--
-- Table structure for table `agency`
--

CREATE TABLE `agency` (
  `id` int(11) NOT NULL,
  `aname` varchar(50) NOT NULL,
  `aphone` varchar(20) NOT NULL,
  `aaddress` varchar(255) NOT NULL,
  `astatus` int(11) NOT NULL DEFAULT '1',
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agency`
--

INSERT INTO `agency` (`id`, `aname`, `aphone`, `aaddress`, `astatus`, `user_id`) VALUES
(1, 'Alasad', '0518206350', 'Islamabad, Pakistan', 1, 1),
(6, 'Al Makkah', '0971652350', 'Saudi Arabia', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `cname` varchar(50) NOT NULL,
  `ppno` varchar(20) NOT NULL,
  `cmobile` varchar(20) NOT NULL,
  `caddress` varchar(255) NOT NULL,
  `cstatus` int(11) NOT NULL DEFAULT '1',
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `cname`, `ppno`, `cmobile`, `caddress`, `cstatus`, `user_id`) VALUES
(2, 'Muhammad Jamal Khan', 'XBR025870', '03005632104', 'Mardan, KP', 1, 1),
(4, 'Ali Khan', 'VBX087512', '0300578241', 'Mardan', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `id` int(11) NOT NULL,
  `voucher_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `dated` date NOT NULL,
  `actualamt` int(11) NOT NULL,
  `cpayment` int(11) NOT NULL,
  `apaid` int(11) NOT NULL,
  `arrears` int(11) NOT NULL,
  `returneda` int(11) NOT NULL,
  `returndate` date NOT NULL,
  `totalpayment` int(11) NOT NULL,
  `netp` int(11) NOT NULL,
  `notes` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`id`, `voucher_id`, `customer_id`, `dated`, `actualamt`, `cpayment`, `apaid`, `arrears`, `returneda`, `returndate`, `totalpayment`, `netp`, `notes`, `user_id`) VALUES
(12, 28, 2, '2020-09-16', 45000, 55000, 55000, 0, 0, '0000-00-00', 55000, 10000, 'Amount Adjusted', 1),
(13, 36, 2, '2020-09-08', 50000, 75000, 75000, 0, 0, '2020-09-10', 75000, 25000, 'Amount Adjusted', 1),
(15, 77, 2, '2020-09-08', 50000, 60000, 60000, 0, 0, '0000-00-00', 60000, 10000, 'Amount Adjusted', 1),
(16, 77, 4, '2020-09-10', 50000, 60000, 60000, 0, 0, '2020-09-08', 60000, 10000, 'Amount Adjusted', 1),
(18, 3, 4, '2020-09-09', 50000, 60000, 30000, -30000, 30000, '0000-00-00', 30000, -20000, 'Pending Arrears', 1),
(19, 3, 4, '2020-09-16', 65000, 80000, 70000, -10000, 10000, '0000-00-00', 70000, 5000, 'Pending Arrears', 1),
(20, 22, 4, '2020-10-07', 50000, 60000, 60000, 0, 0, '0000-00-00', 60000, 10000, 'Amount Adjusted', 1);

-- --------------------------------------------------------

--
-- Table structure for table `expenditure`
--

CREATE TABLE `expenditure` (
  `id` int(11) NOT NULL,
  `expense_id` int(11) NOT NULL,
  `edated` date NOT NULL,
  `eamount` int(11) NOT NULL,
  `edescription` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expenditure`
--

INSERT INTO `expenditure` (`id`, `expense_id`, `edated`, `eamount`, `edescription`, `user_id`) VALUES
(4, 1, '2020-09-10', 1200, 'ok', 1),
(7, 1, '2020-09-08', 9600, 'new', 1);

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `id` int(11) NOT NULL,
  `ehead` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`id`, `ehead`, `user_id`) VALUES
(1, 'Entertainment', 1),
(10, 'Salary', 1),
(11, 'Rent', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ledger`
--

CREATE TABLE `ledger` (
  `id` int(11) NOT NULL,
  `agency_id` int(11) NOT NULL,
  `ldated` date NOT NULL,
  `lticketno` varchar(25) NOT NULL,
  `ldescription` varchar(255) NOT NULL,
  `ldebit` int(11) NOT NULL DEFAULT '0',
  `lcredit` int(11) NOT NULL DEFAULT '0',
  `lbalance` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ledger`
--

INSERT INTO `ledger` (`id`, `agency_id`, `ldated`, `lticketno`, `ldescription`, `ldebit`, `lcredit`, `lbalance`, `user_id`) VALUES
(3, 1, '2020-09-09', '1', 'debit', 300, 0, 300, 1),
(4, 1, '2020-09-08', '2', 'debit', 200, 0, 200, 1),
(6, 1, '2020-09-09', '4', 'ok', 200, 0, 200, 1),
(14, 1, '2020-09-09', '56', 'ok', 0, 10000, -10000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `ucompany` varchar(30) NOT NULL,
  `role` varchar(10) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `firstname`, `lastname`, `ucompany`, `role`, `status`) VALUES
(1, 'sabirs', 'c11fee3445c54997f3de6e05bbb48a3f', 'Inam', 'Ulhaq', '', 'user', 1),
(2, 'ali', '86318e52f5ed4801abe1d13d509443de', 'Ali', 'Khan', '', 'user', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agency`
--
ALTER TABLE `agency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenditure`
--
ALTER TABLE `expenditure`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ledger`
--
ALTER TABLE `ledger`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agency`
--
ALTER TABLE `agency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `expenditure`
--
ALTER TABLE `expenditure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `ledger`
--
ALTER TABLE `ledger`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
