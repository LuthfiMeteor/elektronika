-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2022 at 06:35 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pwpb_ujikom`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `id_anggota` int(11) NOT NULL,
  `nim` int(11) NOT NULL,
  `nama_anggota` varchar(50) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `jurusan` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_anggota`
--

INSERT INTO `tb_anggota` (`id_anggota`, `nim`, `nama_anggota`, `tempat_lahir`, `tgl_lahir`, `jk`, `jurusan`) VALUES
(7, 123, 'shfjhf', 'bandung', '2005-11-29', 'L', 'PPLG');

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `kode_brg` int(11) NOT NULL,
  `nama_brg` varchar(200) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `p_jawab` varchar(50) NOT NULL,
  `jumlah_brg` int(3) NOT NULL,
  `tgl_input` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`kode_brg`, `nama_brg`, `kategori`, `p_jawab`, `jumlah_brg`, `tgl_input`) VALUES
(15, 'timah', 'Solder', 'Pak ', 20, '2022-11-18'),
(17, 'sapu', 'Alat Kebersihan', 'Luthfi Novalino', 13, '2022-11-18'),
(18, 'Obeng', 'Alat Berat', 'Pak Subi', 20, '2022-11-18');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `kode_brg` int(11) NOT NULL,
  `nim_transaksi` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `tgl_pinjam` varchar(50) NOT NULL,
  `tgl_kembali` varchar(50) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `kode_brg`, `nim_transaksi`, `id_anggota`, `tgl_pinjam`, `tgl_kembali`, `status`) VALUES
(7, 4, 2, 2, '01-07-2020', '23-07-2020', 'kembali'),
(8, 6, 3, 3, '01-07-2020', '5-07-2020', 'kembali'),
(11, 4, 3, 3, '13-07-2020', '20-07-2020', 'kembali'),
(12, 9, 2, 2, '10-11-2022', '17-11-2022', 'kembali'),
(13, 4, 5, 5, '12-11-2022', '19-11-2022', 'pinjam'),
(14, 9, 6, 6, '15-11-2022', '22-11-2022', 'kembali'),
(15, 17, 7, 7, '18-11-2022', '25-11-2022', 'kembali'),
(16, 17, 7, 7, '18-11-2022', '25-11-2022', 'kembali'),
(17, 17, 7, 7, '18-11-2022', '25-11-2022', 'kembali'),
(18, 18, 7, 7, '18-11-2022', '25-11-2022', 'kembali'),
(19, 18, 7, 7, '18-11-2022', '25-11-2022', 'kembali'),
(20, 17, 7, 7, '18-11-2022', '25-11-2022', 'kembali');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `role` enum('user','admin') NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `role`, `username`, `password`, `name`) VALUES
(76, 'user', 'test', '202cb962ac59075b964b07152d234b70', 'testing'),
(77, 'user', 'daffa', '202cb962ac59075b964b07152d234b70', 'daffa'),
(78, 'admin', 'LuthfiMeteor', 'd47268e9db2e9aa3827bba3afb7ff94a', 'luthfi'),
(79, 'user', 'Sabrina', '202cb962ac59075b964b07152d234b70', 'Sabrina');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`kode_brg`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `kode_brg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
