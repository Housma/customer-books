-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2021 at 03:13 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `customer-app`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` int(11) NOT NULL,
  `address` varchar(45) NOT NULL,
  `contact_id` int(11) DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `address`, `contact_id`, `is_deleted`, `created_date`, `updated_date`) VALUES
(1, 'asdasdasd', 1, 1, '2021-06-01 00:18:54', '2021-06-01 00:21:33'),
(2, 'Dolore deserunt dolo', 1, 0, '2021-06-01 00:20:09', '2021-06-01 00:20:09'),
(3, 'Sed quo voluptates r', 1, 0, '2021-06-01 00:22:06', '2021-06-01 00:22:06'),
(4, 'Ab id enim praesenti', 5, 0, '2021-06-01 00:29:36', '2021-06-01 00:29:36'),
(5, 'Ipsam et lorem volup', 5, 0, '2021-06-01 00:29:42', '2021-06-01 00:29:42'),
(6, 'Incidunt maxime off', 4, 0, '2021-06-01 00:37:03', '2021-06-01 00:37:03');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `is_deleted`, `created_date`, `updated_date`) VALUES
(1, 'Porter Talley', 0, '2021-05-31 23:17:52', '2021-05-31 23:17:52'),
(2, 'Remedios Hendricksxxx', 1, '2021-05-31 23:18:10', '2021-05-31 23:19:32'),
(3, 'Brenda Anthony', 1, '2021-05-31 23:20:29', '2021-06-01 00:01:43'),
(4, 'Jocelyn Bailey', 0, '2021-06-01 00:27:52', '2021-06-01 00:27:52'),
(5, 'Kitra Sargent', 0, '2021-06-01 00:29:12', '2021-06-01 00:29:12');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `desc` text DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `user_id`, `desc`, `created_date`, `updated_date`) VALUES
(1, 1, 'User logged in username (housma) ', '2021-05-31 20:56:30', '2021-05-31 20:56:30'),
(2, 1, 'User logged out', '2021-05-31 20:58:07', '2021-05-31 20:58:07'),
(3, 1, 'User logged in username (housma) ', '2021-05-31 21:00:00', '2021-05-31 21:00:00'),
(4, 1, 'User logged out', '2021-05-31 21:01:14', '2021-05-31 21:01:14'),
(5, 1, 'User logged in username (housma) ', '2021-05-31 21:01:20', '2021-05-31 21:01:20'),
(6, 1, 'User added username (vonutymed) ', '2021-05-31 21:57:26', '2021-05-31 21:57:26'),
(7, 1, 'User deleted name (Wesley Garrett) user id (2)', '2021-05-31 22:11:40', '2021-05-31 22:11:40'),
(8, 1, 'User added username (jycova) ', '2021-05-31 22:11:51', '2021-05-31 22:11:51'),
(9, 1, 'User added username (bubazoz) ', '2021-05-31 22:12:01', '2021-05-31 22:12:01'),
(10, 1, 'User added username (sidewof) ', '2021-05-31 22:13:19', '2021-05-31 22:13:19'),
(11, 1, 'User edited name (housma) user id (1) ', '2021-05-31 22:19:20', '2021-05-31 22:19:20'),
(12, 1, 'User edited name (Solomon asdasdasd) user id (5) ', '2021-05-31 22:19:31', '2021-05-31 22:19:31'),
(13, 1, 'User edited name (Solomon asdasdasd) user id (5) ', '2021-05-31 22:20:00', '2021-05-31 22:20:00'),
(14, 1, 'User edited name (Solomon asdasdasd) user id (5) ', '2021-05-31 22:20:18', '2021-05-31 22:20:18'),
(15, 1, 'User logged out', '2021-05-31 22:52:45', '2021-05-31 22:52:45'),
(16, 1, 'User logged in username (housma) ', '2021-05-31 22:52:50', '2021-05-31 22:52:50'),
(17, 1, 'User added username (test) ', '2021-05-31 22:57:16', '2021-05-31 22:57:16'),
(18, 1, 'User logged out', '2021-05-31 22:57:23', '2021-05-31 22:57:23'),
(19, 6, 'User logged in username (test) ', '2021-05-31 22:57:29', '2021-05-31 22:57:29'),
(20, 6, 'Contact added username () ', '2021-05-31 23:17:52', '2021-05-31 23:17:52'),
(21, 6, 'Contact added username () ', '2021-05-31 23:18:10', '2021-05-31 23:18:10'),
(22, 6, 'contacts edited name (Remedios Hendricksxxx) contacts id (2) ', '2021-05-31 23:18:55', '2021-05-31 23:18:55'),
(23, 6, 'Contact deleted name (Remedios Hendricksxxx) contact id (2)', '2021-05-31 23:19:16', '2021-05-31 23:19:16'),
(24, 6, 'Contact deleted name (Remedios Hendricksxxx) contact id (2)', '2021-05-31 23:19:32', '2021-05-31 23:19:32'),
(25, 6, 'Contact added name (Brenda Anthony) ', '2021-05-31 23:20:29', '2021-05-31 23:20:29'),
(26, 1, 'User logged in username (housma) ', '2021-05-31 23:20:47', '2021-05-31 23:20:47'),
(27, 6, 'Phone added phone (+1 (947) 809-5092) ', '2021-05-31 23:50:08', '2021-05-31 23:50:08'),
(28, 6, 'Phone added phone (+1 (353) 243-1706) ', '2021-05-31 23:51:26', '2021-05-31 23:51:26'),
(29, 6, 'Phone added phone (+1 (914) 643-8062) ', '2021-05-31 23:52:38', '2021-05-31 23:52:38'),
(30, 6, 'Phone deleted name (+1 (914) 643-8062) phone id (3)', '2021-06-01 00:01:43', '2021-06-01 00:01:43'),
(31, 6, 'Phone deleted name (+1 (914) 643-8062) phone id (3)', '2021-06-01 00:03:08', '2021-06-01 00:03:08'),
(32, 6, 'Phone deleted name (+1 (914) 643-8062) phone id (3)', '2021-06-01 00:03:43', '2021-06-01 00:03:43'),
(33, 6, 'address added address (asdasdasd) ', '2021-06-01 00:18:54', '2021-06-01 00:18:54'),
(34, 6, 'address added address (Dolore deserunt dolo) ', '2021-06-01 00:20:09', '2021-06-01 00:20:09'),
(35, 6, 'address deleted name (asdasdasd) address id (1)', '2021-06-01 00:20:18', '2021-06-01 00:20:18'),
(36, 6, 'address deleted name (asdasdasd) address id (1)', '2021-06-01 00:21:33', '2021-06-01 00:21:33'),
(37, 6, 'address added address (Sed quo voluptates r) ', '2021-06-01 00:22:06', '2021-06-01 00:22:06'),
(38, 6, 'Phone added phone (+1 (687) 325-5293) ', '2021-06-01 00:22:12', '2021-06-01 00:22:12'),
(39, 6, 'Contact added name (Jocelyn Bailey) ', '2021-06-01 00:27:52', '2021-06-01 00:27:52'),
(40, 6, 'Contact added name (Kitra Sargent) ', '2021-06-01 00:29:12', '2021-06-01 00:29:12'),
(41, 6, 'Phone added phone (+1 (939) 951-6645) ', '2021-06-01 00:29:19', '2021-06-01 00:29:19'),
(42, 6, 'Phone added phone (+1 (446) 848-5615) ', '2021-06-01 00:29:25', '2021-06-01 00:29:25'),
(43, 6, 'Phone added phone (+1 (107) 329-9405) ', '2021-06-01 00:29:29', '2021-06-01 00:29:29'),
(44, 6, 'address added address (Ab id enim praesenti) ', '2021-06-01 00:29:36', '2021-06-01 00:29:36'),
(45, 6, 'address added address (Ipsam et lorem volup) ', '2021-06-01 00:29:42', '2021-06-01 00:29:42'),
(46, 6, 'Phone added phone (+1 (842) 716-8178) ', '2021-06-01 00:36:55', '2021-06-01 00:36:55'),
(47, 6, 'address added address (Incidunt maxime off) ', '2021-06-01 00:37:03', '2021-06-01 00:37:03'),
(48, 1, 'User logged in username (housma) ', '2021-06-01 00:45:04', '2021-06-01 00:45:04'),
(49, 6, 'User logged out', '2021-06-01 00:47:52', '2021-06-01 00:47:52'),
(50, 1, 'User logged in username (housma) ', '2021-06-01 00:58:52', '2021-06-01 00:58:52'),
(51, 1, 'User logged out', '2021-06-01 00:59:14', '2021-06-01 00:59:14'),
(52, 6, 'User logged in username (test) ', '2021-06-01 00:59:23', '2021-06-01 00:59:23');

-- --------------------------------------------------------

--
-- Table structure for table `phones`
--

CREATE TABLE `phones` (
  `id` int(11) NOT NULL,
  `phone` varchar(45) NOT NULL,
  `contact_id` int(11) DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `phones`
--

INSERT INTO `phones` (`id`, `phone`, `contact_id`, `is_deleted`, `created_date`, `updated_date`) VALUES
(1, '+1 (947) 809-5092', 1, 1, '2021-05-31 23:50:08', '2021-06-01 00:20:18'),
(2, '+1 (353) 243-1706', 1, 0, '2021-05-31 23:51:26', '2021-05-31 23:51:26'),
(3, '+1 (914) 643-8062', 1, 1, '2021-05-31 23:52:38', '2021-06-01 00:03:43'),
(4, '+1 (687) 325-5293', 1, 0, '2021-06-01 00:22:12', '2021-06-01 00:22:12'),
(5, '+1 (939) 951-6645', 5, 0, '2021-06-01 00:29:19', '2021-06-01 00:29:19'),
(6, '+1 (446) 848-5615', 5, 0, '2021-06-01 00:29:25', '2021-06-01 00:29:25'),
(7, '+1 (107) 329-9405', 5, 0, '2021-06-01 00:29:29', '2021-06-01 00:29:29'),
(8, '+1 (842) 716-8178', 4, 0, '2021-06-01 00:36:55', '2021-06-01 00:36:55');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `level` int(11) DEFAULT 0 COMMENT '1-> Admin ',
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `level`, `is_deleted`, `created_date`, `updated_date`) VALUES
(1, 'housma', 'housma', '2ec09cfc483989a7925f6d37b94579b3', 1, 0, '2021-05-31 20:52:06', '2021-05-31 22:52:32'),
(2, 'Wesley Garrett', 'vonutymed', '1570ee0dec0f49823df2381d469a66c6', 2, 1, '2021-05-31 21:57:26', '2021-05-31 22:11:40'),
(3, 'Brett Everett', 'jycova', '1570ee0dec0f49823df2381d469a66c6', 1, 0, '2021-05-31 22:11:51', '2021-05-31 22:11:51'),
(4, 'Yetta Harrell', 'bubazoz', '1570ee0dec0f49823df2381d469a66c6', 1, 0, '2021-05-31 22:12:01', '2021-05-31 22:12:01'),
(5, 'Solomon asdasdasd', 'sidewof123', '2ec09cfc483989a7925f6d37b94579b3', 1, 0, '2021-05-31 22:13:19', '2021-05-31 22:20:18'),
(6, 'test', 'test', '2ec09cfc483989a7925f6d37b94579b3', 2, 0, '2021-05-31 22:57:16', '2021-05-31 22:57:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phones`
--
ALTER TABLE `phones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `phones`
--
ALTER TABLE `phones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
