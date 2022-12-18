-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2019 at 04:46 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_frs`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `hashed_password` varchar(255) NOT NULL,
  `role` varchar(55) NOT NULL,
  `image` varchar(155) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `hashed_password`, `role`, `image`) VALUES
(1, 'admin', 'password', '$2y$10$TM76PrrTasuKIUwo2X0SXei9QOv0mQYgJ0dblRC7YV92MIdWfAbnq', 'Administrator', '');

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `facility_id` int(11) NOT NULL,
  `name` varchar(155) NOT NULL,
  `location` varchar(155) NOT NULL,
  `min_cap` int(11) NOT NULL,
  `max_cap` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`facility_id`, `name`, `location`, `min_cap`, `max_cap`, `rate`, `image`) VALUES
(6, 'University Gym', 'Somewhere', 50, 100, 1500, 'images/facilities/University Gym.jpg'),
(7, 'BEU Student Center', 'Somewhere', 50, 100, 1500, 'images/facilities/BEU Student Center.jpg'),
(8, 'Grandstand', 'Somewhere', 50, 100, 1500, 'images/facilities/Grandstand.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `log_id` int(11) NOT NULL,
  `username` varchar(55) NOT NULL,
  `role` varchar(55) NOT NULL,
  `action` varchar(255) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`log_id`, `username`, `role`, `action`, `date`) VALUES
(17, 'admin', 'Administrator', 'has successfully logged in', '2019-07-01 17:27:10'),
(18, 'admin', 'Administrator', 'has successfully logged in', '2019-07-01 20:46:49'),
(19, 'admin', 'Administrator', 'has successfully logged in', '2019-07-02 20:50:56');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `res_id` int(11) NOT NULL,
  `res_no` varchar(25) NOT NULL,
  `res_by` varchar(155) NOT NULL,
  `user_id` int(11) NOT NULL,
  `facility` varchar(55) NOT NULL,
  `org_dept` varchar(155) NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `no_users` int(11) NOT NULL,
  `date` date NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `time_start` time NOT NULL,
  `time_end` time NOT NULL,
  `verified_by` varchar(155) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(18) NOT NULL,
  `password` varchar(18) NOT NULL,
  `hashed_password` varchar(255) NOT NULL,
  `category` varchar(25) NOT NULL,
  `last_name` varchar(55) NOT NULL,
  `first_name` varchar(55) NOT NULL,
  `middle_initial` varchar(1) NOT NULL,
  `org_dept` varchar(255) NOT NULL,
  `ext_name` varchar(5) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `hashed_password`, `category`, `last_name`, `first_name`, `middle_initial`, `org_dept`, `ext_name`, `image`) VALUES
(1, 'user', 'password', '$2y$10$WnoGL7nrEXGmo81jjVbVXO9oSK8CP29iCuZ8jOkYjO04AVgHN20O.', 'student', 'Acoba', 'Kurt', 'B', 'SITE', '', 'assets/img/default-avatar.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`facility_id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`res_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `facility_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `res_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
