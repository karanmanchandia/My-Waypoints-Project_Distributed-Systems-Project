-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2018 at 11:34 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_waypoints`
--

-- --------------------------------------------------------

--
-- Table structure for table `directions`
--

CREATE TABLE `directions` (
  `id` int(200) NOT NULL,
  `source` varchar(200) NOT NULL,
  `destination` varchar(200) NOT NULL,
  `dirs` varchar(245) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `directions`
--

INSERT INTO `directions` (`id`, `source`, `destination`, `dirs`) VALUES
(1, 'joplin', 'chicago, il', '[object Object]'),
(2, 'oklahoma city', 'chicago, il', 'undefined'),
(3, 'joplin', 'chicago, il', '\n    \n    <button class=\"btn btn-success\" onclick=\"loadWeather()\">load weather</button>\n    <div id=\"weather\">\n    </div>\n    '),
(4, 'flagstaff', 'chicago, il', '\n    \n    <button class=\"btn btn-success\" onclick=\"loadWeather()\">load weather</button>\n    <div id=\"weather\">\n    </div>\n    <div jstcache=\"0\" style=\"\"><div jstcache=\"156\" class=\"adp-list\"><table class=\"adp-fullwidth\"><tbody><tr><td jstcache=\"1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `directions`
--
ALTER TABLE `directions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `directions`
--
ALTER TABLE `directions`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
