-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2022 at 09:41 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `autologin`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `id` int(11) NOT NULL,
  `email_hash` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `login_pwd` varchar(255) NOT NULL,
  `status` text NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`id`, `email_hash`, `email`, `login_pwd`, `status`, `created_at`) VALUES
(1, 'jnevhjrnbdjenbjgfknbdjn4e89e65r89', 'johndoe@email.com', 'ewmiogmet', 'Incorrrrect password', '2022-10-23 14:03:29'),
(2, '630dbb166216f146d4d64211b5f31b1c', 'segzyswitch@gmail.com', '', '', '2022-10-23 21:42:50'),
(3, 'e0cb0e3e97f42737f36a4520c739243b', 'samprince@email.com', '', '', '2022-10-23 21:52:17'),
(4, 'eadb4a705affd08ffb61e865a7c71416', 'samprince1@email.com', 'rtdctrgfc uvidr', '', '2022-10-23 21:52:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
