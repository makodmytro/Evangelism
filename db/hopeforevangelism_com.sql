-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2023 at 05:52 PM
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
-- Database: `hopeforevangelism_com`
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

--
-- Dumping data for table `tb_event`
--

INSERT INTO `tb_event` (`eventnr`, `usernr`, `name`, `street`, `zip`, `city`, `country`, `dateofevent`, `invitetxt`, `radiuskm`, `web`, `sendout`) VALUES
(1, 101, 'Event 1', 'Street 1', '12345', 'City 1', 'Country 1', '2023-11-23', 'Invite 1', 5, 'http://web1.com', 127),
(2, 102, 'Event 2', 'Street 2', '67890', 'City 2', 'Country 2', '2023-11-24', 'Invite 2', 10, 'http://web2.com', 127),
(3, 103, 'Event 3', 'Street 3', '11111', 'City 3', 'Country 3', '2023-11-25', 'Invite 3', 15, 'http://web3.com', 127),
(4, 104, 'Event 4', 'Street 4', '22222', 'City 4', 'Country 4', '2023-11-26', 'Invite 4', 20, 'http://web4.com', 127),
(5, 105, 'Event 5', 'Street 5', '33333', 'City 5', 'Country 5', '2023-11-27', 'Invite 5', 25, 'http://web5.com', 127),
(6, 106, 'Event 6', 'Street 6', '44444', 'City 6', 'Country 6', '2023-11-28', 'Invite 6', 30, 'http://web6.com', 127),
(7, 107, 'Event 7', 'Street 7', '55555', 'City 7', 'Country 7', '2023-11-29', 'Invite 7', 35, 'http://web7.com', 127),
(8, 108, 'Event 8', 'Street 8', '66666', 'City 8', 'Country 8', '2023-11-30', 'Invite 8', 40, 'http://web8.com', 127),
(9, 109, 'Event 9', 'Street 9', '77777', 'City 9', 'Country 9', '2023-12-01', 'Invite 9', 45, 'http://web9.com', 127),
(10, 110, 'Event 10', 'Street 10', '88888', 'City 10', 'Country 10', '2023-12-02', 'Invite 10', 50, 'http://web10.com', 127);

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

--
-- Dumping data for table `tb_members`
--

INSERT INTO `tb_members` (`usernr`, `type`, `fullname`, `organization`, `street`, `zip`, `city`, `country`, `cellphone`, `telephone`, `instagram`, `facebook`, `website`) VALUES
(101, 'Individual', 'John Doe', 'Company A', '123 Main St', '12345', 'City A', 'Country A', '123-456-7890', '987-654-3210', 'john_insta', 'john_facebook', 'http://johnwebsite.com'),
(102, 'Organization', 'Jane Smith', 'Company B', '456 Oak St', '67890', 'City B', 'Country B', '987-654-3210', '123-456-7890', 'jane_insta', 'jane_facebook', 'http://janewebsite.com'),
(110, 'Individual', 'Bob Johnson', 'Company C', '789 Elm St', '54321', 'City C', 'Country C', '234-567-8901', '876-543-2109', 'bob_insta', 'bob_facebook', 'http://bobwebsite.com');

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
  `usernr` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `code` varchar(50) NOT NULL,
  `active` tinyint(4) NOT NULL,
  `admin` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`usernr`, `email`, `password`, `code`, `active`, `admin`) VALUES
(101, 'user1@example.com', 'password1', 'code1', 1, 0),
(102, 'user2@example.com', 'password2', 'code2', 1, 0),
(103, 'user3@example.com', 'password3', 'code3', 1, 0),
(104, 'user4@example.com', 'password4', 'code4', 1, 0),
(105, 'user5@example.com', 'password5', 'code5', 1, 0),
(201, 'admin1@example.com', 'adminpass1', 'admincode1', 1, 1),
(202, 'admin2@example.com', 'adminpass2', 'admincode2', 1, 1),
(203, 'admin3@example.com', 'adminpass3', 'admincode3', 1, 1),
(204, 'admin4@example.com', 'adminpass4', 'admincode4', 1, 1),
(205, 'admin5@example.com', 'adminpass5', 'admincode5', 1, 1),
(212, 'golden.starr1997@gmail.com', '134568be038d8b03f2cc251cda8b64b6', '8b376cb7211c7cabdc09e23aae78ad82', 0, 0),
(213, 'skype.inner@gmail.com', '134568be038d8b03f2cc251cda8b64b6', '56d70ee573a1d106e89f4efa1a9d53ad', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_connection`
--
ALTER TABLE `tb_connection`
  ADD PRIMARY KEY (`usernr1`,`usernr2`);

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
  ADD PRIMARY KEY (`usernr`),
  ADD KEY `usernr` (`usernr`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `usernr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=214;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
