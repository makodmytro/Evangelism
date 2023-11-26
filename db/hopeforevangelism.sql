-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2023 at 04:49 PM
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
-- Database: `hopeforevangelism`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_connection`
--

CREATE TABLE `tb_connection` (
  `usernr1` int(11) NOT NULL,
  `usernr2` int(11) NOT NULL,
  `cdate` date NOT NULL,
  `status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_default`
--

CREATE TABLE `tb_default` (
  `radius` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_email_text`
--

CREATE TABLE `tb_email_text` (
  `langu` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `typeemail` varchar(20) NOT NULL,
  `pos` tinyint(4) NOT NULL,
  `txt` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_evangel`
--

CREATE TABLE `tb_evangel` (
  `langu` varchar(20) NOT NULL,
  `descript` varchar(30) NOT NULL,
  `lnk` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_event`
--

CREATE TABLE `tb_event` (
  `eventnr` int(11) NOT NULL,
  `usernr` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `street` varchar(70) NOT NULL,
  `zip` varchar(30) NOT NULL,
  `city` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `dateofevent` varchar(100) NOT NULL,
  `invitetxt` varchar(300) NOT NULL,
  `radiuskm` int(11) NOT NULL,
  `web` varchar(200) DEFAULT NULL,
  `sendout` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_event_att`
--

CREATE TABLE `tb_event_att` (
  `eventnr` int(11) NOT NULL,
  `usernr` int(11) NOT NULL,
  `cdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_members`
--

CREATE TABLE `tb_members` (
  `usernr` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `fullname` varchar(60) NOT NULL,
  `organization` varchar(70) DEFAULT NULL,
  `street` varchar(70) DEFAULT NULL,
  `zip` varchar(30) NOT NULL,
  `city` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `cellphone` varchar(50) DEFAULT NULL,
  `telephone` varchar(50) DEFAULT NULL,
  `instagram` varchar(100) DEFAULT NULL,
  `facebook` varchar(100) DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_types`
--

CREATE TABLE `tb_types` (
  `type` varchar(20) NOT NULL,
  `langu` varchar(20) NOT NULL,
  `descript` varchar(50) NOT NULL,
  `generatecode` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `usernr` int(11) NOT NULL,
  `rcode` varchar(50) NOT NULL,
  `active` tinyint(4) NOT NULL,
  `admin` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`email`, `password`, `usernr`, `rcode`, `active`, `admin`) VALUES
('makodmytro@gmail.com', 'e0cea4bb45e36c115356e46910c354af', 1, '', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_connection`
--
ALTER TABLE `tb_connection`
  ADD PRIMARY KEY (`usernr1`,`usernr2`);

--
-- Indexes for table `tb_email_text`
--
ALTER TABLE `tb_email_text`
  ADD PRIMARY KEY (`langu`,`type`,`typeemail`,`pos`);

--
-- Indexes for table `tb_evangel`
--
ALTER TABLE `tb_evangel`
  ADD PRIMARY KEY (`langu`,`descript`);

--
-- Indexes for table `tb_event`
--
ALTER TABLE `tb_event`
  ADD PRIMARY KEY (`eventnr`);

--
-- Indexes for table `tb_event_att`
--
ALTER TABLE `tb_event_att`
  ADD PRIMARY KEY (`eventnr`,`usernr`);

--
-- Indexes for table `tb_members`
--
ALTER TABLE `tb_members`
  ADD PRIMARY KEY (`usernr`);

--
-- Indexes for table `tb_types`
--
ALTER TABLE `tb_types`
  ADD PRIMARY KEY (`type`,`langu`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`usernr`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `usernr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
