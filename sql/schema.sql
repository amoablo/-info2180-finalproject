-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost 
-- Generation Time: Nov 23, 2020 at 02:39 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `schema`

--
-- --------------------------------------------------------

--
-- Table structure for table `users table`
--

DROP TABLE IF EXISTS `users table`;
CREATE TABLE `users table` (
  `id` int(11) DEFAULT NULL,
  `firstname` varchar(35) DEFAULT NULL,
  `lastname` varchar(35) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `date_joined` datetime(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users table`
--

INSERT INTO `users table` (`id`, `firstname`, `lastname`, `password`, `email`, `date_joined`) VALUES
(NULL, NULL, NULL, NULL, NULL, NULL);
COMMIT;

LOCK TABLES `users table` WRITE;

UNLOCK TABLES;

--
-- Table structure for table `issues table`
--

DROP TABLE IF EXISTS `issues table`;
CREATE TABLE IF NOT EXISTS `issues table` (
  `id` int(11) DEFAULT NULL,
  `title` varchar(300) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `type` varchar(15) DEFAULT NULL,
  `priority` varchar(20) DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL,
  `assigned_to` int(50) DEFAULT NULL,
  `created_by` int(30) DEFAULT NULL,
  `created` datetime(6) NOT NULL DEFAULT current_timestamp(6),
  `updated` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
COMMIT;

LOCK TABLES `issues table` WRITE;

UNLOCK TABLES;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;