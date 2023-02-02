-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 02, 2023 at 02:57 AM
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
  `anggaran` int(16) NOT NULL,
  `terpakai` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bulanan`
--

INSERT INTO `bulanan` (`id`, `keterangan`, `anggaran`, `terpakai`) VALUES
(5, '*Jajan Dewi - Bulanan', 1250000, 1250000),
(6, '*WiFi - Bulanan', 372000, 371000),
(7, '*Air - Bulanan', 250000, 250000),
(8, 'Listrik - Bulanan', 400000, 369032),
(9, 'Gas - 4 Pcs', 88000, 20000),
(10, 'Beras - 25 Kg', 312500, 62500),
(11, 'Griya - Bulanan', 600000, 700000),
(12, 'Belanja Mingguan - 5 Minggu', 500000, 486300),
(13, 'Aqua Galon - 10 Pcs', 80000, 32000),
(14, 'Aqua Cup - 1 Pcs', 18000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(10) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` int(16) NOT NULL,
  `warna` char(5) COLLATE utf8_unicode_ci NOT NULL,
  `keterangan` longtext COLLATE utf8_unicode_ci NOT NULL,
  `tipe` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `tanggal`, `jumlah`, `warna`, `keterangan`, `tipe`) VALUES
(2, '2023-01-02', 79000, 'Biru', 'Uang jajan mamah', 'Keluar'),
(3, '2023-01-03', 10000, 'Biru', 'Beli cincau', 'Keluar'),
(4, '2023-01-03', 15000, 'Biru', 'Sol sepatu', 'Keluar'),
(5, '2023-01-03', 90000, 'Biru', 'Beli oleh - oleh', 'Keluar'),
(6, '2023-01-03', 100000, 'Biru', 'Bekal kaka ke cidaun', 'Keluar'),
(7, '2023-01-04', 10000, 'Biru', 'Beli kerupuk', 'Keluar'),
(8, '2023-01-06', 89300, 'Biru', '~Belanja Mingguan~', 'Catatan'),
(9, '2023-01-06', 120900, 'Biru', 'Bensin papah - 20rb\r\nMakan - 15rb\r\nRinso -\r\nIndomie -\r\nLada -', 'Keluar'),
(10, '2023-01-07', 369032, 'Hitam', '~Listrik - Bulanan~', 'Catatan'),
(11, '2023-01-08', 100000, 'Hitam', '-Gasibu-\r\nPisang - 10rb\r\nWortel - 5rb\r\nSalak - 10rb\r\nBrokoli - 5rb\r\nTerong - 5rb\r\nJeruk 1kg - 20rb\r\nKerupuk lagendar - 8rb\r\nPeuyeum ketan - 15rb\r\nNanas - 10rb\r\nAsin - 4rb\r\nBuntil - 10rb\r\nTutut - 10rb\r\nCendol - 10rb\r\nUlen bakar - 10rb\r\nParkir - 5rb', 'Keluar'),
(12, '2023-01-09', 32000, 'Hitam', '~Air Galon - 4 Pcs~', 'Catatan'),
(13, '2023-01-09', 20000, 'Hitam', '~Gas Melon - 1 Pcs~', 'Catatan'),
(14, '2023-01-09', 48000, 'Hitam', 'Tisu - 28rb\r\nPotong rambut pph - 15rb\r\nParkir - 5rb', 'Keluar'),
(15, '2023-01-10', 120000, 'Hitam', '~Belanja Mingguan~\r\nTimun 1kg - 13rb\r\nCabe kriting - 3rb\r\nTomat 1/2kg - 7rb\r\nSawi pth - 7rb\r\nB.Daun &amp; Seledri - 3rb\r\nCabe mrh tanjung - 5rb\r\nCengek - 3rb\r\nToge - 5rb\r\nKol - 8rb\r\nB.Merah 1/4kg - 8rb\r\nTongkol - 10rb\r\nTahu &amp; Tempe - 10rb\r\nAyam 1 ekor - 28rb\r\nMakanan Burung - 10rb', 'Catatan'),
(16, '2023-01-11', 50000, 'Hitam', 'Uang bekal kaka ke kampus', 'Keluar'),
(17, '2023-01-12', 50000, 'Hitam', 'Uang jajan kaka', 'Keluar'),
(18, '2023-01-14', 700000, 'Hitam', '~Griya - Bulanan~', 'Catatan'),
(19, '2023-01-15', 141000, 'Hitam', '~Belanja Mingguan~\r\nB. Merah, B. Putih, Dll - 50rb\r\nTongkol - 10rb\r\nKerupuk - 20rb\r\nKencur, Dll - 7rb\r\nTahu &amp; Tempe - 11rb\r\nToge - 4rb\r\nKelapa Parut - 2rb\r\nMakanan Ikan - 9rb\r\nAyam 1 Ekor - 28rb', 'Catatan'),
(20, '2023-01-15', 87000, 'Hitam', '-Pengeluaran Papah-\r\nUang Jajan Mamah - 25rb\r\nTepung Maizena - 20rb \r\nFitting Lampu & Klem - 35rb \r\nKerupuk Dorokdok - 7rb', 'Keluar'),
(21, '2023-01-15', 50000, 'Hitam', 'Ganti kaca helm kaka', 'Keluar'),
(22, '2023-01-15', 100000, 'Hitam', 'Bensin mobil', 'Keluar'),
(23, '2023-01-18', 15000, 'Hitam', 'Bensin papah', 'Keluar'),
(24, '2023-01-20', 16000, 'Hitam', 'Beli pisang', 'Keluar'),
(25, '2023-01-21', 10000, 'Hitam', 'Beli kerupuk', 'Keluar'),
(26, '2023-01-22', 62500, 'Hitam', '~Beras - 5 Kg~', 'Catatan'),
(27, '2023-01-22', 82000, 'Hitam', 'Kaka ambil buat bayar shopee dulu', 'Keluar'),
(28, '2023-01-22', 136000, 'Hitam', '~Belanja Mingguan~\r\nAyam - 28rb\r\nB.merah, dll - 70rb\r\nJamur - 5rb\r\nBrokoli - 5rb\r\nLaja - 2rb\r\nTahu & tempe - 11rb\r\nTongkol - 10rb\r\nToge & seledri - 5rb', 'Catatan'),
(29, '2023-01-23', 50000, 'Hitam', 'Dewi minjem uang', 'Keluar'),
(31, '2023-01-25', 15000, 'Biru', 'Beli pisang', 'Keluar'),
(32, '2023-01-25', 4000, 'Biru', 'Beli kelapa parut', 'Keluar'),
(33, '2023-01-25', 10000, 'Biru', 'Beli krupuk', 'Keluar'),
(34, '2023-01-25', 5000, 'Biru', 'Beli cabe domba', 'Keluar'),
(35, '2023-01-25', 8000, 'Biru', 'Kelaps muda', 'Keluar'),
(36, '2023-01-26', 16500, 'Biru', 'Beli roti tawar', 'Keluar'),
(37, '2023-01-26', 20000, 'Biru', 'Beli bensin dodrot', 'Keluar'),
(38, '2023-01-28', 10000, 'Biru', 'Beli tongkol', 'Keluar'),
(39, '2023-01-28', 60000, 'Biru', 'Beli beras 5 kg', 'Keluar'),
(40, '2023-01-28', 8000, 'Biru', 'Beli bawang putih 0,25 kg', 'Keluar'),
(41, '2023-01-29', 112000, 'Biru', '~Belanja Sayur~\r\nTelor 1kg 28rb - Tomat dll 40rb - Tongkol 10rb - Kerupuk 10rb - Tahu & Tempe 15rb - Kangkung 3rb - Garam 6rb', 'Keluar'),
(42, '2023-01-30', 40000, 'Biru', 'Beli air galon 5 gln', 'Keluar'),
(43, '2023-01-30', 15600, 'Biru', 'Beli indomei bawang 5 bks', 'Keluar'),
(44, '2023-01-31', 45200, 'Biru', 'Beli indomi bawang 5, goreng 5 dan susu kental', 'Keluar'),
(45, '2023-01-31', 78500, 'Biru', 'Beli es cream ', 'Keluar');

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
