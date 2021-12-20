-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2021 at 01:39 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car`
--

-- --------------------------------------------------------

--
-- Table structure for table `manufacturer`
--

CREATE TABLE `manufacturer` (
  `idManufacturer` int(11) NOT NULL,
  `name` varchar(23) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `manufacturer`
--

INSERT INTO `manufacturer` (`idManufacturer`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Ford', '2021-12-19 14:23:03', '2021-12-19 14:23:03'),
(2, 'Honda', '2021-12-19 14:23:03', '2021-12-19 14:23:03'),
(3, 'Zastava', '2021-12-20 01:33:32', '2021-12-20 01:33:32'),
(4, 'Nissan', '2021-12-20 01:33:32', '2021-12-20 01:33:32'),
(5, 'Skoda', '2021-12-20 01:33:32', '2021-12-20 01:33:32');

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

CREATE TABLE `model` (
  `idModel` int(11) NOT NULL,
  `name` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `idManufacturer` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `model`
--

INSERT INTO `model` (`idModel`, `name`, `idManufacturer`, `created_at`, `updated_at`) VALUES
(1, 'Mustang', 1, '2021-12-19 14:23:41', '2021-12-19 14:23:41'),
(2, 'Maverick', 1, '2021-12-19 14:23:41', '2021-12-19 14:23:41'),
(3, 'HR-V', 2, '2021-12-19 14:24:54', '2021-12-19 14:24:54'),
(4, 'CR-V', 2, '2021-12-19 14:24:54', '2021-12-19 14:24:54'),
(5, 'Accord', 2, '2021-12-19 14:24:54', '2021-12-19 14:24:54'),
(6, 'Skala', 3, '2021-12-20 01:34:43', '2021-12-20 01:34:43'),
(7, '128', 3, '2021-12-20 01:34:43', '2021-12-20 01:34:43'),
(8, 'Koral', 3, '2021-12-20 01:34:43', '2021-12-20 01:34:43'),
(9, 'Juke', 4, '2021-12-20 01:36:24', '2021-12-20 01:36:24'),
(10, 'Qashqai', 4, '2021-12-20 01:36:24', '2021-12-20 01:36:24'),
(11, 'Fabia', 5, '2021-12-20 01:37:03', '2021-12-20 01:37:03'),
(12, 'Octavia', 5, '2021-12-20 01:37:03', '2021-12-20 01:37:03');

-- --------------------------------------------------------

--
-- Table structure for table `wish`
--

CREATE TABLE `wish` (
  `idWish` int(11) NOT NULL,
  `idManufacturer` int(11) NOT NULL,
  `idModel` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `manufacturer`
--
ALTER TABLE `manufacturer`
  ADD PRIMARY KEY (`idManufacturer`);

--
-- Indexes for table `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`idModel`),
  ADD KEY `idManufacturer` (`idManufacturer`);

--
-- Indexes for table `wish`
--
ALTER TABLE `wish`
  ADD PRIMARY KEY (`idWish`),
  ADD KEY `idManufacturer` (`idManufacturer`),
  ADD KEY `idModel` (`idModel`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `manufacturer`
--
ALTER TABLE `manufacturer`
  MODIFY `idManufacturer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `model`
--
ALTER TABLE `model`
  MODIFY `idModel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `wish`
--
ALTER TABLE `wish`
  MODIFY `idWish` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model`
--
ALTER TABLE `model`
  ADD CONSTRAINT `model_ibfk_1` FOREIGN KEY (`idManufacturer`) REFERENCES `manufacturer` (`idManufacturer`);

--
-- Constraints for table `wish`
--
ALTER TABLE `wish`
  ADD CONSTRAINT `wish_ibfk_1` FOREIGN KEY (`idManufacturer`) REFERENCES `manufacturer` (`idManufacturer`),
  ADD CONSTRAINT `wish_ibfk_2` FOREIGN KEY (`idModel`) REFERENCES `model` (`idModel`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
