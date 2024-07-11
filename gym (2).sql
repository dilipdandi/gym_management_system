-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2023 at 04:01 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gym`
--

-- --------------------------------------------------------

--
-- Table structure for table `alogin`
--

CREATE TABLE `alogin` (
  `id` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alogin`
--

INSERT INTO `alogin` (`id`, `email`, `password`) VALUES
(1, 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `bi` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `actiondate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`bi`, `tid`, `pid`, `uid`, `status`, `actiondate`) VALUES
(29, 72, 12, 6, 'Approved', '2023-11-01'),
(30, 75, 12, 10, 'Approved', '2023-11-01'),
(31, 74, 14, 7, 'Rejected', '2023-11-01'),
(32, 76, 12, 7, 'Rejected', '2023-11-01');

-- --------------------------------------------------------

--
-- Table structure for table `plan`
--

CREATE TABLE `plan` (
  `id` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `price` float NOT NULL,
  `des` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `plan`
--

INSERT INTO `plan` (`id`, `month`, `price`, `des`) VALUES
(10, 4, 3000, '4 months class'),
(12, 6, 4000, 'Zumba Classes'),
(14, 2, 3000, 'Healthy Life with Diet Plan discussion');

-- --------------------------------------------------------

--
-- Table structure for table `tempbill`
--

CREATE TABLE `tempbill` (
  `tid` int(255) NOT NULL,
  `pid` int(255) NOT NULL,
  `uid` int(255) NOT NULL,
  `dates` date NOT NULL,
  `exp` date NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tempbill`
--

INSERT INTO `tempbill` (`tid`, `pid`, `uid`, `dates`, `exp`, `status`) VALUES
(72, 12, 6, '2023-11-01', '2024-05-01', 'Approved'),
(74, 14, 7, '2023-11-01', '2024-01-01', 'Rejected'),
(75, 12, 10, '2023-11-01', '2024-05-01', 'Approved'),
(76, 12, 7, '2023-11-01', '2024-05-01', 'Rejected'),
(78, 12, 7, '2023-11-02', '2024-05-02', 'In Progress');

-- --------------------------------------------------------

--
-- Table structure for table `trainer`
--

CREATE TABLE `trainer` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `salary` varchar(255) NOT NULL,
  `batch` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trainer`
--

INSERT INTO `trainer` (`id`, `name`, `email`, `gender`, `salary`, `batch`, `mobile`) VALUES
(8, 'Aiman', 'aiman@gmail.com', 'Female', '3000', 'Afternoon', '1234567890');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `weight` double NOT NULL,
  `batch` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `addr` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `gender`, `weight`, `batch`, `mobile`, `password`, `addr`) VALUES
(5, 'Tanzila', 'tanz@gmail.com', 'Male', 40, 'Morning', '1234567890', '123', '5476576'),
(6, 'Faiz', 'faiz@gmail.com', 'Male', 50, 'Afternoon', '1234567890', '123', '123'),
(7, 'bilal', 'bilal@gmail.com', 'Male', 60, 'Evening', '8080580158', '123', 'Solapur'),
(8, 'Aiman', 'aiman@gmail.com', 'Female', 60, 'Evening', '1234567890', '123', 'Solapur'),
(9, 'Aayesha', 'aayesha@gmail.com', 'Female', 50, 'Morning', '0987654321', '12345', 'Pune'),
(10, 'abc', 'abc@gmail.com', '', 40, 'Morning', '0987654321', 'abc', 'Solapur');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alogin`
--
ALTER TABLE `alogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`bi`);

--
-- Indexes for table `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tempbill`
--
ALTER TABLE `tempbill`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `trainer`
--
ALTER TABLE `trainer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`,`email`,`mobile`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`,`email`,`mobile`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alogin`
--
ALTER TABLE `alogin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `bi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `plan`
--
ALTER TABLE `plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tempbill`
--
ALTER TABLE `tempbill`
  MODIFY `tid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `trainer`
--
ALTER TABLE `trainer`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
