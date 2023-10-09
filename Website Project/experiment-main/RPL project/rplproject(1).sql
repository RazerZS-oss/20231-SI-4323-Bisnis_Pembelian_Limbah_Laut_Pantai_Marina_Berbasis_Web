-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2023 at 04:57 PM
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
-- Database: `rplproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `namap` varchar(255) NOT NULL,
  `nikk` varchar(255) NOT NULL,
  `notelpn` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `bayar` varchar(255) NOT NULL,
  `bobot` decimal(10,2) NOT NULL,
  `total_harga` varchar(255) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `namap`, `nikk`, `notelpn`, `alamat`, `jenis`, `bayar`, `bobot`, `total_harga`, `tanggal`) VALUES
(10, 'asas', '1212', '121314', 'smg', 'organic', 'cash', '22.00', '200000', '2023-06-22 06:36:01'),
(11, 'faris', '123456789101112', '082314213239', 'semarang', 'organic', 'cash', '22.00', '12000', '2023-06-22 07:06:35');

-- --------------------------------------------------------

--
-- Table structure for table `tb_datauser1`
--

CREATE TABLE `tb_datauser1` (
  `id` int(11) NOT NULL,
  `namap` varchar(30) NOT NULL,
  `nikk` varchar(30) NOT NULL,
  `notelpn` varchar(30) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `jenis` varchar(30) NOT NULL,
  `bayar` varchar(30) NOT NULL,
  `bobot` varchar(30) NOT NULL,
  `harga` varchar(30) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `totalharga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_done`
--

CREATE TABLE `tb_done` (
  `id_done` int(11) NOT NULL,
  `pesan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_done`
--

INSERT INTO `tb_done` (`id_done`, `pesan`) VALUES
(7, 'sdh selesai');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kurir`
--

CREATE TABLE `tb_kurir` (
  `id_kurir` int(11) NOT NULL,
  `namap` varchar(255) NOT NULL,
  `nikk` varchar(255) NOT NULL,
  `notelpn` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `bayar` varchar(255) NOT NULL,
  `bobot` varchar(255) NOT NULL,
  `totalharga` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kurir`
--

INSERT INTO `tb_kurir` (`id_kurir`, `namap`, `nikk`, `notelpn`, `alamat`, `jenis`, `bayar`, `bobot`, `totalharga`) VALUES
(3, 'Faris', '123456789101112', '082314213239', 'semarang', 'organic', 'cash', '22', '12000');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kurir1`
--

CREATE TABLE `tb_kurir1` (
  `id_kurir1` int(11) NOT NULL,
  `namap` varchar(255) NOT NULL,
  `notelpn` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `jam` time(1) NOT NULL,
  `waktu` date NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `bayar` varchar(255) NOT NULL,
  `bobot` varchar(255) NOT NULL,
  `totalharga` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kurir1`
--

INSERT INTO `tb_kurir1` (`id_kurir1`, `namap`, `notelpn`, `alamat`, `jam`, `waktu`, `jenis`, `bayar`, `bobot`, `totalharga`) VALUES
(8, 'supri', '087766554433', 'semarang', '22:11:00.0', '2004-11-22', 'organic', 'cash', '22', '11000');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pt`
--

CREATE TABLE `tb_pt` (
  `id_pt` int(11) NOT NULL,
  `pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pt`
--

INSERT INTO `tb_pt` (`id_pt`, `pesan`) VALUES
(5, 'oke'),
(6, 'oke saya setuju');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(70) NOT NULL,
  `notelp` int(20) NOT NULL,
  `nik` varchar(70) NOT NULL,
  `username` varchar(70) NOT NULL,
  `password` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `nama`, `notelp`, `nik`, `username`, `password`) VALUES
(10, 'oji', 2147483647, '1028362820373892', 'user', 'user123'),
(11, 'oi', 22, '22', 'iu', 'iu'),
(12, 'user1', 12, '123', 'user1', 'user123'),
(13, 'faris', 2147483647, '12345678910111213', 'faris', 'faris123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_datauser1`
--
ALTER TABLE `tb_datauser1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_done`
--
ALTER TABLE `tb_done`
  ADD PRIMARY KEY (`id_done`);

--
-- Indexes for table `tb_kurir`
--
ALTER TABLE `tb_kurir`
  ADD PRIMARY KEY (`id_kurir`);

--
-- Indexes for table `tb_kurir1`
--
ALTER TABLE `tb_kurir1`
  ADD PRIMARY KEY (`id_kurir1`);

--
-- Indexes for table `tb_pt`
--
ALTER TABLE `tb_pt`
  ADD PRIMARY KEY (`id_pt`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_datauser1`
--
ALTER TABLE `tb_datauser1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `tb_done`
--
ALTER TABLE `tb_done`
  MODIFY `id_done` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_kurir`
--
ALTER TABLE `tb_kurir`
  MODIFY `id_kurir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_kurir1`
--
ALTER TABLE `tb_kurir1`
  MODIFY `id_kurir1` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_pt`
--
ALTER TABLE `tb_pt`
  MODIFY `id_pt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
