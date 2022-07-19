-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2022 at 12:01 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chauka`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `bulb1_status` int(11) NOT NULL,
  `bulb1_state` int(2) NOT NULL,
  `bulb2_status` int(11) NOT NULL,
  `fan_status` int(11) NOT NULL,
  `fan_speed` int(11) NOT NULL,
  `waterPump_status` int(11) NOT NULL,
  `waterValve_status` int(11) NOT NULL,
  `water_usage` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_email`, `user_password`, `username`, `bulb1_status`, `bulb1_state`, `bulb2_status`, `fan_status`, `fan_speed`, `waterPump_status`, `waterValve_status`, `water_usage`) VALUES
('achauka06@gmail.com', 'kijiko10', 'Chauka', 0, 1, 0, 0, 2, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `water_usage`
--

CREATE TABLE `water_usage` (
  `user_email` varchar(255) NOT NULL,
  `water_usage` int(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `water_usage`
--

INSERT INTO `water_usage` (`user_email`, `water_usage`, `date`) VALUES
('achauka06@gmail.com', 20, '2022-05-28');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
