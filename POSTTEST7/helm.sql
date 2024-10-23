-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2024 at 03:59 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_helm`
--

-- --------------------------------------------------------

--
-- Table structure for table `helm`
--

CREATE TABLE `helm` (
  `id_helm` int(11) NOT NULL,
  `merk` varchar(100) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `helm`
--

INSERT INTO `helm` (`id_helm`, `merk`, `jenis`, `stok`, `harga`, `gambar`) VALUES
(7, '1', '1', 1, 1.00, '2024-10-16 15.49.16.png'),
(8, 'Cargloss', 'Cargloss', 1, 510.00, '2024-10-16 15.50.02.png'),
(9, 'MLA', 'MLA', 12, 560.00, '2024-10-16 15.55.54.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `helm`
--
ALTER TABLE `helm`
  ADD PRIMARY KEY (`id_helm`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `helm`
--
ALTER TABLE `helm`
  MODIFY `id_helm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
