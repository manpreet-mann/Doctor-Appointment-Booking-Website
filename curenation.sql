-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2023 at 10:45 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `curenation`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(1, 'pranjeet kumar', 'mr.pran950@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `ambulance`
--

CREATE TABLE `ambulance` (
  `id` int(5) NOT NULL,
  `city` varchar(250) NOT NULL,
  `state` varchar(250) NOT NULL,
  `contact` bigint(10) NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT 'Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ambulance`
--

INSERT INTO `ambulance` (`id`, `city`, `state`, `contact`, `status`, `created_at`) VALUES
(1, 'jalandhar', 'punjab', 108, 'Active', '2023-04-29 11:51:00');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `employee_id` int(50) NOT NULL,
  `hospital_id` int(30) NOT NULL,
  `address` varchar(255) NOT NULL,
  `book_date` varchar(10) NOT NULL,
  `book_time` varchar(10) NOT NULL,
  `createdat` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `description` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `report` longtext NOT NULL,
  `patient_name` varchar(255) NOT NULL,
  `age` int(30) NOT NULL,
  `gender` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `user_id`, `employee_id`, `hospital_id`, `address`, `book_date`, `book_time`, `createdat`, `description`, `status`, `report`, `patient_name`, `age`, `gender`) VALUES
(1, 7, 0, 5, 'guigugu', '2023-05-03', '14:34', '2023-05-02 04:10:48', 'surgan', '', '', 'kapil', 22, 'm'),
(2, 7, 5, 5, 'jalandhar', '2023-05-03', '18:02', '2023-05-02 04:10:48', 'surgan', 'Employee Assigned', '', 'pawan', 9, 'm'),
(3, 7, 3, 5, 'jalandhar', '2023-05-03', '22:34', '2023-05-02 04:10:48', 'checkup', 'Employee Assigned', '', 'pawan', 22, 'm'),
(4, 9, 9, 5, 'rajasthan', '2023-05-18', '23:52', '2023-05-02 04:10:48', 'checkup', 'Employee Assigned', '', 'pappu', 21, 'm'),
(5, 9, 0, 5, 'mumbai', '2023-05-03', '12:53', '2023-05-02 04:23:44', 'checkup', '', '', 'golu', 22, 'm'),
(6, 9, 0, 3, 'ludhiana', '2023-05-03', '09:58', '2023-05-02 04:25:36', 'checkup', '', '', 'guddu', 22, 'm'),
(7, 9, 0, 6, 'patna', '2023-05-03', '12:01', '2023-05-02 04:31:28', 'checkup', '', '', 'gopi', 23, 'f'),
(8, 10, 0, 6, 'jalandhar', '2023-05-03', '13:01', '2023-05-02 06:31:44', 'checkup', '', '', 'mogli', 9, 'm'),
(9, 11, 3, 6, 'rajasthan', '2023-05-03', '13:14', '2023-05-02 08:02:26', 'checkup', 'Employee Assigned', '', 'ram', 9, 'm');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `emp`
--

CREATE TABLE `emp` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `gender` text NOT NULL,
  `age` varchar(30) NOT NULL,
  `address` varchar(255) NOT NULL,
  `addressproof` varchar(255) NOT NULL,
  `id_proof` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `emp`
--

INSERT INTO `emp` (`id`, `name`, `email`, `password`, `phone`, `gender`, `age`, `address`, `addressproof`, `id_proof`) VALUES
(1, 'PRANJEET', 'mr.pran950@gmail.com', '12345', '9501796843', 'm', '23', 'jalandhar', '228562833Planet9_3840x2160.jpg', '401554158Planet9_3840x2160.jpg'),
(3, 'pk', 'pk@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '9501796843', 'm', '21', 'punjab', '', ''),
(5, 'ramu', 'ramu@gmail.com', '12345', '9501796843', 'm', '21', 'jalandhar', '1871860866module_table_bottom.png', '45276235module_table_top.png'),
(9, 'ankit', 'ankit@gmail.com', '12345', '95017967262', 'm', '22', 'jalandhar', '548197960Planet9_3840x2160.jpg', '741185707Planet9_3840x2160.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `age` varchar(30) NOT NULL,
  `gender` text NOT NULL,
  `address` varchar(255) NOT NULL,
  `adressproof` varchar(255) NOT NULL,
  `id_proof` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `email`, `password`, `phone`, `age`, `gender`, `address`, `adressproof`, `id_proof`) VALUES
(1, 'ritik', 'ritik@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '9501796843', '21', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE `hospital` (
  `id` int(11) NOT NULL,
  `hospital_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `opentiming` time NOT NULL,
  `closetiming` time NOT NULL,
  `description` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`id`, `hospital_name`, `email`, `password`, `phone`, `opentiming`, `closetiming`, `description`, `state`, `city`, `address`, `status`, `created_at`) VALUES
(3, 'janta hospital', 'janta@gmail.com', '12345', '95017967262', '12:12:00', '12:12:00', 'checkup', 'bihar', 'begusarai', 'begusarai', '', '2023-04-30 03:34:02'),
(5, 'civil hospital', 'civil@gmail.com', '', '9501796843', '00:00:00', '00:00:00', '', '', '', '', '', '2023-05-02 07:50:36'),
(6, 'dada hospital', 'dada@gmail.com', '', '7367628', '12:59:00', '09:02:00', 'all checkup', 'bihar', 'patna', 'patna', '', '2023-05-02 04:30:28'),
(7, 'capitol hospital', 'capitol@gmail.com', '', '7367628', '14:07:00', '17:08:00', 'checkup', 'punjab', 'Jalandhar city', 'hoshiarpur road', '', '2023-05-02 08:36:16'),
(8, 'capitol hospital', 'capitol@gmail.com', '', '7367628', '14:07:00', '17:08:00', 'checkup', 'punjab', 'Jalandhar city', 'hoshiarpur road', '', '2023-05-02 08:36:47'),
(9, 'jammu hospital', 'jammu@gmail.com', '12345', '833234322332', '15:07:00', '19:07:00', 'checkup', 'maharastra', 'mumbai', 'mumbai', '', '2023-05-02 08:38:18'),
(10, 'jammu hospital', 'jammu@gmail.com', '12345', '833234322332', '15:07:00', '19:07:00', 'checkup', 'maharastra', 'mumbai', 'mumbai', '', '2023-05-02 08:38:39');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `gender` text NOT NULL,
  `age` varchar(30) NOT NULL,
  `address` varchar(255) NOT NULL,
  `addressproof` varchar(255) NOT NULL,
  `id_proof` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `phone`, `gender`, `age`, `address`, `addressproof`, `id_proof`, `status`) VALUES
(4, 'pranjeet', 'mr.pran950@gmail.com', '12345', '9501796843', 'm', '21', 'jalandhar', '151699210Screenshot (2).png', '449050426Screenshot (2).png', 'Active'),
(7, 'kapil', 'kapil@gmail.com', '12345', '95017967262', 'm', '21', 'jalandhar', '298118125Screenshot (2).png', '1009889472Screenshot (2).png', 'Active'),
(8, 'vinod', 'vinod@gmail.com', '12345', '12345', 'm', '22', 'jalandhar', '1550346194Planet9_3840x2160.jpg', '478762342Planet9_3840x2160.jpg', 'Blocked'),
(9, 'pappu', 'pappu@gmail.com', '12345', '95017967262', 'm', '9', 'rajasthan', '1572229804Planet9_3840x2160.jpg', '1536796046Planet9_3840x2160.jpg', ''),
(10, 'golu', 'golu@gmail.com', '12345', '95017967262', 'm', '23', 'jalandhar', '330581060Planet9_3840x2160.jpg', '1651123573Planet9_3840x2160.jpg', ''),
(11, 'rakesh', 'rakesh@gmail.com', '12345', '9501796843', 'm', '21', 'rajasthan', '429242476Planet9_3840x2160.jpg', '907615963Planet9_3840x2160.jpg', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `ambulance`
--
ALTER TABLE `ambulance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `emp`
--
ALTER TABLE `emp`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ambulance`
--
ALTER TABLE `ambulance`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `emp`
--
ALTER TABLE `emp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hospital`
--
ALTER TABLE `hospital`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
