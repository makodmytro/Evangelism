-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: hopeforevangelism.com.mysql.service.one.com:3306
-- Generation Time: Nov 30, 2023 at 07:15 AM
-- Server version: 10.6.15-MariaDB-1:10.6.15+maria~ubu2204
-- PHP Version: 8.1.2-1ubuntu2.14

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
CREATE DATABASE IF NOT EXISTS `hopeforevangelism_com` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `hopeforevangelism_com`;

-- --------------------------------------------------------

--
-- Table structure for table `tb_connection`
--

CREATE TABLE `tb_connection` (
  `usernr1` int(11) NOT NULL,
  `usernr2` int(11) NOT NULL,
  `cdate` date NOT NULL,
  `status` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_default`
--

CREATE TABLE `tb_default` (
  `radius` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_default`
--

INSERT INTO `tb_default` (`radius`) VALUES
(50);

-- --------------------------------------------------------

--
-- Table structure for table `tb_default_lang`
--

CREATE TABLE `tb_default_lang` (
  `langu` varchar(20) NOT NULL,
  `legal_text` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_default_lang`
--

INSERT INTO `tb_default_lang` (`langu`, `legal_text`) VALUES
('english', 'That my data will be stored and processed for the purpose of contacting me and for community work in accordance with the statutory provisions on data protection. You can object to further processing at any time, as well as request correction, deletion and information about your data, insofar as this is legally permissible. Further information (incl. privacy policy) can be found at www.hopeforevangelism.com/privacy-policy'),
('german', 'Dass meine Daten zum Zweck der Kontaktaufnahme und der Gemeindearbeit gemäß der gesetzlichen Bestimmungen zum Datenschutz gespeichert und verarbeitet werden. Der weiteren Verarbeitung kannst du jederzeit widersprechen, sowie Berichtigung, Löschung und Auskunft über deine Daten verlangen, soweit dies gesetzlich zulässig ist. Weitere Informationen (inkl. Datenschutzerklärung) unter www.hopeforevangelism.com/privacy-policy');

-- --------------------------------------------------------

--
-- Table structure for table `tb_email_text`
--

CREATE TABLE `tb_email_text` (
  `langu` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `ewtype` varchar(20) NOT NULL,
  `pos` tinyint(4) NOT NULL,
  `html_link` varchar(5) NOT NULL,
  `txt` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_email_text`
--

INSERT INTO `tb_email_text` (`langu`, `type`, `ewtype`, `pos`, `html_link`, `txt`) VALUES
('english', 'connect', 'email', 1, 'html', 'I would like to connect with you, so that in the future, when we have events, you will be automatically invited to them. Please click on the below link to confirm this.'),
('english', 'newBorn', 'email', 1, 'html', 'Welcome to our portal on www.hopeforevangelism.com'),
('english', 'newBorn', 'email', 2, 'html', 'Please check out our privacy policy'),
('english', 'newBorn', 'email', 3, 'link', 'https://www.hopeforevangelism.com/privacy-policy/'),
('english', 'newBorn', 'email', 4, 'html', 'Please review who can contact you. By clicking on the links below, you will revoke their rights to contact you.'),
('english', 'register', 'email', 1, 'html', 'Welcome to HopeForEvangelism.com'),
('english', 'register', 'email', 2, 'html', 'Please check out our privacy policy'),
('english', 'register', 'email', 3, 'link', 'https://www.hopeforevangelism.com/privacy-policy/');

-- --------------------------------------------------------

--
-- Table structure for table `tb_evangel`
--

CREATE TABLE `tb_evangel` (
  `langu` varchar(20) NOT NULL,
  `descript` varchar(30) NOT NULL,
  `lnk` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_evangel`
--

INSERT INTO `tb_evangel` (`langu`, `descript`, `lnk`) VALUES
('Deutsch', 'Katholiken', 'https://www.hopeforevangelism.com/2023/11/18/katholiken/'),
('English', 'Catholic', 'https://www.hopeforevangelism.com/2023/11/18/catholics/'),
('English', 'Muslim', 'https://www.hopeforevangelism.com/2023/11/18/muslims/');

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
  `facebook` varchar(100) DEFAULT NULL,
  `instagram` varchar(100) DEFAULT NULL,
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
  `website` varchar(100) DEFAULT NULL,
  `whatsappcode` varchar(300) DEFAULT NULL,
  `active` tinyint(4) NOT NULL,
  `sendout` tinyint(4) DEFAULT NULL
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

--
-- Dumping data for table `tb_types`
--

INSERT INTO `tb_types` (`type`, `langu`, `descript`, `generatecode`) VALUES
('Church', 'deutsch', 'Gemeinde', 1),
('Church', 'english', 'Church', 1),
('Evangelist', 'deutsch', 'Evangelist', 0),
('Evangelist', 'english', 'Evangelist', 0),
('newBorn', 'deutsch', 'Neugeborener Christ', 0),
('newBorn', 'english', 'New Christian', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `email` varchar(50) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `usernr` int(11) NOT NULL,
  `rcode` varchar(50) DEFAULT NULL,
  `active` tinyint(4) NOT NULL,
  `admin` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_connection`
--
ALTER TABLE `tb_connection`
  ADD PRIMARY KEY (`usernr1`,`usernr2`);

--
-- Indexes for table `tb_default_lang`
--
ALTER TABLE `tb_default_lang`
  ADD PRIMARY KEY (`langu`);

--
-- Indexes for table `tb_email_text`
--
ALTER TABLE `tb_email_text`
  ADD PRIMARY KEY (`langu`,`type`,`ewtype`,`pos`,`html_link`);

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
  ADD PRIMARY KEY (`email`),
  ADD KEY `usernr` (`usernr`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_members`
--
ALTER TABLE `tb_members`
  MODIFY `usernr` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
