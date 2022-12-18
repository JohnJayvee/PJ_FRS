-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2019 at 01:39 PM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

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
(1, 'admin', 'password', '$2y$10$TM76PrrTasuKIUwo2X0SXei9QOv0mQYgJ0dblRC7YV92MIdWfAbnq', 'Administrator', ''),
(2, 'arockettothemoon', 'patilpats', '$2y$10$56aV1r4dEgpsE2aM3VEES.hq0yiS2HDVn4ybGyM5TUjDVE6aLbRAu', 'Moderator', '');

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
(1, 'admin', 'Administrator', 'has successfully logged in', '2019-01-18 18:21:00'),
(2, 'admin', 'Administrator', 'has successfully logged in', '2019-01-18 20:30:34'),
(3, 'admin', 'Administrator', 'has successfully logged out', '2019-01-18 20:34:39'),
(4, 'admin', 'Administrator', 'has successfully logged in', '2019-01-18 20:34:59'),
(5, 'admin', 'Administrator', 'has successfully logged in', '2019-01-18 21:08:39'),
(6, 'admin', 'Administrator', 'has delete  facility', '2019-01-18 21:16:42'),
(7, 'admin', 'Administrator', 'has added University Gym new facility', '2019-01-18 21:19:53'),
(8, 'admin', 'Administrator', 'has deleted  facility', '2019-01-18 21:20:13'),
(9, 'admin', 'Administrator', 'has added University Gym new facility', '2019-01-18 21:21:39'),
(10, 'admin', 'Administrator', 'has deleted University Gym facility', '2019-01-18 21:21:52'),
(11, 'admin', 'Administrator', 'has successfully logged in', '2019-01-19 02:24:04'),
(12, 'admin', 'Administrator', 'has added University Gym new facility', '2019-01-19 02:29:56'),
(13, 'admin', 'Administrator', 'has added BEU Student Center new facility', '2019-01-19 02:30:31'),
(14, 'admin', 'Administrator', 'has added Grandstand new facility', '2019-01-19 02:31:05'),
(15, 'admin', 'Administrator', 'has updated University Gym facility details', '2019-01-19 02:56:41'),
(16, 'admin', 'Administrator', 'has updated University Gym facility details', '2019-01-19 02:56:55'),
(17, 'admin', 'Administrator', 'has successfully logged in', '2019-01-19 05:09:41'),
(18, 'admin', 'Administrator', 'has approved a reservation RES. No.: 2', '2019-01-19 06:01:57'),
(19, 'admin', 'Administrator', 'has rejected a reservation RES. No.: 1', '2019-01-19 06:02:02'),
(20, 'admin', 'Administrator', 'successfully logged out', '2019-01-19 06:07:46'),
(21, 'admin', 'Administrator', 'has successfully logged in', '2019-01-19 06:08:17'),
(22, 'admin', 'Administrator', 'successfully logged out', '2019-01-19 06:46:41'),
(23, 'arockettothemoon', 'Moderator', 'has successfully logged in', '2019-01-19 06:46:50'),
(24, 'arockettothemoon', 'Moderator', 'successfully logged out', '2019-01-19 06:47:04'),
(25, 'admin', 'Administrator', 'has successfully logged in', '2019-01-19 06:47:13'),
(26, 'admin', 'Administrator', 'has successfully logged in', '2019-01-19 09:02:03'),
(27, 'admin', 'Administrator', 'has successfully logged in', '2019-06-26 19:28:27'),
(28, 'admin', 'Administrator', 'successfully logged out', '2019-06-26 19:37:59'),
(29, 'arockettothemoon', 'Moderator', 'has successfully logged in', '2019-06-26 19:38:06'),
(30, 'arockettothemoon', 'Moderator', 'successfully logged out', '2019-06-26 19:38:30');

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

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`res_id`, `res_no`, `res_by`, `user_id`, `facility`, `org_dept`, `purpose`, `no_users`, `date`, `date_from`, `date_to`, `time_start`, `time_end`, `verified_by`, `status`) VALUES
(5, '', 'Daniell Jonathan R. Belen', 2, 'University Gym', 'Freelance', 'event', 0, '2019-06-28', '0000-00-00', '0000-00-00', '02:30:00', '17:00:00', '', 0),
(6, '', 'Daniell Jonathan R. Belen', 2, 'BEU Student Center', 'Freelance', 'events', 51, '2019-06-28', '0000-00-00', '0000-00-00', '05:05:00', '17:05:00', '', 0);

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
(1, 'user', 'password', '$2y$10$WnoGL7nrEXGmo81jjVbVXO9oSK8CP29iCuZ8jOkYjO04AVgHN20O.', 'student', 'Belen', 'Dj', 'R', '', '', 'assets/img/default-avatar.png'),
(2, 'yaasen', 'patilpats', '$2y$10$3GldNIw9LBkyYFhYVXwCl.98m6KFAg0CN2ySJBpwuzlOxIzjmjDD.', '', 'Belen', 'Daniell Jonathan', 'R', 'Freelance', '', 'assets/img/default-avatar.png');

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
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `facility_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `res_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
