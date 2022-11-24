-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2022 at 12:25 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cake`
--

-- --------------------------------------------------------

--
-- Table structure for table `kue`
--

CREATE TABLE `kue` (
  `id_k` int(11) NOT NULL,
  `nama_kue` varchar(100) NOT NULL,
  `harga_kue` int(11) NOT NULL,
  `info_kue` varchar(100) NOT NULL,
  `foto_kue` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kue`
--

INSERT INTO `kue` (`id_k`, `nama_kue`, `harga_kue`, `info_kue`, `foto_kue`) VALUES
(3, 'Kue Kemiting', 10000, 'Kue Kemiting adalah kue yang berbentuk seperti \"kemiri\".', 'kemiting.jpg.jpg'),
(4, 'Bingka Kentang', 15000, 'Bingka Kentang memiliki cita rasa yang manis, legit dan lembut.', 'bingka_kentang.jpg.jpg'),
(5, 'Gula Gait', 10000, 'Gula Gait terbuat dari gula aren dan gula putih semacam karamel yang dibentuk seperti kayu.', 'gula_gait.jpg.jpg'),
(6, 'Kue Ilat Sapi', 7000, 'Kue Ilat Sapi merupakan roti yang terbuat dari tepung, gula merah dan telur.', 'ilat_sapi.jpg.jpg'),
(7, 'Lempok Durian', 20000, 'Lempuk Durian adalah sejenis dodol durian.', 'Lempok_durian.jpg.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `minuman`
--

CREATE TABLE `minuman` (
  `id_m` int(11) NOT NULL,
  `nama_minum` varchar(100) NOT NULL,
  `harga_minum` int(11) NOT NULL,
  `info_minum` varchar(100) NOT NULL,
  `foto_minum` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `minuman`
--

INSERT INTO `minuman` (`id_m`, `nama_minum`, `harga_minum`, `info_minum`, `foto_minum`) VALUES
(1, 'Es Cendol', 8000, 'Es Cendol merupakan minuman manis dengan isian \"cendol\" yang terbuat dari tepung beras hijau dan dis', 'cendoll.jpg.jpg'),
(2, 'Es Cincau', 5000, 'Es Cincau adalah minuman dengan isian jelly cincau yang biasanya disajikan dengan susu, sirup gula a', 'cincau.jpg.jpg'),
(3, 'Es Jeruk', 5000, 'Es Jeruk adalah minuman yang terbuat dari perasan buah jeruk. dan kaya akan Vitamin C. ', 'es_jerukk.jpg.jpg'),
(4, 'Es Tebu', 10000, 'Es tebu adalah minuman jus yang diekstrak dari tebu yang diperas.', 'es_tebuu.jpg.jpg'),
(5, 'Es Jagung', 8000, 'Es Jagung merupakan terbuat dari sari jagung.', 'jagung.jpg.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `regis`
--

CREATE TABLE `regis` (
  `id_r` int(11) NOT NULL,
  `email_r` varchar(100) NOT NULL,
  `username_r` varchar(100) NOT NULL,
  `psw_r` varchar(100) NOT NULL,
  `konfirmasi_r` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `regis`
--

INSERT INTO `regis` (`id_r`, `email_r`, `username_r`, `psw_r`, `konfirmasi_r`) VALUES
(7, 'asd@gmail.com', 'asd', '99c5e07b4d5de9d18c350cdf64c5aa3d', '567'),
(8, 'kristina@gmail.com', 'kris', 'e10adc3949ba59abbe56e057f20f883e', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_t` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `telepon` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `nama_kue` varchar(100) NOT NULL,
  `jumlah_kue` int(11) NOT NULL,
  `harga_kue` int(11) NOT NULL,
  `nama_minum` varchar(100) NOT NULL,
  `jumlah_minum` int(11) NOT NULL,
  `harga_minum` int(11) NOT NULL,
  `metode_transaksi` varchar(100) NOT NULL,
  `tanggal_beli` varchar(100) NOT NULL,
  `total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_t`, `nama`, `telepon`, `alamat`, `nama_kue`, `jumlah_kue`, `harga_kue`, `nama_minum`, `jumlah_minum`, `harga_minum`, `metode_transaksi`, `tanggal_beli`, `total_harga`) VALUES
(18, 'Rizky Fitriani', '089876532', 'Jl. Pramuka', 'Bingka Kentang', 5, 75000, 'Es Jeruk', 1, 5000, 'OVO', '2022-11-15', 80000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kue`
--
ALTER TABLE `kue`
  ADD PRIMARY KEY (`id_k`);

--
-- Indexes for table `minuman`
--
ALTER TABLE `minuman`
  ADD PRIMARY KEY (`id_m`);

--
-- Indexes for table `regis`
--
ALTER TABLE `regis`
  ADD PRIMARY KEY (`id_r`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_t`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kue`
--
ALTER TABLE `kue`
  MODIFY `id_k` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `minuman`
--
ALTER TABLE `minuman`
  MODIFY `id_m` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `regis`
--
ALTER TABLE `regis`
  MODIFY `id_r` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_t` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
