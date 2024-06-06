-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2023 at 09:26 AM
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
-- Database: `dulanka`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `admin_username` varchar(100) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  `admin_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_id`, `admin_username`, `admin_password`, `admin_name`) VALUES
(2, 2147483647, 'dulanka', '123', 'kavindu avinash'),
(4, 2147483647, 'admin', '123', 'dulanka'),
(5, 2147483647, 'stephan', '123', 'stephan'),
(6, 2857, 'yohan', '123', 'yohan');

-- --------------------------------------------------------

--
-- Table structure for table `farmer`
--

CREATE TABLE `farmer` (
  `id` int(100) NOT NULL,
  `f_id` bigint(100) NOT NULL,
  `farmer_email` varchar(100) NOT NULL,
  `farmer_password` varchar(100) NOT NULL,
  `farmer_name` varchar(100) NOT NULL,
  `farmer_phone` int(11) NOT NULL,
  `farmer_province` varchar(100) NOT NULL,
  `farmer_corps` varchar(100) NOT NULL,
  `starting_date` date NOT NULL,
  `gn` varchar(100) NOT NULL,
  `service_center` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `farmer`
--

INSERT INTO `farmer` (`id`, `f_id`, `farmer_email`, `farmer_password`, `farmer_name`, `farmer_phone`, `farmer_province`, `farmer_corps`, `starting_date`, `gn`, `service_center`) VALUES
(9, 33459807622, 'chamal@gmail.com', '1234', 'dulanka', 773456728, 'North Western', 'Tea', '2000-12-10', 'kandy', 'polgolla'),
(11, 57010133, 'juliya@gmail.com', '1234', 'senujaya', 77712621, 'North Western', 'Tea', '2000-12-13', 'digana', 'kandy'),
(12, 98737554, 'yohan@gmail.com', '123', 'yohan', 888234, 'Uva Province', 'Fruit', '1999-02-10', 'kurunagala', 'kandy'),
(13, 1410052099, 'dewmini@gmail.com', '123', 'dewmini', 894532423, 'Western', 'vegetables', '2000-10-03', 'kandy', 'kandy'),
(14, 64880693326074, 'avinash@gmail.com', '123', 'avinash', 774567324, 'Sabaragamuwa', 'Tea', '2001-03-01', 'kandy', 'kandy'),
(15, 29980225049, 'yohan@gmail.com', '123', 'manujaya', 986754657, 'Eastern', 'Tea', '2000-12-10', 'kurunagala', 'kurunagala'),
(16, 587022, 'razool@gmail.com', '123', 'razool', 98765673, 'Uva Province', 'Rice', '2000-06-10', 'kandy', 'kandy'),
(17, 9264501, 'fsdfsf@gmail.com', '123', 'asdasd', 0, 'Uva Province', 'Fruit', '2222-03-05', 'sdfdsf', 'sdfdsf');

-- --------------------------------------------------------

--
-- Table structure for table `officer`
--

CREATE TABLE `officer` (
  `id` int(11) NOT NULL,
  `officer_id` int(11) NOT NULL,
  `officer_name` varchar(100) NOT NULL,
  `officer_province` varchar(100) NOT NULL,
  `officer_contact` int(11) NOT NULL,
  `service_center` varchar(100) NOT NULL,
  `officer_username` varchar(100) NOT NULL,
  `officer_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `officer`
--

INSERT INTO `officer` (`id`, `officer_id`, `officer_name`, `officer_province`, `officer_contact`, `service_center`, `officer_username`, `officer_password`) VALUES
(2, 2147483647, 'hindle', 'North Central', 774567834, 'kandy', 'dulanka', '1234'),
(3, 8261, 'stephan', 'Central', 778564235, 'ampitiya', 'saman', '123');

-- --------------------------------------------------------

--
-- Table structure for table `query`
--

CREATE TABLE `query` (
  `id` bigint(20) NOT NULL,
  `farmer_name` varchar(100) NOT NULL,
  `farmer_province` varchar(100) NOT NULL,
  `farmer_phone` int(11) NOT NULL,
  `corps` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `gn` varchar(100) NOT NULL,
  `service_center` varchar(100) NOT NULL,
  `query` varchar(1000) NOT NULL,
  `service` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `query`
--

INSERT INTO `query` (`id`, `farmer_name`, `farmer_province`, `farmer_phone`, `corps`, `date`, `gn`, `service_center`, `query`, `service`) VALUES
(4, 'Namal Perera', 'Central', 784587845, 'Rice, vegetables', '2023-10-11', 'nuwara eliya', 'nuwara eliya', 'What are the recommended pest control methods for different crops and livestock?', 'Technical Assistance'),
(6, 'dulanka', 'Southern', 714073067, 'Tea, Fruit', '2000-10-20', 'polgolla', 'polgolla', 'How can I access government grants and subsidies for my farm?\r\n', 'Technical Assistance'),
(7, 'dulanka', 'Southern', 714233067, 'Tea, Fruit', '2000-10-20', 'digana', 'digana', 'What steps should I take to transition to organic farming practices?\r\n ', 'Technical Assistance'),
(13, 'dulanka', 'North Western', 773456728, 'Tea', '2000-12-10', 'kandy', 'polgolla', 'What are the key considerations for livestock care and welfare?\r\n', 'Organic Certification'),
(14, 'dulanka', 'North Western', 773456728, 'Tea', '2000-12-10', 'kandy', 'polgolla', 'Are there resources available for sustainable and eco-friendly farming practices?\r\n', 'Organic Certification'),
(15, 'dulanka', 'North Western', 773456728, 'Tea', '2000-12-10', 'kandy', 'polgolla', 'What are the regulations and requirements for selling farm products at local markets or online?', 'Conservation Planning'),
(16, 'dulanka', 'North Western', 773456728, 'Tea', '2000-12-10', 'kandy', 'polgolla', 'What steps should I take to transition to organic farming practices', 'Market Access');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `admin_username` (`admin_username`),
  ADD KEY `admin_password` (`admin_password`);

--
-- Indexes for table `farmer`
--
ALTER TABLE `farmer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `farmer_email` (`farmer_email`),
  ADD KEY `farmer_password` (`farmer_password`),
  ADD KEY `farmer_name` (`farmer_name`),
  ADD KEY `farmer_phone` (`farmer_phone`),
  ADD KEY `farmer_province` (`farmer_province`),
  ADD KEY `farmer_corps` (`farmer_corps`),
  ADD KEY `starting_date` (`starting_date`),
  ADD KEY `gn` (`gn`),
  ADD KEY `service_center` (`service_center`);

--
-- Indexes for table `officer`
--
ALTER TABLE `officer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `officer_name` (`officer_name`),
  ADD KEY `officer_province` (`officer_province`),
  ADD KEY `officer_contact` (`officer_contact`),
  ADD KEY `service_center` (`service_center`),
  ADD KEY `officer_username` (`officer_username`),
  ADD KEY `officer_password` (`officer_password`),
  ADD KEY `officer_id` (`officer_id`);

--
-- Indexes for table `query`
--
ALTER TABLE `query`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `farmer`
--
ALTER TABLE `farmer`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `officer`
--
ALTER TABLE `officer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `query`
--
ALTER TABLE `query`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
