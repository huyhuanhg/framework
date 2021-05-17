-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 17, 2021 at 07:53 PM
-- Server version: 8.0.25
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `framework`
--

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `person_ID` int NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `birthday` date DEFAULT NULL,
  `gender` bit(1) DEFAULT NULL,
  `number_phone` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`person_ID`, `full_name`, `birthday`, `gender`, `number_phone`, `email`, `address`) VALUES
(1, 'Hoàng Huy Huấn', '1995-01-10', b'1', '0985356050', 'huyhuanhg@gmail.com', 'Vạn Trạch - Bố Trạch - Quảng Bình'),
(4, 'Phạm Thị Hải', '1996-09-20', b'0', '0982184651', 'phamhai@gmail.com', 'Tượng Văn - Nông Cống - Thanh Hóa'),
(6, 'Hoàng Huy Tuấn Kiệt', '2020-12-01', b'1', '1234567890', 'tuankiet@gmail.com', 'Vạn Trạch'),
(9, 'Hoàng Huy Hưng', '1990-02-10', b'1', '1234567890', 'hhungit@gmail.com', 'Đà nẵng');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `account` varchar(100) NOT NULL,
  `password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`account`, `password`) VALUES
('admin', '$2y$10$BI39XDNfok4lDfFJH5jqJO/heHvdUa5C/PR5ZGJ9Gp.25ORvXoTsi'),
('huan', '$2y$10$a/Pkm2YRmLe21SR8mzVxTO3lXyT5fILoP.5fMV1AY1xKp.D9z1T7C');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`person_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`account`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `person_ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
