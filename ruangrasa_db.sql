-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2026 at 10:23 AM
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
-- Database: `ruangrasa_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_pesanan`
--

CREATE TABLE `detail_pesanan` (
  `id_detail` int(11) NOT NULL,
  `id_pesanan` int(11) DEFAULT NULL,
  `id_menu` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_pesanan`
--

INSERT INTO `detail_pesanan` (`id_detail`, `id_pesanan`, `id_menu`, `qty`, `subtotal`) VALUES
(1, 1, 1, 1, 18000),
(2, 2, 3, 1, 23000),
(3, 3, 1, 2, 36000),
(4, 3, 6, 1, 18000),
(5, 4, 2, 1, 25000),
(6, 5, 1, 2, 36000),
(7, 5, 8, 1, 12000),
(8, 6, 5, 1, 55000),
(9, 6, 4, 1, 28000),
(10, 6, 7, 1, 15000),
(11, 6, 1, 1, 18000),
(12, 7, 3, 1, 23000),
(13, 8, 3, 3, 69000);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(100) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `harga` int(11) NOT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `nama_menu`, `kategori`, `deskripsi`, `harga`, `foto`) VALUES
(1, 'Jus Move On', 'Minuman', 'Minuman segar untuk memulai lembaran baru', 18000, 'jus.jpeg'),
(2, 'Latte Mantan Terindah', 'Minuman', 'Latte creamy dengan rasa yang sulit dilupakan', 25000, 'Latte.jpeg\r\n'),
(3, 'Chocolate First Love', 'Minuman', 'Cokelat manis seperti cinta pertama', 23000, 'Coklat.jpeg'),
(4, 'Nasi Goreng Gagal Move On', 'Makanan', 'Porsi besar untuk menemani malam galau', 28000, 'Nasi goreng.jpeg\r\n'),
(5, 'Paket Balikan', 'Makanan', 'Menu lengkap untuk dinikmati berdua', 55000, 'Paket balikan.jpeg\r\n'),
(6, 'Pisang Nugget Chat Terakhir', 'Cemilan', 'Manis dan sulit dilupakan', 18000, 'Pisang nugget.jpeg\r\n'),
(7, 'Kentang Friendzone', 'Cemilan', 'Selalu ada tapi jarang dipilih', 15000, 'Kentang goreng.jpeg\r\n'),
(8, 'Cireng PHP', 'Cemilan', 'Tampak biasa, ternyata bikin ketagihan', 12000, 'Cireng.jpeg'),
(9, 'Es Krim Luka Lama', 'Dessert', 'Dingin tapi masih terasa', 17000, 'Es krim.jpeg'),
(10, 'Pudding Akhir Cerita', 'Dessert', 'Lembut dan menenangkan', 15000, 'Puding.jpeg\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `nama_pelanggan` varchar(100) DEFAULT NULL,
  `nomor_meja` varchar(20) DEFAULT NULL,
  `tanggal` datetime DEFAULT current_timestamp(),
  `total` int(11) DEFAULT NULL,
  `status` enum('Menunggu','Diproses','Selesai') DEFAULT 'Menunggu'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `nama_pelanggan`, `nomor_meja`, `tanggal`, `total`, `status`) VALUES
(1, 'Syakila', '1', '2026-06-11 19:43:26', 18000, 'Selesai'),
(2, 'Naufal', '23', '2026-06-16 21:27:32', 23000, 'Selesai'),
(3, 'Widi', '2', '2026-06-26 07:16:54', 54000, 'Selesai'),
(4, 'Maul', '5', '2026-06-26 07:51:39', 25000, 'Selesai'),
(5, 'Mentari', '7', '2026-06-26 10:13:16', 48000, 'Menunggu'),
(6, 'Elsamy', '10', '2026-07-03 08:41:56', 116000, 'Menunggu'),
(7, 'Marta', '7', '2026-07-03 08:44:14', 23000, 'Diproses'),
(8, 'Mentari', '20', '2026-07-03 14:51:37', 69000, 'Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', '123'),
(2, 'admin', 'admin123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_pesanan` (`id_pesanan`),
  ADD KEY `id_menu` (`id_menu`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD CONSTRAINT `detail_pesanan_ibfk_1` FOREIGN KEY (`id_pesanan`) REFERENCES `pesanan` (`id_pesanan`),
  ADD CONSTRAINT `detail_pesanan_ibfk_2` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
