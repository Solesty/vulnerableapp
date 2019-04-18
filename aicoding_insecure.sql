-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 18, 2019 at 12:40 PM
-- Server version: 5.7.25-0ubuntu0.18.04.2
-- PHP Version: 7.2.15-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aicoding_insecure`
--

-- --------------------------------------------------------

--
-- Table structure for table `cv`
--

CREATE TABLE `cv` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `hcert` varchar(300) NOT NULL,
  `cvFile` text NOT NULL,
  `bvn` varchar(20) NOT NULL,
  `dob` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cv`
--

INSERT INTO `cv` (`id`, `name`, `hcert`, `cvFile`, `bvn`, `dob`) VALUES
(1, 'ABOYEJI SOLOMON ADELEKE', 'BsC', 'phpLHNiFC', '', ''),
(2, 'ABOYEJI SOLOMON ADELEKE', 'BsC', 'phpv74SGD', '', ''),
(3, 'ABOYEJI SOLOMON ADELEKE', 'BsC', 'php0QR2M3', '', ''),
(4, 'ABOYEJI SOLOMON ADELEKE', 'BsC', 'phpnBIpfO', '', ''),
(5, 'ABOYEJI SOLOMON ADELEKE', 'BsC', 'phpJs6Kb4', '', ''),
(6, 'ABOYEJI SOLOMON ADELEKE', 'BsC', 'phpMYR23V', '', ''),
(7, 'ABOYEJI SOLOMON ADELEKE', 'BsC', 'phpr4S0Si', '8272UFU', '27/10/1996'),
(8, 'ABOYEJI SOLOMON ADELEKE', 'BsC', 'test-file.php', '09292883', '27/10/1996');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `amount` float NOT NULL,
  `acct_name` text NOT NULL,
  `acct_num` varchar(20) NOT NULL,
  `bank_name` varchar(100) NOT NULL,
  `name` text NOT NULL,
  `transfdescription` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `amount`, `acct_name`, `acct_num`, `bank_name`, `name`, `transfdescription`) VALUES
(10, 3000, 'SureBank Savings', '0022019283', 'SURE BANK', 'SOLOMN', 'This is my savings o.'),
(11, 3000, 'SureBank Savings', '0022019283', 'SURE BANK', 'SOLOMN', '<script> alert(\'hello\'); </script>');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` text NOT NULL,
  `plain_password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `plain_password`) VALUES
(9, 'ABOYEJI SOLOMON ADELEKE', 'solesty7@gmail.com', 'password', 'password'),
(10, '<script> alert(1) </script>', 'talkto@regnify.com', 'passwordd', 'passwordd'),
(11, 'ABOYEJI SOLOMON', 'cyr@gmail.com', 'password', 'password'),
(12, '<script>  alert(\"Hello\") </script>', 'll@gmail.com', 'password', 'password'),
(13, 'CHERT SECURITY ', 'secure@security.com', 'password', 'password');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cv`
--
ALTER TABLE `cv`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
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
-- AUTO_INCREMENT for table `cv`
--
ALTER TABLE `cv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
