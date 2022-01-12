-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 12, 2022 at 02:26 AM
-- Server version: 5.7.31
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `baa_hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `billing`
--

DROP TABLE IF EXISTS `billing`;
CREATE TABLE IF NOT EXISTS `billing` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reservation_id` int(11) NOT NULL,
  `item` varchar(200) NOT NULL,
  `price` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `billing`
--

INSERT INTO `billing` (`id`, `reservation_id`, `item`, `price`) VALUES
(2, 8, 'ROOM TYPE: DELUXE. NO: 15', '400000'),
(3, 8, 'ROOM TYPE: SWEET ROOM. NO: 14', '750000'),
(4, 9, 'ROOM TYPE: JUNIOR SUITE. NO: 03', '350000'),
(5, 11, 'ROOM TYPE: SUITE. NO: 06', '350000'),
(6, 13, 'ROOM TYPE: SUITE. NO: 06', '350000'),
(7, 14, 'ROOM TYPE: DELUXE. NO: 11', '400000'),
(8, 13, 'ROOM TYPE: SUITE. NO: 06', '350000'),
(9, 16, 'ROOM TYPE: DELUXE. NO: 13', '400000'),
(10, 18, 'ROOM TYPE: DELUXE. NO: 12', '400000');

-- --------------------------------------------------------

--
-- Table structure for table `booking_rooms`
--

DROP TABLE IF EXISTS `booking_rooms`;
CREATE TABLE IF NOT EXISTS `booking_rooms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `start_date` varchar(50) NOT NULL,
  `end_date` varchar(50) NOT NULL,
  `reservation_id` int(11) NOT NULL,
  `rooms_type_id` int(11) NOT NULL,
  `rooms_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking_rooms`
--

INSERT INTO `booking_rooms` (`id`, `start_date`, `end_date`, `reservation_id`, `rooms_type_id`, `rooms_id`, `status`) VALUES
(15, '2022-01-12', '2022-01-13', 14, 5, 8, 0);

-- --------------------------------------------------------

--
-- Table structure for table `check_in`
--

DROP TABLE IF EXISTS `check_in`;
CREATE TABLE IF NOT EXISTS `check_in` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reservation_id` int(11) NOT NULL,
  `created_at` varchar(30) NOT NULL,
  `sure_name` varchar(50) NOT NULL,
  `sex` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `id_number` varchar(30) NOT NULL,
  `date_place_issued` varchar(30) NOT NULL,
  `nationality` varchar(30) NOT NULL,
  `date_birth` date NOT NULL,
  `occupation` varchar(50) NOT NULL,
  `purposed_visit` varchar(50) NOT NULL,
  `arrival_date` date NOT NULL,
  `arrival_time` time NOT NULL,
  `departure_date` date NOT NULL,
  `departure_time` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `check_in`
--

INSERT INTO `check_in` (`id`, `reservation_id`, `created_at`, `sure_name`, `sex`, `address`, `id_number`, `date_place_issued`, `nationality`, `date_birth`, `occupation`, `purposed_visit`, `arrival_date`, `arrival_time`, `departure_date`, `departure_time`) VALUES
(2, 7, '2021-12-02 09:51:42', 'Masmudi', 'Laki', 'Karanggeneng', '9876567', '11/20/1999 Lamongan', 'Indonesia', '2021-12-31', 'Nganggur', 'Business', '2020-11-09', '23:59:00', '2020-11-09', '23:59:00'),
(3, 7, '2021-12-02 09:52:27', 'Masmudi', 'Laki', 'Karanggeneng', '9876567', '11/20/1999 Lamongan', 'Indonesia', '2021-12-31', 'Nganggur', 'Business', '2020-11-09', '23:59:00', '2020-11-09', '23:59:00'),
(4, 6, '2021-12-03 07:11:31', 'Masmudi', 'Laki', 'Karanggeneng', '9876567', '11/20/1999 Lamongan', 'Indonesia', '2021-12-03', 'Nganggur', 'Pleasure', '2021-12-03', '20:13:00', '2021-12-03', '20:17:00'),
(5, 5, '2021-12-03 07:55:45', 'Masmudi', 'Laki', 'Karanggeneng', '9876567', '11/20/1999 Lamongan', 'Indonesia', '2021-12-01', 'Nganggur', 'Business', '2021-12-03', '20:55:00', '2021-11-30', '20:01:00'),
(6, 9, '2022-01-11 00:16:37', 'Rudi', 'Laki', 'Karanggeneng', '9876567', '11/20/1999 Lamongan', 'Indonesia', '2022-01-11', 'Nganggur', 'Business', '2021-12-04', '13:16:00', '2021-12-05', '19:16:00'),
(7, 11, '2022-01-11 00:27:54', 'Fatoni Arif', 'Laki', 'Karanggeneng', '9876567', '11/20/1999 Lamongan', 'Indonesia', '2022-01-11', 'Nganggur', 'Business', '2022-01-11', '13:27:00', '2022-01-12', '13:27:00'),
(8, 13, '2022-01-11 19:05:37', 'Fatoni Arif', 'Laki', 'Karanggeneng', '9876567', '11/20/1999 Lamongan', 'Indonesia', '2022-01-12', 'Nganggur', 'Business', '2022-01-11', '08:05:00', '2022-01-12', '08:05:00'),
(9, 18, '2022-01-11 19:38:17', 'Anton', 'Laki', 'Karanggeneng', '9876567', '11/20/1999 Lamongan', 'Indonesia', '2022-01-12', 'Nganggur', 'Business', '2022-01-12', '08:38:00', '2022-01-13', '08:42:00');

-- --------------------------------------------------------

--
-- Table structure for table `morning_call`
--

DROP TABLE IF EXISTS `morning_call`;
CREATE TABLE IF NOT EXISTS `morning_call` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reservation_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(10) NOT NULL,
  `note` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `morning_call`
--

INSERT INTO `morning_call` (`id`, `reservation_id`, `date`, `time`, `note`) VALUES
(1, 7, '2021-12-03', '6.30', 'oke'),
(2, 7, '2021-12-03', '6.45', 'tes'),
(3, 4, '2021-12-03', '5.15', 'oke');

-- --------------------------------------------------------

--
-- Table structure for table `price_lists`
--

DROP TABLE IF EXISTS `price_lists`;
CREATE TABLE IF NOT EXISTS `price_lists` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rooms_type_id` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `dates` varchar(100) NOT NULL,
  `start_date` varchar(50) NOT NULL,
  `end_date` varchar(50) NOT NULL,
  `mon` varchar(10) NOT NULL,
  `tue` varchar(10) NOT NULL,
  `wed` varchar(10) NOT NULL,
  `thu` varchar(10) NOT NULL,
  `fri` varchar(10) NOT NULL,
  `sat` varchar(10) NOT NULL,
  `sun` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `price_lists`
--

INSERT INTO `price_lists` (`id`, `rooms_type_id`, `type`, `dates`, `start_date`, `end_date`, `mon`, `tue`, `wed`, `thu`, `fri`, `sat`, `sun`) VALUES
(1, 3, 'REGULAR', '', '', '', '350000', '350000', '350000', '350000', '350000', '350000', '350000'),
(3, 4, 'REGULAR', '', '', '', '350000', '350000', '350000', '350000', '350000', '350000', '350000'),
(4, 5, 'REGULAR', '', '', '', '400000', '400000', '400000', '400000', '400000', '400000', '400000'),
(5, 6, 'REGULAR', '', '', '', '500000', '500000', '500000', '500000', '500000', '500000', '500000'),
(6, 7, 'REGULAR', '', '', '', '750000', '750000', '750000', '750000', '750000', '750000', '750000');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
CREATE TABLE IF NOT EXISTS `reservations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `officer_id` int(11) NOT NULL,
  `created_at` varchar(50) NOT NULL,
  `updated_at` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `no_person` varchar(10) NOT NULL,
  `made_by` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `company` varchar(50) NOT NULL,
  `arrival_date` date NOT NULL,
  `flight_number` varchar(20) NOT NULL,
  `flight_hour` varchar(10) NOT NULL,
  `departure_date` date NOT NULL,
  `type_accommodation` varchar(100) NOT NULL,
  `daily_rate` varchar(100) NOT NULL,
  `guest_request` varchar(100) NOT NULL,
  `payment` varchar(100) NOT NULL,
  `deposit` varchar(20) NOT NULL DEFAULT '0',
  `guest_category` varchar(200) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'RESERVATION',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `officer_id`, `created_at`, `updated_at`, `name`, `no_person`, `made_by`, `phone`, `company`, `arrival_date`, `flight_number`, `flight_hour`, `departure_date`, `type_accommodation`, `daily_rate`, `guest_request`, `payment`, `deposit`, `guest_category`, `status`) VALUES
(13, 1, '2022-01-11 08:31:37', '2022-01-11 08:31:37', 'Fatoni Arif', '1', 'Saya', '+6285781812171', 'Dukun Web', '2022-01-11', '1111', '21:31', '2022-01-12', 'a:1:{i:0;s:1:\"4\";}', '4', 'tes', 'Cash', '0', 'Personal/Pribadi', 'CHECK OUT'),
(14, 1, '2022-01-11 08:36:15', '2022-01-11 08:36:15', 'Anton', '1', 'Beny', '+6285781812173', 'Dukun Web', '2022-01-12', '1111', '21:35', '2022-01-13', 'a:1:{i:0;s:1:\"5\";}', '5', 'tes', 'Deposit', '0', 'Company/Perusahaan', 'RESERVATION'),
(18, 1, '2022-01-11 18:39:59', '2022-01-11 18:39:59', 'Anton', '1', 'Saya', '085781812171', 'DUKUNWEB', '2022-01-12', '1111', '07:39', '2022-01-13', 'a:1:{i:0;s:1:\"5\";}', '3', 'tes', 'Deposit', '600000', 'Company/Perusahaan', 'CHECK OUT');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

DROP TABLE IF EXISTS `rooms`;
CREATE TABLE IF NOT EXISTS `rooms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_id` int(11) NOT NULL,
  `number` varchar(20) NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `type_id`, `number`, `status`) VALUES
(1, 3, '01', 'Occupied Clean (OC) [Ready For Booking]'),
(2, 3, '02', 'Occupied Clean (OC) [Ready For Booking]'),
(3, 3, '03', 'Occupied Clean (OC) [Ready For Booking]'),
(4, 4, '06', 'Occupied Dirty (OD)'),
(7, 5, '10', 'Occupied Dirty (OD)'),
(8, 5, '11', 'Occupied Dirty (OD)'),
(9, 5, '12', 'Occupied Dirty (OD)'),
(10, 5, '13', 'Occupied Dirty (OD)'),
(11, 7, '14', 'Occupied Clean (OC) [Ready For Booking]'),
(12, 5, '15', 'Occupied Dirty (OD)'),
(13, 5, '16', 'Occupied Dirty (OD)');

-- --------------------------------------------------------

--
-- Table structure for table `rooms_type`
--

DROP TABLE IF EXISTS `rooms_type`;
CREATE TABLE IF NOT EXISTS `rooms_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `code` varchar(10) NOT NULL,
  `facility` text NOT NULL,
  `description` text NOT NULL,
  `base_occupancy` varchar(10) NOT NULL,
  `kids_occupancy` varchar(10) NOT NULL,
  `higher_occupancy` varchar(10) NOT NULL,
  `gallery` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms_type`
--

INSERT INTO `rooms_type` (`id`, `name`, `code`, `facility`, `description`, `base_occupancy`, `kids_occupancy`, `higher_occupancy`, `gallery`) VALUES
(3, 'JUNIOR SUITE', 'JS', '', 'JUNIOR SUITE', '1', '1', '2', ''),
(4, 'SUITE', 'SUT', '', 'SUITE', '1', '1', '2', ''),
(5, 'DELUXE', 'DLX', '', 'DELUXE', '8', '1', '2', ''),
(6, 'SUPERIOR', 'SPR', '', 'SUPERIOR', '7', '1', '2', ''),
(7, 'SWEET ROOM', 'SW-01', '', 'Sweet Room', '2', '1', '2', '');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `price` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `description` varchar(200) NOT NULL,
  `active` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `price`, `type`, `description`, `active`) VALUES
(2, 'Bar', '400000', 'NIGHT', '', 1),
(3, 'Kolam Renang', '100000', 'PERSON', '', 1),
(4, 'Spa', '100000', 'PERSON', '', 1),
(5, 'Laundry', '8000', 'ITEM', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `super_users`
--

DROP TABLE IF EXISTS `super_users`;
CREATE TABLE IF NOT EXISTS `super_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `level` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `super_users`
--

INSERT INTO `super_users` (`id`, `email`, `password`, `full_name`, `level`) VALUES
(1, 'baa@gmail.com', '$2y$10$NPpSake5M4Cz9/ANJdCw3esNqzxSfDWwcK7BEjENJHnLES3csXR3m', 'Administrator', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
