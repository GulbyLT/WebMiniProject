-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2021 at 08:02 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `duckdata`
--
CREATE DATABASE IF NOT EXISTS `duckdata` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `duckdata`;

-- --------------------------------------------------------

--
-- Table structure for table `ducktable`
--

CREATE TABLE `ducktable` (
  `Species` varchar(255) NOT NULL,
  `Genus` varchar(255) NOT NULL,
  `Family` varchar(255) NOT NULL,
  `Picture_Link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ducktable`
--

INSERT INTO `ducktable` (`Species`, `Genus`, `Family`, `Picture_Link`) VALUES
('A. albifrons', 'Anser', 'Anatidae', 'duckimg\\albifrons.jpg'),
('A. anser', 'Anser', 'Anatidae', 'duckimg\\anser.jpg'),
('A. brachyrhynchus', 'Anser', 'Anatidae', 'duckimg\\brach.jpg'),
('A. crecca', 'Anas', 'Anatidae', 'duckimg\\teal.jpg'),
('A. platyrhynchos', 'Anas', 'Anatidae', 'duckimg\\mallard.jpg'),
('B. bernicla', 'Branta', 'Anatidae', 'duckimg\\brant.jpg'),
('B. leucopsis', 'Branta', 'Anatidae', 'duckimg\\leucopsis.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ducktable`
--
ALTER TABLE `ducktable`
  ADD UNIQUE KEY `Species` (`Species`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
