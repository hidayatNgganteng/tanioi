-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 26, 2017 at 05:12 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `taniol`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama`, `username`, `password`) VALUES
(1, 'Aditya Mahavira', 'adot', 'adot');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenkel` varchar(100) NOT NULL,
  `telepon` varchar(14) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `provinsi` varchar(100) NOT NULL,
  `negara` varchar(100) NOT NULL,
  `kodepos` int(10) NOT NULL,
  `alamat` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `nama`, `jenkel`, `telepon`, `email`, `username`, `password`, `foto`, `kota`, `provinsi`, `negara`, `kodepos`, `alamat`) VALUES
(1, 'Aditya Mahavira', 'Laki-Laki', '081234567890', 'adot@adot.com', 'adot', 'adot', '', 'Wonosobo', 'Kuvukiland', 'Kwazawaza', 12345, 'Rumah Adot'),
(16, 'Aditya Steven', 'Laki-Laki', '0888888888888', 'steven@steven.com', 'steven', 'steven', 'momo-twice-hd-wallpaper-833.jpg', 'Wonosobo', 'Jawa Tengah', 'Indonesia', 12345, 'Rumah Gue'),
(19, 'ada', 'Perempuan', '123', 'ada@gmail.com', 'ada2', '56d43845311fa224342668fc2c72fd97', 'sss.png', 'ada', 'ada', 'ada', 123, 'ada');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(5) NOT NULL,
  `kategori` varchar(30) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `berat` varchar(10) NOT NULL,
  `harga` int(30) NOT NULL,
  `stok` int(5) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `deskripsi` varchar(65000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `kategori`, `nama`, `berat`, `harga`, `stok`, `foto`, `deskripsi`) VALUES
(10, 'Bibit', 'Bibit Cabe Unggul', '0.3', 10000, 18, 'benih-cabe-rawit-santika-f1-350-biji.jpg', 'sadsadsa'),
(13, 'Pupuk', 'Pupuk Kandang', '1', 20000, 10, '2510056_efcd8b73-8446-4ff2-9864-ebc4041717d8.jpg', 'Pupuk untuk Menyuburkan tanaman coy'),
(14, 'Pestisida', 'Pestisida Super', '1', 20000, 11, 'pestona.png', 'Pestisida ampuh untuk membasmi serangga'),
(19, 'Alat Pertanian', 'Traktor', '300', 15000000, 28, 'trac.png', 'Traktor ajaib'),
(20, 'Alat Pertanian', 'Cangkul', '2', 12000, 12, '19392899_b25cb634-c905-434b-bb0a-942d098bd984.jpg', 'sdadsa'),
(21, 'Bibit', 'bibit cabe', '1', 20000, 12, 'bibit cabai.jpg', 'sadadsasa'),
(25, 'Alat Pertanian', 'Cangkul', '4', 70000, 15, 'Cangkul.jpg', 'Ini cangkul mahal'),
(26, 'Pupuk', 'Pupuk Manja', '4', 7000000, 49, '1203-thickbox_default.jpg', 'Ini pupuk mimi peri manjah, perawan kayangan'),
(27, 'Pupuk', 'pupuk urea', '1', 20000, 12, '1203-thickbox_default.jpg', 'sadasdsa');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(10) NOT NULL,
  `id_pembeli` int(10) NOT NULL,
  `nama_pembeli` varchar(100) NOT NULL,
  `telepon` varchar(14) NOT NULL,
  `alamat` varchar(1000) NOT NULL,
  `tgl_beli` varchar(20) NOT NULL,
  `tgl_sampai` varchar(100) NOT NULL,
  `metode` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `id_produk` int(10) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga` int(40) NOT NULL,
  `jumlah` int(40) NOT NULL,
  `total` int(40) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_pembeli`, `nama_pembeli`, `telepon`, `alamat`, `tgl_beli`, `tgl_sampai`, `metode`, `email`, `id_produk`, `nama_produk`, `harga`, `jumlah`, `total`, `status`) VALUES
(134, 19, 'ada', '123', 'ada', '26-12-2017', '', 'BRI', 'ada@gmail.com', 19, 'Traktor', 15000000, 1, 15000000, 'Menunggu Konfirmasi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
