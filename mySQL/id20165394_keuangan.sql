-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 22, 2023 at 01:59 PM
-- Server version: 10.5.16-MariaDB
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id20165394_keuangan`
--

-- --------------------------------------------------------

--
-- Table structure for table `bulanan`
--

CREATE TABLE `bulanan` (
  `id` int(10) NOT NULL,
  `keterangan` longtext NOT NULL,
  `jumlah` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bulanan`
--

INSERT INTO `bulanan` (`id`, `keterangan`, `jumlah`) VALUES
(5, '*Uang Jajan Dewi', 1250000),
(6, '*WiFi', 372000),
(7, '*Air', 250000),
(8, 'Listrik', 400000),
(9, 'Gas - 4 Pcs', 88000),
(10, 'Beras - 25 Kg', 312500),
(11, 'Griya - Bulanan', 600000),
(12, 'Belanja Mingguan - 5 Minggu', 500000),
(13, 'Aqua Galon - 10 Pcs', 80000),
(14, 'Aqua Cup - 1 Pcs', 18000);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` longtext COLLATE utf8_unicode_ci NOT NULL,
  `tipe` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `tanggal`, `jumlah`, `keterangan`, `tipe`) VALUES
(1, '2023-01-07', 2214800, 'Uang Bulanan', 'Masuk'),
(2, '2023-01-07', 369032, 'Bayar Listrik', 'Keluar'),
(3, '2023-01-08', 100000, '~Gasibu~\r\nPisang - 10rb\r\nWortel - 5rb\r\nSalak - 10rb\r\nBrokoli - 5rb\r\nTerong - 5rb\r\nJeruk 1kg - 20rb\r\nKerupuk lagendar - 8rb\r\nPeuyeum ketan - 15rb\r\nNanas - 10rb\r\nAsin - 4rb\r\nBuntil - 10rb\r\nTutut - 10rb\r\nCendol - 10rb\r\nUlen bakar - 10rb\r\nParkir - 5rb', 'Keluar'),
(4, '2023-01-09', 100000, '~Belanja~\r\nAir galon 4 - 32rb\r\nGas melon - 20rb\r\nTisu - 28rb\r\nPotong rambut pph - 15rb\r\nParkir - 5rb', 'Keluar'),
(5, '2023-01-10', 120000, '~Belanja~\r\nTimun 1kg - 13rb\r\nCabe kriting - 3rb\r\nTomat 1/2kg - 7rb\r\nSawi pth - 7rb\r\nB.Daun & Seledri - 3rb\r\nCabe mrh tanjung - 5rb\r\nCengek - 3rb\r\nToge - 5rb\r\nKol - 8rb\r\nB.Merah 1/4kg - 8rb\r\nTongkol - 10rb\r\nTahu & Tempe - 10rb\r\nAyam 1 ekor - 28rb\r\nMakanan Burung - 10rb', 'Keluar'),
(6, '2023-01-11', 50000, 'Uang Bekal Kaka Ke Kampus', 'Keluar'),
(7, '2023-01-12', 50000, 'Uang Jajan Kaka Ke Kampus', 'Keluar'),
(8, '2023-01-14', 700000, '~Belanja Ke Yogya~', 'Keluar'),
(9, '2023-01-15', 141000, '~Belanja Sayur~\r\nB. Merah, B. Putih, Dll - 50rb\r\nTongkol - 10rb\r\nKerupuk - 20rb\r\nKencur, Dll - 7rb\r\nTahu & Tempe - 11rb\r\nToge - 4rb\r\nKelapa Parut - 2rb\r\nMakanan Ikan - 9rb\r\nAyam 1 Ekor - 28rb', 'Keluar'),
(10, '2023-01-15', 87000, '~Pengeluaran Papah~\r\nUang Jajan Mamah - 25rb\r\nTepung Maizena - 20rb \r\nFitting Lampu & Klem - 35rb \r\nKerupuk Dorokdok - 7rb', 'Keluar'),
(11, '2023-01-15', 50000, 'Ganti Kaca Helm Kaka', 'Keluar'),
(12, '2023-01-15', 100000, 'Bensin Mobil', 'Keluar'),
(13, '2023-01-18', 15000, 'Bensin Papah', 'Keluar'),
(15, '2023-01-20', 16000, 'Beli pisang', 'Keluar'),
(16, '2023-01-21', 10000, 'Beli krupuk', 'Keluar'),
(19, '2023-01-22', 62500, 'Beli beras 5 kg', 'Keluar'),
(20, '2023-01-22', 82000, 'Kaka ambil buat bayar shopee dulu', 'Keluar'),
(21, '2023-01-22', 136000, '~Belanja Sayur~\r\nAyam - 28rb\r\nB.merah, dll - 70rb\r\nJamur - 5rb\r\nBrokoli - 5rb\r\nLaja - 2rb\r\nTahu & tempe - 11rb\r\nTongkol - 10rb\r\nToge & seledri - 5rb', 'Catatan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bulanan`
--
ALTER TABLE `bulanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bulanan`
--
ALTER TABLE `bulanan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
