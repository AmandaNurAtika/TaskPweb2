-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 17, 2024 at 03:07 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tugas2`
--

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `mahasiswa_id` int NOT NULL,
  `nim` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nama_mhs` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`mahasiswa_id`, `nim`, `nama_mhs`, `alamat`, `email`, `no_telp`) VALUES
(1, '230202051', 'Amanda Nur Atika', 'Cilacap', 'amanda123@gmail.com', '0812345678'),
(2, '230202061', 'Tomy Tomy', 'Banten', 'tomy123@gmail.com', '0891245679'),
(3, '230202068', 'Hana Kurnia Ayu', 'Cilacap', 'hana123@gmail.com', '0863468912'),
(4, '230202053', 'Cici Marici', 'Yogyakarta', 'cici567@gmail.com', '0879644329'),
(5, '230202078', 'Jessica Mika', 'Jakarta', 'jessicam@gmail.com', '0856789533'),
(6, '230202081', 'Hafila Nada', 'Cilacap', 'Hafilanada@gmail.com', '0877123456');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `nilai_id` int NOT NULL,
  `nilai` decimal(10,2) NOT NULL,
  `nilai_akhir` decimal(10,2) NOT NULL,
  `mahasiswa_id` int NOT NULL,
  `matkul_id` int NOT NULL,
  `semester_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`nilai_id`, `nilai`, `nilai_akhir`, `mahasiswa_id`, `matkul_id`, `semester_id`) VALUES
(1, '87.00', '98.00', 1, 1, 1),
(2, '89.00', '90.00', 2, 2, 2),
(3, '78.00', '65.00', 3, 4, 5),
(4, '67.00', '65.00', 5, 4, 3),
(5, '89.00', '78.00', 6, 7, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`mahasiswa_id`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`nilai_id`),
  ADD UNIQUE KEY `mahasiswa_id` (`mahasiswa_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `mahasiswa_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `nilai_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
