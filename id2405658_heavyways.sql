-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 23, 2017 at 10:20 PM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id2405658_heavyways`
--

-- --------------------------------------------------------

--
-- Table structure for table `alat_db`
--

CREATE TABLE `alat_db` (
  `nama_alat` varchar(100) NOT NULL,
  `id` varchar(50) NOT NULL,
  `model` varchar(100) NOT NULL,
  `jumlah` int(50) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `owner` varchar(100) NOT NULL,
  `tarif` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alat_db`
--

INSERT INTO `alat_db` (`nama_alat`, `id`, `model`, `jumlah`, `photo`, `owner`, `tarif`) VALUES
('Buldozer', 'BD11', 'BD11-Z', 2, 'uploads/komatsu+BD11Stavebni?_ja?ma_S?pejchar,_buldozer_Komatsu.jpg', 'komatsu', '150000'),
('Stum', 'S212', 'STOM111', 5, 'uploads/komatsu+S212Roller-Compactor-Alat-Berat-Blog.jpg', 'komatsu', '400000');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `idalat` varchar(100) NOT NULL,
  `user` varchar(100) NOT NULL,
  `nama_alat` varchar(100) NOT NULL,
  `tanggal_pinjam` varchar(100) NOT NULL,
  `tanggal_kembali` varchar(100) NOT NULL,
  `total` int(100) NOT NULL,
  `pemilik` varchar(100) NOT NULL,
  `status` int(30) NOT NULL,
  `jam_awal` varchar(100) NOT NULL,
  `jam_akhir` varchar(100) NOT NULL,
  `jam` int(30) NOT NULL,
  `notified` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `idalat`, `user`, `nama_alat`, `tanggal_pinjam`, `tanggal_kembali`, `total`, `pemilik`, `status`, `jam_awal`, `jam_akhir`, `jam`, `notified`) VALUES
(3, 'S212', 'heavyways', 'Stum', '2017/09/26', '2017/09/30', 38800000, 'komatsu', 1, '06:00', '07:00', 1, 0),
(4, 'S212', 'heavyways', 'Stum', '2017/09/24', '2017/09/26', 19200000, 'komatsu', 1, '11:00', '11:00', 0, 0),
(5, 'S212', 'komatsu', 'Stum', '2017/09/12', '2017/09/15', 28800000, 'komatsu', 1, '11:00', '11:00', 0, 0),
(6, 'S2312', 'yudha', 'Beko CobelcoS', '2017/10/03', '2017/10/30', 324000000, 'heavyways', 1, '11:00', '11:00', 0, 0),
(7, 'S212', 'komatsu', 'Stum', '2017/11/21', '2017/11/30', 86400000, 'komatsu', 1, '11:00', '11:00', 0, 0),
(8, 'S212', 'yudhaprima', 'Stum', '2017/11/18', '2017/11/21', 28800000, 'komatsu', 1, '11:00', '11:00', 0, 0),
(9, 'S212', 'faisal', 'Stum', '2017/11/15', '2017/11/16', 9600000, 'komatsu', 1, '08:00', '08:00', 0, 0),
(10, 'BD11', 'faisal', 'Buldozer', '2017/11/17', '2017/11/18', 3600000, 'komatsu', 1, '07:00', '07:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `daftar`
--

CREATE TABLE `daftar` (
  `id` int(55) NOT NULL,
  `nama_perusahaan` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `grant_user` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `nomor` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftar`
--

INSERT INTO `daftar` (`id`, `nama_perusahaan`, `user`, `password`, `grant_user`, `photo`, `alamat`, `question`, `answer`, `nomor`, `email`) VALUES
(1, 'Heavy Ways', 'heavyways', 'b28c7dd6ab1403c2d847ff082d245643761828d0', 'Admin', 'uploads/adminprofil.jpg', 'Telkom University', '', '', '', ''),
(4, 'Komatsu', 'komatsu', '7eceb604abc58ac8fbf47275775bec82676aa768', 'vendor', 'uploads/profilkomatsu300_Gloria_blue_nega_r.jpg', 'Shinji Perfecture, Japan', '', '', '', ''),
(10, 'pelanggan', 'pelanggan2', 'a509e86887ae1ef38f71dae1ba5fb9ab807ab04e', 'user', '', 'Kp Ciwidi', '', '', '', ''),
(11, 'Yudha', 'yudha', 'a4de695484fec1aae832f3cfef95e99510c55f61', 'user', '', 'Kp Parunghalang', '', '', '', ''),
(12, 'Yudha 2', 'yudha2', '48c6d9b0327daa7b4fc2aa8a5f78759c75c33187', 'user', '', 'Kp Parunghalang', 'Siapakah Nama Teman Terbaik Anda ?', 'Ardi', '', ''),
(13, 'Komatsa', 'komatsa', 'e7b90dcb7b32055be8b20114aa8f879a5938c85b', 'vendor', 'uploads/profilkomatsanazi-wallpaper-13.jpg', 'Kp Parunghalang', 'Siapakah Nama Guru Terbaik Anda ?', 'yudi', '', ''),
(14, 'Yudha', 'yudhacom', '5006bd5fcc674b7d3fe355f3e77d571647678ff9', 'vendor', 'uploads/profilyudhacomsoldat-by-august-sander-1940-1363278515_org.jpg', 'Kp Parunghalang', 'Siapakah Nama Guru Terbaik Anda ?', 'Ryan', '', ''),
(15, 'Heavyways 2', 'heavyways2', '381f142dea1363bfeeb7df460a59ce5c79fd0a14', 'vendor', 'uploads/profilheavyways2nazi_symbol_clip_art_15070.jpg', 'Kp Parunghalang', 'Siapakah Nama Ibu Anda ?', 'heavyways', '', ''),
(16, 'Yudha Primadiansyah', 'yudhaprima', 'b28c7dd6ab1403c2d847ff082d245643761828d0', 'user', '', 'Kp Parunghalang RT 09 / RW 01', 'Siapakah Nama Guru Terbaik Anda ?', 'Roni Nur Roni', '+6283822504594', 'yudhaprimadiansyah@gmail.com'),
(17, 'faisal', 'faisal', 'a6addb9ffb18bd870b260590177a30e43a3d218d', 'user', '', 'bandung', 'Siapakah Nama Ibu Anda ?', 'faisal', '081214994570', 'muhfaisalton@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `leaseform`
--

CREATE TABLE `leaseform` (
  `nama_perusahaan` varchar(50) NOT NULL,
  `nama_alat` varchar(50) NOT NULL,
  `tanggal_pinjam` varchar(50) NOT NULL,
  `tanggal_kembali` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(55) NOT NULL,
  `jenis_mesin` varchar(255) NOT NULL,
  `operation_time` int(255) NOT NULL,
  `istirahat` int(255) NOT NULL,
  `total_waktu` int(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `owner_alat` varchar(255) NOT NULL,
  `customer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `nama_depan` varchar(100) NOT NULL,
  `nama_belakang` varchar(100) NOT NULL,
  `organization` varchar(100) NOT NULL,
  `job_position` varchar(100) NOT NULL,
  `job_title` varchar(100) NOT NULL,
  `company_work` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alat_db`
--
ALTER TABLE `alat_db`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daftar`
--
ALTER TABLE `daftar`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user` (`user`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `daftar`
--
ALTER TABLE `daftar`
  MODIFY `id` int(55) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
