-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2026 at 12:06 PM
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
-- Database: `dbsk_rangersog`
--

-- --------------------------------------------------------

--
-- Table structure for table `ahli`
--

CREATE TABLE `ahli` (
  `nama` varchar(50) DEFAULT NULL,
  `nokp` varchar(12) NOT NULL,
  `id_pasukan` int(3) DEFAULT NULL,
  `tahap` varchar(20) DEFAULT NULL,
  `katalaluan` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ahli`
--

INSERT INTO `ahli` (`nama`, `nokp`, `id_pasukan`, `tahap`, `katalaluan`) VALUES
(' Nurul Izati Balqis ', '010115100132', 102, ' ADMIN ', ' 123 '),
('Nasrul', '040803100143', 103, 'AHLI BIASA', '123'),
('Faris Hakim', '050708100345', 101, 'AHLI BIASA', '123'),
(' Ezam ', '060719100123', 103, ' ADMIN ', ' 123 '),
('Muhammad Syahmi', '070217101093', 104, 'AHLI BIASA', '123'),
(' Zulhaziq ', '070611100482', 104, ' AHLI BIASA ', ' 123 '),
('Syahmi', '070707101434', 103, 'AHLI BIASA', '123'),
(' Naqiuddin Hadif ', '071117100143', 101, ' AHLI BIASA ', ' 123 '),
('Ariana Marley', '071127100568', 101, 'ADMIN', '071128');

-- --------------------------------------------------------

--
-- Table structure for table `aktiviti`
--

CREATE TABLE `aktiviti` (
  `id_aktiviti` int(2) NOT NULL,
  `nama_aktiviti` text DEFAULT NULL,
  `tarikh_aktiviti` date DEFAULT NULL,
  `masa_mula` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aktiviti`
--

INSERT INTO `aktiviti` (`id_aktiviti`, `nama_aktiviti`, `tarikh_aktiviti`, `masa_mula`) VALUES
(1, 'Selection MSSS', '2024-07-13', '8.00am'),
(2, 'Closed Training', '2024-07-18', '8.00pm'),
(3, 'MSSS Training', '2024-07-19', '8.00pm');

-- --------------------------------------------------------

--
-- Table structure for table `kehadiran`
--

CREATE TABLE `kehadiran` (
  `id_aktiviti` int(2) NOT NULL,
  `nokp` varchar(12) NOT NULL,
  `masa_hadir` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kehadiran`
--

INSERT INTO `kehadiran` (`id_aktiviti`, `nokp`, `masa_hadir`) VALUES
(1, '050708100345', '10:19:53'),
(2, '040803100143', '23:09:25');

-- --------------------------------------------------------

--
-- Table structure for table `pasukan`
--

CREATE TABLE `pasukan` (
  `id_pasukan` int(3) NOT NULL,
  `jawatan` varchar(10) DEFAULT NULL,
  `nama_pasukan` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pasukan`
--

INSERT INTO `pasukan` (`id_pasukan`, `jawatan`, `nama_pasukan`) VALUES
(101, 'Middle', 'ROJAK'),
(102, 'Guard Left', 'RDC'),
(103, 'Left Wing', 'DT'),
(104, 'Left Wing', 'Sixtysixtail');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ahli`
--
ALTER TABLE `ahli`
  ADD PRIMARY KEY (`nokp`),
  ADD KEY `id_pasukan` (`id_pasukan`);

--
-- Indexes for table `aktiviti`
--
ALTER TABLE `aktiviti`
  ADD PRIMARY KEY (`id_aktiviti`);

--
-- Indexes for table `kehadiran`
--
ALTER TABLE `kehadiran`
  ADD PRIMARY KEY (`id_aktiviti`,`nokp`),
  ADD KEY `nokp` (`nokp`);

--
-- Indexes for table `pasukan`
--
ALTER TABLE `pasukan`
  ADD PRIMARY KEY (`id_pasukan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aktiviti`
--
ALTER TABLE `aktiviti`
  MODIFY `id_aktiviti` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pasukan`
--
ALTER TABLE `pasukan`
  MODIFY `id_pasukan` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ahli`
--
ALTER TABLE `ahli`
  ADD CONSTRAINT `ahli_ibfk_1` FOREIGN KEY (`id_pasukan`) REFERENCES `pasukan` (`id_pasukan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kehadiran`
--
ALTER TABLE `kehadiran`
  ADD CONSTRAINT `kehadiran_ibfk_1` FOREIGN KEY (`nokp`) REFERENCES `ahli` (`nokp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kehadiran_ibfk_2` FOREIGN KEY (`id_aktiviti`) REFERENCES `aktiviti` (`id_aktiviti`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
