-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2023 at 01:15 PM
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
-- Database: `lelang`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(25) NOT NULL,
  `tanggal` date NOT NULL,
  `harga_awal` int(20) NOT NULL,
  `deskripsi_barang` varchar(100) NOT NULL,
  `foto` varchar(225) NOT NULL,
  `tenggat_waktu` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `tanggal`, `harga_awal`, `deskripsi_barang`, `foto`, `tenggat_waktu`) VALUES
(9, 'jeno', '2023-10-12', 10000, 'juhhhuug', '571-230822 Jeno Instagram post.jpg', NULL),
(14, 'jaehyun', '2023-10-06', 35555, '10000777', '12-Jaehyun.jpg', NULL),
(18, 'mark', '2345-04-23', 234567, 'cowo green flag versi agensi', '727-Mark Lee.jpeg', NULL),
(20, 'haechan', '2023-11-23', 100000, 'lukisan ini dilukis oleh monet yang menngambarkan taman ', '973-Hot and Cold _ Jeno X Karina ✔.jpeg', NULL),
(21, 'hendery', '2023-11-23', 120000, 'anu', '442-hendery wallpaper_lockscreen ꒰_⑅_ᵕ_༚_ᵕ_꒱_˖_♡.jpeg', NULL),
(22, 'xioajun', '2023-12-02', 120000, 'sdfghjkl', '397-Xiaojun Weibo Live.jpeg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `history_lelang`
--

CREATE TABLE `history_lelang` (
  `id_history` int(11) NOT NULL,
  `id_lelang` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `penawaran_harga` int(20) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `history_lelang`
--

INSERT INTO `history_lelang` (`id_history`, `id_lelang`, `id_barang`, `id_user`, `penawaran_harga`, `status`) VALUES
(13, 16, 18, 3, 2147483647, 'terpilih'),
(14, 36, 20, 3, 120000, '0'),
(15, 36, 20, 3, 34567890, '0'),
(16, 16, 18, 3, 123456789, '0'),
(17, 16, 18, 3, 78900000, '0'),
(18, 41, 14, 3, 345600000, '0'),
(19, 41, 14, 3, 123400000, '0'),
(20, 40, 22, 3, 12345000, '0'),
(21, 49, 21, 3, 100000, '0'),
(22, 49, 21, 3, 9, '0'),
(23, 49, 21, 3, 9, '0'),
(24, 49, 21, 3, 3, '0'),
(25, 49, 21, 3, 300000, '0'),
(26, 41, 14, 3, 12345678, '0'),
(27, 49, 21, 3, 500000000, '0'),
(28, 36, 20, 3, 120000000, '0'),
(29, 41, 14, 3, 50000, '0'),
(30, 41, 14, 3, 50000, '0'),
(31, 41, 14, 3, 50000, '0'),
(32, 16, 18, 3, 80000000, '0'),
(33, 16, 18, 3, 80000000, '0'),
(34, 16, 18, 3, 300000, '0'),
(35, 16, 18, 3, 300000, '0'),
(36, 16, 18, 3, 300000, '0');

-- --------------------------------------------------------

--
-- Table structure for table `lelang`
--

CREATE TABLE `lelang` (
  `id_lelang` int(11) NOT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `nama` varchar(198) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `harga_akhir` int(20) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_petugas` int(11) DEFAULT NULL,
  `status` enum('dibuka','ditutup') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lelang`
--

INSERT INTO `lelang` (`id_lelang`, `id_barang`, `nama`, `tanggal`, `harga_akhir`, `id_user`, `id_petugas`, `status`) VALUES
(16, 18, '', '2023-11-29', 300000, NULL, 1, 'dibuka'),
(36, 20, 'haechan', '2023-12-04', NULL, NULL, 4, ''),
(40, 22, 'xioajun', '2023-12-04', NULL, NULL, 1, 'ditutup'),
(41, 14, 'jaehyun', '2023-12-04', 0, NULL, 4, 'dibuka'),
(49, 21, 'hendery', '2023-12-09', NULL, NULL, 4, 'dibuka'),
(50, 14, 'jaehyun', '2023-12-10', NULL, NULL, 4, 'dibuka'),
(51, 20, 'haechan', '2023-12-10', NULL, NULL, 1, 'dibuka');

-- --------------------------------------------------------

--
-- Table structure for table `masyarakat`
--

CREATE TABLE `masyarakat` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(50) DEFAULT NULL,
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL,
  `telp` varchar(25) DEFAULT NULL,
  `level` varchar(12) NOT NULL DEFAULT 'masyarakat'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `masyarakat`
--

INSERT INTO `masyarakat` (`id_user`, `nama_lengkap`, `username`, `password`, `telp`, `level`) VALUES
(1, 'Syin Sheladiang ', 'ladiang', 'oipkp', '098765', 'masyarakat'),
(3, 'Syin Sheladiang ', 'ladiang', 'ouuu', '098765', 'masyarakat');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `level` enum('administrator','petugas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `username`, `password`, `level`) VALUES
(1, 'jeno', 'nono', 'ooo', 'administrator'),
(4, 'lucas', 'lulu', '1234', 'petugas'),
(10, 'ladiang', 'ladiang', '12345', 'petugas'),
(11, 'ladiang', 'ladiang', '123', 'administrator'),
(16, 'dimas', 'dimas', '12345', 'administrator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `history_lelang`
--
ALTER TABLE `history_lelang`
  ADD PRIMARY KEY (`id_history`),
  ADD KEY `id_lelang` (`id_lelang`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `lelang`
--
ALTER TABLE `lelang`
  ADD PRIMARY KEY (`id_lelang`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `fk_petugas` (`id_petugas`);

--
-- Indexes for table `masyarakat`
--
ALTER TABLE `masyarakat`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `history_lelang`
--
ALTER TABLE `history_lelang`
  MODIFY `id_history` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `lelang`
--
ALTER TABLE `lelang`
  MODIFY `id_lelang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `masyarakat`
--
ALTER TABLE `masyarakat`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `history_lelang`
--
ALTER TABLE `history_lelang`
  ADD CONSTRAINT `history_lelang_ibfk_1` FOREIGN KEY (`id_lelang`) REFERENCES `lelang` (`id_lelang`),
  ADD CONSTRAINT `history_lelang_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`),
  ADD CONSTRAINT `history_lelang_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `masyarakat` (`id_user`);

--
-- Constraints for table `lelang`
--
ALTER TABLE `lelang`
  ADD CONSTRAINT `fk_petugas` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`),
  ADD CONSTRAINT `lelang_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`),
  ADD CONSTRAINT `lelang_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `masyarakat` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
