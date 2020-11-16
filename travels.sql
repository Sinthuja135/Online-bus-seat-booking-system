-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2019 at 04:07 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travels`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `nic` varchar(100) NOT NULL,
  `phone` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `firstname`, `lastname`, `nic`, `phone`, `email`, `username`, `password`, `address`) VALUES
(1, 'roch', 'dani', '966738890v', 778967543, 'dani@gmail.com', 'dani', 'dani', 'anaicoddai');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `feedback` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `name`, `feedback`) VALUES
(4, 'sinthuja', 'very long time \ntry hard'),
(5, 'archi', 'Bad service\n'),
(6, 'thatpa', 'great service'),
(7, 'Vinoja', 'Your bus service is good but your traveling payment is little bit high '),
(8, 'sam', 'more useful for our travelling');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `descripe` varchar(500) NOT NULL,
  `photo` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `descripe`, `photo`) VALUES
(3, 'new services', 'new facilities are added to the bus.', 'http://jaisonjoy.com/image/bus.png'),
(5, 'important ', 'bus services delayed for today', 'http://jaisonjoy.com/image/male.png'),
(6, 'reservation', 'cancelling the reserved bus reservation', '	http://jaisonjoy.com/image/female.png');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `reservation_id` int(12) NOT NULL,
  `bustype` varchar(10) NOT NULL,
  `from_station` varchar(100) NOT NULL,
  `journey_date` date NOT NULL,
  `journey_time` time NOT NULL,
  `to_station` varchar(100) NOT NULL,
  `people` int(11) NOT NULL,
  `day` int(11) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `emailAddress` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reservation_id`, `bustype`, `from_station`, `journey_date`, `journey_time`, `to_station`, `people`, `day`, `price`, `emailAddress`) VALUES
(1, 'Ac', 'Badhulla', '2019-09-10', '00:00:06', 'Colombo', 30, 2, '20000', 'sowmi@gamil.com'),
(2, 'Ac', 'Jaffna', '2019-09-11', '23:43:00', 'Colombo', 20, 5, '50000', 'archi@gmail.com'),
(3, 'Non-Ac', 'Jaffna', '2019-09-13', '06:30:00', 'Colombo', 30, 3, '30000', 'sam@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `seat`
--

CREATE TABLE `seat` (
  `seat_id` int(11) NOT NULL,
  `seat_no` int(11) NOT NULL,
  `availability` tinyint(1) NOT NULL,
  `availabilityTwo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seat`
--

INSERT INTO `seat` (`seat_id`, `seat_no`, `availability`, `availabilityTwo`) VALUES
(1, 1, 0, 1),
(2, 2, 1, 0),
(3, 3, 0, 0),
(4, 4, 0, 0),
(5, 5, 1, 0),
(6, 6, 0, 0),
(7, 7, 0, 0),
(8, 8, 0, 0),
(9, 9, 0, 0),
(10, 10, 0, 0),
(11, 11, 0, 0),
(12, 12, 0, 0),
(13, 13, 1, 1),
(14, 14, 1, 1),
(15, 15, 0, 0),
(16, 16, 0, 0),
(17, 17, 0, 0),
(18, 18, 0, 0),
(19, 19, 0, 0),
(20, 20, 0, 0),
(21, 21, 0, 0),
(22, 22, 0, 0),
(23, 23, 0, 0),
(24, 24, 1, 1),
(25, 25, 1, 1),
(26, 26, 0, 0),
(27, 27, 0, 0),
(28, 28, 0, 0),
(29, 29, 0, 0),
(30, 30, 0, 0),
(31, 31, 0, 0),
(32, 32, 0, 0),
(33, 33, 0, 0),
(34, 14, 1, 1),
(35, 35, 0, 0),
(36, 36, 0, 0),
(37, 37, 0, 0),
(38, 38, 0, 0),
(39, 39, 0, 0),
(40, 40, 0, 0),
(41, 41, 0, 0),
(42, 42, 0, 0),
(43, 43, 0, 0),
(44, 44, 0, 0),
(45, 45, 0, 0),
(46, 46, 0, 0),
(47, 47, 0, 0),
(48, 48, 0, 0),
(49, 49, 0, 0),
(50, 50, 0, 0),
(51, 51, 0, 0),
(52, 52, 0, 0),
(53, 53, 0, 0),
(54, 54, 0, 0),
(55, 55, 0, 0),
(56, 56, 0, 0),
(57, 57, 0, 0),
(58, 58, 0, 0),
(59, 59, 1, 1),
(60, 60, 1, 1),
(61, 61, 1, 1),
(62, 62, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `seatreserve`
--

CREATE TABLE `seatreserve` (
  `booking_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `booked` varchar(500) NOT NULL,
  `bookedDate` date NOT NULL,
  `emailAddress` varchar(50) NOT NULL,
  `fromDestination` varchar(50) NOT NULL,
  `toDestination` varchar(50) NOT NULL,
  `bustype` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seatreserve`
--

INSERT INTO `seatreserve` (`booking_id`, `id`, `booked`, `bookedDate`, `emailAddress`, `fromDestination`, `toDestination`, `bustype`) VALUES
(1, 0, '45', '2019-09-10', 'Sinthu@gmail.com', 'Jaffna', 'Badulla', 'NON A/C'),
(2, 0, '46', '2019-09-10', 'Sinthu@gmail.com', 'Jaffna', 'Badulla', 'NON A/C'),
(3, 1, '25', '2019-09-11', 'chandru@gmail.com', 'Badulla', 'Jaffna', 'A/C'),
(4, 1, '26', '2019-09-11', 'chandru@gmail.com', 'Badulla', 'Jaffna', 'A/C'),
(5, 0, '53', '2019-09-13', 'Sinthu@gmail.com', 'Jaffna', 'Badulla', 'NON A/C'),
(6, 0, '54', '2019-09-13', 'Sinthu@gmail.com', 'Jaffna', 'Badulla', 'NON A/C'),
(7, 0, '5', '2019-09-13', 'Sinthu@gmail.com', 'Jaffna', 'Badulla', 'NON A/C'),
(8, 0, '6', '2019-09-13', 'Sinthu@gmail.com', 'Jaffna', 'Badulla', 'NON A/C'),
(9, 1, '53', '2019-09-11', 'Sinthu@gmail.com', 'Badulla', 'Jaffna', 'A/C'),
(10, 1, '54', '2019-09-11', 'Sinthu@gmail.com', 'Badulla', 'Jaffna', 'A/C'),
(11, 1, '37', '2019-09-12', 'archi@gmail.com', 'Badulla', 'Jaffna', 'NON A/C'),
(12, 1, '38', '2019-09-12', 'archi@gmail.com', 'Badulla', 'Jaffna', 'NON A/C'),
(13, 1, '41', '2019-09-12', 'archi@gmail.com', 'Badulla', 'Jaffna', 'NON A/C'),
(14, 1, '42', '2019-09-12', 'archi@gmail.com', 'Badulla', 'Jaffna', 'NON A/C'),
(15, 0, '49', '2019-09-14', 'vino@gmail.com', 'Jaffna', 'Badulla', 'A/C'),
(16, 0, '50', '2019-09-14', 'vino@gmail.com', 'Jaffna', 'Badulla', 'A/C'),
(17, 0, '2', '2019-09-15', 'shiya@gmail.com', 'Jaffna', 'Badulla', 'NON A/C'),
(18, 0, '1', '2019-09-15', 'shiya@gmail.com', 'Jaffna', 'Badulla', 'NON A/C'),
(19, 0, '5', '2019-09-15', 'shiya@gmail.com', 'Jaffna', 'Badulla', 'NON A/C'),
(20, 0, '6', '2019-09-15', 'shiya@gmail.com', 'Jaffna', 'Badulla', 'NON A/C'),
(21, 0, '2', '2019-09-11', 'sowmi@gamil.com', 'Jaffna', 'Badulla', 'NON A/C'),
(22, 0, '1', '2019-09-11', 'sowmi@gamil.com', 'Jaffna', 'Badulla', 'NON A/C'),
(23, 0, '61', '2019-09-11', 'thanogika95@gmail.com', 'Jaffna', 'Badulla', 'A/C'),
(24, 0, '62', '2019-09-11', 'thanogika95@gmail.com', 'Jaffna', 'Badulla', 'A/C'),
(25, 0, '47', '2019-09-10', 'archi@gmail.com', 'Jaffna', 'Badulla', 'NON A/C'),
(26, 0, '48', '2019-09-10', 'archi@gmail.com', 'Jaffna', 'Badulla', 'NON A/C'),
(27, 0, '38', '2019-09-11', 'sam@gmail.com', 'Jaffna', 'Badulla', 'NON A/C'),
(28, 0, '37', '2019-09-11', 'sam@gmail.com', 'Jaffna', 'Badulla', 'NON A/C'),
(29, 0, '49', '2019-09-13', 'sam@gmail.com', 'Jaffna', 'Badulla', 'NON A/C'),
(30, 0, '50', '2019-09-13', 'sam@gmail.com', 'Jaffna', 'Badulla', 'NON A/C'),
(31, 0, '33', '2019-09-13', 'sam@gmail.com', 'Jaffna', 'Badulla', 'A/C'),
(32, 0, '34', '2019-09-13', 'sam@gmail.com', 'Jaffna', 'Badulla', 'A/C');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `nic` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` int(10) NOT NULL,
  `address` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL DEFAULT 'Dilmi1995',
  `userlevel` varchar(10) NOT NULL DEFAULT 'staff'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `firstname`, `lastname`, `nic`, `email`, `phone`, `address`, `password`, `userlevel`) VALUES
(9, 'Siva', 'Tharan', '907865432v', 'siva@gmail.com', 769632540, 'Badulla', 'Dilmi1995', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `emailAddress` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `nic` varchar(10) NOT NULL,
  `phone` varchar(10) NOT NULL DEFAULT '+94',
  `user_level` varchar(30) NOT NULL DEFAULT 'cus'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `emailAddress`, `user_password`, `nic`, `phone`, `user_level`) VALUES
(1, 'Archana ', 'archi@gmail.com', 'archi', '966200499v', '774003562', 'cus'),
(2, 'Sinthuja', 'sinthu@gmail.com', 'sinthu', '955613201v', '769896545', 'cus'),
(3, 'Thanogika', 'thanogika95@gmail.com', 'Loganathan7', '955352645v', '769427664', 'cus'),
(4, 'Danistan', 'danistan@gmail.com', 'danii', '950760737v', '778679549', 'cus'),
(7, 'Sowmi', 'sowmi@gamil.com', 'sowmi', '945678945v', '773569852', 'cus'),
(12, 'samm', 'sam@gmail.com', 'sammm', '9377373773', '764349464', 'cus');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reservation_id`),
  ADD KEY `emailAddress` (`emailAddress`);

--
-- Indexes for table `seat`
--
ALTER TABLE `seat`
  ADD PRIMARY KEY (`seat_id`);

--
-- Indexes for table `seatreserve`
--
ALTER TABLE `seatreserve`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`nic`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reservation_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `seat`
--
ALTER TABLE `seat`
  MODIFY `seat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `seatreserve`
--
ALTER TABLE `seatreserve`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
