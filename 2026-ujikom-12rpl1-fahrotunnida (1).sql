-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2026 at 10:38 AM
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
-- Database: `2026-ujikom-12rpl1-fahrotunnida`
--

-- --------------------------------------------------------

--
-- Table structure for table `input-aspirasi`
--

CREATE TABLE `input-aspirasi` (
  `id_pelaporan` int(11) NOT NULL,
  `nis` varchar(20) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `status` enum('menunggu','proses','selesai','') NOT NULL,
  `feedback` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `input-aspirasi`
--

INSERT INTO `input-aspirasi` (`id_pelaporan`, `nis`, `id_kategori`, `lokasi`, `keterangan`, `status`, `feedback`) VALUES
(1, '2233', 1, 'depan ruang guru', 'citra kesandung jalan berlubang', 'proses', '    oke kita tambal'),
(2, '124', 2, 'lapangan basket', 'becek aja', 'proses', 'nanti kita sedot'),
(3, '124', 1, 'depan ruang guru', 'hmm', 'selesai', '        hmm apa'),
(4, '124', 1, 'lapang voly', 'ada mbg', 'selesai', '        oke kita habiskan'),
(5, '124', 1, 'depan ruang guru', 'auk', 'menunggu', '');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `ket_kategori` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `ket_kategori`) VALUES
(1, 'lingkungan'),
(2, 'sarana lab');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` enum('admin','siswa','','') NOT NULL,
  `nis` varchar(20) NOT NULL,
  `kelas` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `role`, `nis`, `kelas`) VALUES
(1, 'nida', 'admin', '$2a$12$B4mXvGgX/WC3YLnPj5r4/u6bfGJ0XhZT4o6xocxPK.XsNBqq2VrtW', 'admin', '', ''),
(3, 'sharlis', '124', 'sharlis123', 'siswa', '124', '12 rpl 1'),
(2, 'citra', '2233', 'citra123', 'siswa', '2233', '12rpl1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `input-aspirasi`
--
ALTER TABLE `input-aspirasi`
  ADD PRIMARY KEY (`id_pelaporan`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `nis` (`nis`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`nis`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `input-aspirasi`
--
ALTER TABLE `input-aspirasi`
  MODIFY `id_pelaporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `input-aspirasi`
--
ALTER TABLE `input-aspirasi`
  ADD CONSTRAINT `input-aspirasi_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `user` (`nis`),
  ADD CONSTRAINT `input-aspirasi_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
