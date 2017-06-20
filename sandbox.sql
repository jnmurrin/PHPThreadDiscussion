-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2017 at 01:11 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sandbox`
--

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `carId` int(11) NOT NULL,
  `carName` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`carId`, `carName`) VALUES
(1, 'Volvo'),
(2, 'Saab'),
(3, 'Mercedes'),
(4, 'Audi');

-- --------------------------------------------------------

--
-- Table structure for table `guestbook`
--

CREATE TABLE `guestbook` (
  `id` int(11) NOT NULL,
  `nickName` varchar(16) NOT NULL,
  `email` varchar(60) NOT NULL,
  `contents` varchar(200) NOT NULL,
  `createtime` timestamp NOT NULL,
  `carName` varchar(8) NOT NULL,
  `device` varchar(40) NOT NULL,
  `social` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guestbook`
--

INSERT INTO `guestbook` (`id`, `nickName`, `email`, `contents`, `createtime`, `carName`, `device`, `social`) VALUES
(1, 'Jennifer', 'jnmurrin@gmail.com', 'Hiiiii!', '2017-06-20 13:03:14', 'Volvo', 'Smart Watch, Phone, Tablet, Laptop', 'Facebook, Instagram, Twitter, Codepen, '),
(2, 'Bob', 'bob@walmart.com', 'Hello', '2017-06-20 13:03:30', 'Saab', 'Phone, Tablet, Laptop', 'Facebook, '),
(3, 'Jessica', 'jessica@yahoo.com', 'I want a car!!!', '2017-06-20 13:03:46', 'Mercedes', 'Phone, ', 'Instagram, Twitter, '),
(4, 'Kelsey', 'kelsey@pcmi.com', 'What is up?', '2017-06-20 13:03:54', 'Mercedes', 'Smart Watch, Phone, ', 'Facebook, '),
(5, 'Scott', 'scott@home.com', 'Hello', '2017-06-20 13:04:12', 'Volvo', 'Phone, Laptop', 'Instagram, '),
(6, 'Paula', 'paula@mc.com', 'Weirdo', '2017-06-20 13:04:28', 'Mercedes', 'Phone, Laptop', 'Facebook,'),
(7, 'Nick', 'nick@work.com', 'hmm', '2017-06-20 13:04:39', 'Mercedes', 'Laptop, ', 'Twitter, '),
(8, 'Ashley', 'ashley@hair.com', 'do da', '2017-06-20 13:04:54', 'Audi', 'Smart Watch, Phone, Tablet, Laptop', 'Instagram, Twitter,'),
(9, 'Aga', 'aga@pcmi.com', 'polish', '2017-06-20 13:05:06', 'Volvo', 'Phone, Laptop, ', 'Facebook, '),
(10, 'laura', 'laura@pcmi.com', 'wooooooooork', '2017-06-20 13:05:18', 'Audi', 'Phone, ', 'Facebook, Instagram, '),
(13, 'David', 'david@lee.com', 'School', '2017-06-20 13:05:29', 'Saab', 'Phone, Tablet, ', 'Facebook, ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`carId`);

--
-- Indexes for table `guestbook`
--
ALTER TABLE `guestbook`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `carId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `guestbook`
--
ALTER TABLE `guestbook`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
