-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2018 at 11:16 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `malasngoding_kios`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `pass` varchar(70) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `uname`, `pass`, `foto`) VALUES
(9, 'admin', '069c546d1d97fd9648d8142b3e0fd3a3', '1.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `nama` text NOT NULL,
  `jenis` text NOT NULL,
  `suplier` text NOT NULL,
  `modal` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `sisa` int(11) NOT NULL,
  `rop` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `nama`, `jenis`, `suplier`, `modal`, `harga`, `jumlah`, `sisa`, `rop`) VALUES
(14, 'almond kecil', 'makanan', 'produksi sendiri', 30000, 35000, 100, 500, 0),
(15, 'almond besar', 'makanan', 'produksi sendiri', 65000, 68000, 1, 500, 0),
(16, 'keju besar', 'makanan', 'produksi sendiri', 53000, 58000, 500, 500, 0),
(17, 'keju kecil', 'makanan', 'produksi sendiri', 25000, 30000, 500, 500, 0),
(18, 'kismis besar', 'makanan', 'produksi sendiri', 35000, 40000, 500, 500, 0),
(19, 'kismis kecil', 'makanan', 'produksi sendiri', 25000, 30000, 500, 500, 0),
(20, 'kukus coklat', 'makanan', 'produksi sendiri', 25000, 30000, 500, 500, 0),
(21, 'kukus jeruk', 'makanan', 'produksi sendiri', 25000, 30000, 500, 500, 0),
(22, 'kukus keju', 'makanan', 'produksi sendiri', 25000, 30000, 500, 500, 0),
(23, 'kukus pandan', 'makanan', 'produksi sendiri', 25000, 30000, 1, 500, 0),
(24, 'marmer besar', 'makanan', 'produksi sendiri', 53000, 58000, 500, 500, 0),
(25, 'marmer kecil', 'makanan', 'produksi sendiri', 25000, 30000, 500, 500, 0),
(26, 'mises kecil', 'makanan', 'produksi sendiri', 25000, 30000, 500, 500, 0),
(27, 'strowberry kecil', 'makanan', 'produksi sendiri', 25000, 30000, 500, 500, 0);

-- --------------------------------------------------------

--
-- Table structure for table `barang_laku`
--

CREATE TABLE `barang_laku` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nama` text NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `total_harga` int(20) NOT NULL,
  `laba` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_laku`
--

INSERT INTO `barang_laku` (`id`, `tanggal`, `nama`, `jumlah`, `harga`, `total_harga`, `laba`) VALUES
(1, '2018-05-21', 'almond kecil', 1, 65000, 65000, 35000),
(2, '2018-05-20', 'almond kecil', 1, 65000, 65000, 35000),
(3, '2018-05-19', 'almond kecil', 5, 65000, 325000, 175000),
(4, '2018-05-18', 'almond kecil', 3, 65000, 195000, 105000),
(5, '2018-05-17', 'almond kecil', 3, 65000, 195000, 105000),
(6, '2018-05-16', 'almond kecil', 7, 65000, 455000, 245000),
(7, '2018-05-15', 'almond kecil', 5, 65000, 325000, 175000),
(8, '2018-05-14', 'almond kecil', 4, 65000, 260000, 140000);

-- --------------------------------------------------------

--
-- Table structure for table `forecast`
--

CREATE TABLE `forecast` (
  `id` int(50) NOT NULL,
  `bulan` varchar(50) NOT NULL,
  `minggu` int(50) NOT NULL,
  `demand` int(50) NOT NULL,
  `forecast` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forecast`
--

INSERT INTO `forecast` (`id`, `bulan`, `minggu`, `demand`, `forecast`) VALUES
(1, 'januari', 1, 10, 0),
(2, 'januari', 2, 13, 0),
(3, 'januari', 3, 8, 12),
(4, 'januari', 4, 7, 12),
(5, 'februari', 1, 6, 5),
(6, 'februari', 2, 5, 5),
(7, 'februari', 3, 6, 5),
(8, 'februari', 4, 5, 5),
(9, 'maret', 1, 7, 5),
(10, 'maret', 2, 8, 5),
(11, 'maret', 3, 7, 5),
(12, 'maret', 4, 8, 5);

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `keperluan` text NOT NULL,
  `nama` text NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengeluaran`
--

INSERT INTO `pengeluaran` (`id`, `tanggal`, `keperluan`, `nama`, `jumlah`) VALUES
(1, '2015-02-06', 'de', 'diki', 1234);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barang_laku`
--
ALTER TABLE `barang_laku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forecast`
--
ALTER TABLE `forecast`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `barang_laku`
--
ALTER TABLE `barang_laku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `forecast`
--
ALTER TABLE `forecast`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
