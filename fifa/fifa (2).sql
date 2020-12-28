-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2020 at 11:40 AM
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
-- Database: `fifa`
--

-- --------------------------------------------------------

--
-- Table structure for table `admintable`
--

CREATE TABLE `admintable` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admintable`
--

INSERT INTO `admintable` (`id`, `user`, `pass`) VALUES
(1, 'ADMIN', '37b4e2d82900d5e94b8da524fbeb33c0');

-- --------------------------------------------------------

--
-- Table structure for table `club`
--

CREATE TABLE `club` (
  `id` int(11) NOT NULL,
  `Player_ID` int(11) NOT NULL,
  `Club` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `club`
--

INSERT INTO `club` (`id`, `Player_ID`, `Club`) VALUES
(1, 21021, 'Juventus'),
(12, 21040, 'Barcelona'),
(2, 21210, 'PSG'),
(22, 32121, 'PSG');

-- --------------------------------------------------------

--
-- Table structure for table `player`
--

CREATE TABLE `player` (
  `id` int(11) NOT NULL,
  `Player_ID` int(11) NOT NULL,
  `Namee` varchar(255) NOT NULL,
  `Age` int(11) DEFAULT NULL,
  `Position` varchar(11) DEFAULT NULL,
  `Overall_rating` int(11) DEFAULT NULL,
  `Nationality` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `player`
--

INSERT INTO `player` (`id`, `Player_ID`, `Namee`, `Age`, `Position`, `Overall_rating`, `Nationality`) VALUES
(1, 21021, 'CRISTIANO RONALDO', 35, 'LW', 93, 'Portugal'),
(12, 21040, 'Lionel Messi', 33, 'RW', 93, 'Argentina'),
(10, 21210, 'NEYMAR JR', 29, 'LW', 90, 'Brazil'),
(13, 32121, 'Kylian Mbappe', 21, 'ST', 90, 'France');

-- --------------------------------------------------------

--
-- Table structure for table `player_stats`
--

CREATE TABLE `player_stats` (
  `id` int(11) NOT NULL,
  `Player_ID` int(11) NOT NULL,
  `Acceleration` int(2) DEFAULT NULL,
  `Balance` int(3) DEFAULT NULL,
  `Ball_Control` int(3) DEFAULT NULL,
  `Crossing` int(3) DEFAULT NULL,
  `Dribbling` int(3) DEFAULT NULL,
  `Finishing` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `player_stats`
--

INSERT INTO `player_stats` (`id`, `Player_ID`, `Acceleration`, `Balance`, `Ball_Control`, `Crossing`, `Dribbling`, `Finishing`) VALUES
(4, 21021, 90, 89, 88, 90, 89, 93),
(12, 21040, 91, 95, 96, 85, 96, 95),
(6, 21210, 89, 90, 91, 88, 90, 85),
(20, 32121, 96, 86, 90, 78, 92, 91);

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `id` int(11) NOT NULL,
  `Player_ID` int(11) NOT NULL,
  `Wage` int(255) DEFAULT NULL,
  `Valuee` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`id`, `Player_ID`, `Wage`, `Valuee`) VALUES
(3, 21021, 34000000, 500000000),
(24, 21210, 14000000, 400000000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admintable`
--
ALTER TABLE `admintable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `club`
--
ALTER TABLE `club`
  ADD PRIMARY KEY (`Player_ID`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `player`
--
ALTER TABLE `player`
  ADD PRIMARY KEY (`Player_ID`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `player_stats`
--
ALTER TABLE `player_stats`
  ADD PRIMARY KEY (`Player_ID`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`Player_ID`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admintable`
--
ALTER TABLE `admintable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `club`
--
ALTER TABLE `club`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `player`
--
ALTER TABLE `player`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `player_stats`
--
ALTER TABLE `player_stats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `club`
--
ALTER TABLE `club`
  ADD CONSTRAINT `Club_ID` FOREIGN KEY (`Player_ID`) REFERENCES `player` (`Player_ID`);

--
-- Constraints for table `player_stats`
--
ALTER TABLE `player_stats`
  ADD CONSTRAINT `Stat_ID` FOREIGN KEY (`Player_ID`) REFERENCES `player` (`Player_ID`);

--
-- Constraints for table `salary`
--
ALTER TABLE `salary`
  ADD CONSTRAINT `Player_ID` FOREIGN KEY (`Player_ID`) REFERENCES `player` (`Player_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
