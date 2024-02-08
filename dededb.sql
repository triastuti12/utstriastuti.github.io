-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2024 at 08:39 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dededb`
--

-- --------------------------------------------------------

--
-- Table structure for table `krs`
--

CREATE TABLE `krs` (
  `nim` int(10) NOT NULL,
  `kode_mk` int(10) NOT NULL,
  `tahun` varchar(10) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `kelas` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `krs`
--

INSERT INTO `krs` (`nim`, `kode_mk`, `tahun`, `semester`, `kelas`) VALUES
(220101061, 41010007, '', '', 'A'),
(220101061, 41010004, '', '', 'A'),
(220101061, 41010001, '', '', 'A'),
(220101061, 41010006, '', '', 'B'),
(220101079, 41010001, '', '', 'A'),
(220101079, 41010002, '', '', 'A'),
(220101056, 41010003, '', '', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` int(15) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(300) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `password`, `status`) VALUES
(220101024, 'dede', '$2y$10$Wm1YyUdY15OnmDc4./ISZek9p.SuJcmB0rbLIW70cisJsnvDYOtt2', 'pasif'),
(220101034, 'Aki', '$2y$10$esod.Pz3.eMrqqfWIiFWFO3bO1/Z4JBjw70mI8FCQIqkDADNw8v6W', 'aktif'),
(220101056, 'Tri Astuti', '2002', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `matakuliah`
--

CREATE TABLE `matakuliah` (
  `kode_mk` int(15) NOT NULL,
  `nama_mk` varchar(50) NOT NULL,
  `semester` varchar(11) NOT NULL,
  `sks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `matakuliah`
--

INSERT INTO `matakuliah` (`kode_mk`, `nama_mk`, `semester`, `sks`) VALUES
(41010001, 'Logika dan Algoritma', 'Ganjil', 3),
(41010002, 'Agama', 'Ganjil', 2),
(41010003, 'Bahasa Inggris', 'Genap', 2),
(41010004, 'Bahasa Pemrograman', 'Genap', 4),
(41010005, 'Pemrograman Web', 'Genap', 2),
(41010006, 'Pemrograman Web Lanjut', 'Ganjil', 3),
(41010007, 'Testing Implementasi', 'Ganjil', 2),
(41010008, 'Pemrograman Basis Data', 'Genap', 3),
(41010009, 'Rekayasa Perangkat Lunak', 'Genap', 3),
(410100010, 'Basis Data ', 'Ganjil', 3);

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `tahun` varchar(9) NOT NULL,
  `semester` varchar(6) NOT NULL,
  `status` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`tahun`, `semester`, `status`) VALUES
('2023/2024', 'genap', 'Aktif'),
('2017/2018', 'Ganjil', 'Pasif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`kode_mk`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`status`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `nim` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=220101080;

--
-- AUTO_INCREMENT for table `matakuliah`
--
ALTER TABLE `matakuliah`
  MODIFY `kode_mk` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=410100014;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
