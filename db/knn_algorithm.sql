-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2024 at 04:20 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `knn_algorithm`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_akun`
--

CREATE TABLE `tbl_akun` (
  `kode_akun` char(20) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_akun`
--

INSERT INTO `tbl_akun` (`kode_akun`, `nama_lengkap`, `username`, `password`, `level`) VALUES
('A01', 'Administrator', 'Admin', '12345', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_alternatif`
--

CREATE TABLE `tbl_alternatif` (
  `kode_alternatif` char(20) NOT NULL,
  `nama_alternatif` varchar(50) NOT NULL,
  `keputusan` varchar(30) NOT NULL,
  `distance` double NOT NULL,
  `rangking` int(11) NOT NULL,
  `pilihan` varchar(20) NOT NULL,
  `nik_alternatif` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_alternatif`
--

INSERT INTO `tbl_alternatif` (`kode_alternatif`, `nama_alternatif`, `keputusan`, `distance`, `rangking`, `pilihan`, `nik_alternatif`) VALUES
('A01', 'Alternatif A', 'LAYAK', 0, 1, 'Ya', '009885647'),
('A02', 'Alternatif B', 'LAYAK', 3.3166247903554, 4, 'Tidak', '567899000'),
('A03', 'Alternatif C', 'TIDAK LAYAK', 4.3588989435407, 5, 'Tidak', '345567233'),
('A04', 'Alternatif D', 'LAYAK', 4.4721359549996, 6, 'Tidak', '788055431'),
('A05', 'Alternatif E', 'TIDAK LAYAK', 5.0990195135928, 8, 'Tidak', '123456789'),
('A06', 'Alternatif F', 'TIDAK LAYAK', 4.7958315233127, 7, 'Tidak', '12345678765'),
('A07', 'Alternatif G', 'LAYAK', 0, 2, 'Ya', '5432678900'),
('A08', 'annisa', 'LAYAK', 2, 3, 'Ya', '12345677888');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hasil`
--

CREATE TABLE `tbl_hasil` (
  `kode_hasil` int(11) NOT NULL,
  `nama_alternatif` varchar(50) NOT NULL,
  `keputusan` varchar(30) NOT NULL,
  `nik_alternatif` char(30) NOT NULL,
  `penghasilan` double NOT NULL,
  `usia` double NOT NULL,
  `status_perkawinan` double NOT NULL,
  `jml_tanggungan` double NOT NULL,
  `pekerjaan` double NOT NULL,
  `kriteria_blt` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_hasil`
--

INSERT INTO `tbl_hasil` (`kode_hasil`, `nama_alternatif`, `keputusan`, `nik_alternatif`, `penghasilan`, `usia`, `status_perkawinan`, `jml_tanggungan`, `pekerjaan`, `kriteria_blt`) VALUES
(2, 'Fulan', 'LAYAK', '', 0, 0, 0, 0, 0, 0),
(3, 'Aan', 'LAYAK', '', 0, 0, 0, 0, 0, 0),
(4, 'B', 'TIDAK LAYAK', '', 0, 0, 0, 0, 0, 0),
(5, 'Dyah', 'TIDAK LAYAK', '', 0, 0, 0, 0, 0, 0),
(6, 'z', 'LAYAK', '', 0, 0, 0, 0, 0, 0),
(7, 'lala', 'TIDAK LAYAK', '', 0, 0, 0, 0, 0, 0),
(8, 'azam', 'LAYAK', '', 0, 0, 0, 0, 0, 0),
(9, 'alina', 'TIDAK LAYAK', '10987609', 0, 0, 0, 0, 0, 0),
(10, 'nisa', 'LAYAK', '5432678900', 0, 0, 0, 0, 0, 0),
(11, 'asdsad', 'TIDAK LAYAK', '5432678900', 3, 2, 2, 2, 1, 0),
(12, 'vgvgvg', 'TIDAK LAYAK', '10987609', 4, 3, 1, 2, 3, 1),
(13, 'vv', 'TIDAK LAYAK', '5432678900', 3, 2, 1, 2, 2, 1),
(14, 'Zaza', 'LAYAK', '10987609', 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kriteria`
--

CREATE TABLE `tbl_kriteria` (
  `kode_kriteria` char(20) NOT NULL,
  `nama_kriteria` varchar(50) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kriteria`
--

INSERT INTO `tbl_kriteria` (`kode_kriteria`, `nama_kriteria`, `keterangan`) VALUES
('K01', 'Penghasilan', 'Kriteria ini diambil berdasarkan penghasil warga'),
('K02', 'Usia', 'Kriteria ini diambil berdasarkan usia'),
('K03', 'Status Perkawinan', 'Kriteria ini diambil berdasarkan status perkawinan'),
('K04', 'Jumlah Tanggungan', 'Kriteria ini diambil berdasarkan jumlah tanggungan kepala keluarga'),
('K05', 'Pekerjaan', 'Kriteria ini diambil berdasarkan pekerjaan '),
('K06', 'Kriteria BLT', 'Kriteria ini diambil berdasarkan kriteria penerima BLT yang sudah ditetapkan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subkriteria`
--

CREATE TABLE `tbl_subkriteria` (
  `kode_subkriteria` char(20) NOT NULL,
  `nama_subkriteria` varchar(100) NOT NULL,
  `kode_kriteria` char(20) NOT NULL,
  `nilai_subkriteria` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_subkriteria`
--

INSERT INTO `tbl_subkriteria` (`kode_subkriteria`, `nama_subkriteria`, `kode_kriteria`, `nilai_subkriteria`) VALUES
('S01', '< 500.000', 'K01', 0),
('S02', '500.000 - 1.000.000', 'K01', 1),
('S03', '1.000.001 - 3.000.000', 'K01', 2),
('S04', '3.000.001 - 5.000.000', 'K01', 3),
('S05', '> 5.000.000', 'K01', 4),
('S06', '> 71 tahun', 'K02', 0),
('S07', '51 - 70 tahun', 'K02', 1),
('S08', '31 - 50 tahun', 'K02', 2),
('S09', '18 - 30 tahun', 'K02', 3),
('S10', 'Janda/Duda', 'K03', 0),
('S11', 'Menikah', 'K03', 1),
('S12', 'Belum Menikah', 'K03', 2),
('S13', '> 6', 'K04', 0),
('S14', '5 - 6 ', 'K04', 1),
('S15', '3 - 4', 'K04', 2),
('S16', '1 - 2', 'K04', 3),
('S17', 'Petani', 'K05', 0),
('S18', 'Buruh', 'K05', 1),
('S19', 'Wirausaha', 'K05', 2),
('S20', 'PNS', 'K05', 3),
('S21', 'Masuk DTKS belum dapat JPS ', 'K06', 0),
('S22', 'Belum terdata DTKS', 'K06', 1),
('S23', 'Kehilangan mata pencaharian', 'K06', 2),
('S24', 'Punya penyakit kronis/menahun', 'K06', 3),
('S25', 'Keluarga Miskin/tidak mampu yang berdomisili di desa tidak punya NIK/KK', 'K06', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_testing`
--

CREATE TABLE `tbl_testing` (
  `kode_testing` int(11) NOT NULL,
  `kode_alternatif` char(20) NOT NULL,
  `nama_alternatif` varchar(20) NOT NULL,
  `kode_kriteria` char(20) NOT NULL,
  `nilai_testing` double NOT NULL,
  `nik_alternatif` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_testing`
--

INSERT INTO `tbl_testing` (`kode_testing`, `kode_alternatif`, `nama_alternatif`, `kode_kriteria`, `nilai_testing`, `nik_alternatif`) VALUES
(349, 'A01', 'Zaza', 'K01', 0, '10987609'),
(350, 'A01', 'Zaza', 'K02', 0, '10987609'),
(351, 'A01', 'Zaza', 'K03', 0, '10987609'),
(352, 'A01', 'Zaza', 'K04', 0, '10987609'),
(353, 'A01', 'Zaza', 'K05', 0, '10987609'),
(354, 'A01', 'Zaza', 'K06', 0, '10987609');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_training`
--

CREATE TABLE `tbl_training` (
  `kode_training` int(11) NOT NULL,
  `kode_alternatif` char(20) NOT NULL,
  `kode_kriteria` char(20) NOT NULL,
  `kode_subkriteria` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_training`
--

INSERT INTO `tbl_training` (`kode_training`, `kode_alternatif`, `kode_kriteria`, `kode_subkriteria`) VALUES
(121, 'A01', 'K01', 'S01'),
(122, 'A01', 'K02', 'S06'),
(123, 'A01', 'K03', 'S10'),
(124, 'A01', 'K04', 'S13'),
(125, 'A01', 'K05', 'S17'),
(126, 'A01', 'K06', 'S21'),
(127, 'A02', 'K01', 'S03'),
(128, 'A02', 'K02', 'S08'),
(129, 'A02', 'K03', 'S11'),
(130, 'A02', 'K04', 'S14'),
(131, 'A02', 'K05', 'S18'),
(132, 'A02', 'K06', 'S21'),
(133, 'A03', 'K01', 'S04'),
(134, 'A03', 'K02', 'S08'),
(135, 'A03', 'K03', 'S11'),
(136, 'A03', 'K04', 'S15'),
(137, 'A03', 'K05', 'S18'),
(138, 'A03', 'K06', 'S21'),
(139, 'A04', 'K01', 'S02'),
(140, 'A04', 'K02', 'S07'),
(141, 'A04', 'K03', 'S10'),
(142, 'A04', 'K04', 'S16'),
(143, 'A04', 'K05', 'S17'),
(144, 'A04', 'K06', 'S24'),
(145, 'A05', 'K01', 'S05'),
(146, 'A05', 'K02', 'S08'),
(147, 'A05', 'K03', 'S11'),
(148, 'A05', 'K04', 'S15'),
(149, 'A05', 'K05', 'S18'),
(150, 'A05', 'K06', 'S21'),
(151, 'A06', 'K01', 'S03'),
(152, 'A06', 'K02', 'S08'),
(153, 'A06', 'K03', 'S11'),
(154, 'A06', 'K04', 'S14'),
(155, 'A06', 'K05', 'S19'),
(156, 'A06', 'K06', 'S24'),
(157, 'A07', 'K01', 'S01'),
(158, 'A07', 'K02', 'S06'),
(159, 'A07', 'K03', 'S10'),
(160, 'A07', 'K04', 'S13'),
(161, 'A07', 'K05', 'S17'),
(162, 'A07', 'K06', 'S21'),
(169, 'A08', 'K01', 'S01'),
(170, 'A08', 'K02', 'S06'),
(171, 'A08', 'K03', 'S12'),
(172, 'A08', 'K04', 'S13'),
(173, 'A08', 'K05', 'S17'),
(174, 'A08', 'K06', 'S21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_akun`
--
ALTER TABLE `tbl_akun`
  ADD PRIMARY KEY (`kode_akun`);

--
-- Indexes for table `tbl_alternatif`
--
ALTER TABLE `tbl_alternatif`
  ADD PRIMARY KEY (`kode_alternatif`);

--
-- Indexes for table `tbl_hasil`
--
ALTER TABLE `tbl_hasil`
  ADD PRIMARY KEY (`kode_hasil`);

--
-- Indexes for table `tbl_kriteria`
--
ALTER TABLE `tbl_kriteria`
  ADD PRIMARY KEY (`kode_kriteria`);

--
-- Indexes for table `tbl_subkriteria`
--
ALTER TABLE `tbl_subkriteria`
  ADD PRIMARY KEY (`kode_subkriteria`);

--
-- Indexes for table `tbl_testing`
--
ALTER TABLE `tbl_testing`
  ADD PRIMARY KEY (`kode_testing`);

--
-- Indexes for table `tbl_training`
--
ALTER TABLE `tbl_training`
  ADD PRIMARY KEY (`kode_training`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_hasil`
--
ALTER TABLE `tbl_hasil`
  MODIFY `kode_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_testing`
--
ALTER TABLE `tbl_testing`
  MODIFY `kode_testing` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=355;

--
-- AUTO_INCREMENT for table `tbl_training`
--
ALTER TABLE `tbl_training`
  MODIFY `kode_training` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
